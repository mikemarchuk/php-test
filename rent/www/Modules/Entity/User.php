<?php

/**
 * User
 */
class User {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * Constructor
     *
     * @param $name
     * @param $email
     */
    public function User($name=null, $email=null) {
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        $db = new DB();

        $sqlString = "SELECT id FROM `user` WHERE name = '$this->name' AND email = '$this->email'";

        $id = $db->getOne($sqlString);

        if (!intval($id)) {
            $id = $this->save();
        }

        return $id;
    }

    /**
     * Save user
     */
    private function save() {
        $db = new DB();

        $sqlString = "INSERT INTO `user` (`name`, `email`) VALUES(?, ?)";
        $params = array(
            array("type" => "s", "value" => $this->name),
            array("type" => "s", "value" => $this->email)
        );
        return $db->insert($sqlString, $params);
    }

    /**
     * Get users
     *
     * @return array
     */
    public static function get() {
        $db = new DB();

        $sqlString = "SELECT * FROM user";
        $apartments = $db->getList($sqlString);

        return $apartments;
    }

}

?>