<?php
/**
 * KONEKSI.PHP
 * untuk menghubungkan database
 */
class koneksi
{

  function __construct()
  {
    // pangil config
    require 'application/config/config.php';
    $database = $config['database'];
    $koneksi = mysqli_connect($database['host'],$database['username'],$database['password'],$database['database']);
    // Check connection
    if (mysqli_connect_errno())
    {
      echo "Gagal koneksi ke MySQL: <br>" . mysqli_connect_error();
    }else {
      $this->koneksi = $koneksi;
    }
  }

  public function get_koneksi()
  {
    return @$this->koneksi;
  }
}
