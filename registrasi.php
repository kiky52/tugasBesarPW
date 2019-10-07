<?php 
require 'functions.php';

if( isset($_POST["register"])){
    if(registrasi($_POST) > 0 ){
      echo "<script>
        alert('User baru berhasil ditambahkan');
        document.location.href = 'login.php';
      </script>";
  

   }else {
    echo mysqli_error($conn);
   }

}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="css/regis.css">
    
    <form method="post" action="" class="regis">
    <h1>Form Registrasi</h1>
       <ul>
       	  <li>
       	  	<label for="username">Username :</label>
       	  	<input type="text" name="username" id="username" required></input>
       	  </li>
       	  <li>
       	  	<label for="password">Password :</label>
       	  	<input type="password" name="password" id="password" required></input>
       	  </li>
       	  <li>
       	  	<label for="password2">Konfirmasi Password :</label>
       	  	<input type="password" name="password2" id="password2" required></input>
       	  </li>
       	  <button type="submit" name="register" class="btn success">Register!</button>

       </ul>
    	
    </form>
</body>
</html>