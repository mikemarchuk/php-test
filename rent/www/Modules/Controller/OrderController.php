<?php

/**
 * OrderController
 */
class OrderController extends Controller {

    /**
     * List of orders
     */
    public function indexAction() {
        $entity = $this->getEntity();

        $orders = $entity->getList();

        $parameters = array(
            "action"    =>  "order",
            "data"      =>  $orders
        );

        $this->render(str_replace("Controller", "",  get_class($this)) . "/index.php", $parameters);
    }

    /**
     * New order
     */
    public function newAction() {
        $entity = $this->getEntity();

        $parameters = array(
            "action"    =>  "orderNew"
        );

        $this->render(str_replace("Controller", "",  get_class($this)) . "/new.php", $parameters);
    }

    /**
     * Create order and send response
     */
    public function createAction() {

        $params = Request::getPost();

        $response = $this->checkFields($params);

        if (intval($response["status"])) {
            $User = new User($params["name"], $params["email"]);
            $params["userId"] = $User->getId();
            $entity = $this->getEntity($params);
            $entity->save();
        }

        echo json_encode($response);
        exit;
    }

    /**
     * Check fields
     *
     * @param $params
     * @return array
     */
    private function checkFields($params) {
        $response = array(
            "status"    =>  0,
            "messages"  =>  array()
        );

        if (!strlen($params["name"])) {
            $response["messages"][] = "Field \"Name\" must be filled.";
        }

        if (!strlen($params["email"])) {
            $response["messages"][] = "Field \"Email\" must be filled.";
        } elseif (!filter_var($params["email"], FILTER_VALIDATE_EMAIL)) {
            $response["messages"][] = "Field \"Email\" does not match.";
        }

        if (!intval($params["apartmentId"])) {
            $response["messages"][] = "Must choose \"Apartment\".";
        }

        if (!sizeof($response["messages"])) $response["status"] = 1;

        return $response;
    }

}

?>