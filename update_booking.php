<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/library.php');

// Cek apakah formulir sudah dikirim
if (isset($_POST['submit'])) {
    // Ambil data dari formulir
    $id_trx = $_POST['id_trx'];
    $id_paket = $_POST['id_paket'];
    $tgl_take = $_POST['tgl_take'];
    $jam_take = $_POST['jam_take'];
    $pemasukkan = $_POST['pemasukkan'];
    $catatan = $_POST['catatan'];

    // Lakukan query SQL untuk memperbarui data di tabel 'transaksi'
    $sql = "UPDATE transaksi SET id_paket='$id_paket', tgl_take='$tgl_take', jam_take='$jam_take', pemasukkan='$pemasukkan', catatan='$catatan' WHERE id_trx='$id_trx'";

    // Eksekusi query
    $result = mysqli_query($koneksidb, $sql);

    if ($result) {
        echo "<script>alert('Upload Berhasil!');</script>";
        echo "<script type='text/javascript'> document.location = 'riwayatsewa.php'; </script>";
    } else {
        // Terjadi kesalahan dalam eksekusi query
        echo "Error: " . mysqli_error($koneksidb);
    }

    // Tutup koneksi database
    mysqli_close($koneksidb);
}
