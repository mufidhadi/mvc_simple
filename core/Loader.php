<?php
/**
 * LOADER.PHP
 * digunakan untuk memanggil semua elemen MVC
 */
class Loader
{

  function __construct($base_path='')
  {
    $this->base_path = $base_path;
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

  public function model($name='')
  {
    $model = false;
    // ambil file
    $file_ada = $this->ambil_file($name,'models',@$this->base_path);
    if ($file_ada) {
      // cek apakah berupa class
      if (class_exists($name)) {
        // buat object model
        $model = new $name();
      }
    }
    return $model;
  }

  public function view($name='',$data = null)
  {
    // ambil file
    $file_ada = $this->ambil_file($name,'views',@$this->base_path);
    if ($file_ada) {
      // pecahkan array ke variabel
      if ($data != null) {
        extract($data);
        // TODO: memperbaiki extract dan kirim data
      }
    }
  }

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

}
