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
        <div class="col-sm-11 col-xs-10">
          <h1>Data Mahasiswa <small>(contoh)</small></h1>
        </div>
        <div class="col-sm-1 col-xs-2">
          <br>
          <a href="tambah" class="btn btn-primary"><i class="fa fa-plus"> tambah</i></a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table table-responsive">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Prodi</th>
                  <th>Fakultas</th>
                  <th>Tahun Angkatan</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($mahasiswa as $mhs): ?>
                  <tr>
                    <td><?php echo $mhs->nim ?></td>
                    <td><?php echo $mhs->nama ?></td>
                    <td><?php echo $mhs->kelas ?></td>
                    <td><?php echo $mhs->prodi ?></td>
                    <td><?php echo $mhs->fakultas ?></td>
                    <td><?php echo $mhs->tahun_angkatan ?></td>
                    <td><?php echo $mhs->alamat ?></td>
                    <td>
                      <div class="btn-group btn-group-xs">
                        <a href="ubah/<?php echo $mhs->nim ?>" class="btn btn-default btn-xs">
                          Edit
                        </a>
                        <a onclick="return confirm('hapus?')" href="remove/<?php echo $mhs->nim ?>" class="btn btn-danger btn-xs">
                          Hapus
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
