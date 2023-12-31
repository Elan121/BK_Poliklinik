<?php
include '../koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama = $_POST["nama"];
    $nhp = $_POST["nhp"];


    // Query untuk menambahkan data obat ke dalam tabel
    $query = "SELECT * From dokter WHERE nama='$nama' and no_hp='$nhp'";
	
	$result = mysqli_query($mysqli, $query);
	#$found = $result->num_rows;
	
	if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['nama'] = $data['nama'];
		#echo $_SESSION['nama'];
        echo "<script>alert('Login Success');</script>";
        echo "<script>location='../dokter_dashboard.php';</script>";
		#header("Location: ../admin_obat.php");
	} else {
		echo "<script>alert('User not found');</script>";
        echo "<script>location='../index.php';</script>";
	}
    

   
}

// Tutup koneksi
mysqli_close($mysqli);

?>