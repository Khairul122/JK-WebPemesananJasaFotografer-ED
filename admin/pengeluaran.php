<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else { ?>
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
	</head>

	<body>
		<?php include('includes/header.php'); ?>

		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-title">Data Pengeluaran</h2>
							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<a href="pengeluaran_tambah.php" class="btn btn-success">Tambah</a>
									<a href="pengeluaran_cetak.php" class="btn btn-warning">Cetak</a>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>No</th>
													<th>Keperluan</th>
													<th>Tanggal</th>
													<th>Uang Keluar</th>
													<!-- Tambah kolom foto jika diperlukan -->
													<!-- <th>Foto</th> -->
													<th>Opsi</th>
												</tr>
											</thead>
											<tbody>
												<?php
											
												$query = "SELECT * FROM pengeluaran";
												$result = mysqli_query($koneksidb, $query);

												
												$counter = 1;

												// Loop untuk menampilkan data dalam tabel
												while ($row = mysqli_fetch_assoc($result)) {
													echo "<tr>";
													echo "<td>" . $counter . "</td>";
													echo "<td>" . $row['keperluan'] . "</td>";
													echo "<td>" . $row['tanggal'] . "</td>";
													echo "<td>" . $row['uang_keluar'] . "</td>";
													
													echo "<td>
															<a href='pengeluaran_edit.php?id=" . $row['id_pengeluaran'] . "'>Edit</a> |
															<a href='pengeluaran_hapus.php?id=" . $row['id_pengeluaran'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>
														</td>";
													echo "</tr>";

													// Increment nomor urut
													$counter++;
												}
												?>
											</tbody>

										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
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