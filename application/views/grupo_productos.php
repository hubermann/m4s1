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
<body id="grupo_de_productos">

<?php include_once('includes_front/header.php'); ?>

<section id="main_content" class="container">

<?php include_once('includes_front/menu_dos.php'); ?>


<div class="row">
	<div class="col-lg-12">
		<h2 class="orange">Grupo de productos</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime nam tenetur vero dolor blanditiis possimus vitae at, voluptates, officia quibusdam aut perferendis nisi, dolorem corporis id fuga consequuntur libero provident.</p>
	</div>
</div>

<div class="row"><!-- row #1 -->
	
	
<?php  

if($productos){

	foreach ($productos as $producto) {
		# traigo las imagenes para armar el slider
		
		$imagenes_producto=$this->imagenes_producto->imagenes_producto($producto->id);

		$listado_imagenes="";
		$listado_bullets="";
		$count=0;
		foreach ($imagenes_producto->result() as $imagen_producto) {
			#slider de cada producto
			if($count==0){$item_activo ="active";}else{$item_activo ="";}
			$listado_imagenes .= '
			
			<div class="item '.$item_activo.'">
			<img src="'.base_url('images-productos/'.$imagen_producto->filename).'" alt="'.$producto->titulo.'" class="responsive">
			<div class="carousel-caption">
				<a href="'.base_url('producto-detalle/'.$producto->id).'">'.$producto->titulo.'</a>
			</div>
			</div>';

			$listado_bullets .= '
			<li data-target="#carousel-prod'.$producto->id.'" data-slide-to="'.$count.'" class="'.$item_activo.'"></li>';
			$count++;
		}

		echo '
		<div class="col-md-4">
				
			<div class="carousel slide" data-ride="carousel" id="carousel-prod'.$producto->id.'">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			'.$listado_bullets.'
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">

			'.$listado_imagenes.'


			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-prod'.$producto->id.'" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>

			<a class="right carousel-control" href="#carousel-prod'.$producto->id.'" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
		</div> 


</div><!-- fin col-md-4 #1 -->
			';


	}

}

?>




	




</section><!-- end #main_content -->

<?php include_once('includes_front/footer.php'); ?>



</body>
<script>
	$('.carousel').carousel({
  interval: 2000
});
	
</script>
</html>