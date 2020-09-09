<form action="" method="post">
<ul>
    <li>
        <label for="kategori">Kategori:</label>
        <input type="text" name="kategori" id="kategori" autocomplete="off">
    </li>
    <li>
        <button type="submit" name="tombol">Tambah Menu!</button>
    </li>
</ul>
</form>
<?php
    require_once "../function.php";
    if (isset($_POST['tombol'])) {
        $kategori = $_POST["kategori"];
        $sql = "INSERT INTO kategori VALUES ('','$kategori')"; 
        $result = mysqli_query($conn,$sql);
        header("location:http://localhost/project%20sekolah/kelas%2011/project-restoran/kategori/select.php");
        
    }

?>