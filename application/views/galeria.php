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
<body id="galeria">

<?php include_once('includes_front/header.php'); ?>

<section id="main_content" class="container">

<?php include_once('includes_front/menu_dos.php'); ?>


<div class="row">
	<div class="col-lg-12">
		<h2 class="orange">Galeria de imagenes</h2>
	</div>
</div>

<div class="row"><!-- row #1 -->
<?php  

if(!empty($imagenes)){

	foreach ($imagenes as $imagen) {
		
		
		if(!empty($imagen->filename)){$imagen ='<img src="'.base_url('images-galerias/'.$imagen->filename).'" alt="..." />';}
		
		
		echo '
			<div class="col-md-6">

			<div class="thumbnail">
			'.$imagen.'
			<div class="caption post-content">

			<a href="#"></a> 

			</div>
			</div>

			</div>
		';
		
		$imagen = "";
	}

}
?>


	

	
</div> <!-- fin row  -->





</section><!-- end #main_content -->

<?php include_once('includes_front/footer.php'); ?>



</body>
<script>
	$('.carousel').carousel({
  interval: 2000
});
	
</script>
</html>