<form action="" method="post">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" autocomplete="off" class="form-control w-50 mb-2">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" autocomplete="off" class="form-control w-50 mb-2">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control w-50 mb-2">
    </div>
    <div class="form-group">
        <label for="konfirmasi">Konfirmasi Password:</label>
        <input type="password" name="konfirmasi" id="konfirmasi" class="form-control w-50 mb-2">
    </div>
    <div class="from-group">
        <label>Anda sebagai ?</label>
        <select name="opsi" id="" class="form-control w-25 mb-2">
            <option value="admin">admin</option>
            <option value="kasir">kasir</option>
            <option value="koki">koki</option>
        </select>
    </div>
    <div>
        <button class="btn btn-primary" type="submit" name="tombol">Kirim!</button>
    </div>
</form>
<?php 
    if (isset($_POST['tombol'])) {
        $user=strtolower(stripslashes($_POST['username']));
        $email=$_POST['email'];
        $password=$_POST['password'];
        $konfirmasi=$_POST['konfirmasi'];
        $level=$_POST['opsi'];      
        if ($password===$konfirmasi) {
            $password=password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO user VALUE('','$user','$email','$password','$level',1)";
            echo $sql;
            $db->runSql($sql);
            header("location:?f=user&m=select");
        }else{
            echo "<script> 
        alert('masukan konfigurasi yang sama dengan password!!');
        </script>";
        }
    }
?>