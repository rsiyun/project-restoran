<h3> Menu </h3>
<div class="mt-4 mb-2">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $where = "WHERE idkategori = $id";
        $id = "&id=" . $id;
    } else {
        $where = "";
        $id = "";
    }
    ?>
</div>
<?php
$jumlahdata = $db->rowCOUNT("SELECT idmenu FROM tblmenu $where");
$banyak = 3;

$halaman = ceil($jumlahdata / $banyak);

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}


$sql = "SELECT * FROM tblmenu $where ORDER BY menu ASC LIMIT $mulai,$banyak";
$row = $db->getALL($sql);
$no = 1 + $mulai;

?>

<?php if (!empty($row)) { ?>
    <?php foreach ($row as $r) : ?>
        <div class="card" style="width: 15rem; float:left; margin:10px;">
            <img style="height:220px; " src="upload/<?= $r['gambar'] ?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $r['menu'] ?></h5>
                <p class="card-text">Rp.<?= $r['harga'] ?></p>
                <a class="btn btn-primary" href="?f=home&m=beli&id=<?= $r['idmenu'] ?>" role="button">Add to cart</a>
            </div>
        </div>
    <?php endforeach ?>
<?php  } ?>
<div style="clear:both;">
    <?php for ($a = 1; $a <= $halaman; $a++) : ?>
        <a href="?f=home&m=produk&p=<?= $a . $id ?>"><?= $a; ?></a>
        &nbsp &nbsp
    <?php endfor; ?>
</div>