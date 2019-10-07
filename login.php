<?php 
session_start();

require 'functions.php';

  if(isset($_SESSION["login"])){
    header("location: index.php");
  }

  if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $cekUser = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if( mysqli_num_rows($cekUser) == 1 ){
      $row = mysqli_fetch_assoc($cekUser);
      if( password_verify($password, $row["password"])){
        $_SESSION["login"] = true;
      header("location: index.php");
      exit;
      }
      
    }
      $error = true;
  }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="css/login.css">
<a class="btn hal" href="index2.php">Halaman User</a>
<div class="loginn">
   <h1>Login</h1>
   <?php if (isset($error)) : ?>
   	<p style="color :red; font-style: italic;">
   		username / password anda salah!!
   	</p>
   <?php endif; ?>
   <form action="" method="post">
   <ul>
   	   <li>
   	   	  <label for="username">Username</label>
   	   	  <br>
   	   	  <input type="text" name="username" autofocus></input>
   	   </li>
   	   <li>
   	   	  <label for="password">Password</label>
   	   	  <br>
   	   	  <input type="password" name="password"></input>
   	   </li>
   	   <li>
   	   	   <button type="submit" name="login" class="btn success">Login</button>
   	   </li>
   </ul> 
   	
   </form>
   <div class="a2">
   <a href="registrasi.php"><h4>Registrasi!</h4></a>
   </div>
</div>
</body>
</html>