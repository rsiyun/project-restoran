<?php
if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
$pelanggan=$_SESSION['pelanggan'];
    $jumlahdata=$db->rowCount("SELECT idorderdetail FROM vorderdetail WHERE idorder='$id'");
    $banyak=3;
    if (isset($_GET['menu'])) {
        $menu=$_GET['menu'];
        $mulai =($menu*$banyak)-$banyak;
        
    }else {
        $mulai=0;
    }
    $halaman= ceil($jumlahdata/$banyak) ; 
    $sql="SELECT * FROM vorderdetail WHERE idorder='$id' ORDER BY idorderdetail DESC LIMIT $mulai,$banyak";
    $row=$db->getAll($sql);
    $no=1+$mulai;
?>
<h3>Detail Belanja</h3>
<table class="table table-bordered table-dark w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Harga</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $rows): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?=$rows['tglorder']?></td>
            <td><?=$rows['menu']?></td>
            <td><?=$rows['jumlah']?></td>
            <td><?=$rows['hargajual']?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php for ($a=1; $a <= $halaman; $a++): ?> 
        <a href="?f=home&m=detail&id=<?=$id?>&menu=<?=$a?>"><?=$a;?></a>
        &nbsp &nbsp     
    <?php  endfor; ?> 
