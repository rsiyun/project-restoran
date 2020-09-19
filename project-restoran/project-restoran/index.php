<?php 
    require_once "dbcontroller.php";
    session_start();
    $db=new DB;
    $sql="SELECT * FROM kategori ORDER BY kategori";
    $row=$db->getAll($sql);
    if (isset($_GET['logout'])) {
        session_destroy();
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.jpg">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Home page apps || Restaurant</title>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-3 mt-4">
            <h2><a href="index.php" class="nav-link">Restaurant</a></h2>
        </div>
        <div class="col-md-9">
        <?php 
            if (isset($_SESSION['pelanggan'])) {
                echo '<div class="float-right mt-4"><a href="?logout=logout">Logout</a></div>
                <div class="float-right mr-4 mt-4">Pelanggan: <a href="?f=home&m=beli">'.$_SESSION['pelanggan'].'</a></div>
                ';
                
              }
            else {
               echo'
                <div class="float-right mr-4 mt-4"><a href="?f=home&m=login">Login</a></div>
                <div class="float-right mr-4 mt-4"><a href="?f=home&m=register">Daftar</a></div>
                ';
           }?>  
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3">
        <h3>Kategori</h3>
        <hr>
            <ul class="nav flex-column">
            <?php if(!empty($row)){ ?>
            <?php foreach ($row as $rows):?>
                <li class="nav-item"><a class="nav-link" href="?f=home&m=produk&id=<?=$rows['idkategori']?>"><?=$rows['kategori']?></a></li>
            <?php endforeach ?>
            <?php } ?>
            </ul>
        </div>
        <div class="col-md-9">
        <?php 
            if (isset($_GET['f']) && isset($_GET['m'])) {
                $f=$_GET['f'];
                $m=$_GET['m'];
                $file=$f.'/'.$m.'.php';
                require_once $file;
            }else {
                require_once "home/produk.php";
            }
        ?>
        </div>
    </div>
    <div class="row">
    <div class="col">
        <p class="text-center"> 2020 - Copyright@foodsapp.com </p>
    </div>
    </div>
    </div>
</body>
</html>