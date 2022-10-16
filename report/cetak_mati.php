<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['Cetak'])){
	$id = $_POST['id_mendu'];
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
			$sql_tampil = "select m.id_mendu, m.jam, m.tgl_mendu, m.sebab, p.nik, p.nama from tb_mendu m inner join tb_pdd p on 
			m.id_pdd=p.id_pend
			where id_mendu ='$id'";
			
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
			<u>SURAT KETARANGAN KEMATIAN</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_mendu']; ?>/Ket.Kematian/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertanda tangan dibawah ini lurah telaga asih kecamatan cikarang barat kabupaten bekasi dengan ini menerangkan bahwa :</p>
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
				<td>Tanggal Kematian</td>
				<td>:</td>
				<td>
					<?php echo $data['tgl_mendu']; ?>
				</td>
			</tr>
			<tr>
				<td>Jam</td>
				<td>:</td>
				<td>
					<?php echo $data['jam']; ?>
				</td>
			</tr>
			<tr>
				<td>Sebab</td>
				<td>:</td>
				<td>
					<?php echo $data['sebab']; ?>
				</td>
			</tr>

		</tbody>
	</table>
	<p>Demikian surat kematian ini dibuat dengan sebenarnya agar dapat dipergunakan sebagai mestinya.</P>
	<br>
	<br>
	<br>
	<br>
	<br>
	<p align="right" >
		Bekasi,
		<?php echo $tgl; ?>
		<br>A.N Lurah Telaga Asih
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