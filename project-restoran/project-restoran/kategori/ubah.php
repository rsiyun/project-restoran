<?php 
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $sql="SELECT * FROM kategori WHERE idkategori=$id";
        $rows=$db->getItem($sql);
    }
    

?>
<h2>ubah Kategori</h2>
<form action="" method="post">
<div class="form-group">
    <label for="kategori">Kategori: </label>
    <input class="form-control w-50 mb-2" type="text" name="kategori" required value="<?=$rows['kategori']?>" id="kategori" autocomplete="off">
    <button class="btn btn-primary" type="submit" name="tombol">Kirim!</button>
</div>
</form>
<?php 
    if (isset($_POST['tombol'])) {
        $kategori=htmlspecialchars($_POST['kategori']);
        $sql="UPDATE kategori SET kategori='$kategori' WHERE idkategori=$id";
        $db->runSql($sql);
        header("location:?f=kategori&m=select");
        
    }
?>