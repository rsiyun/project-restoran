<?php
    $jumlahdata=$db->rowCount('SELECT idkategori FROM kategori');
    $banyak=4;
    if (isset($_GET['menu'])) {
        $menu=$_GET['menu'];
        $mulai =($menu*$banyak)-$banyak;
        
    }else {
        $mulai=0;
    }
    $halaman= ceil($jumlahdata/$banyak) ; 
    $sql="SELECT * FROM kategori ORDER BY kategori ASC LIMIT $mulai,$banyak";
    $row=$db->getAll($sql);
    $no=1+$mulai;
?>
<div class="float-left mr-4">
    <a class="btn btn-primary" href="?f=kategori&m=insert" role="button">Tambah Data</a>
</div>
<h3>kategori Select</h3>
<table class="table table-bordered table-dark w-50">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $rows): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?=$rows['kategori']?></td>
           
             <td><a href="?f=kategori&m=hapus&id=<?=$rows['idkategori']?>">hapus</a></td>
           <td><a href="?f=kategori&m=ubah&id=<?=$rows['idkategori']?>">Ubah</a></td> 
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php for ($a=1; $a <= $halaman; $a++): ?> 
        <a href="?f=kategori&m=select&menu=<?=$a?>"><?=$a;?></a>
        &nbsp &nbsp     
    <?php  endfor; ?> 
