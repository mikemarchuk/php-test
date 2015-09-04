<?php

/**
 * Order
 */
class Order {

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var integer
     */
    private $apartmentId;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $created;

    /**
     * Constructor
     *
     * @param $params
     */
    public function Order($params=null) {
        $this->userId = $params["userId"];
        $this->apartmentId = $params["apartmentId"];
        $this->comment = $params["comment"];
        $this->created = date("Y-m-d H:i:s");
    }

    /**
     * Get orders
     *
     * @return array
     */
    public function getList() {
        $db = new DB();

        $sqlString = "SELECT u.name as userName, a.name as apartmentName, a.address, o.created
                      FROM `order` o
                      JOIN `user` u ON o.userId = u.id
                      JOIN `apartment` a ON o.apartmentId = a.id";
        $orders = $db->getList($sqlString);

        return $orders;
    }

    /**
     * Save user
     */
    public function save() {
        $db = new DB();

        $sqlString = "INSERT INTO `order` (`userId`, `apartmentId`, `comment`, `created`) VALUES(?, ?, ?, ?)";
        $params = array(
            array("type" => "i", "value" => intval($this->userId)),
            array("type" => "i", "value" => intval($this->apartmentId)),
            array("type" => "s", "value" => $this->comment),
            array("type" => "s", "value" => $this->created)
        );
        return $db->insert($sqlString, $params);
    }

}

?>