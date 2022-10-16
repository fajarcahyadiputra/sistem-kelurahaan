<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pendatang</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-datang" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Kewarganegaraan</th>
						<th>JK</th>
						<th>Alamat Sementara</th>
						<th>Tanggal Datang</th>
						<th>Pendatang Dari</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT d.id_datang,  a.nik, a.nama as nama_pendatang, a.kewarganegaraan, a.jekel, a.desa, a.rt, a.rw, d.tgl_datang, d.dari, p.nama from 
			  tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend inner join tb_pdd a on a.id_pend=d.id_pdd");
              while ($data= $sql->fetch_assoc()) {
            	?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nik']; ?>
						</td>
						<td>
							<?php echo $data['nama_pendatang']; ?>
						</td>
						<td>
							<?php echo $data['kewarganegaraan']; ?>
						</td>
						<td>
							<?php echo $data['jekel']; ?>
						</td>
						<td>
							<?php echo $data['desa']; ?>
							RT
							<?php echo $data['rt']; ?>/ RW
							<?php echo $data['rw']; ?>.
						</td>
						<td>
							<?php echo $data['tgl_datang']; ?>
						</td>
						<td>
							<?php echo $data['dari']; ?>
						</td>
						<td>
							<a href="?page=edit-datang&kode=<?php echo $data['id_datang']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-datang&kode=<?php echo $data['id_datang']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
			</div>
		</div>
	</div>
	<!-- /.card-body -->