<?php

/**
 * MVC.PHP
 * Pusat semua pemanggilan class MVC
 */
class MVC
{

  function __construct()
  {
    // panggil config
    require_once 'application/config/config.php';
    //panggil loader
    require_once 'Loader.php';
    $load = new Loader(@$config['base_path']);
    // panggil router
    require_once 'Router.php';
    $route = new Router(@$config);
    // panggil database
    // require_once 'Database.php';
    // $route = new Database(@$config);

    // inisialisasi variabel global
    $this->config = @$config;
    $this->load = $load;
    $this->route = $route;
  }

  public function init()
  {
    $this->route->route_execute(@$this->config['controller_folder']);
  }
}
