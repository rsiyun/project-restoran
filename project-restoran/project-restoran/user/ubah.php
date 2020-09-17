<?php if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $rows=$db->getItem("SELECT * FROM user WHERE iduser=$id");
    if ($rows['aktif']==0) {
        $aktif=1;
    }
    else {
        $aktif=0;
    }
    $sql="UPDATE user SET aktif=$aktif WHERE iduser=$id"; 
    $db->runSql($sql);
    header("location:?f=user&m=select");
} ?>