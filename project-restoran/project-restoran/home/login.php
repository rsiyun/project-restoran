<style>
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin-left:100px
}
.form-signin .user {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin .pass {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
  </style>
  <form action="" method="post" class="form-signin text-center" >
      <img class="mb-4" src="img/logo.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="pelanggan" class="sr-only">username:</label>
      <input type="text" id="user" name="pelanggan" class="form-control user" autocomplete="off" placeholder="username" required="" autofocus="">
      <label for="password" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control pass" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" name="tombol" type="submit">Sign in</button>
    </form>
<?php
  if (isset($_POST['tombol'])) {
    $pelanggan=$_POST['pelanggan'];
    $password=$_POST['password'];
    $sql="SELECT * FROM pelanggan WHERE pelanggan='$pelanggan' AND '$password' AND aktif=1";
    $count=$db->rowCount($sql);
    if ($count<=0) {
      echo "<script>
      alert('user atau password salah');
      </script>";
    }else {
      $item=$db->getItem($sql);
      var_dump($item); 
       $_SESSION['pelanggan']=$item['pelanggan'];
       $_SESSION['idpelanggan']=$item['idpelanggan'];
      header("location:index.php");
    }
  }  
?>