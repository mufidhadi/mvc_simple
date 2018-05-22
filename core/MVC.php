<?php
/**
* MVC.PHP
* Pusat semua pemanggilan class MVC
*/
// panggil config
require 'application/config/config.php';
// panggil router
require_once 'Router.php';
$route = new Router(@$config);
$route->route_execute(@$config['controller_folder']);
