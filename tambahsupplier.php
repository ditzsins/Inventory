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
    <h1><b>Tambah Supplier</b></h1>
    <table><br>
        <div class="col-12">

    <form action="" method="POST">
        <table cellspacing="1" cellpadding="1">
            <tr>
                <td>Kode</td>
                <td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
                <td><input type="text" name="kode" class="form-control"></td>
            </tr>
            <tr>
                <td>Nama Supplier</td>
                <td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
                <td><input type="text" name="nama" class="form-control"></td>
            </tr>
            <tr>
                <td></td>
                <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                <td><br><button type="submit" name="simpan" class="btn btn-primary">Simpan Data</td>
            </tr>
        </table>
    </form>
</div>
<?php
    if(isset($_POST['simpan'])){
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];

        $sql = "INSERT INTO t_supplier VALUES(
        '".$kode."',
        '".$nama."')";

        $query = mysqli_query($conn, $sql);
        if($query){
    echo "<script>
    alert('Data Supplier Berhasil Ditambah');
    location.href = 'pemasukanbarang.php';
    </script>";
}
    }
?>
    </table>
</div>
</body>
</html>