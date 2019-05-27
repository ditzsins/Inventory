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
    <h1><b>Pemasukan</b></h1>
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
                        $query = "SELECT *
                                  FROM users
                                  ORDER BY name asc";
                        $result = mysqli_query($conn,$query) or die(mysqli_error());

                        while ($row = mysqli_fetch_assoc($result)){

                        ?>
                        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>

                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Masuk</td>
                <td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
                <td><input type="date" name="tgl_masuk" class="form-control"></td>
            </tr>
            <tr>
                <td>Barang</td>
                <td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
                <td>
                    <select name="barang" id="barang" class="form-control">
                        <?php 

                        $query = "SELECT *
                                  FROM t_barang
                                  ORDER BY nama asc";
                        $result = mysqli_query($conn,$query) or die(mysqli_error());

                        while ($row = mysqli_fetch_assoc($result)){

                        ?>
                       <option value="<?php echo $row['kode']; ?>"><?php echo $row['nama']; ?></option>

                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kadaluarsa</td>
                <td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
                <td><input type="date" name="kadaluarsa" class="form-control"></td>
            </tr>
            <tr>
                <td>Kuantitas</td>
                <td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
                <td><input type="number" name="kuantitas" class="form-control"></td>
            </tr>
            <tr>
                <td>Supplier</td>
                <td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
                <td>
                    <select name="supplier" id="supplier" class="form-control">
                        <?php 

                        $query = "SELECT *
                                  FROM t_supplier
                                  ORDER BY nama asc";
                        $result = mysqli_query($conn,$query) or die(mysqli_error());

                        while ($row = mysqli_fetch_assoc($result)){

                        ?>
                        <option value="<?php echo $row['id_supplier']; ?>"><?php echo $row['nama']; ?></option>

                        <?php } ?>
                    </select>
                </td>
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
        $ID = $_POST['ID'];
        $admin = $_POST['admin'];
        $tgl_masuk = $_POST['tgl_masuk'];
        $barang = $_POST['barang'];
        $kadaluarsa = $_POST['kadaluarsa'];
        $kuantitas = $_POST['kuantitas'];
        $supplier = $_POST['supplier'];

        $sql = "INSERT INTO t_detail_barang VALUES ('".$ID."', '".$barang."', '".$kadaluarsa."', '".$kuantitas."');"; 
        $sql2 = "INSERT INTO t_pemasukan VALUES ('".$ID."', '".$tgl_masuk."', '".$ID."', '".$kadaluarsa."', '".$kuantitas."', '".$admin."', '".$supplier."');";

        $query = mysqli_query($conn, $sql);
        $query2 = mysqli_query($conn, $sql2);
        
        if($query2){
            echo "<script>
                    alert('Data Barang Berhasil Ditambah');
                    location.href = 'pemasukanbarang.php';
                </script>";
        }
    }
?>
    </table>
</div>
</body>
</html>