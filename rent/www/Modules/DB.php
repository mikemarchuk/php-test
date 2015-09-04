<?php

/**
 * DB
 */
class DB {

    /**
     * @var mysqli
     */
    private $connection;

    /**
     * Constructor
     */
    public function DB() {
        $this->connection = $this->connect();
    }

    /**
     * @return mysqli
     */
    private function connect() {
        global $dbConfig;

        $mysqli = new mysqli($dbConfig["host"], $dbConfig["user"], $dbConfig["password"], $dbConfig["db"]);

        if ($mysqli->connect_errno) {
            printf("Unable connect to MySql: ", $mysqli->connect_error);
            exit();
        }

        return $mysqli;
    }

    /**
     * @param $sqlString
     * @return bool|mysqli_result
     */
    private function query($sqlString) {
        return $this->connection->query($sqlString);
    }

    /**
     * @param $sqlString
     * @return array
     */
    public function getList($sqlString) {
        //mysqli_report(MYSQLI_REPORT_ALL);
        $resultQuery = $this->query($sqlString);

        $fields = $resultQuery->fetch_fields();

        $list = array();
        while($row = $resultQuery->fetch_row()) {
            $rowValues = array();
            $i = 0;
            foreach($fields as $field) {
                $rowValues[$field->name] = $row[$i];
                $i++;
            }
            $list[] = $rowValues;
        }

        return $list;
    }

    public function getOne($sqlString) {
        $resultQuery = $this->query($sqlString . ' LIMIT 1');
        $value = $resultQuery->fetch_array(MYSQLI_NUM);
        return is_array($value) ? $value[0] : "";
    }

    /**
     * Insert
     *
     * @param $sqlString
     * @param $params
     * @return int|string
     */
    public function insert($sqlString, $params) {
        $query = $this->build($sqlString, $params);
        $query->execute();
        return mysqli_insert_id($this->connection);
    }

    /**
     * Build query statement
     *
     * @param $sqlString
     * @param $params
     * @return mysqli_stmt
     */
    private function build($sqlString, $params) {
        $statement = $this->connection->prepare($sqlString);
        $typesParams = null;
        $valuesParams = array();
        foreach ($params as $param) {
            $typesParams .= $param["type"];
            $valuesParams[] = $param["value"];
        }
        $params = array_merge(array($typesParams), $valuesParams);
        call_user_func_array(array(&$statement, 'bind_param'), $this->refValues($params));
        return $statement;
    }

    /**
     * Reference
     *
     * @param $arr
     * @return array
     */
    private function refValues($arr){
        if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
        {
            $refs = array();
            foreach($arr as $key => $value)
                $refs[$key] = &$arr[$key];
            return $refs;
        }
        return $arr;
    }

}

?>