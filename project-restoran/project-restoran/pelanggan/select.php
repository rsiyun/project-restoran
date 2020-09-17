<h3>pelanggan Select</h3>
<?php
    $jumlahdata=$db->rowCount('SELECT idpelanggan FROM pelanggan');
    $banyak=3;
    if (isset($_GET['pelanggan'])) {
        $pelanggan=$_GET['pelanggan'];
        $mulai =($pelanggan*$banyak)-$banyak;
        
    }else {
        $mulai=0;
    }
    $halaman= ceil($jumlahdata/$banyak) ; 
    $sql="SELECT * FROM pelanggan ORDER BY pelanggan ASC LIMIT $mulai,$banyak";
    $row=$db->getAll($sql);
    $no=1+$mulai;
?>
<table class="table table-bordered table-dark w-100">
    <thead>
        <tr>
            <th>No</th>
            <th>pelanggan</th>
            <th>alamat</th>
            <th>telp</th>
            <th>email</th>
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)): ?>
        <?php foreach ($row as $rows): ?>
        <tr>
            <?php if ($rows['aktif']==1){
                $aktif="Aktif";
            }else {
                $aktif="Tidak aktif";
            } ?>
            <td><?= $no++; ?></td>
            <td><?=$rows["pelanggan"]?></td>
            <td><?=$rows['alamat']?></td>
            <td><?=$rows["telp"]?></td>
            <td><?=$rows["email"]?></td>
             <td><a href="?f=pelanggan&m=hapus&id=<?=$rows['idpelanggan']?>">hapus</a></td>
           <td><a href="?f=pelanggan&m=ubah&id=<?=$rows['idpelanggan']?>"><?=$aktif?></a></td> 
           
        </tr>
        <?php endforeach; ?>
        <?php endif ?>
    </tbody>
</table>
<?php for ($a=1; $a <= $halaman; $a++): ?> 
        <a href="?f=pelanggan&m=select&pelanggan=<?=$a?>"><?=$a;?></a>
        &nbsp &nbsp     
    <?php  endfor; ?> 
