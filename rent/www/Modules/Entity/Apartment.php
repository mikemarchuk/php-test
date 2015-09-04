<?php

/**
 * Apartment
 */
class Apartment {

    /**
     * Get apartments
     *
     * @param null $params
     * @return array
     */
    public function get($params=null) {
        $db = new DB();

        $sqlString = "SELECT * FROM `apartment`";
        $apartments = $db->getList($sqlString);

        return $apartments;
    }

    /**
     * Get apartments list by user in array
     *
     * @param $userId
     * @return array
     */
    public function getByUserId($userId) {
        if (!intval($userId)) {
            return $this->get();
        }

        $db = new DB();

        $sqlString = "SELECT a.name, a.address
                      FROM `apartment` a
                      JOIN `order` o ON a.id = o.apartmentId
                      WHERE o.userId = '$userId'
                      GROUP BY a.id";
        $apartments = $db->getList($sqlString);

        return $apartments;
    }

}

?>