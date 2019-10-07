<?php 
require 'functions.php';

if ( !isset($_GET["id"])) {
	header("Location: index.php");
	die;
	
}

if(hapus($_GET["id"])> 0 ) {
	echo "<script>
	         alert('Data berhasil dihapus!!');
	         document.location.href='index.php';
          </script>";
	
}
 ?>