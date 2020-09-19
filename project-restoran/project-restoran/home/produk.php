<h3>Menu</h3>
<div class="mt-4 mb-4">
    <?php 
          if (isset($_GET['id'])) {
            $id=$_GET['id'];
            $where="WHERE idkategori=$id";
            $id="&id=".$id;
          }else {
              $where="";
              $id="";
          }
    ?>
</div>
<?php
    $jumlahdata=$db->rowCount("SELECT idmenu FROM menu $where");
    $banyak=3;
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

        <?php if(!empty($row)): ?>
        <?php foreach ($row as $rows): ?>
<div class="card" style="width: 15rem; float:left; margin:10px">
        <img style="height:220px" src="img/<?=$rows['gambar']?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?=$rows["menu"]?></h5>
        <p class="card-text"><?=$rows["harga"]?></p>    
        <a class="btn btn-primary" href="?f=home&m=beli&id=<?=$rows['idmenu']?>" role="button">Add to cart</a>
  </div>
</div>

        <?php endforeach; ?>
        <?php endif ?>
<div style="clear:both;">
<?php for ($a=1; $a <= $halaman; $a++): ?> 
        <a href="?f=home&m=produk&menu=<?=$a.$id?>"><?=$a;?></a>
        &nbsp &nbsp     
    <?php  endfor; ?> 
</div>