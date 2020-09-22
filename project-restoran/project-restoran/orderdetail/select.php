<h3>Detail Belanja</h3>
<div class="form-group">
<form action="" method="post">
<div class="form-group float-left">
    <label for="tanggal awal">Tanggal Awal: </label>
    <input class="form-control w-70 mb-2" type="date" name="tawal" id="tanggal awal" autocomplete="off">
    <button class="btn btn-primary" type="submit" name="tombol">Kirim!</button>
</div>
<div class="form-group float-left">
    <label for="tanggal akhir">Tanggal Akhir: </label>
    <input class="form-control w-70 mb-2" type="date" name="takhir" required  id="tanggal akhir" autocomplete="off">
    </div>
</form>
<?php
    $jumlahdata=$db->rowCount("SELECT idorderdetail FROM vorderdetail");
    $banyak=3;
    if (isset($_GET['menu'])) {
        $menu=$_GET['menu'];
        $mulai =($menu*$banyak)-$banyak;
        
    }else {
        $mulai=0;
    }
    $halaman= ceil($jumlahdata/$banyak) ; 
    $sql="SELECT * FROM vorderdetail ORDER BY idorderdetail DESC LIMIT $mulai,$banyak";
    if (isset($_POST['tombol'])) {
        $tawal = $_POST['tawal'];
        $takhir = $_POST['takhir'];
        $sql="SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$tawal' AND '$takhir'";
    }
    $row=$db->getAll($sql);
    $no=1+$mulai;
    $total=0;
?>

<table class="table table-bordered table-dark w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $rows): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?=$rows['pelanggan']?></td>
            <td><?=$rows['tglorder']?></td>
            <td><?=$rows['menu']?></td>
            <td><?=$rows['harga']?></td>
            <td><?=$rows['jumlah']?></td>
            <td><?=$rows['jumlah'] * $rows['harga']?></td>
            <td><?=$rows['alamat']?></td>
            <?php 
                $total=$total+($rows['jumlah'] * $rows['harga']);
            ?>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="6"><h1>GRAND TOTAL</h1></td>
            <td><h4><?=$total?></h4></td>
        </tr>
    </tbody>
</table>
<?php for ($a=1; $a <= $halaman; $a++): ?> 
        <a href="?f=orderdetail&m=select&menu=<?=$a?>"><?=$a;?></a>
        &nbsp &nbsp     
    <?php  endfor; ?> 
