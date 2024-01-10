<?php
include('includes/config.php');
error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data pengeluaran berdasarkan ID
    $sql = "DELETE FROM pengeluaran WHERE id_pengeluaran='$id'";
    $query = mysqli_query($koneksidb, $sql);

    if ($query) {
        echo "<script type='text/javascript'>
                alert('Berhasil hapus data.'); 
                document.location = 'pengeluaran.php'; 
            </script>";
    } else {
        echo "No Error : " . mysqli_errno($koneksidb);
        echo "<br/>";
        echo "Pesan Error : " . mysqli_error($koneksidb);

        echo "<script type='text/javascript'>
                alert('Terjadi kesalahan, silahkan coba lagi!.'); 
                document.location = 'pengeluaran.php'; 
            </script>";
    }
} else {
    // Jika tidak ada data GET atau ID tidak diset, kembalikan ke halaman sebelumnya
    header("Location: pengeluaran.php");
}
?>
