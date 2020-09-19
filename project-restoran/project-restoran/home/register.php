<h3>Registrasi Pelanggan</h3>
<form action="" method="post">
    <div class="form-group">
        <label for="pelanggan">Username:</label>
        <input type="text" name="pelanggan" id="pelanggan" autocomplete="off" class="form-control w-50 mb-2">
    </div>
    <div class="form-group">
        <label for="alamat" >Alamat:</label>
        <input type="text" name="alamat" id="alamat" autocomplete="off" class="form-control w-50 mb-2">
    </div>
    <div class="form-group">
        <label for="telp" >Telphone:</label>
        <input type="text" name="telp" id="telp" autocomplete="off" class="form-control w-50 mb-2">
    </div>
    <div class="form-group">
        <label for="email" >Email:</label>
        <input type="email" name="email" id="email" autocomplete="off" class="form-control w-50 mb-2">
    </div>
    <div class="form-group">
        <label for="password" >Password:</label>
        <input type="password" name="password" id="password" class="form-control w-50 mb-2">
    </div>
    <div class="form-group">
        <label for="konfirmasi" >Konfirmasi Password:</label>
        <input type="password" name="konfirmasi" id="konfirmasi" class="form-control w-50 mb-2">
    </div>
    <div>
        <button class="btn btn-primary" type="submit" name="tombol">Kirim!</button>
    </div>
</form>
<?php 
    if (isset($_POST['tombol'])) {
        $pelanggan=$_POST['pelanggan'];
        $alamat=$_POST['alamat'];
        $telp=$_POST['telp'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $konfirmasi=$_POST['konfirmasi'];    
        if ($password===$konfirmasi) {
            $sql="INSERT INTO pelanggan VALUE('','$pelanggan','$alamat','$telp','$email','$password',1)";
             echo $sql;
             //$db->runSql($sql);
             header("location:?f=home&m=info");
        }else{
            echo "<script> 
        alert('masukan konfigurasi yang sama dengan password!!');
        </script>";
        }
    }
?>