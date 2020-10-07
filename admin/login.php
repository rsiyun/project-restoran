<?php

session_start();
require_once "../dbcontroller.php";
$db = new DB;


?>
<style>
    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .form-signin .email {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .form-signin .pass {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Restoran</title>
    <link rel="icon" href="../upload/logo.jpg">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>


<body class="text-center">
    <form action="" method="post" class="form-signin">
        <img class="mb-4" src="../upload/logo.jpg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="email" class="sr-only">email:</label>
        <input type="email" id="email" name="email" class="form-control email" placeholder="email" required="" autofocus="">
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control pass" placeholder="Password" required="">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="tombol" type="submit">Sign in</button>
    </form>
</body>
<?php

if (isset($_POST['tombol'])) {
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    $sql = "SELECT * FROM tbluser WHERE email = '$email' AND password='$password' ";

    $count = $db->rowCOUNT($sql);

    if ($count == 0) {
        echo "<center><h3>Email atau Password Salah</center></h3>";
    } else {
        $sql = "SELECT * FROM tbluser WHERE email = '$email' AND password='$password' ";
        $row = $db->getITEM($sql);
        $_SESSION['user'] = $row['email'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['iduser'] = $row['iduser'];

        header("location:index.php");
    }
}


?>