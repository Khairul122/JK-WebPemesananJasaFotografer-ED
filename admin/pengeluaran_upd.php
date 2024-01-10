<?php
include('includes/config.php');
error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $keperluan = $_POST['keperluan'];
    $tanggal = $_POST['tanggal'];
    $uang_keluar = $_POST['uang_keluar'];

    // Query untuk melakukan edit data pengeluaran
    $sql = "UPDATE pengeluaran SET keperluan='$keperluan', tanggal='$tanggal', uang_keluar='$uang_keluar' WHERE id_pengeluaran='$id'";
    $query = mysqli_query($koneksidb, $sql);

    if ($query) {
        echo "<script type='text/javascript'>
                alert('Berhasil edit data.'); 
                document.location = 'pengeluaran.php'; 
            </script>";
    } else {
        echo "No Error : " . mysqli_errno($koneksidb);
        echo "<br/>";
        echo "Pesan Error : " . mysqli_error($koneksidb);

        echo "<script type='text/javascript'>
                alert('Terjadi kesalahan, silahkan coba lagi!.'); 
                document.location = 'edit_pengeluaran.php?id=" . $id . "'; 
            </script>";
    }
} else {
    // Jika tidak ada data POST, kembalikan ke halaman sebelumnya
    header("Location: pengeluaran.php");
}
?>
