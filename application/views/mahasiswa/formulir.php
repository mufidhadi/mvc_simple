<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mahasiswa</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">
      <div class="row">
        <h1>Data Mahasiswa <small>(contoh)</small></h1>
      </div>
      <form class="" action="<?php echo @$action ?>" method="post">

        <div class="row form-group">
          <div class="col-sm-3">
            <label for="nim">NIM</label>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nim" name="nim" placeholder="nim..."value="<?php echo @$mahasiswa->nim ?>">
          </div>
        </div>

        <div class="row form-group">
          <div class="col-sm-3">
            <label for="nama">Nama</label>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama..."value="<?php echo @$mahasiswa->nama ?>">
          </div>
        </div>

        <div class="row form-group">
          <div class="col-sm-3">
            <label for="kelas">Kelas</label>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="kelas..."value="<?php echo @$mahasiswa->kelas ?>">
          </div>
        </div>

        <div class="row form-group">
          <div class="col-sm-3">
            <label for="prodi">Prodi</label>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="prodi" name="prodi" placeholder="prodi..."value="<?php echo @$mahasiswa->prodi ?>">
          </div>
        </div>

        <div class="row form-group">
          <div class="col-sm-3">
            <label for="fakultas">Fakultas</label>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="fakultas..."value="<?php echo @$mahasiswa->fakultas ?>">
          </div>
        </div>

        <div class="row form-group">
          <div class="col-sm-3">
            <label for="tahun_angkatan">Tahun Angkatan</label>
          </div>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="tahun_angkatan" name="tahun_angkatan" placeholder="tahun_angkatan..." min="2010"value="<?php echo @$mahasiswa->tahun_angkatan ?>">
          </div>
        </div>

        <div class="row form-group">
          <div class="col-sm-3">
            <label for="alamat">Alamat</label>
          </div>
          <div class="col-sm-9">
            <textarea id="alamat" name="alamat" rows="3" cols="80" placeholder="alamat..." class="form-control"><?php echo @$mahasiswa->alamat ?></textarea>
          </div>
        </div>

        <div class="row form-group">
          <div class="col-sm-3">
          </div>
          <div class="col-sm-9">
            <a href="./" class="btn btn-default">Kembali</a>
            <button type="submit" class="btn btn-primary">
              Simpan
            </button>
          </div>
        </div>

      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
