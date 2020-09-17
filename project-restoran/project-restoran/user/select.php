<?php
    $jumlahdata=$db->rowCount('SELECT iduser FROM user');
    $banyak=4;
    if (isset($_GET['menu'])) {
        $menu=$_GET['menu'];
        $mulai =($menu*$banyak)-$banyak;
        
    }else {
        $mulai=0;
    }
    $halaman= ceil($jumlahdata/$banyak) ; 
    $sql="SELECT * FROM user ORDER BY user ASC LIMIT $mulai,$banyak";
    $row=$db->getAll($sql);
    $no=1+$mulai;
?>
<div class="float-left mr-4">
    <a class="btn btn-primary" href="?f=user&m=insert" role="button">Tambah Data</a>
</div>
<h3>User Select</h3>
<table class="table table-bordered table-dark w-100">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Email</th>
            <th>Level</th>
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $rows): ?>
        <?php if ($rows['aktif']==1) {
            $aktif="Aktif";
        }else{
            $aktif="Banned";
        } ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?=$rows['user']?></td>
            <td><?=$rows['email']?></td>
            <td><?=$rows['level']?></td>
             <td><a href="?f=user&m=hapus&id=<?=$rows['iduser']?>">hapus</a></td>
           <td><a href="?f=user&m=ubah&id=<?=$rows['iduser']?>"><?=$aktif?></a></td> 
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php for ($a=1; $a <= $halaman; $a++): ?> 
        <a href="?f=user&m=select&menu=<?=$a?>"><?=$a;?></a>
        &nbsp &nbsp     
    <?php  endfor; ?> 
