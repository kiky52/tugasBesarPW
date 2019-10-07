<?php 

require"functions.php";


if ( isset($_GET["cari"])) {
  $keyword = $_GET["keyword"];
  $query = "SELECT * FROM terancam 
            WHERE 
            nama LIKE '%$keyword%' OR
            asal LIKE '%$keyword%' OR
            jenis LIKE '%$keyword%'
            "; 
  $terancam = query($query);
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
 <body>
 <link rel="stylesheet" type="text/css" href="css/index.css">
 <link rel="stylesheet" type="text/css" href="css/index2.css">
   <ul class="navbar">
     <li><a href="index2.php">Home</a></li>
     <li style="float:right"><a class="active" href="login.php">Login Admin</a></li>
   </ul>

   
   <h2>Daftar flora dan fauna terancam punah</h2>
 
   <br> 

   <form action="" method="get" class="cari">
     <input type="text" name="keyword"></input>
     <button type="submit" name="cari">Cari</button>




   </form>

   <table border="0" cellspacing="0" cellpadding="5" style="text-align: center; font-size: 17px;">
    <?php if (empty($terancam)) : ?>
      <tr>
        <td colspan="7"><h1>DATA TIDAK DITEMUKAN !!!</h1></td>
      </tr>
    <?php endif; ?>
    <?php $i = 1; ?>
    <?php foreach ($terancam as $terc) : ?>
     <tr>
         <td><?php echo $i++; ?></td>
         <td><a href="profil.php?nama=<?= $terc["nama"]; ?>&asal=<?= $terc["asal"]; ?>&jenis=<?= $terc["jenis"]; ?>&jumlah=<?= $terc["jumlah"]; ?>&gambar=<?= $terc["gambar"]; ?>"><img src="img/<?= $terc["gambar"]; ?>" width="400"></a></td>


         
         <td><h2 class="btn hewan"><a href="profil.php?nama=<?= $terc["nama"]; ?>&asal=<?= $terc["asal"]; ?>&jenis=<?= $terc["jenis"]; ?>&jumlah=<?= $terc["jumlah"]; ?>&gambar=<?= $terc["gambar"]; ?>"><?php echo $terc["nama"]; ?></a></h2></td> 
         
     </tr>
     <?php endforeach; ?>
   </table>
  
 </body>
 </html>      
