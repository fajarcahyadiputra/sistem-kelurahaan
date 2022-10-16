<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['btnCetak'])){
	$id = $_POST['id_pend'];
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
		<img width="80" src="../dist/img/logo.jpg" alt="logo" align="left" style="margin-right: 0">
		<h2>PEMERINTAH KABUPATEN TELAGA ASIH</h2>
		<div style="line-height: 5px; text-align: center; margin-left: 0; width: 500px;">
			<h2>KECAMATAN CIKARANG BARAT</h2>
			<h2>KELURAHAN TELAGA ASIH</h2>
			<h2>jl.Raya Telaga Asih No.15 Kode pos 17520</h2>
		</div>
		<?php
			$sql_tampil = "select * from tb_pdd
			where id_pend ='$id'";
			
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			$data = mysqli_fetch_array($query_tampil);

			$sql_pengguna = "select * from tb_pengguna
			where level='lurah'";
			$query_lurah = mysqli_query($koneksi, $sql_pengguna);
			$no=1;
			$data_peng = mysqli_fetch_array($query_lurah);
			$dateNow  = date('Y-m-d');
			$dateAfter = date('Y-m-d', strtotime($dateNow. ' + 3 months'));
		?>
	</center>

	<center>
		<p>________________________________________________________________________</p>
		<h4>
			<u>SURAT KETARANGAN DOMISILI</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_pend']; ?>/Ket.Domisili/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertanda tangan dibawah ini lurah telaga asih kecamatan cikarang barat kabupaten bekasi dengan ini menerangkan bahwa :</p>
</P>
	<table>
		<tbody>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<?php echo $data['nik']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>TTL</td>
				<td>:</td>
				<td>
					<?php echo $data['tempat_lh']; ?>/
					<?php echo $data['tgl_lh']; ?>
				</td>
			</tr>
			<tr>
				<td>Kewarganegaraan</td>
				<td>:</td>
				<td>
					<?php echo $data['kewarganegaraan']; ?>
				</td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td>
					<?php echo $data['agama']; ?>
				</td>
			</tr>
			<tr>
				<td>Pendidikan</td>
				<td>:</td>
				<td>
					<?php echo $data['pendidikan']; ?>
				</td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td>:</td>
				<td>
					<?php echo $data['pekerjaan']; ?>
				</td>
			</tr>
			<tr>
				<td>Status Pernikahan</td>
				<td>:</td>
				<td>
					<?php echo $data['kawin']; ?>
				</td>
			</tr>
		</tbody>
	</table>
	<p>Berdasarkan surat pengantar rt/rw setempat bahwa benar nama tersebut diatas telah melapor dan tercatat sebagai domisili penduduk tetap di kelurahan telaga asih dan Surat keterangan ini digunakan untuk persyaratan administrasi dan Surat keterangan ini berlaku selama 3 (tiga) bulan terhitung mulai:</p>
<p style="font-weight: bold ;">Tanggal : <?php echo $dateNow ?> 		s/d tanggal: <?php echo $dateAfter ?> </p>
<p>Demikian surat keterangan domisili penduduk ini kami buat dan agar dapat digunakan sebagai mestinya.</p>
	<br>
	<br>
	<br>
	<br>
	<div style="display: flex; justify-content: space-between;">
	<p align="right" style="text-align: center">
		<br> YANG BERSANGKUTAN
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>(<?php echo $data['nama']; ?>)
	</p>
	<p align="right" style="text-align: center">
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
	</div>



	<script>
		window.print();
	</script>

</body>

</html>