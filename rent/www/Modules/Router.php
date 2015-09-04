<?php

/**
 * Router
 */
class Router {

    /**
     * @var string
     */
    private $route;

    /**
     * Constructor
     */
    public function __construct() {
		$this->route = '/' . $_GET["route"];
		$this->execute();
	}

    /**
     * Execute controller
     */
    private function execute() {
		global $routes;
		
		if (isset($routes[ $this->route ])) {
			$controllerName = $routes[ $this->route ]["Controller"];
			$actionName = $routes[ $this->route ]["action"];
		} else {
			$controllerName = "Controller";
			$actionName = "redirect";
		}
		
		$Controller = new $controllerName();
		$Controller->$actionName();
	}
	
}

?>