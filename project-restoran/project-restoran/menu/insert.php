<?php 

    $rows=$db->getAll("SELECT * FROM kategori ORDER BY kategori ASC");
?>
<h1>insert data</h1>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <select name="idkategori" id="">
        <?php foreach ($rows as $row ) {?>
        <option  value="<?=$row['idkategori']?>"><?=$row['kategori']?></option>
        <?php }  ?>
    </select>
</div>
<div class="form-group">
    <label for="menu">menu: </label>
    <input class="form-control w-50 mb-2" type="text" name="menu" required placeholder="Masukan menu" id="menu" autocomplete="off">
</div>
<div class="form-group">
    <label for="harga">Harga: </label>
    <input class="form-control w-50 mb-2" type="text" name="harga" required placeholder="Masukan harga" id="harga" autocomplete="off">
</div>
<div class="custom-file mb-2">
    <label >Search..</label>
    <input type="file" name="gambar">
</div>
    <div>
        <button class="btn btn-primary" type="submit" name="tombol">Kirim!</button>
    </div>
</form>
<?php 

    if (isset($_POST['tombol'])) {
        $idkategori=htmlspecialchars($_POST['idkategori']);
        $menu=htmlspecialchars($_POST['menu']);
        $harga=htmlspecialchars($_POST['harga']);
        $gambar=$_FILES['gambar']['name'];
        $tmp=$_FILES['gambar']['tmp_name'];

        
         if (empty($gambar)){
             echo "<i style='color:red;'>Masukan Gambar anda</i>";
         }else{
            $sql = "INSERT INTO menu VALUES
            ('','$idkategori','$menu','$gambar','$harga')";
            move_uploaded_file($tmp,'../img/'.$gambar);
            $db->runSql($sql);
            header("location:?f=menu&m=select");
         }
         
        //  
        // 
    }

?>