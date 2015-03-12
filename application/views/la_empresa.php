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
<body id="la_empresa">

<?php include_once('includes_front/header.php'); ?>

<section id="main_content" class="container">


<?php include_once('includes_front/menu_dos.php'); ?>

<div class="row">
	
<div id="#wrapp_carousel_la_empresa">

<div class="carousel slide" data-ride="carousel" id="carousel-la-empresa">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-la-empresa" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-la-empresa" data-slide-to="1"></li>
    <li data-target="#carousel-la-empresa" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
	
	<?php  
		if($imagenes_slider->result()){
			
			$counter=1;

			foreach ($imagenes_slider->result() as $imagen_slider) {
				$item_activo ="";
				if($counter ==1){$item_activo ="active";}
				echo '
				<div class="item '.$item_activo.'">
				<img src="'.base_url('images-laempresa/'.$imagen_slider->filename).'" alt="img" class="responsive">
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
  <a class="left carousel-control" href="#carousel-la-empresa" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-la-empresa" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 


</div><!-- end #wrapp_carousel_la_empresa -->
</div>


<div class="row" id="maderera_pinar">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<h2 class="orange"><?php echo $info->titulo; ?></h2>
		<p><?php echo $info->texto_principal; ?></p>
		
	</div>
	<div class="col-md-1"></div>
</div>
	
<div class="row" id="nuestros_valores">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="bg_gris">
			<div class="inside">
				<h2 class="green"><?php echo $info->titulo_secundario; ?></h2>
				<p><?php echo $info->texto_secundario; ?></p>
		
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>



<div class="row" id="mision_objetivos">
	<div class="col-md-1"></div>
	<div class="col-md-5">
	
		<h2 class="green align_center"><i class="fa fa-fighter-jet fa-2x "></i> <br><?php echo $info->titulo_texto1; ?></h2>
		<p><?php echo $info->texto1; ?></p>
	</div>
	<div class="col-md-5">
		<h2 class="green align_center"><i class="fa fa-bullseye fa-2x"></i> <br><?php echo $info->titulo_texto2; ?></h2>
		<p><?php echo $info->texto2; ?></p>
	</div>
	<div class="col-md-1"></div>
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