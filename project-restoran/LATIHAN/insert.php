<form action="" method="post">

    Kategori :
    <input type="text" name="kategori">
    <br>
    <br>
    <input type="submit" name="Simpan" value="Simpan">

</form>


<?php 

    require_once "../function.php";

    if (isset($_POST['Simpan'])) {
       $kategori = $_POST['kategori'];
    //    echo $kategori;

    $sql = "INSERT INTO tblkategori VALUES ('','$kategori')";

    $result = mysqli_query($koneksi,$sql);

   header ("location:http://localhost/phpsmk-tugasvideo-1-55/phpsmk-tugasvideo-1-55/restoran/kategori/select.php");
    }

    

?>