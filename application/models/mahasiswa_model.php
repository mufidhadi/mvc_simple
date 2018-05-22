<?php

class mahasiswa_model
{

  public function __construct()
  {
    include_once 'application/models/koneksi.php';
    $kon = new koneksi();
    $this->koneksi = $kon->get_koneksi();
  }

  public function select_mahasiswa($nim=null)
  {
    // select data
    $query = "SELECT * FROM mahasiswa";
    if ($nim!=null) {
      $query .= " WHERE nim='$nim'";
    }
    $select = mysqli_query($this->koneksi,$query);
    if (!$select) {
      $data = mysqli_error($this->koneksi);
    }else {
      if ($nim==null) {
        $data = array();
        while ($hasil = mysqli_fetch_object($select)) {
          array_push($data,$hasil);
        }
      }else {
        $data = mysqli_fetch_object($select);
      }
    }
    return $data;
  }

  public function insert_mahasiswa($nim, $nama, $kelas, $prodi, $fakultas, $tahun_angkatan, $alamat)
  {
    // insert data
    $query = "INSERT INTO mahasiswa VALUES ('$nim','$nama','$kelas','$prodi','$fakultas','$tahun_angkatan','$alamat')";
    $insert = mysqli_query($this->koneksi,$query);
    if (!$insert) {
      $data = mysqli_error($this->koneksi);
    }
    $data = $insert;
    return $data;
  }

  public function update_mahasiswa($nim, $nama, $kelas, $prodi, $fakultas, $tahun_angkatan, $alamat)
  {
    // update data
    $query = "UPDATE mahasiswa SET nama='$nama', kelas='$kelas', prodi='$prodi', fakultas='$fakultas', tahun_angkatan='$tahun_angkatan', alamat='$alamat' WHERE nim='$nim'";
    $update = mysqli_query($this->koneksi,$query);
    if (!$update) {
      $data = mysqli_error($this->koneksi);
    }
    $data = $update;
    return $data;
  }

  public function delete_mahasiswa($nim)
  {
    // delete data
    $query = "DELETE FROM mahasiswa WHERE nim='$nim'";
    $delete = mysqli_query($this->koneksi,$query);
    if (!$delete) {
      $data = mysqli_error($this->koneksi);
    }else {
      $data = $delete;
    }
    return $data;
  }

}
