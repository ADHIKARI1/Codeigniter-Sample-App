<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<!-- to work with base_url edit this $autoload['helper'] = array('url'); -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	
</head>
<body>	
	<?php $this->view('layout/navbar'); ?>

	<div class="container">
		<div class="row">
		<div class="col-xl-3">
			<?php $this->view('users/login_view'); ?>
		</div>
		<div class="col-xl-9">
			<?php $this->view($main_view); ?>
		</div>
		</div>
	</div>
	
</body>
</html>