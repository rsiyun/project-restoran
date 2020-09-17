<?php if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $rows=$db->getItem("SELECT * FROM pelanggan WHERE idpelanggan=$id");
    if ($rows['aktif']==0) {
        $aktif=1;
    }
    else {
        $aktif=0;
    }
    $sql="UPDATE pelanggan SET aktif=$aktif WHERE idpelanggan=$id"; 
    $db->runSql($sql);
    header("location:?f=pelanggan&m=select");
} ?>