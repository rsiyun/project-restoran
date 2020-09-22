<?php 
  if (isset($_GET['total'])) {
      $total=$_GET['total'];
      $idorder=idorder();
      $idpelanggan=$_SESSION['idpelanggan'];
      $tgl=date('y-m-d');
      $sql="SELECT * FROM tblorder WHERE idorder=$idorder";
      $count=$db->rowCount($sql);
      if ($count==0) {
          insertOrder($idorder,$idpelanggan,$tgl,$total);
          insertOrderDetail($idorder);
      }else {
        insertOrderDetail($idorder);
      }
      emptySession();
      header('location:?f=home&m=checkout');
  }
  else {
    echo "<script>
    alert('Terimakasih Telah Belanja');
    </script>";
  }
function idorder(){
    global $db;
    $sql="SELECT idorder FROM tblorder ORDER BY idorder DESC";
    $jumlah=$db->rowCount($sql);  
    if ($jumlah==0) {
        $id=1;
    }else{
        $item=$db->getItem($sql);
        $id=$item['idorder']+1;
    }
    return $id;
}
function insertOrder($idorder,$idpelanggan,$tgl,$total){
    global $db;
    $sql="INSERT INTO tblorder VALUES($idorder,$idpelanggan,'$tgl',$total,0,0,0)";
    $db->runSql($sql);
}
function insertOrderDetail($idorder=1){
    global $db;
    foreach ($_SESSION as $key => $value) {
        if ($key<>'pelanggan'&& $key<>'idpelanggan'&& $key<>'user'&& $key<>'level' && $key<>'iduser') {
            $id=substr($key,1);
            $sql="SELECT * FROM menu WHERE idmenu=$id";
            $rows=$db->getAll($sql);
            foreach($rows as $row){
                $idmenu=$row['idmenu'];
                $hargajual=$row['harga'];
                $sql="INSERT INTO orderdetail VALUES('',$idorder,$idmenu,$value,$hargajual)";
                $db->runSql($sql);
            }

        }
    }
}
function emptySession(){
    foreach ($_SESSION as $key => $value) {
    if ($key<>'pelanggan'&& $key<>'idpelanggan') {
        $id=substr($key,1);
        unset($_SESSION['_'.$id]);
    }
}
}
?>