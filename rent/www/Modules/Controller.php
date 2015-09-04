<?php

/**
 * Controller
 */
class Controller {

    /**
     * Redirect to index.php
     */
    public function redirect() {
        header("Location: /index.php");
    }

    /**
     * Get entity
     *
     * @param null $params
     * @return mixed
     */
    protected function getEntity($params=null) {
        $entityName = str_replace("Controller", "",  get_class($this));
        return new $entityName($params);
    }

    /**
     * Render view
     *
     * @param $view
     * @param null $parameters
     */
    protected function render($view, $parameters = null) {
        include_once "layout.php";
    }

    /**
     * Check menu item is active
     *
     * @param $menuItem
     * @param $action
     */
    protected function checkActiveMenuItem($menuItem, $action) {
        if ($menuItem === $action) echo "active";
    }

}

?>