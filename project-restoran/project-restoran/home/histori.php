<?php
$pelanggan=$_SESSION['pelanggan'];
    $jumlahdata=$db->rowCount("SELECT idorder FROM vorder WHERE pelanggan='$pelanggan'");
    $banyak=3;
    if (isset($_GET['menu'])) {
        $menu=$_GET['menu'];
        $mulai =($menu*$banyak)-$banyak;
        
    }else {
        $mulai=0;
    }
    $halaman= ceil($jumlahdata/$banyak) ; 
    $sql="SELECT * FROM vorder WHERE pelanggan='$pelanggan' ORDER BY tglorder DESC LIMIT $mulai,$banyak";
    $row=$db->getAll($sql);
    $no=1+$mulai;
?>
<h3>History Belanja</h3>
<table class="table table-bordered table-dark w-50">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $rows): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?=$rows['tglorder']?></td>
            <td><?=$rows['total']?></td>
            <td><a href="?f=home&m=detail&id=<?=$rows['idorder']?>">Detail</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php for ($a=1; $a <= $halaman; $a++): ?> 
        <a href="?f=home&m=histori&menu=<?=$a?>"><?=$a;?></a>
        &nbsp &nbsp     
    <?php  endfor; ?> 
