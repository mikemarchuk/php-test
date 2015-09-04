<?php

/**
 * Request
 */
class Request {

    /**
     * Check is AJAX request
     *
     * @return bool
     */
    public static function getIsAjaxRequest() {
        return isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] === "XMLHttpRequest";
    }

    /**
     * Get post request parameters
     *
     * @return mixed
     */
    public static function getPost() {
        return $_POST;
    }

}

?>