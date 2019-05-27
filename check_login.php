<?php
    // CHECK USER LOGIN
    // Jika session user tidak ada atau session user kosong, redirect halaman ke halaman login.php
    if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
        header("Location: login.php");
    }
?>