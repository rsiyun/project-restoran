<?php 
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $sql="SELECT * FROM tblorder WHERE idorder=$id";
        $rows=$db->getItem($sql);
    }
    

?>
<h2>Pembayaran</h2>
<form action="" method="post">
<div class="form-group">
    <label for="order">Total: </label>
    <input class="form-control w-50 mb-2" type="number" name="order" required value="<?=$rows['total']?>" id="order" autocomplete="off">
    <label for="bayar">Bayar: </label>
    <input class="form-control w-50 mb-2" type="number" name="bayar" required id="bayar" autocomplete="off">
    <button class="btn btn-primary" type="submit" name="tombol">Bayar</button>
</div>
</form>
<?php 
    if (isset($_POST['tombol'])) {
        $bayar=htmlspecialchars($_POST['bayar']);
        $kembali=$bayar-$rows['total'];
        $sql="UPDATE tblorder SET bayar=$bayar, kembali=$kembali, status=1 WHERE idorder=$id";
        if ($kembali<0) {
            echo "<script>
            alert('Pembayaran Kurang');
            </script>";
        }else {
            $db->runSql($sql);
            header("location:?f=order&m=select");
        }
       
        
    }
?>