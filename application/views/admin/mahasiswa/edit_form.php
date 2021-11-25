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

				<?php if ($this->session->flashdata('berhasill')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('berhasil'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/DataMahasiswa/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<?php echo form_open_multipart('admin/DataMahasiswa/edit'); ?>
							<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/DataMahasiswa/edit/ID --->
							
							<input type="hidden" name="id" value="<?php echo $mahasiswa->id_mahasiswa?>" />
							
							<div class="form-group">
								<label for="nama_mahasiswa">Nama Mahasiswa</label>
								<input class="form-control <?php echo form_error('nama_mahasiswa') ? 'is-invalid':'' ?>" type="text" name="nama_mahasiswa" placeholder="Nama Mahasiswa" value="<?php echo $mahasiswa->nama_mahasiswa ?>" />
								 <div class="invalid-feedback">
									<?php echo form_error('nama_mahasiswa') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="text" name="email" placeholder="Email" value="<?php echo $mahasiswa->email ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="password">Password</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" type="password" name="password" placeholder="Password" value="<?php echo $mahasiswa->password ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<div>
								 	<input type="radio" name="kelas" value="TI-A"> TI-A
								 	<input type="radio" name="kelas" value="TI-B"> TI-B
								 	<input type="radio" name="kelas" value="TI-C"> TI-C
								 	<input type="radio" name="kelas" value="AKUN-A"> AKUN-A
								 	<input type="radio" name="kelas" value="AKUN-B"> AKUN-B
								 	<input type="radio" name="kelas" value="AKUN-C"> AKUN-C
								 	<input type="radio" name="kelas" value="THP-A"> THP-A
								 	<input type="radio" name="kelas" value="THP-B"> THP-B
								 	<input type="radio" name="kelas" value="THP-C"> THP-C
								</div>
								<div class="invalid-feedback">
									<?php echo form_error('kelas') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="jurusan">Jurusan</label>
								<div>
									<select name="jurusan">
										<option value="ti">Teknik Informatika</option>
										<option value="akuntansi">Akuntansi</option>
										<option value="thp">Teknologi Hasil Pertanian</option>
									</select>
								</div>
								<div class="invalid-feedback">
									<?php echo form_error('jurusan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="organisasi">Organisasi</label>
								<div>
									<input type="checkbox" name="organisasi" value="BEM,DEMA,HIMA"> BEM,DEMA,HIMA
									<input type="checkbox" name="organisasi" value="BEM,DEMA"> BEM,DEMA
									<input type="checkbox" name="organisasi" value="BEM,HIMA"> BEM,HIMA
									<input type="checkbox" name="organisasi" value="DEMA,HIMA"> DEMA,HIMA
									<input type="checkbox" name="organisasi" value="BEM"> BEM
									<input type="checkbox" name="organisasi" value="DEMA"> DEMA
									<input type="checkbox" name="organisasi" value="HIMA"> HIMA
								</div>
								<div class="invalid-feedback">
									<?php echo form_error('organisasi') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="foto">Foto</label>
								<input class="form-control <?php echo form_error('foto') ? 'is-invalid' : '' ?>" type="file" name="foto" placeholder="foto" />
								<div class="invalid-feedback">
									<?php echo form_error('foto') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="penjelasan">Penjelasan</label>
								<textarea class="form-control <?php echo form_error('penjelasan') ? 'is-invalid':'' ?>"
								 name="penjelasan" placeholder="Penjelasan"><?php echo $mahasiswa->penjelasan ?></textarea>
								<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
            					<script>CKEDITOR.replace( 'penjelasan' );</script>
								<div class="invalid-feedback">
									<?php echo form_error('penjelasan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="tanggal">Tanggal</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								type="date" name="tanggal" placeholder="Tanggal" value="<?php echo $mahasiswa->tanggal ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						<?php echo form_close(); ?>

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
