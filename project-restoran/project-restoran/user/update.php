<?php 
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $sql="SELECT * FROM user WHERE iduser=$id";
        $row=$db->getItem($sql);
    }
?>
<h3>Update Data User</h3>
<form action="" method="post">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" autocomplete="off" value="<?=$row['user']?>" class="form-control w-50 mb-2">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" autocomplete="off"  value="<?=$row['email']?>" class="form-control w-50 mb-2">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"  value="<?=$row['password']?>" class="form-control w-50 mb-2">
    </div>
    <div class="form-group">
        <label for="konfirmasi">Konfirmasi Password:</label>
        <input type="password" name="konfirmasi" id="konfirmasi"  value="<?=$row['password']?>" class="form-control w-50 mb-2">
    </div>
    <div class="from-group">
        <label>Anda sebagai ?</label>
        <select name="opsi" id="" class="form-control w-25 mb-2">
            <option value="admin" <?php if($row['level']==="admin") echo "selected" ?>>admin</option>
            <option value="kasir" <?php if($row['level']==="kasir") echo "selected" ?>>kasir</option>
            <option value="koki" <?php if($row['level']==="koki") echo "selected" ?>>koki</option>
        </select>
    </div>
    <div>
        <button class="btn btn-primary" type="submit" name="tombol">Kirim!</button>
    </div>
</form>
<?php 
    if (isset($_POST['tombol'])) {
        $user=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $konfirmasi=$_POST['konfirmasi'];
        $level=$_POST['opsi'];  

        if ($password===$konfirmasi) {
            $sql="UPDATE user SET user='$user',email='$email',password='$password',level='$level' WHERE iduser=$id";
            $db->runSql($sql);
            header("location:?f=user&m=select");
        } else{
             echo "<script> 
         alert('masukan konfigurasi yang sama dengan password!!');
         </script>";
         }
    }
?>