<?php 
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $item=$db->getItem("SELECT * FROM menu WHERE idmenu=$id");
        
        $idkategori=$item['idkategori'];
    }
    $rows=$db->getAll("SELECT * FROM kategori ORDER BY kategori ASC");
?>

<h3>Update data</h3>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <select name="idkategori" id="">
        <?php foreach ($rows as $row ) {?>
        <option <?php if($idkategori==$row['idkategori'])echo "selected" ?>  value="<?=$row['idkategori']?>"><?=$row['kategori']?></option>
        <?php }  ?>
    </select>
</div>
<div class="form-group">
    <label for="menu">menu: </label>
    <input class="form-control w-50 mb-2" type="text" name="menu" required value="<?=$item['menu']?>" id="menu" autocomplete="off">
</div>
<div class="form-group">
    <label for="harga">Harga: </label>
    <input class="form-control w-50 mb-2" type="text" name="harga" required value="<?=$item['harga']?>" id="harga" autocomplete="off">
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
        $gambar=$item['gambar'];
        $tmp=$_FILES['gambar']['tmp_name'];

        if (!empty($tmp)) {
            $gambar=$_FILES['gambar']['name'];
            move_uploaded_file($tmp,'../img/'.$gambar);
        }
           $sql ="UPDATE menu SET idkategori=$idkategori, menu='$menu', gambar='$gambar' ,harga='$harga'  WHERE idmenu=$id";
           echo "$sql";
           $db->runSql($sql);
           header("location:?f=menu&m=select");
         
    }

?>