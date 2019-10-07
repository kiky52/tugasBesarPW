<?php 
$conn = mysqli_connect("localhost", "root","", "pw1_d_2018");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
     }
     return $rows;


}

function tambah($data){
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$asal = $data["asal"];
	$jenis = $data["jenis"];
	$jumlah = htmlspecialchars($data["jumlah"]);

	$gambar = upload();
	if ( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO terancam VALUES
	     ('','$nama','$asal','$jenis','$jumlah','gambar')";
    mysqli_query ($conn, $query);

    return mysqli_affected_rows($conn);
    

}

function upload(){

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	if ( $error === 4) {
		echo "
		   <script>
		    alert('pilih gambar terlebih dahulu !');
		   </script>";
		   return false;
	}

	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
		echo "
		   <script>
		    alert('yang anda upload bukan gambar!');
		   </script>";
		   return false;
	}


	if( $ukuranFile > 1000000){
		echo "
		   <script>
		    alert('Ukuran gambar terlalu besar!');
		   </script>";
		   return false;
	}

	move_uploaded_file($tmpName, 'img/' . $namaFile);

	return $namaFile;

}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM terancam WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	$id = $data ["id"];
	$nama = htmlspecialchars($data["nama"]);
	$asal = $data["asal"];
	$jenis = $data["jenis"];
	$jumlah = htmlspecialchars($data["jumlah"]);
	
	$query = "UPDATE terancam SET
	     nama = '$nama',
	     asal = '$asal',
	     jenis = '$jenis',
	     jumlah = '$jumlah',
	     gambar = '$gambar'
	     WHERE id = '$id'
	     ";
    mysqli_query ($conn, $query);
    return mysqli_affected_rows($conn);
}

function registrasi($data){
	global $conn;

	$username = strtolower(trim($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $cekUser = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($cekUser)){
    	echo "<script>
    	       alert('username sudah ada!')
    	     </script>";
    	     return false;
    }

	if( $password !== $password2){
		echo "<script>
		    alert('Konfirmasi password tidak sesuai!');
		   </script>";
		   return false;
	}

	$passwordBaru = password_hash($password, PASSWORD_DEFAULT);
	 $query = "INSERT INTO user VALUES ('','$username','$passwordBaru')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}



 ?>
