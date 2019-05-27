<?php
    include("config.php");
    include("check_login.php");
?>

<?php
              if (isset($_POST['simpan']))
              {
                $bulan = $_POST['bulan'];
                $tahun = $_POST['tahun'];

              $query = "SELECT tgl_masuk, t_barang.nama as namabarang, t_pemasukan.kadaluarsa, t_pemasukan.kuantitas,admin, t_supplier.nama as namasupplier
                        FROM t_pemasukan,t_detail_barang, t_barang, t_supplier
                        WHERE kode = kode_barang
                        AND t_detail_barang.id_detail_barang = t_pemasukan.id_detail_barang
                        AND t_pemasukan.id_supplier = t_supplier.id_supplier 
                        AND year(tgl_masuk) = $tahun
                        AND month(tgl_masuk) = $bulan
                        ORDER BY tgl_masuk asc";
              $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
          } elseif (isset($_POST['simpan2'])) {
          	$namaadmin = $_POST['namaadmin'];
          	$query = "SELECT tgl_masuk, t_barang.nama as namabarang, t_pemasukan.kadaluarsa, t_pemasukan.kuantitas,admin, t_supplier.nama as namasupplier
                        FROM t_pemasukan,t_detail_barang, t_barang, t_supplier
                        WHERE kode = kode_barang
                        AND t_detail_barang.id_detail_barang = t_pemasukan.id_detail_barang
                        AND t_pemasukan.id_supplier = t_supplier.id_supplier 
                        AND admin like '%$namaadmin%'
                        ORDER BY tgl_masuk asc";
              $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
          } elseif (isset($_POST['simpan3'])) {
          	$namabarang = $_POST['namabarang'];
          	$query = "SELECT tgl_masuk, t_barang.nama as namabarang, t_pemasukan.kadaluarsa, t_pemasukan.kuantitas,admin, t_supplier.nama as namasupplier
                        FROM t_pemasukan,t_detail_barang, t_barang, t_supplier
                        WHERE kode = kode_barang
                        AND t_detail_barang.id_detail_barang = t_pemasukan.id_detail_barang
                        AND t_pemasukan.id_supplier = t_supplier.id_supplier 
                        AND t_barang.nama like '%$namabarang%'
                        ORDER BY tgl_masuk asc";
              $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
          } else {
          	$query = "SELECT tgl_masuk, t_barang.nama as namabarang, t_pemasukan.kadaluarsa, t_pemasukan.kuantitas,admin, t_supplier.nama as namasupplier
                        FROM t_pemasukan,t_detail_barang, t_barang, t_supplier
                        WHERE kode = kode_barang
                        AND t_detail_barang.id_detail_barang = t_pemasukan.id_detail_barang
                        AND t_pemasukan.id_supplier = t_supplier.id_supplier
                        ORDER BY tgl_masuk asc";
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
      	<h1><b>Laporan Pemasukan</b></h1>	
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
				<form action="pemasukanbarangdownload.php" method="post" style="float: left; width: 12%;">
					<input type="hidden" name="query" value="<?php echo $query ?>" >
					<input type="image" src ="images/download.png" width = "40" alt="download" />
				</form>
				<a href="tambahpemasukan.php" class="btn btn-primary" style="float: left; width: 38%">+ Tambah Pemasukan</a>
				<p style="float: left; width: 5%">&emsp;</p>
				<a href="tambahsupplier.php" class="btn btn-primary" style="float: left; width: 33%">+ Tambah Supplier</a>
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
      <table><br><br>
        <div class = "col-md-12">
          <table class="table table-bordered table-hover table-striped" id="myTabble">
            <br><thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Kadaluarsa</th>
                <th>Kuantitas</th>
                <th>Admin</th>
                <th>Supplier</th>
              </tr>
            </thead>
            <tbody>
              

              <?php
              $i = 1; 
              while( $row = mysqli_fetch_assoc($result) ) : ?>
                <tr>
                  <td style="text-align: center"><?php echo $i ?></td>
                  <td style="text-align: center"><?php echo $row['tgl_masuk'] ?></td>
                  <td style="text-align: center"><?php echo $row['namabarang'] ?>
                  <td style="text-align: center"><?php echo $row['kadaluarsa'] ?></td>
                  <td style="text-align: center"><?php echo $row['kuantitas'] ?></td>
                  <td><?php echo $row['admin'] ?>
                  <td style="text-align: center"><?php echo $row['namasupplier'] ?></td>
                </td>
              </tr>

              <?php
              $i++;
              endwhile;
              ?>
            </tbody>
          </table>
        </div>
      </table>
    </div>
</body>
</html>