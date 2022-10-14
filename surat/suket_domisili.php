<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-file"></i> Su-Ket Domisili</h3>
	</div>
	<form action="./report/cetak_domisili.php" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Penduduk</label>
				<div class="col-sm-6">
					<select name="id_pend" id="id_pend" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Data -</option>
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

		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-info" name="btnCetak" target="_blank">Cetak Surat</button>
			<a href="https://api.whatsapp.com/send?phone=6289674688407&text=Selamat%20siang%20bapak/ibu,%20saya%20XXXXXX%20dari%20pihak%20Kelurahan%20Telaga%20Asih.%20Ingin%20menginformasikan%20bahwa%20pencetakan%20surat%20sudah%20selesai%20dilakukan.%20Harap%20untuk%20
			datang%20ke%20Kelurahan%20untuk%20proses%20pengambilan%20surat.%20Terimakasih."><img border="0" data-original-height="1410" data-original-width="1400" height="50" src="https://cdn.icon-icons.com/icons2/2201/PNG/512/whatsapp_logo_icon_134017.png" width="50" /></a>	</form>
		</div>