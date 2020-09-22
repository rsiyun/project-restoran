<?php
    $jumlahdata=$db->rowCount("SELECT idorder FROM vorder");
    $banyak=3;
    if (isset($_GET['menu'])) {
        $menu=$_GET['menu'];
        $mulai =($menu*$banyak)-$banyak;
        
    }else {
        $mulai=0;
    }
    $halaman= ceil($jumlahdata/$banyak) ; 
    $sql="SELECT * FROM vorder ORDER BY status ASC LIMIT $mulai,$banyak";
    $row=$db->getAll($sql);
    $no=1+$mulai;
?>
<h3>Order Belanja</h3>
<table class="table table-bordered table-dark w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelaggan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Bayar</th>
            <th>Kembali</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $rows): ?>
        <?php 
            if ($rows['status']==0) {
                $status="<td><a href='?f=order&m=bayar&id=".$rows['idorder']."'>Bayar</a></td>";
            }else {
                $status='<td>Lunas</td>';
            }
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?=$rows['pelanggan']?></td>
            <td><?=$rows['tglorder']?></td>
            <td><?=$rows['total']?></td>
            <td><?=$rows['bayar']?></td>
            <td><?=$rows['kembali']?></td>
            <?=$status; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php for ($a=1; $a <= $halaman; $a++): ?> 
        <a href="?f=order&m=select&menu=<?=$a?>"><?=$a;?></a>
        &nbsp &nbsp     
    <?php  endfor; ?> 
