<?php 
require_once "../function.php";
    $sql="DELETE FROM kategori WHERE idkategori=$id";
    $result = mysqli_query($conn,$sql);

?>