
<?php 

require_once "../function.php";

  

    $sql = "SELECT * FROM tblkategori WHERE idkategori = $id";
    $result = mysqli_query($koneksi, $sql);

    $row = mysqli_fetch_assoc($result);

  

    // $kategori = 'Gorengan Tahu';
    // $id = 9;
    // $sql = "UPDATE tblkategori SET kategori='$kategori' WHERE idkategori= $id";

    // $result = mysqli_query($koneksi, $sql);

    // echo $sql;

?>

<form action="" method="post">

    kategori :
    <input type="text" name="Kategori" value="<?php echo $row['kategori']?>">
    <br>
    <input type="submit" name="Simpan" value="Simpan">

</form>

<?php 

    if (isset($_POST['Simpan'])) {
        $kategori = $_POST['Kategori'];
        
        $sql = "UPDATE tblkategori SET kategori='$kategori' WHERE idkategori= $id";

        $result = mysqli_query($koneksi, $sql);

        header ("location:http://localhost/phpsmk-tugasvideo-1-55/phpsmk-tugasvideo-1-55/restoran/kategori/select.php");

    }


?>