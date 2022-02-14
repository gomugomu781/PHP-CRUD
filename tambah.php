<!DOCTYPE html>
<html>

<head>
	<title>RS Jaya Sentosa</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
	<div class="container col-md-6 mt-4">
		<h1>Table Pasien</h1>
		<div class="card">
			<div class="card-header bg-success text-white">
				Tambah data Pasien
			</div>
			<div class="card-body">
				<form action="" method="post" role="form">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>Penyakit</label>
						<input type="text" name="penyakit" class="form-control">
					</div>

					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" name="deskripsi"></textarea>
					</div>

					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
				</form>

				<?php
				include('koneksi.php');
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$nama = $_POST['nama'];
					$harga = $_POST['penyakit'];
					$deskripsi = $_POST['deskripsi'];

					//query untuk menambahkan pasien ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($koneksi, "insert into pasien (nama,penyakit,deskripsi)values('$nama', '$penyakit', '$deskripsi')") or die(mysqli_error($koneksi));
					//id pasien tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='index.php';</script>";
				}
				?>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>