<?php

session_start();
require_once "../dbcontroller.php";
$db = new DB;

if (!isset($_SESSION['user'])) {
    header("location:login.php");
}

if (isset($_GET['log'])) {
    session_destroy();
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page | Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="icon" href="../upload/logo.jpg">
</head>

<body>
    <div class="container">

        <div class="row mt-4">
            <div class="col-md-3">
                <a href="index.php">
                    <h3>Admin Page</h3>
                </a>
            </div>

            <div class="col-md-9">
                <div class="float-right mt-4"><a href="?log=logout">logout</a></div>
                <div class="float-right mt-4 mr-4">User : <a href="?f=user&m=updateuser&id=<?php echo $_SESSION['iduser']; ?>"><?php echo $_SESSION['user']; ?></a></div>
                <div class="float-right mt-4 mr-4">Level : <?php echo $_SESSION['level'] ?></div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-3">

                <ul class="nav flex-column ">

                    <?php
                    $level = $_SESSION['level'];
                    switch ($level) {
                        case 'admin':
                    ?>
                            <li class="nav-item"><a class="nav-link" href="?f=kategori&m=select">Kategori</a></li>
                            <li class="nav-item"><a class="nav-link" href="?f=menu&m=select">Menu</a></li>
                            <li class="nav-item"><a class="nav-link" href="?f=pelanggan&m=select">Pelanggan</a></li>
                            <li class="nav-item"><a href="?f=order&m=select" class="nav-link">Order</a></li>
                            <li class="nav-item"><a href="?f=orderdetail&m=select" class="nav-link">Order-detail</a></li>
                            <li class="nav-item"><a class="nav-link" href="?f=user&m=select">User</a></li>
                        <?php break;
                        case 'kasir':
                        ?>
                            <li class="nav-item"><a class="nav-link" href="?f=order&m=select">order</a></li>
                            <li class="nav-item"><a class="nav-link" href="?f=orderdetail&m=select">order detail</a></li>
                        <?php break;
                        case 'koki':
                        ?>
                            <li class="nav-item"><a href="?f=orderdetail&m=select" class="nav-link">Order-detail</a></li>
                            <?php break; ?>
                            ?>

                        <?php
                        default: ?>
                            <li class="nav-item">Tidak ada menu</li>
                    <?php break;
                    } ?>


                </ul>
            </div>

            <div class="col-md-9">
                <?php

                if (isset($_GET['f']) && isset($_GET['m'])) {
                    $f = $_GET['f'];
                    $m = $_GET['m'];

                    $file = '../' . $f . '/' . $m . '.php';

                    require_once $file;
                }

                ?>
            </div>
        </div>

        <div class="row mt-5">

            <div class="col">
                <p class="text-center">2020 - Copyright@foodsapp.com</p>
            </div>

        </div>

    </div>
</body>

</html>