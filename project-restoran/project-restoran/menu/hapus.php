<?php 

    if (isset($_GET["id"])) {
        $id=$_GET['id'];
        $sql="DELETE FROM menu WHERE idmenu=$id";
        $db->runSql($sql); 
        header("location:?f=menu&m=select");
    }

?>