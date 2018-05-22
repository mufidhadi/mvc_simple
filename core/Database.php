<?php
/**
 * DATABASE.PHP
 * Untuk mengelola koneksi dan query builder
 */
class Database
{

  function __construct($config=null)
  {
    $database = array(
      'host' => null,
      'username' => null,
      'password' => null,
      'database' => null
    );
    $database = @$config['database'];
    $this->koneksi = mysqli_connect($database['host'],$database['username'],$database['password'],$database['database']);
  }

  public function query($query='')
  {
    // select data
    $execute = mysqli_query($this->koneksi,$query);
    if ($execute) {
      $select = mysqli_fetch_object($execute);
      if (!$select) {
        // jika bukan query select
        $select = $execute;
      }
    } else {
      $select = false;
    }
    return $select;
  }

  public function insert($col=array(),$table=null)
  {
    // update data
    $query = 'INSERT INTO ';
    if ($table != null) {
      $query .= $table.' ';
    } else {
      $query .= @$this->table.' ';
    }
    $query .= '(';
    $i = 0;
    foreach ($col as $kolom) {
      // ambil nama kolom
      $nama_kolom = array_keys($col,$kolom);
      if ($i>0) {
        $query .= ", ";
      }
      $query .= "$nama_kolom ";
      $i++;
    }
    $query .= ') ';
    $query .= 'VALUES(';
    $i = 0;
    foreach ($col as $kolom) {
      // ambil isi
      $isi_kolom  = $kolom;
      if ($i>0) {
        $query .= ", ";
      }
      $query .= "'$isi_kolom' ";
      $i++;
    }
    $query .= ') ';
    $execute = mysqli_query($this->koneksi,$query);
    return $execute;
  }

  public function update($col=array(),$table=null)
  {
    // update data
    $query = 'UPDATE ';
    if ($table != null) {
      $query .= $table.' ';
    } else {
      $query .= @$this->table.' ';
    }
    $query .= 'SET ';
    $i = 0;
    foreach ($col as $kolom) {
      // ambil nama kolom dan isi
      $nama_kolom = array_keys($col,$kolom);
      $isi_kolom  = $kolom;
      if ($i>0) {
        $query .= ", ";
      }
      $query .= "$nama_kolom = '$isi_kolom' ";
      $i++;
    }
    $query .= @$this->where;
    $execute = mysqli_query($this->koneksi,$query);
    return $execute;
  }

  public function delete($table='')
  {
    // delete data
    $query = 'DELETE ';
    $query .= 'FROM ';
    if ($table != null) {
      $query .= $table.' ';
    } else {
      $query .= @$this->table.' ';
    }
    $query .= @$this->where;
    $execute = mysqli_query($this->koneksi,$query);
    return $execute;
  }

  public function from($table='')
  {
    $this->table = $table;
  }

  public function where($col='',$value='')
  {
    $this->where = $col."='$value'";
  }

  public function get($table='')
  {
    $query = 'SELECT ';
    $query .= '* ';
    $query .= 'FROM ';
    if ($table != null) {
      $query .= $table.' ';
    } else {
      $query .= @$this->table.' ';
    }
    $query .= @$this->where;
    $execute = mysqli_query($this->koneksi,$query);
    return $execute;
  }

  public function result($execute=null)
  {
    if ($execute) {
      $select = mysqli_fetch_object($execute);
      if (!$select) {
        // jika bukan query select
        $select = $execute;
      }
    } else {
      $select = false;
    }
    return $select;
  }

  // TODO: tes semua query builder

}
