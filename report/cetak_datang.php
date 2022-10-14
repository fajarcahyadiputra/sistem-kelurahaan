<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['Cetak'])){
	$id = $_POST['id_datang'];
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
		<h2>PEMERINTAHAN KELURAHAN TELAGA ASIH</h2>
		<p>________________________________________________________________________</p>

		<?php
			$sql_tampil = "select * from tb_datang
			where id_datang ='$id'";
			
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
			<u>SURAT KETARANGAN PENDATANG</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_datang']; ?>/Ket.Pendatang/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertandatangan dibawah ini Kepala Kelurahan Telaga Asih, dengan ini menerangkan
		bahwa :</P>
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
					<?php echo $data['nama_datang']; ?>
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
				<td>Tanggal Datang</td>
				<td>:</td>
				<td>
					<?php echo $data['tgl_datang']; ?>
				</td>
			</tr>
		</tbody>
	</table>
	<p>Benar-benar Telah datang dan berencana untuk tinggal di Kelurahan Telaga Asih.</P>
	<p>Demikian Surat ini dibuat, agar dapat digunakan sebagaimana mestinya.</P>
	<br>
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
		<br>(<?php echo $data['nama_datang']; ?>)
	</p>
	<p align="right" style="text-align: center">
		Bekasi,
		<?php echo $tgl; ?>
		<br> KEPALA KELURAHAN TELAGA ASIH
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