<div style="margin:auto; width:990px;">
<h3><a href="insert.php">Tambah data</a></h3>
<?php 
    require_once "../function.php";
    if (isset($_GET['ubah'])) {
        $id=$_GET['ubah'];
        require_once "update.php";
    }
    if (isset($_GET['hapus'])) {
        $id=$_GET['hapus'];
        require_once "delete.php";
    }
    $sql = "SELECT idkategori FROM kategori";
    $result = mysqli_query($conn,$sql);
    $jumlahdata=mysqli_num_rows($result);
    //echo $jumlahdata;
    $banyak=3;
    $halaman= ceil($jumlahdata/$banyak) ;
    ?>
    <?php for ($a=1; $a <= $halaman; $a++): ?> 
        <a href="?menu=<?=$a?>"><?=$a;?></a>
        &nbsp &nbsp     
    <?php  endfor; ?> 
    <br> <br>
    <?php

    if (isset($_GET['menu'])) {
        $menu=$_GET['menu'];
        $mulai =($menu*$banyak)-$banyak;
        

    }else {
        $mulai=0;
    }
    $sql = "SELECT * FROM kategori LIMIT $mulai,$banyak";
    $result = mysqli_query($conn,$sql);
    echo '
<table border="1px">
    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>kategori</th>
        
        
    </tr>';
    $a=1;
$jumlah = mysqli_num_rows($result);
$no=$mulai+1;
?>
<?php  if ($jumlah>0) :?>
    <?php  while ($row=mysqli_fetch_assoc($result)):  ?>
     <tr>
       <td> <?=$no++;?> </td> 
       <td>
            <a href="?ubah=<?=$row['idkategori']?>">ubah</a> |
            | <a href="?hapus=<?=$row['idkategori']?>">hapus</a>
        </td>
         <td><?=$row['kategori']?></td>
         
     </tr>
      
   <?php   endwhile;?>
 <?php  endif; ?>



</div>
