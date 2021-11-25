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

				<?php if ($this->session->flashdata('success')): ?>
					<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
				
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/PencatatanRT/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/PencatatanRT/add') ?>" method="post" enctype="multipart/form-data" >
							
							<div class="form-group">
								<label for="nama_kegiatan">Nama Kegiatan</label>
								<input class="form-control <?php echo form_error('nama_kegiatan') ? 'is-invalid':'' ?>"
								 type="text" name="nama_kegiatan" placeholder="Nama Kegiatan" />
								 <div class="invalid-feedback">
									<?php echo form_error('nama_kegiatan') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name">Keterangan</label>
								<textarea class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>"
								 name="keterangan" placeholder="Keterangan...."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('keterangan') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="tanggal">Tanggal</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal" placeholder="Tanggal" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="kas_masuk">Kas Masuk</label>
								<input class="form-control <?php echo form_error('kas_masuk') ? 'is-invalid':'' ?>"
								 type="number" name="kas_masuk" placeholder="Kas Masuk" />
								<div class="invalid-feedback">
									<?php echo form_error('kas_masuk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="kas_keluar">Kas Keluar</label>
								<input class="form-control <?php echo form_error('kas_keluar') ? 'is-invalid':'' ?>"
								 type="number" name="kas_keluar" placeholder="Kas Keluar" />
								<div class="invalid-feedback">
									<?php echo form_error('kas_keluar') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="total">Total</label>
								<input class="form-control <?php echo form_error('total') ? 'is-invalid':'' ?>"
								 type="number" name="total" placeholder="Total" />
								<div class="invalid-feedback">
									<?php echo form_error('total') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
