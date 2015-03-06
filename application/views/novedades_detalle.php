<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Masisa</title>
	<link rel="stylesheet" href="<?php echo base_url('public_folder/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/css/font-awesome.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/css/front.css'); ?>">

	<!--  JavaScript -->
	<script src="<?php echo base_url('public_folder/js/vendor/jquery-1.11.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('public_folder/js/bootstrap.js'); ?>"></script>
	
</head>
<body id="novedades_detalle">

<?php include_once('includes_front/header.php'); ?>

<section id="main_content" class="container">

<?php include_once('includes_front/menu_dos.php'); ?>


<div class="row">
	<div class="col-lg-12">
	<img src="http://www.red-eng.com/UI/Images/CaseStudies/Nakheel-1200x400.jpg" alt="..." class="img-responsive">
		<div class="caption post-content">
			<h3>Lorem ipsum dolor sit amet</h3>
			<p>2012/12/12</p>
		</div>
	</div>
</div>

<div class="row" id="contenido_novedad">
	<div class="col-lg-12">
	<br>
	<p>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus excepturi doloremque, eligendi veniam ab nam dolorem nesciunt blanditiis, aut incidunt rerum unde earum quae ducimus repellat explicabo ea recusandae minima.
	
	</p>

	</div>
</div>

</section><!-- end #main_content -->

<?php include_once('includes_front/footer.php'); ?>



</body>
<script>
	$('.carousel').carousel({
  interval: 2000
});
	
</script>
</html>