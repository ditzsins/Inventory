<?php
    include("config.php");
    include("check_login.php");
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
      <a href="index.php"><img src="images/logo.png" width="500"></a>
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
      	<h1><b>Daftar Detail Barang</b></h1>	
      </div>
      <table><br>
        <div class = "col-md-12">
          <table class="table table-bordered table-hover table-striped" id="myTabble">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Expired Date</th>
                <th>Kuantitas</th>
              </tr>
            </thead>
            <tbody>
              <?php
              //ambil data pendapatan
              $query = "SELECT kode_barang, nama, kadaluarsa, kuantitas, id_detail_barang
                        FROM t_barang, t_detail_barang
                        WHERE kode = kode_barang
                        AND kuantitas > 0
                        ORDER BY nama asc, kadaluarsa asc, kuantitas asc";
              $result = mysqli_query($conn,$query) or die(mysqli_error());
              ?>

              <?php 
              $i = 1;
              while( $row = mysqli_fetch_assoc($result) ) : ?>
                <tr>
                  <td style="text-align: center"><?php echo $i ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td style="text-align: center"><?php echo $row['kadaluarsa'] ?>
                  <td style="text-align: center"><?php echo $row['kuantitas'] ?>
                </td>
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