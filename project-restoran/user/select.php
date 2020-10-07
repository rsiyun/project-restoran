<?php

$jumlahdata = $db->rowCOUNT('SELECT iduser FROM tbluser');
$banyak = 4;
if (isset($_GET['p'])) {
    $p = $_GET['p'];
    $mulai = ($p * $banyak) - $banyak;
} else {
    $mulai = 0;
}
$halaman = ceil($jumlahdata / $banyak);
$sql = "SELECT * FROM tbluser ORDER BY user ASC LIMIT $mulai,$banyak";
$row = $db->getALL($sql);
$no = 1 + $mulai;

?>

<div class="float-left mr-3 ">

    <a class="btn btn-primary" href="?f=user&m=insert" role="button">Tambah Data</a>

</div>
<h3> User </h3>

<table class="table table-bordered table-dark w-100">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Email</th>
            <th>Level</th>
            <th>Hapus</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $r) { ?>
            <?php if ($r['aktif'] == 1) {
                $status = "Aktif";
            } else {
                $status = "Banned";
            } ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $r['user'] ?></td>
                <td><?= $r['email'] ?></td>
                <td><?= $r['level'] ?></td>
                <td><a href="?f=user&m=delete&id=<?php echo $r['iduser'] ?>">Hapus</a></td>
                <td><a href="?f=user&m=update&id=<?php echo $r['iduser'] ?>"><?= $status; ?></a></td>
            </tr>
        <?php }; ?>
    </tbody>
</table>

<?php for ($i = 1; $i <= $halaman; $i++) : ?>
    <a href="?f=user&m=select&p=<?= $i ?>"><?= $i; ?></a>
    &nbsp &nbsp
<?php endfor; ?>