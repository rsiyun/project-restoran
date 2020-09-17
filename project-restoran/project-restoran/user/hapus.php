<?php 
    if (isset($_GET["id"])) {
        $id=$_GET['id'];
        $sql="DELETE FROM user WHERE iduser=$id";
        $db->runSql($sql); 
        header("location:?f=user&m=select");
    }
?>