<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

<div class="form-group row">
		<label class="col-sm-2 col-form-label">Tgl Datang</label>
		<div class="col-sm-3">
			<input type="date" class="form-control" id="tgl_datang" name="tgl_datang" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Pelapor</label>
		<div class="col-sm-6">
			<select name="pelapor" id="pelapor" class="form-control select2bs4" required>
				<option selected="selected">- Pilih Penduduk -</option>
				<?php
		// ambil data dari database
		$query = "select * from tb_pdd where status='Ada'";
		$hasil = mysqli_query($koneksi, $query);
		while ($row = mysqli_fetch_array($hasil)) {
		?>
				<option value="<?php echo $row['id_pend'] ?>">
					<?php echo $row['nik'] ?>
					-
					<?php echo $row['nama'] ?>
				</option>
				<?php
		}
		?>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Pendatang Dari</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="dari" name="dari" required>
		</div>
	</div>

<div class="form-group row">
	<label class="col-sm-2 col-form-label">NIK</label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-2 col-form-label">Nama</label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penduduk" required>
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Kewarganegaraan</label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="Kewarganegaraan" required>
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Pendidikan *<small class="text-info">Terakhir</small></label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="pendidikan" required>
	</div>
</div>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">TTL</label>
	<div class="col-sm-3">
		<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" placeholder="Tempat Lahir" required>
	</div>
	<div class="col-sm-3">
		<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" placeholder="Tanggal Lahir" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-2 col-form-label">Jenis Kelain</label>
	<div class="col-sm-3">
		<select name="jekel" id="jekel" class="form-control">
			<option>- Pilih -</option>
			<option>LK</option>
			<option>PR</option>
		</select>
	</div>
</div>
<small class="text-warning">Alamat Sementara</small>
<div class="form-group row">
	<label class="col-sm-2 col-form-label">Desa</label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="desa" name="desa" placeholder="Desa" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-2 col-form-label">RT/RW</label>
	<div class="col-sm-3">
		<input type="text" class="form-control" id="rt" name="rt" placeholder="RT" required>
	</div>
	<div class="col-sm-3">
		<input type="text" class="form-control" id="rw" name="rw" placeholder="RW" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-2 col-form-label">Agama</label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="agama" name="agama" placeholder="Agama" required>
	</div>
</div>


<div class="form-group row">
	<label class="col-sm-2 col-form-label">Status Perkawinan</label>
	<div class="col-sm-3">
		<select name="kawin" id="kawin" class="form-control">
			<option>- Pilih -</option>
			<option>Sudah</option>
			<option>Belum</option>
			<option>Cerai Mati</option>
			<option>Cerai Hidup</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-sm-2 col-form-label">Pekerjaan</label>
	<div class="col-sm-6">
		<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
	</div>
</div>

</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-datang" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data

	$sql_simpan_pdd = "INSERT INTO tb_pdd (nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan,kewarganegaraan, pendidikan, status) VALUES (
		'".$_POST['nik']."',
		'".$_POST['nama']."',
		'".$_POST['tempat_lh']."',
		'".$_POST['tgl_lh']."',
		'".$_POST['jekel']."',
		'".$_POST['desa']."',
		'".$_POST['rt']."',
		'".$_POST['rw']."',
		'".$_POST['agama']."',
		'".$_POST['kawin']."',
		'".$_POST['pekerjaan']."',
		'".$_POST['kewarganegaraan']."',
		'".$_POST['pendidikan']."',
		'Ada')";
	 mysqli_query($koneksi, $sql_simpan_pdd);

	$id_pdd = mysqli_insert_id($koneksi);

        $sql_simpan = "INSERT INTO tb_datang (id_pdd, tgl_datang, pelapor, dari, status) VALUES (
			'".$id_pdd."',
			'".$_POST['tgl_datang']."',
            '".$_POST['pelapor']."',
            '".$_POST['dari']."',
            'menunggu'
			)";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-datang';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-datang';
          }
      })</script>";
    }}
     //selesai proses simpan data
