<!DOCTYPE html>
<html>

<head>
	<title>RS Jaya Sentosa</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
	<div class="container col-md-6 mt-4">
		<h1>Table pasien</h1>
		<div class="card">
			<div class="card-header bg-success text-white ">
				Edit pasien
			</div>
			<div class="card-body">
				<?php
				include('koneksi.php');

				$id = $_GET['id']; //mengambil id pasien yang ingin diubah

				//menampilkan pasien berdasarkan id
				$data = mysqli_query($koneksi, "select * from pasien where id = '$id'");
				$row = mysqli_fetch_assoc($data);

				?>
				<form action="" method="post" role="form">
					<div class="form-group">
						<label>Nama</label>
						<!--  menampilkan nama pasien -->
						<input type="text" name="nama" required="" class="form-control" value="<?= $row['nama']; ?>">

						<!-- ini digunakan untuk menampung id yang ingin diubah -->
						<input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
					</div>
					<div class="form-group">
						<label>Penyakit</label>
						<input type="text" name="penyakit" required=""  	class="form-control" value="<?= $row['penyakit']; ?>">
					</div>

					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" name="deskripsi"><?= $row['deskripsi']; ?></textarea>
					</div>
					<button type="submit" class="btn btn-primary" name="submit" value="simpan">update data</button>
				</form>

				<?php

				//jika klik tombol submit maka akan melakukan perubahan
				if (isset($_POST['submit'])) {
					$id = $_POST['id'];
					$nama = $_POST['nama'];
					$penyakit = $_POST['penyakit'];
					$deskripsi = $_POST['deskripsi'];

					//query mengubah pasien
					mysqli_query($koneksi, "update pasien set nama='$nama', penyakit='$penyakit', deskripsi='$deskripsi' where id ='$id'") or die(mysqli_error($koneksi));

					//redirect ke halaman index.php
					echo "<script>alert('data berhasil diupdate.');window.location='index.php';</script>";
				}



				?>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>