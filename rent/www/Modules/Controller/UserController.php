<?php

/**
 * UserController
 */
class UserController extends Controller {

    /**
     * List of apartments
     */
    public function indexAction() {
        $entity = $this->getEntity();

        $users = $entity->get();

        if (Request::getIsAjaxRequest()) {
            echo json_encode($users);
            exit;
        }

        $parameters = array(
            "action"    =>  "apartment",
            "data"      =>  $users
        );

        $this->render(str_replace("Controller", "",  get_class($this)) . "/index.php", $parameters);
    }

}

?>