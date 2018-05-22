<?php
/**
 * ROUTER.PHP
 * File ini digunakan untuk mengelola HTTP REQUEST dan mengatur jalurnya
 */
class Router
{

  function __construct($config=null)
  {
    $this->config = @$config;
    $this->uri_string  = $_SERVER['REQUEST_URI'];
    $this->uri         = explode('/',$_SERVER['REQUEST_URI']);
    $this->base_path = @$config['base_path'];
  }

  public function get_uri($level=null)
  {
    if ($level!=null) {
      $uri = $this->uri[$level];
    } else {
      $uri = $this->uri;
    }
    return $uri;
  }

  function ambil_file($nama='',$mvc='',$base_path=null)
  {
    $directory = $base_path.'application/'.$mvc.'/'.$nama.'.php';
    // cek apakah suatu file ada dalam folder application
    if (file_exists($directory)) {
      // kembalikan true
      $file = $directory;
      //panggil file
      include $directory;
    } else {
      // kembalikan false
      $file = false;
    }
    return $file;
  }

  // ambil file controller
  public function controller($name='',$base_path=null)
  {
    if ($base_path!=null) {
      $base_path = @$this->base_path;
    }
    // ambil file
    $ada = $this->ambil_file($name,'controllers',$base_path);
    if (!$ada) {
      echo "404";die();
    }
  }

  // mengatur alur program berdasar url
  public function route_execute($controller_folder)
  {
    $uri_2 = $this->get_uri(2);
    if ($uri_2==null) {
      // jika uri 2 kosong
      // panggil default_controller
      $uri_2 = @$this->config['default_controller'];
      $this->controller($uri_2);
      if (class_exists($uri_2)) {
        $controller = new $uri_2();
        // cek apakah $uri_3 itu fungsi
        $uri_3 = @$this->get_uri(3);
        if (method_exists($controller,$uri_3)) {
          // call_user_func(array($controller, $uri_3));
          $uri_4 = @$this->get_uri(4);
          $controller->$uri_3(@$uri_4);
        }elseif ($uri_3==null) {
          // panggil fungsi index
          $controller->index();
        } else {
          echo 'fungsi tidak ditemukan';
          echo "404";
          die();
        }
      } else {
        echo 'class tidak ditemukan';
        echo "404";
        die();
      }
    }elseif ($uri_2=='index.php') {
      // jika uri 2 adalah index.php
      echo "index";
      header('location:./');
    } else {
      // cek apakah isi $uri_2 itu folder
      if (is_dir('application/'.$controller_folder.$uri_2)) {
        echo "folder ".'application/'.$controller_folder.$uri_2;
        // jika berupa folder
        // panggil controller
        $uri_3 = @$this->get_uri(3);
        $this->controller($uri_2.'/'.$uri_3);
        if (class_exists($uri_3)) {
          $controller = new $uri_3();
          // cek apakah $uri_3 itu fungsi
          $uri_4 = @$this->get_uri(4);
          if (method_exists($controller,$uri_4)) {
            // call_user_func(array($controller, $uri_3));
            $uri_5 = @$this->get_uri(5);
            $controller->$uri_4(@$uri_5);
          }elseif ($uri_4==null) {
            // panggil fungsi index
            $controller->index();
          } else {
            // fungsi tidak ditemukan
            echo "404";
            die();
          }
        } else {
          // class tidak ditemukan
          echo "404";
          die();
        }
      } else {
        // panggil controller
        $this->controller($uri_2);
        if (class_exists($uri_2)) {
          $controller = new $uri_2();
          // cek apakah $uri_3 itu fungsi
          $uri_3 = @$this->get_uri(3);
          if (method_exists($controller,$uri_3)) {
            // call_user_func(array($controller, $uri_3));
            $uri_4 = @$this->get_uri(4);
            $controller->$uri_3(@$uri_4);
          }elseif ($uri_3==null) {
            // panggil fungsi index
            $controller->index();
          } else {
            // fungsi tidak ditemukan
            echo "404";
            die();
          }
        } else {
          // class tidak ditemukan
          echo "404";
          die();
        }
      }
    }
  }

}
