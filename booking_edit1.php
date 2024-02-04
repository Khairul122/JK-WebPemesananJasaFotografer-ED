<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if (strlen($_SESSION['ulogin']) == 0) {
    header('location:index.php');
} else {
?>
    <!DOCTYPE HTML>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <title><?php echo $pagedesc; ?></title>
        <!--Bootstrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
        <link href="assets/css/slick.css" rel="stylesheet">
        <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
        <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="admin/img/fav.png">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    </head>

    <body>

        <!-- Start Switcher -->
        <?php include('includes/colorswitcher.php'); ?>
        <!-- /Switcher -->

        <!--Header-->
        <?php include('includes/header.php'); ?>

        <?php
        $kode = $_GET['kode'];
        $sql1     = "SELECT transaksi.*,member.*,paket.* FROM transaksi, member, paket WHERE transaksi.email=member.email
		   AND transaksi.id_paket=paket.id_paket AND transaksi.id_trx='$kode'";
        $query1 = mysqli_query($koneksidb, $sql1);
        $result = mysqli_fetch_array($query1);
        $harga    = $result['harga'];
        $durasi = $result['durasi'];
        $totalsewa = $durasi * $harga;
        $tglmulai = strtotime($result['tgl_take']);
        $jmlhari  = 86400 * 1;
        $tgl      = $tglmulai - $jmlhari;
        $tglhasil = date("Y-m-d", $tgl);
        ?>
        <section class="user_profile inner_pages">
            <center>
                <h3>Edit Data Booking</h3>
            </center>
            <div class="container">
                <div class="user_profile_info">
                    <div class="col-md-12 col-sm-10">
                        <form method="post" action="update_booking.php" name="sewa" onSubmit="return valid();" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $kode; ?>" required>
                            <div class="form-group">
                                <label>Kode Booking</label>
                                <input type="text" class="form-control" name="id_trx" value="<?php echo $result['id_trx']; ?>" readonly>
                            </div>
                            <input type="hidden" class="form-control" name="vid" value="<?php echo $vid; ?>" required>
                            <div class="form-group">
                                <label>Paket</label>
                                <select class="form-control" name="id_paket" id="id_paket">
                                    <?php
                                    $query_paket = mysqli_query($koneksidb, "SELECT * FROM paket");
                                    while ($row_paket = mysqli_fetch_assoc($query_paket)) {
                                        $selected = ($row_paket['id_paket'] == $result['id_paket']) ? 'selected' : '';
                                        echo "<option value='{$row_paket['id_paket']}' {$selected} data-harga='{$row_paket['harga']}'>{$row_paket['nama_paket']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Take</label>
                                <input type="date" class="form-control" name="tgl_take" placeholder="" value="<?php echo IndonesiaTgl($result['tgl_take']); ?>">
                            </div>
                            <div class="form-group">
                                <label>Jam Take</label><br />
                                <select class="form-control" name="jam_take" required>
                                    <option value="" selected>== Pilih Jam ==</option>
                                    <option value="07:00">07:00</option>
                                    <option value="08:00">08:00</option>
                                    <option value="09:00">09:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Biaya</label><br />
                                <input type="text" class="form-control" name="pemasukkan" value="" readonly>
                            </div>

                            <div class="form-group">
                                <label>Catatan</label><br />
                                <textarea class="form-control" name="catatan"><?php echo $result['catatan']; ?></textarea>
                            </div>

                            <div class="hr-dashed"></div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--/my-vehicles-->
        <?php include('includes/footer.php'); ?>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/interface.js"></script>
        <!--Switcher-->
        <script src="assets/switcher/js/switcher.js"></script>
        <!--bootstrap-slider-JS-->
        <script src="assets/js/bootstrap-slider.min.js"></script>
        <!--Slider-JS-->
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
    </body>

    </html>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#id_paket").change(function() {
                var harga = $("option:selected", this).data("harga");
                $("input[name='pemasukkan']").val(harga);
            });
        });
    </script>

<?php } ?>
