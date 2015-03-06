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
<body id="servicios">

<?php include_once('includes_front/header.php'); ?>

<section id="main_content" class="container">


<?php include_once('includes_front/menu_dos.php'); ?>



<div class="row"><!-- imagen cabecera -->
	<div class="col-lg-12">
		<img src="<?php echo base_url('public_folder/images/1200x800.jpg'); ?>" alt="" class="responsive">
	</div>
</div><!-- imagen cabecera -->


<div class="row iconos_servicios">
<?php 

if(!empty($servicios->result())){

	$count = 1;
	foreach ($servicios->result() as $servicio) {
		# code...
		$servicio_data="";
		if($servicio->filename !="" ){
			$servicio_data='<img src="'.base_url('images-servicios/'.$servicio->filename).'" alt="" class="img-responsive">';
		}
		echo '
			<div class="col-lg-3">'.$servicio_data.'</div>
		';
		$count++;
		if($count==5){
			echo "</div><div class=\"row iconos_servicios\">"; $count=0;
		}

	}



}



?>

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