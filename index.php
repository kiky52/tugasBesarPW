<?php 
session_start();
require"functions.php";

  if( !isset($_SESSION["login"])){
     header("Location: login.php");
     exit;
    }

if ( isset($_GET["cari"])) {
  $keyword = $_GET["keyword"];
  $query = "SELECT * FROM terancam 
            WHERE 
            nama LIKE '%$keyword%' OR
            asal LIKE '%$keyword%' OR
            jenis LIKE '%$keyword%'
            "; 
  $mahasiswa = query($query);
}
else {
  $terancam = query("SELECT * FROM terancam");
}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <title>Daftar flora dan fauna hampir punah</title>
  
 </head>
 <body style="background-color: #F0FFF0">
 <link rel="stylesheet" type="text/css" href="css/index.css">
   <ul class="navbar">
     <li><a href="index.php">Home</a></li>
     <li><a href="tambah.php">Tambah Data</a></li>
     <li style="float:right"><a class="active" href="logout.php">Keluar</a></li>
   </ul>

   
   <h2>Daftar flora dan fauna terancam punah</h2>
 
   <br> 

   <form action="" method="get" class="cari">
     <input type="text" name="keyword"></input>
     <button type="submit" name="cari">Cari</button>




   </form>

   <table border="1" cellspacing="0" cellpadding="5" style="text-align: center; font-size: 17px;">
    <tr>
      <th>No.</th>
      <th>Aksi</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Asal Daerah</th>
      <th>Jenis</th>
      <th>Jumlah Populasi</th>
      
    </tr>
    <?php if (empty($terancam)) : ?>
      <tr>
        <td colspan="7"><h1>DATA TIDAK DITEMUKAN !!!</h1></td>
      </tr>
    <?php endif; ?>
    <?php $i = 1; ?>
    <?php foreach ($terancam as $terc) : ?>
     <tr>
         <td><?php echo $i++; ?></td>
         <th>
           <a href="ubah.php?id=<?php echo $terc["id"]; ?>" class="btn ubah">Ubah</a><br><br>
           <a href="hapus.php?id=<?php echo $terc["id"]; ?>" onclick="return confirm('yakin??');" class="btn hapus"> Hapus</a>
         </th>
         <td><img src="img/<?= $terc["gambar"]; ?>" width="100"></td>
         <td><?php echo $terc["nama"]; ?></td> 
         <td><?php echo $terc["asal"]; ?></td>
         <td><?php echo $terc["jenis"]; ?></td>
         <td><?php echo $terc["jumlah"]; ?></td>
         
     </tr>
     <?php endforeach; ?>
   </table>
  
 </body>
 </html>      
