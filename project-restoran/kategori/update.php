<?php 
require_once "../function.php";
$sql = "SELECT *FROM kategori WHERE idkategori = $id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>
<form action="" method="post">

    <label for="kategori">Kategori:</label>
    <input type="text" name="kategori" id="kategori" value="<?=$row['kategori']?>">   
    <button type="submit" name="tombol">Kirim!</button>
</form>
<?php 
    if (isset($_POST['tombol'])) {
        $kategori=$_POST["kategori"];
        $sql="UPDATE kategori SET
        kategori='$kategori' 
        WHERE idkategori=$id";
        $result=mysqli_query($conn,$sql);
        header("location:http://localhost/project%20sekolah/kelas%2011/project-restoran/kategori/select.php");
        
    }
?>