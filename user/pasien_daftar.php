<?php
include '../koneksi.php';
session_start();

#$month=date("m");
#$year=date("Y");
#echo $month;
#echo $year;
#$tgl="$year"."$month"."-";
#$tes = '000'+'002';
#$hi = str_pad($tes, 3, '0', STR_PAD_LEFT);
#$tgl="$year"."$month"."-"."$hi";
#echo $tgl ."<br>";
#echo $tes."<br>";
#echo $hi;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama = $_POST["nama"];
	$alamat = $_POST["alamat"];
	$ktp = $_POST["ktp"];
    $nhp = $_POST["nhp"];
	#$nrm = curdate();
	
	
	#echo '$nrm';
	
	#$time=strtotime(now);
	$month=date("m");
	$year=date("Y");
	
	$tgl = "$year"."$month";
	
	$query = "SELECT * from pasien WHERE no_rm LIKE '%$tgl%'";
	$result = mysqli_query($mysqli, $query);
	
	$rowcount = mysqli_num_rows($result)+1;
	$np = str_pad($rowcount, 3, '0', STR_PAD_LEFT);
	$nrm = "$year"."$month"."-"."$np";
	
	$query = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp, no_rm) VALUES ('$nama', '$alamat', '$ktp', '$nhp', '$nrm')";
	
	if (mysqli_query($mysqli, $query)) {
        // Jika berhasil, redirect kembali ke halaman utama atau sesuaikan dengan kebutuhan Anda
        // header("Location: ../../index.php");
        // exit();
        echo '<script>';
        echo 'alert("Pasien berhasil terdaftar!");';
        echo 'window.location.href = "../pasien_login.php";';
        echo '</script>';
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }


    // Query untuk menambahkan data obat ke dalam tabel
    #$query = "SELECT * From dokter WHERE nama='$nama' and no_hp='$nhp'";
	
	#$result = mysqli_query($mysqli, $query);
	#$found = $result->num_rows;
	

    

   
}

// Tutup koneksi
mysqli_close($mysqli);

?>