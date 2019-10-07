
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profil flora dan fauna</title>
	<link rel="stylesheet" href="css/profil.css">
</head>
<body>
	<div class="header">
		<p>Profil flora dan fauna</p>
	</div>
<div class="container">
	<div class="content">
		<div class="gambar">
			<img src="img/<?= $_GET['gambar'] ?>">
		</div>
		<div class="desc">
			<p class= "nama"><?= $_GET['nama'] ?></p>
			<p><?= $_GET['asal'] ?></p>
			<p><?= $_GET['jenis'] ?>, <?= $_GET['jumlah'] ?></p>
			<p><a href="index2.php">Kembali</a></p>
		</div>
	</div>
</div>

	
</body>
</html>