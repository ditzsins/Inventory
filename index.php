<?php
    include("config.php");
    include("check_login.php");
?>

<html>
<head>
	<title>Sistem Informasi Barang</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
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

        <div class="page-wrap" align="center" style="margin-top: 0px">
            <img src="images/logo2.png" width="300">
        </div>

        <h2 style="color:red; text-align: center"><b>Daftar Barang Hampir Habis</b></h2>
        <h3 style="color:red; text-align: center"><b>Segera <i>Restock</i> Barang</b></h3>
        <table>
            <div class = "col-md-12">   
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                        	<th>No</th>
                            <th>Nama</th>
                            <th>Kuantitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = "SELECT kode, nama, SUM(kuantitas) as kuantitas
                                  FROM t_barang, t_detail_barang
                                  WHERE kode = kode_barang
                                  GROUP BY kode_barang
                                  HAVING SUM(kuantitas) <= 20
                                  AND SUM(kuantitas) > 0 
                                  ORDER BY kuantitas asc, nama asc";
                        $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
                        ?>

                        <?php 
                        $i = 1;
                        while( $row = mysqli_fetch_assoc($result) ) : ?>
                            <tr>
                            	<td style="color: red; text-align: center; font-weight: bold"><?php echo $i ?></td>
                                <td style="color: red; font-weight: bold"><?php echo $row['nama'] ?></td>
                                <td style="color: red; text-align: center; font-weight: bold"><?php echo $row['kuantitas'] ?></td>
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