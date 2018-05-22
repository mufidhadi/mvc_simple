<?php

class home extends MVC
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('data_siswa');
  }

  public function index()
  {
    echo "home";
    $data['user'] = 'Mufid';
    $this->load->view('home',$data);
  }
}
