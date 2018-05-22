<?php
class mahasiswa
{
  function __construct()
  {
    // panggil model
    include_once 'application/models/mahasiswa_model.php';
    $this->mahasiswa_model = new mahasiswa_model();
  }

  public function index()
  {
    $mahasiswa = $this->mahasiswa_model->select_mahasiswa();
    include 'application/views/mahasiswa/tabel.php';
  }

  public function tambah()
  {
    $action = './add';
    include 'application/views/mahasiswa/formulir.php';
  }

  public function add()
  {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $prodi = $_POST['prodi'];
    $fakultas = $_POST['fakultas'];
    $tahun_angkatan = $_POST['tahun_angkatan'];
    $alamat = $_POST['alamat'];

    $insert = $this->mahasiswa_model->insert_mahasiswa($nim, $nama, $kelas, $prodi, $fakultas, $tahun_angkatan, $alamat);
    if ($insert) {
      header('location:./');
    } else {
      echo "gagal tambah data <br>";
      var_dump($hapus);
    }
  }

  public function ubah($nim='')
  {
    $action = '../update';
    $mahasiswa = $this->mahasiswa_model->select_mahasiswa($nim);
    include 'application/views/mahasiswa/formulir.php';
  }

  public function update()
  {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $prodi = $_POST['prodi'];
    $fakultas = $_POST['fakultas'];
    $tahun_angkatan = $_POST['tahun_angkatan'];
    $alamat = $_POST['alamat'];

    $insert = $this->mahasiswa_model->update_mahasiswa($nim, $nama, $kelas, $prodi, $fakultas, $tahun_angkatan, $alamat);
    if ($insert) {
      header('location:./');
    } else {
      echo "gagal tambah data <br>";
      var_dump($hapus);
    }
  }

  public function remove($nim='')
  {
    $hapus = $this->mahasiswa_model->delete_mahasiswa($nim);
    if ($hapus) {
      header('location:../');
    } else {
      echo "gagal hapus <br>";
      var_dump($hapus);
    }
  }

}
