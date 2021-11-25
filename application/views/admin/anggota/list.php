<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/PencatatanRT/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama Kegiatan</th>
										<th>Keterangan</th>
										<th>Tanggal</th>
										<th>Kas Masuk</th>
										<th>Kas Keluar</th>
										<th>Total</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($PencatatanRT as $anggota): ?>
									<tr>
										<td width="200">
											<?php echo $anggota->nama_kegiatan ?>
										</td>
										<td class="small">
											<?php echo substr($anggota->keterangan, 0, 120) ?>...
										</td>
										<td width="200">
											<?php echo dateindo($anggota->tanggal) ?>
										</td>
										<td width="150">
											<?php echo rupiah($anggota->kas_masuk) ?>
										</td>
										<td width="150">
											<?php echo rupiah($anggota->kas_keluar) ?>
										</td>
										<td width="150">
											<?php echo rupiah($anggota->total) ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/PencatatanRT/edit/'.$anggota->id_kegiatan) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/PencatatanRT/delete/'.$anggota->id_kegiatan) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
