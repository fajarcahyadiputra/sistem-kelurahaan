<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['Cetak'])){
	$id = $_POST['lahir'];
	}

	$tanggal = date("m/y");
	$tgl = date("d/m/y");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT</title>
</head>

<body>
	<center>
	<img width="80" src="../dist/img/logo.jpg" alt="logo" align="left">
	<h2>PEMERINTAH KABUPATEN TELAGA ASIH</h2>
		<div style="line-height: 5px; text-align: center; margin-left: 0; width: 300px;">
			<p>KECAMATAN CIKARANG BARAT</p>
			<p>KELURAHAN TELAGA ASIH</p>
			<p>jl.Raya Telaga Asih No.15 Kode pos 17520</p>
		</div>
		<p>________________________________________________________________________</p>

		<?php
			$sql_tampil = "select * from tb_lahir where id_lahir='$id'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			$data = mysqli_fetch_array($query_tampil);

			$sql_pengguna = "select * from tb_pengguna
			where level='lurah'";
			$query_lurah = mysqli_query($koneksi, $sql_pengguna);
			$no=1;
			$data_peng = mysqli_fetch_array($query_lurah);
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETARANGAN KELAHIRAN</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_lahir']; ?>/Ket.Kelahiran/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertanda tangan dibawah ini lurah telaga asih kecamatan cikarang barat kabupaten bekasi dengan ini menerangkan bahwa :</p>
	<table>
		<tbody>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<?php echo $data['jekel']; ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td>
					<?php echo $data['tgl_lh']; ?>
				</td>
			</tr>
			<tr>
				<td>Panjang Bayi</td>
				<td>:</td>
				<td>
					<?php echo $data['panjang_bayi']; ?>
				</td>
			</tr>
		</tbody>
	</table>
	<p>Surat keterangan ini sebagai persyaratan untuk mengurus akta kelahiran pada dinas kependudukan dan pencatatan sipil kabupaten bekasi.</p>
 <p>Demikian surat keterangan ini diberikan untuk dapat digunakan sebagai mestinya.</p>

	<br>
	<br>
	<br>
	<br>
	<br>
	<p align="right">
		Bekasi,
		<?php echo $tgl; ?>
		<br> A.N Lurah Telaga Asih
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>(<?php echo $data_peng['nama_pengguna'] ?>)
	</p>


	<script>
		window.print();
	</script>

</body>

</html>