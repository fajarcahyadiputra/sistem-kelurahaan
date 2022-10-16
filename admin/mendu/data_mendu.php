<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kematian</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-mendu" class="btn btn-primary">
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
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Sebab</th>
						<th>Alamat</th>
						<th>Pekerjaan</th>
						<th>Tempat Tanggal Lahir</th>
						<th>Agama</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT p.id_pend, p.nik, p.pekerjaan, p.agama, p.tempat_lh, p.tgl_lh, p.desa, p.rt, p.rw, p.nama,m.jam, m.tgl_mendu, m.sebab, m.id_mendu from 
			  tb_mendu m inner join tb_pdd p on p.id_pend=m.id_pdd");
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
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['tgl_mendu']; ?>
						</td>
						<td>
							<?php echo $data['jam']; ?>
						</td>
						<td>
							<?php echo $data['sebab']; ?>
						</td>
						<td>
							<?php echo $data['desa'].", ".$data['rt']."/".$data['rw'] ?>
						</td>
						<td>
							<?php echo $data['pekerjaan']; ?>
						</td>
						<td>
							<?php echo $data['tempat_lh']. ", ". $data['tgl_lh']; ?>
						</td>
						<td>
							<?php echo $data['agama']; ?>
						</td>
						<td>
							<a href="?page=edit-mendu&kode=<?php echo $data['id_mendu']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-mendu&kode=<?php echo $data['id_pend']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
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