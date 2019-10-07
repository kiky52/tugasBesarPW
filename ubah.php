<?php 
session_start();
require 'functions.php';
// cek apakah tombol submit sudah ditekan
if( !isset($_SESSION["login"])){
     header("Location: login.php");
     exit;
    }
$id = $_GET["id"];
$terc = query("SELECT * FROM terancam WHERE id = $id")[0];

 if (isset($_POST["ubah"])) {
     if(ubah($_POST)>0){
     	echo "<script>
	          alert('Data berhasil diubah!');
	          document.location.href='index.php';
              </script>
     	      ";
     }
 }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Terancam Punah</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="css/ubah.css">

   
   <form action="" method="post" class="ubahh">
   <h1>Ubah Data</h1>
            <input type="hidden" name="id" value="<?php echo $terc["id"]; ?>"></input>
     <ul>
     	<li>
     		<label for="nama">Nama : </label>
     		<input type="text" name="nama" id="nama" value="<?php echo $terc["nama"]; ?>"></input>
     	</li>
     	<li>
     		<label for="asal">Asal Daerah : </label>
     		<input type="text" name="asal" id="asal" value="<?php echo $terc["asal"]; ?>"></input>
     	</li>
     	<li>
     		<label for="jenis">Jenis : </label>
     		<input type="text" name="jenis" id="jenis" value="<?php echo $terc["jenis"]; ?>"></input>
     	</li>
     	
     	<li>
     		<label for="jumlah">Jumlah : </label>
     		<input type="text" name="jumlah" id="jumlah" value="<?php echo $terc["jumlah"]; ?>"></input>
     	</li>
        <li>
            <label for="gambar">Gambar : </label>
            <input type="text" name="gambar" id="gambar" value="<?php echo $terc["gambar"]; ?>"></input>
        </li>
     	<li>
     		<button type="submit" name="ubah" class="btn ubah">Ubah Data</button>
     	</li>
     </ul>

 	
   </form>
   <a href="index.php" class="btn in">kembali</a>
</body>
</html>