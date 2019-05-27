<?php
    /* MEMULAI SESSION */
    session_start();
    $conn = mysqli_connect("localhost","root","", "dbinventory") or die("Koneksi gagal");
    
    /* check koneksi */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>  