<?php
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
$sqlpengeluaran = "SELECT * FROM pengeluaran WHERE tanggal";
$querypengeluaran = mysqli_query($koneksidb, $sqlpengeluaran);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="rental mobil">
    <meta name="author" content="">

    <title><?php echo $pagedesc; ?></title>

    <link href="img/fav.png" rel="icon" type="images/x-icon">

    <link href="../assets/new/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/new/offline-font.css" rel="stylesheet">
    <link href="../assets/new/custom-report.css" rel="stylesheet">
    <link href="../assets/new/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="../assets/new/jquery.min.js"></script>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
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
                        <!-- <td class="text-center">Bekasi</td> -->
                    </tr>
                </tbody>
            </table>
            <hr class="line-top" />
        </div>
    </section>

    <section id="body-of-report">
        <div class="container-fluid">
            <h4 class="text-center">Detail Laporan Pengeluaran</h4>
            <br />
            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Keperluan</th>
                        <th>Tanggal</th>
                        <th>Uang Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $total_pengeluaran = 0;
                    while ($result = mysqli_fetch_array($querypengeluaran)) {
                        $no++;
                        $total_pengeluaran += $result['uang_keluar'];
                    ?>
                        <tr align="center">
                            <td><?php echo $no; ?></td>
                            <td><?php echo htmlentities($result['keperluan']); ?></td>
                            <td><?php echo IndonesiaTgl(htmlentities($result['tanggal'])); ?></td>
                            <td><?php echo format_rupiah($result['uang_keluar']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-center">Total Pengeluaran</th>
                        <th class="text-center"><?php echo format_rupiah($total_pengeluaran); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div><!-- /.container -->
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            window.print();
        });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/new/bootstrap.min.js"></script>

</body>
</html>
