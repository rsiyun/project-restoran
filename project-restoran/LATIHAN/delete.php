<?php 

    require_once "../function.php";

    

    $sql = "DELETE FROM tblkategori WHERE idkategori = $id";

     $hasil = mysqli_query($koneksi, $sql);

    header("location:http://localhost/phpsmk-tugasvideo-1-55/phpsmk-tugasvideo-1-55/restoran/kategori/select.php?");

?>