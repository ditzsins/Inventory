<?php
    include("config.php");

    # POST DATA DARI FORM LOGIN
    if($_POST){
        $username = $_POST['username'];
        $password = $_POST['password'];

        # AUTH
        if(empty($username) && empty($password)){
            header("Location: login.php?error=3");
            exit();
        } else if(empty($username)){
            header("Location: login.php?error=1");
            exit();
        } else if(empty($password)){
            header("Location: login.php?error=2");
            exit();
        }

        $res = $conn->query("SELECT *
                             FROM users
                             WHERE username='$username'
                             AND password='$password'");

        if($res->num_rows){
            $foo = $res->fetch_assoc();
            // MENULIS SESSION BARU
            $_SESSION['user'] = $foo['name'];
            header("Location: index.php");
            exit();
        } else {
            header("Location: login.php?error=4");
            exit();
        }
    }

    // CHECK PARAMETER ERROR PADA URL DARI AUTH
    $error = "";
    if(isset($_GET['error']) && !empty($_GET['error'])){
        switch($_GET['error']){
            case 1:
            $error = "Username Tidak Boleh Kosong!";
            break;
            case 2:
            $error = "Password Tidak Boleh Kosong!";
            break;
            case 3:
            $error = "Username Dan Password Tidak Boleh Kosong!";
            break;
            case 4:
            $error = "Username Tidak Terdaftar Pada Sistem!";
            break;
        }
    }
?>

<html>
<head>
    <title>Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="wrap">
        <div class="header">
            <img src="images/logo.png" width="500">
        </div>
        <br><br>

        <div class="error"><?php echo $error; ?></div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table>
                <tr>
                    <td><input type="text" name="username" placeholder="Username"/></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Password" /></td>
                </tr>
                <tr>
                    <td align="center">
                        <p style="font-size: 11px">
                            <i>Silahkan masukkan USERNAME dan PASSWORD Anda</i>
                        </p>
                        <br>
                        <input type="submit" name="submit" value="LOGIN" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>