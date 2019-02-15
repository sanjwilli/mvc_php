<?php

class App {

  protected $controller = 'home';

  protected $method = 'index'; /* AKA $action */

  protected $params = [];

  public function __construct() {

    $this->parseUrl();

    /**
    * Checking for controller: Does the controller exist
    *
    */
    if (file_exists(CONTROLLER . $this->controller . '.php')) {
      // code...
      $this->controller = new $this->controller;
      if (method_exists($this->controller, $this->action)) {
        // code...
        call_user_func_array([$this->controller, $this->action], $this->params);
      }
      // $this->controller->index(); // The class that should be in the home file
    }

    /*if (file_exists('../app/controller/' . $url[0] .'.php')) {

    }*/

  }

  protected function parseUrl() {

    $request = trim($_SERVER['REQUEST_URI'], '/');

    if (!empty($request)) {
      // code...
      $url = explode('/', $request);

      $this->controller = isset($url[0]) ? $url[0] . 'Controller' : 'home';

      $this->method = isset(url[1]) ? $url[1] : 'index';

      unset($url[0], $url[1]);

      $this->params = !empty($url) ? array_values($url) : [];
    }

    /*if (isset($_GET['url'])) {

      return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));

    }*/
  }
}
