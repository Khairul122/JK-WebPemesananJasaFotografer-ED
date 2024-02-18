<?php
include 'includes/config.php';
include 'includes/format_rupiah.php';
include 'includes/library.php';
$awal = $_GET['awal'];
$akhir = $_GET['akhir'];
$stt = "Sudah Dibayar";
$stt1 = "Selesai";
$sqlsewa = "SELECT * FROM transaksi WHERE (stt_trx='$stt' OR stt_trx='$stt1') AND tgl_bayar BETWEEN '$awal' AND '$akhir'";
$querysewa = mysqli_query($koneksidb, $sqlsewa);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="rental mobil">
    <meta name="author" content="">

    <link href="img/fav.png" rel="icon" type="images/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="../assets/new/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/new/offline-font.css" rel="stylesheet">
    <link href="../assets/new/custom-report.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/new/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="../assets/new/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <section id="header-kop">
        <div class="container-fluid">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td rowspan="3" width="16%" class="text-center">
                            <img src="img/icon.png" alt="logo-dkm" width="80" />
                        </td>
                        <td class="text-center">
                            <h3>TukangFoto.com</h3>
                        </td>
                        <td rowspan="3" width="16%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="text-center">Phone : +62 823-2275-3411 | E-mail : ask@tukangfoto.com</td>
                    </tr>
                    <tr>
                        <td class="text-center">Bekasi</td>
                    </tr>
                </tbody>
            </table>
            <hr class="line-top" />
        </div>
    </section>

    <section id="body-of-report">
        <div class="container-fluid">
            <h3 class="text-center">Detail Laporan</h3>
            <br />
            <h4>Kas Masuk (<?php echo $awal; ?> - <?php echo $akhir; ?>)</h4>
            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$nomor_masuk = 0;
$total_kas_masuk = 0;
while ($row_masuk = mysqli_fetch_array($querysewa)) {
    $nomor_masuk++;
    ?>
                        <tr>
                            <td><?php echo $nomor_masuk; ?></td>
                            <td><?php echo htmlentities($row_masuk['id_trx']); ?></td> <!-- Deskripsi berdasarkan id_trx -->
                            <td><?php echo IndonesiaTgl(htmlentities($row_masuk['tgl_bayar'])); ?></td> <!-- Tanggal -->
                            <td><?php echo format_rupiah($row_masuk['pemasukkan']); ?></td> <!-- Jumlah -->
                        </tr>
                    <?php
$total_kas_masuk += $row_masuk['pemasukkan'];
}
?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total Kas Masuk</th>
                        <td><?php echo format_rupiah($total_kas_masuk); ?></td>
                    </tr>
                </tfoot>
            </table>

            <!-- Table Kas Keluar -->
            <h4>Kas Keluar (<?php echo $awal; ?> - <?php echo $akhir; ?>)</h4>
<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Query untuk mengambil data pengeluaran sesuai dengan rentang tanggal
        $sql_keluar = "SELECT * FROM pengeluaran WHERE tanggal BETWEEN '$awal' AND '$akhir'";
        $query_keluar = mysqli_query($koneksidb, $sql_keluar);
        $nomor_keluar = 0;
        $total_kas_keluar = 0;
        while ($row_keluar = mysqli_fetch_array($query_keluar)) {
            $nomor_keluar++;
        ?>
            <tr>
                <td><?php echo $nomor_keluar; ?></td>
                <td><?php echo htmlentities($row_keluar['keperluan']); ?></td> <!-- Deskripsi -->
                <td><?php echo IndonesiaTgl(htmlentities($row_keluar['tanggal'])); ?></td> <!-- Tanggal -->
                <td><?php echo format_rupiah($row_keluar['uang_keluar']); ?></td> <!-- Jumlah -->
            </tr>
        <?php
            $total_kas_keluar += $row_keluar['uang_keluar'];
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total Kas Keluar</th>
            <td><?php echo format_rupiah($total_kas_keluar); ?></td>
        </tr>
        <tr>
            <th colspan="3">Pendapatan</th>
            <td><?php echo format_rupiah($total_kas_masuk - $total_kas_keluar); ?></td>
        </tr>
    </tfoot>
</table>

            <!-- Table Kas Keluar -->
        </div><!-- /.container -->
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#jumlah').terbilang({
                'style': 3,
                'output_div': "jumlah2",
                'akhiran': "Rupiah",
            });

            window.print();
        });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/new/bootstrap.min.js"></script>
    <!-- jTebilang JavaScript -->
    <script src="../assets/new/jTerbilang.js"></script>

</body>

</html>
