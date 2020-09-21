<?php
    if (isset($_GET['hapus'])) {
        $id=$_GET['hapus'];
        unset($_SESSION['_'.$id]);
        header('location:?f=home&m=beli');
    }
    if (isset($_GET['tambah'])) {
        $id=$_GET['tambah'];
        $_SESSION['_'.$id]++;
    }
    if (isset($_GET['kurang'])) {
        $id=$_GET['kurang'];
        $_SESSION['_'.$id]--;
        if ($_SESSION['_'.$id]==0) {
            unset($_SESSION['_'.$id]);
            header('location:?f=home&m=beli');
        }
    }
    if (!isset($_SESSION['pelanggan'])) {
         header("location:?f=home&m=login");   
    }else{
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        isi($id);
        header("location:?f=home&m=beli");
    }else{
        keranjang();
    }
    
}
    function isi($id){
        if (isset($_SESSION['_'.$id])) {
            $_SESSION['_'.$id]++;
        }else {
            $_SESSION['_'.$id]=1;
        }
    }?>
    
    <?php  function keranjang(){?>
    <?php global $db;
        $total=0;
        global $total;
    ?>
        <table class="table table-bordered table-dark w-70">
        <tr>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Hapus</th>
        </tr>
        <?php  
        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan'&&$key<>'idpelanggan') {
                $id = substr($key,1);
                $sql="SELECT * FROM menu WHERE idmenu=$id";
                $rows=$db->getAll($sql);
                foreach($rows as $row){
                    echo "<tr>";
                    echo '<td>'.$row['menu'].'</td>';
                    echo '<td>'.$row['harga'].'</td>';
                    echo '<td><a href="?f=home&m=beli&tambah='.$row['idmenu'].'">[+]</a>&nbsp&nbsp'.$value.'&nbsp&nbsp<a href="?f=home&m=beli&kurang='.$row['idmenu'].'">[-]</a></td>';
                    echo '<td>'.$row['harga']*$value.'</td>';
                    echo '<td><a href="?f=home&m=beli&hapus='.$row['idmenu'].'">hapus</a></td>';
                    echo "</tr>";
                    $total = $total+($value * $row['harga']);
                }
                
            }
        }?> 
        <tr>
            <td colspan=4><h3>Grand Total:</h3></td>
            <td><h6><?=$total?></h6></td>
        </tr>
        </table>
        <?php 
            if (!empty($total)) {?>
            <a class="btn btn-primary" href="?f=home&m=checkout&total=<?=$total?>" role="button">Add to cart</a>
           <?php  }} ?>    