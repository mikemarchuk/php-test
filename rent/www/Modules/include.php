<?php

error_reporting(~E_NOTICE);
$baseDir = $_SERVER['DOCUMENT_ROOT'];

require_once "config.php";

/**
 * Include directories
 */
$path = array(
    $baseDir . '/Modules/',
    $baseDir . '/Modules/Controller/',
    $baseDir . '/Modules/Entity/',
    $baseDir . '/Templates/');

/**
 * Set include path
 */
(preg_match('/win/', $_SERVER['SERVER_SOFTWARE']))
    ? ini_set('include_path', implode(':', $path))
    : ini_set('include_path', implode(';', $path));

/**
 * Autoload classes
 *
 * @param $class_name
 */
function __autoload($class_name) {
    global $path;
    //class directories
    $directories = array(
        'Modules/',
        'Modules/Controller/',
        'Modules/Entity'
    );

    //for each directory
    foreach($path as $directory) {
        //see if the file exists
        if (file_exists($directory . $class_name . '.php')) {
            //require the class once and return
            require_once($directory . $class_name . '.php');
            return;
        }
    }
}

/**
 * Support function for dump variable
 */
function dump($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

?>