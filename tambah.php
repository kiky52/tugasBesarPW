<?php
session_start(); 
require 'functions.php';
// cek apakah tombol submit sudah ditekan
 if( !isset($_SESSION["login"])){
     header("Location: login.php");
     exit;
    }
 if ( isset($_POST["submit"])) {
    
     if( tambah($_POST) > 0 ) {
     	echo "<script>
	          alert('Data berhasil ditambahkan!!');
	          document.location.href = 'index.php';
              </script>
     	      ";
     }else {
        echo "<script>
              alert('Data gagal ditambahkan!');
              document.location.href = 'index.php';
              </script>
              ";
     }

 }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Terancam Punah</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="css/tambah.css">

   
   <form action="" method="post" enctype="multipart/form-data" class="tambah">
   <h1>Tambah Data </h1>
     <ul>
     	<li>
     		<label for="nama">Nama : </label>
     		<input type="text" name="nama" id="nama"></input>
     	</li>
     	<li>
     		<label for="asal">Asal : </label>
     		<input type="text" name="asal" id="asal"></input>
     	</li>
     	<li>
     		<label for="jenis">Jenis : </label>
     		<input type="text" name="jenis" id="jenis"></input>
     	</li>
     	
     	<li>
     		<label for="jumlah">Jumlah : </label>
     		<input type="text" name="jumlah" id="jumlah"></input>
     	</li>
        <li>
            <label for="gambar">Gambar : </label>
            <input type="file" name="gambar" id="gambar"></input>
        </li><br>
     	<li>
     		<button type="submit" name="submit" class="btn sub">Tambah Data</button>
     	</li>
     </ul>

 	
   </form>
   <a href="index.php" class="btn kembali">kembali</a>
</body>
</html>