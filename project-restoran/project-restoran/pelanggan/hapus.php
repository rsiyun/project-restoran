<?php 

    if (isset($_GET["id"])) {
        $id=$_GET['id'];
        $sql="DELETE FROM pelanggan WHERE idpelanggan=$id";
        $db->runSql($sql); 
        header("location:?f=pelanggan&m=select");
    }

?>