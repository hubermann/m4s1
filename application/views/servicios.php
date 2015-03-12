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
	
		
	


	<div class="carousel slide" data-ride="carousel" id="carousel-servicios">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-servicios" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-servicios" data-slide-to="1"></li>
    <li data-target="#carousel-servicios" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
	
	<?php  
		if($sliders_servicios->result()){
			
			$counter=1;

			foreach ($sliders_servicios->result() as $imagen_slider) {
				$item_activo ="";
				if($counter ==1){$item_activo ="active";}
				echo '
				<div class="item '.$item_activo.'">
				<img src="'.base_url('images-slider_servicios/'.$imagen_slider->filename).'" alt="img" class="responsive">
				<div class="carousel-caption">

				</div>
				</div>
				';
				$counter++;
			}

		}
	?>
    

    
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-servicios" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-servicios" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 

</div>

</div><!-- imagen cabecera -->


<div class="row iconos_servicios">
<?php 


if(!empty($servicios->result())){

	$count = 1;
	foreach ($servicios->result() as $servicio) {


		//si no tiene imagen principal linkeo por el nombre
		if($servicio->filename==""){
			$imagen_servicio_nombre='<div class="thumbnail align_center">'.$servicio->nombre.'</div>';
		}else{
			$imagen_servicio_nombre ='<img src="'.base_url('images-servicios/'.$servicio->filename).'" alt="" class="img-responsive">';
		}
		# code...
		$servicio_data="";
		if($servicio->nombre !="" ){
			$servicio_data='<a href="'.base_url('servicio/'.$servicio->slug.'/'.$servicio->id).'">'.$imagen_servicio_nombre.'</a>';
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