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
    <h1><b>Pengeluaran</b></h1>
    <table><br>
        <div class="col-12">

    <form action="" method="POST">
        <table cellspacing="1" cellpadding="1">
            <tr>
                <td>ID</td>
                <td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
                <td><input type="" name="ID" class="form-control"></td>
            </tr>
            <tr>
                <td>Admin</td>
                <td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
                <td>
                    <select name="admin" id="admin" class="form-control">
                        <?php 
                        $query = "SELECT * FROM users ORDER BY name asc";
                        $result = mysqli_query($conn,$query) or die(mysqli_error());

                        while ($row = mysqli_fetch_assoc($result)){

                        ?>
                        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>

                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Keluar</td>
                <td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
                <td><input type="date" name="tgl_keluar" class="form-control"></td>
            </tr>
            <tr>
                <td>Barang</td>
                <td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
                <td>
                    <select name="barang" id="barang" class="form-control">
                        <?php 

                        $query = "SELECT * FROM t_barang, t_detail_barang WHERE kode = kode_barang AND kuantitas > 0 ORDER BY nama asc, kadaluarsa asc";
                        $result = mysqli_query($conn,$query) or die(mysqli_error());

                        while ($row = mysqli_fetch_assoc($result)){

                        ?>
                       <option value="<?php echo $row['id_detail_barang']; ?>"><?php echo $row['nama']; ?><?php echo " (Sisa Barang = ",$row['kuantitas'],")"; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kuantitas</td>
                <td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
                <td><input type="number" name="kuantitas" class="form-control"></td>
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
    if(isset($_POST['simpan']))
    {
        $barang = $_POST['barang'];
        $ID = $_POST['ID'];
        $admin = $_POST['admin'];
        $tgl_keluar = $_POST['tgl_keluar'];
        $kuantitas = $_POST['kuantitas'];

        $sql = "UPDATE t_detail_barang SET kuantitas = kuantitas - $kuantitas WHERE id_detail_barang = '$barang'";
        $sql2 = "INSERT INTO t_pengeluaran VALUES ('".$ID."', '".$tgl_keluar."', '".$barang."', '".$kuantitas."', '".$admin."');";

        $query = mysqli_query($conn, $sql);
        $query2 = mysqli_query($conn, $sql2);

        if($query2){
            echo "<script>
                    alert('Data Barang Berhasil Diupdate');
                    location.href = 'pengeluaranbarang.php';
                </script>";
        }
    }
?>
    </table>
</div>
</body>
</html>