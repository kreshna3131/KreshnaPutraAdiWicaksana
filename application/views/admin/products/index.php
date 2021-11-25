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

                <h1>PRODUCTS</h1>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">

                        <div class="row col-lg-12">
                            <?php if(!empty($products)){ foreach($products as $row){ ?>
                                <div class="card col-lg-3">
                                    <img class="card-img-top" src="<?php echo base_url('uploads/product_images/'.$row['image']); ?>" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo rupiah($row["price"]) ?></h6>
                                        <p class="card-text"><?php echo $row["description"]; ?></p>
                                        <a href="<?php echo site_url('admin/Products/addToCart/'.$row['id']); ?>" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            <?php } }else{ ?>
                                <p>Product(s) not found...</p>
                            <?php } ?>
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
</body>

</html>
