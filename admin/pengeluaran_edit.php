<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
?>
	<!doctype html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">

		<title><?php echo $pagedesc; ?></title>
		<link rel="shortcut icon" href="img/fav.png">

		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript">
			function valid(theform) {
				pola_nama = /^[a-zA-Z]*$/;
				if (!pola_nama.test(theform.vehicletitle.value)) {
					alert('Hanya huruf yang diperbolehkan untuk Nama Baju!');
					theform.vehicletitle.focus();
					return false;
				}
				return (true);
			}
		</script>
	</head>

	<body>
		<?php include('includes/header.php'); ?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title">Edit Data Baju</h2>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Form Edit Data Baju</div>
										<div class="panel-body">
											<?php
											$id = intval($_GET['id']);
											$sql = "SELECT * FROM pengeluaran WHERE id_pengeluaran='$id'";
											$query = mysqli_query($koneksidb, $sql);
											$result = mysqli_fetch_array($query);
											?>

											<form method="post" class="form-horizontal" name="theform" action="pengeluaran_upd.php" onsubmit="return valid(this);" enctype="multipart/form-data">
												<div class="form-group">
													<label class="col-sm-2 control-label">Keperluan<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" required>
														<input type="text" name="keperluan" class="form-control" value="<?php echo htmlentities($result['keperluan']); ?>" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Tanggal<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="date" name="tanggal" class="form-control" value="<?php echo htmlentities($result['tanggal']); ?>" required>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Uang Keluar<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<input type="number" min="0" name="uang_keluar" class="form-control" value="<?php echo htmlentities($result['uang_keluar']); ?>" required>
													</div>
												</div>

												<div class="hr-dashed"></div>

												
												<div class="hr-dashed"></div>

												<!-- Tombol Simpan -->
												<div class="form-group">
													<div class="col-sm-4">
														<button class="btn btn-primary" type="submit">Simpan</button>
														<a href="pengeluaran.php" class="btn btn-default">Batal</a>
													</div>
												</div>
											</form>
											
										</div>

									</div>
								</div>
							</div>

						

						</div>
					</div>
					</form>

				</div>
			</div>
		</div>

		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
	</body>

	</html>
<?php } ?>