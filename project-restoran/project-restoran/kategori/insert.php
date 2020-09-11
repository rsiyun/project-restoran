<h1>insert data</h1>
<form action="" method="post">
<div class="form-group">
    <label for="kategori">Kategori: </label>
    <input class="form-control w-50 mb-2" type="text" name="kategori" required placeholder="Masukan Kategori" id="kategori" autocomplete="off">
    <button class="btn btn-primary" type="submit" name="tombol">Kirim!</button>
</div>

</form>
<?php 

    if (isset($_POST['tombol'])) {
        $kategori=htmlspecialchars($_POST['kategori']);
        $sql = "INSERT INTO kategori VALUES
        ('',
         '$kategori')";
         $db->runSql($sql);
        header("location:?f=kategori&m=select");
    }

?>