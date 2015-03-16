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
<body id="novedades">

<?php include_once('includes_front/header.php'); ?>

<section id="main_content" class="container">

<?php include_once('includes_front/menu_dos.php'); ?>


<div class="row">
	<div class="col-lg-12">
		<h2 class="orange">Novedades</h2>
	</div>
</div>

<div class="row"><!-- row #1 -->
<?php  

if(!empty($novedades)){

	foreach ($novedades as $novedad) {
		
		$imagen = "";
		if(!empty($novedad->filename)){$imagen ='<img src="'.base_url('images-novedades/'.$novedad->filename).'" alt="..." />';}
		
		
		echo '
			<div class="col-md-6">

			<div class="thumbnail">
			'.$imagen.'
			<div class="caption post-content">

			<a href="'.base_url('novedades/'.$novedad->slug.'/'.$novedad->id).'"><h3>'.$novedad->titulo.'</h3></a> 

			</div>
			</div>

			</div>
		';
		

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