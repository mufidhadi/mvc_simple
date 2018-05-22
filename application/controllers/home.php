<?php

class home
{

  function __construct()
  {
    
  }

  public function index()
  {
    $nama = 'mufid';
    // panggil view
    include 'application/views/home.php';
  }
}
