<?php

/**
 * ApartmentController
 */
class ApartmentController extends Controller {

    /**
     * List of apartments
     */
    public function indexAction() {
        $entity = $this->getEntity();

        $apartments = $entity->get();

        if (Request::getIsAjaxRequest()) {
            echo json_encode($apartments);
            exit;
        }

        $parameters = array(
            "action"    =>  "apartment",
            "data"      =>  $apartments
        );

        $this->render(str_replace("Controller", "",  get_class($this)) . "/index.php", $parameters);
    }

    /**
     * Get apartments list by user in JSON
     */
    public function getByUserId() {
        $entity = $this->getEntity();

        $params = Request::getPost();

        $apartments = $entity->getByUserId($params["userId"]);

        echo json_encode($apartments);
        exit;
    }

}

?>