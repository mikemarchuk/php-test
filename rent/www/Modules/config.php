<?php 

/**
 * Possible routes and actions for them. For other routes execute redirect to index.php.
 */
$routes = array(
	"/"	=> array(
		"Controller"	=>	"DefaultController",
		"action"		=>	"indexAction"
	),
	"/order/new"	=> array(
		"Controller"	=>	"OrderController",
		"action"		=>	"newAction"
	),
	"/order/create"	=> array(
		"Controller"	=>	"OrderController",
		"action"		=>	"createAction"
	),
	"/apartment"	=> array(
		"Controller"	=>	"ApartmentController",
		"action"		=>	"indexAction"
	),
	"/order" => array(
		"Controller"	=>	"OrderController",
		"action"		=>	"indexAction"
	),
    "/user" => array(
        "Controller"    =>  "UserController",
        "action"        =>  "indexAction"
    ),
    "/apartment/getByUserId" => array(
        "Controller"    =>  "ApartmentController",
        "action"        =>  "getByUserId"
    )
);

/**
 * DB config
 */
$dbConfig = array(
    'host'      =>  'localhost',
    'port'      =>  '3306',
    'user'      =>  'root',
    'password'  =>  'root',
    'db'        =>  'rent'
);

?> 