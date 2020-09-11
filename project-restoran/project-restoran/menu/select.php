<div class="float-left mr-4">
    <a class="btn btn-primary" href="?f=menu&m=insert" role="button">Tambah Data</a>
</div>
<h3>Menu Select</h3>

    <?php 
    if (isset($_POST['opsi'])) {
        $opsi = $_POST['opsi'];
        $where="WHERE idkategori=$opsi";
    }else{
        $opsi=0;
        $where="";
    }
     $rows=$db->getAll("SELECT * FROM kategori ORDER BY kategori ASC");
     
    ?>
    <div class="mt-2 mb-2">
<form action="" method="post">
    <select name="opsi" id="" onchange="this.form.submit()">
        <?php foreach ($rows as $row ) {?>
        <option <?php if ($row['idkategori']==$opsi):?> selected <?php endif; ?> value="<?=$row['idkategori']?>"><?=$row['kategori']?></option>
        <?php }  ?>
    </select>
</form>
</div>
<?php
    $jumlahdata=$db->rowCount('SELECT idmenu FROM menu');
    $banyak=4;
    if (isset($_GET['menu'])) {
        $menu=$_GET['menu'];
        $mulai =($menu*$banyak)-$banyak;
        
    }else {
        $mulai=0;
    }
    $halaman= ceil($jumlahdata/$banyak) ; 
    $sql="SELECT * FROM menu $where ORDER BY menu ASC LIMIT $mulai,$banyak";
    $row=$db->getAll($sql);
    $no=1+$mulai;
?>

<table class="table table-bordered table-dark w-50">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Menu</th>
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($row)): ?>
        <?php foreach ($row as $rows): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><img style="width: 100px;" src="../img/<?=$rows['gambar']?>"></td>
            <td><?=$rows["menu"]?></td>
             <td><a href="?f=menu&m=hapus&id=<?=$rows['idmenu']?>">hapus</a></td>
           <td><a href="?f=menu&m=ubah&id=<?=$rows['idmenu']?>">Ubah</a></td> 
            
        </tr>
        <?php endforeach; ?>
        <?php endif ?>
    </tbody>
</table>
<?php for ($a=1; $a <= $halaman; $a++): ?> 
        <a href="?f=menu&m=select&menu=<?=$a?>"><?=$a;?></a>
        &nbsp &nbsp     
    <?php  endfor; ?> 
