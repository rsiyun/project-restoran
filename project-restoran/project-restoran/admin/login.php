<?php 
  require_once "../dbcontroller.php";
  session_start();
  $db=new DB;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/logo.jpg">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <title>Login page</title>
  <style>

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
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
</head>
<body class="text-center">
    <form action="" method="post" class="form-signin">
      <img class="mb-4" src="../img/logo.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="user" class="sr-only">username:</label>
      <input type="user" id="user" name="user" class="form-control user" placeholder="username" required="" autofocus="">
      <label for="password" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control pass" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" name="tombol" type="submit">Sign in</button>
    </form>
  

</body>
</html>
<?php 
  if (isset($_POST['tombol'])) {
    $user=$_POST['user'];
    $password=$_POST['password'];
    $sql="SELECT * FROM user WHERE user='$user' AND '$password'";
    $count=$db->rowCount($sql);
    if ($count<=0) {
      echo "<script>
      alert('user atau password salah');
      </script>";
    }else {
      $item=$db->getItem($sql);
      $_SESSION['user']=$item['user'];
      $_SESSION['level']=$item['level'];
      $_SESSION['iduser']=$item['iduser'];
      header("location:index.php");
    }
  }
?>