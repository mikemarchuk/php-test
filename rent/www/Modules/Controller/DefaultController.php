<?php

/**
 * DefaultController
 */
class DefaultController extends Controller {

    /**
     * index.php
     */
    public function indexAction() {
        $parameters = array(
            "action"    =>  "index"
        );
        $this->render("main.php", $parameters);
    }

}

?>