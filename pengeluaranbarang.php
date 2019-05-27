<?php
    include("config.php");
    include("check_login.php");
?>

<?php
              if (isset($_POST['simpan']))
              {
                $bulan = $_POST['bulan'];
                $tahun = $_POST['tahun'];
              
              $query = "SELECT tgl_keluar, nama, t_pengeluaran.kuantitas, admin
                        FROM t_detail_barang, t_pengeluaran, t_barang
                        WHERE t_detail_barang.id_detail_barang=t_pengeluaran.id_detail_barang
                        AND kode = kode_barang
                        AND year(tgl_keluar) = $tahun
                        AND month(tgl_keluar) = $bulan
                        ORDER BY tgl_keluar asc";
              $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
            } elseif (isset($_POST['simpan2'])) {
              $namaadmin = $_POST['namaadmin'];
              
              $query = "SELECT tgl_keluar, nama, t_pengeluaran.kuantitas, admin
                        FROM t_detail_barang, t_pengeluaran, t_barang
                        WHERE t_detail_barang.id_detail_barang=t_pengeluaran.id_detail_barang
                        AND kode = kode_barang
                        AND admin like '%$namaadmin%'
                        ORDER BY tgl_keluar asc";
              $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
            } elseif (isset($_POST['simpan3'])) {
              $namabarang = $_POST['namabarang'];
              
              $query = "SELECT tgl_keluar, nama, t_pengeluaran.kuantitas, admin
                        FROM t_detail_barang, t_pengeluaran, t_barang
                        WHERE t_detail_barang.id_detail_barang=t_pengeluaran.id_detail_barang
                        AND kode = kode_barang
                        AND nama like '%$namabarang%'
                        ORDER BY tgl_keluar asc";
              $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
            } else {
              $query = "SELECT tgl_keluar, nama, t_pengeluaran.kuantitas, admin
                        FROM t_detail_barang, t_pengeluaran, t_barang
                        WHERE t_detail_barang.id_detail_barang=t_pengeluaran.id_detail_barang
                        AND kode = kode_barang
                        ORDER BY tgl_keluar asc";
              $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
            }

              ?>

<html>
<head>
    <title>Sistem Informasi Barang</title>
    <link rel="stylesheet" href="style.css"/>

    <link rel="stylesheet" href="bootstrap.min.css">

</head>

<body>
    <div class="pagewidth">
    <div class="header">
      <img src="images/logo.png" width="500">
    </div>
    <div class="nav">
      <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="daftarbarang.php">Daftar Barang</a></li>
        <li><a href="daftardetailbarang.php">Daftar Detail Barang</a></li>
        <li><a href="pemasukanbarang.php">Pemasukan</a></li>
        <li><a href="pengeluaranbarang.php">Pengeluaran</a></li>
        <!--li><a href="krisisbarang.php">Krisis Barang</a></li-->
        <li><a href="logout.php">Keluar</a></li>
      </ul>
    </div>

    
<div class="page-wrap">
      <div align="center">
        <h1><b>Laporan Pengeluaran</b></h1> 
      </div>
      <br>
      <div class="col-md-12" align="left">
      <form action="" method="POST";>
        <table style="float: right; width: 50%;">
          <tr>
            <td>Bulan</td>
            <td>&emsp;:&emsp;</td>
            <td><input type="text" name="bulan" placeholder="Bulan" class="form-control"></td>
            <td>&emsp;&emsp;</td>
            <td>Tahun</td>
            <td>&emsp;:&emsp;</td>
            <td><input type="text" name="tahun" placeholder="Tahun" class="form-control"></td>
            <td>&emsp;</td>
            <td><button type="submit" name="simpan" class="btn btn-primary">Filter Data</button></td>
          </tr>
        </table>
      </form>
      <ul class="nav navbar-nav navbar-right" style="float: left; width: 50%;">
        <form action="pengeluaranbarangdownload.php" method="post" style="float: left; width: 12%;">
          <input type="hidden" name="query" value="<?php echo $query ?>" >
          <input type="image" src ="images/download.png" width = "40" alt="download" />
        </form>
        <a href="tambahpengeluaran.php" class="btn btn-primary" style="float: left; width: 40%">+ Tambah Pengeluaran</a>
      </ul>
    </div>
    <div class="col-md-12" align="left">
      <form action="" method="POST";>
        <table style="float: right; width: 48%;">
          <tr>
            <td>Nama Admin</td>
            <td>&emsp;:&emsp;</td>
            <td><input type="text" name="namaadmin" placeholder="Nama Admin" class="form-control"></td>
            <td>&emsp;&emsp;</td>
            <td><button type="submit" name="simpan2" class="btn btn-primary">Filter Data</button></td>
          </tr>
        </table>
      </form>
    </div>
    <div class="col-md-12" align="left">
      <form action="" method="POST";>
        <table style="float: right; width: 48%;">
          <tr>
            <td>Nama Barang</td>
            <td>&emsp;:&emsp;</td>
            <td><input type="text" name="namabarang" placeholder="Nama Barang" class="form-control"></td>
            <td>&emsp;&emsp;</td>
            <td><button type="submit" name="simpan3" class="btn btn-primary">Filter Data</button></td>
          </tr>
        </table>
      </form>
    </div>
      <table><br><br><br>
        <div class = "col-md-12">
          <table class="table table-bordered table-hover table-striped" id="myTabble">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Barang</th>
                <th>Kuantitas</th>
                <th>Admin</th>
              </tr>
            </thead>
            <tbody>
              

              <?php 
              $i = 1;
              while( $row = mysqli_fetch_assoc($result) ) : ?>
                <tr>
                  <td style="text-align: center"><?php echo $i ?></td>
                  <td style="text-align: center"><?php echo $row['tgl_keluar'] ?></td>
                  <td><?php echo $row['nama'] ?>
                  <td style="text-align: center"><?php echo $row['kuantitas'] ?></td>
                  <td><?php echo $row['admin'] ?>
              </tr>

              <?php
              $i++; endwhile;
              ?>
            </tbody>
          </table>
        </div>
      </table>
    </div>
</body>
</html>