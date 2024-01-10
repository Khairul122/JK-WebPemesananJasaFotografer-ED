<?php
include('includes/config.php');
error_reporting(0);

$keperluan = $_POST['keperluan'];
$tanggal = $_POST['tanggal'];
$uang_keluar = $_POST['uang_keluar'];

$sql = "INSERT INTO pengeluaran (keperluan, tanggal, uang_keluar) VALUES ('$keperluan', '$tanggal', '$uang_keluar')";
$query = mysqli_query($koneksidb, $sql);

if ($query) {
    echo "<script type='text/javascript'>
            alert('Berhasil tambah data.'); 
            document.location = 'pengeluaran.php'; 
        </script>";
} else {
    echo "No Error : " . mysqli_errno($koneksidb);
    echo "<br/>";
    echo "Pesan Error : " . mysqli_error($koneksidb);

    echo "<script type='text/javascript'>
            alert('Terjadi kesalahan, silahkan coba lagi!.'); 
            document.location = 'pengeluaran_tambah.php'; 
        </script>";
}
?>
