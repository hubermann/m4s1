<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Masisa</title>
	<link rel="stylesheet" href="<?php echo base_url('public_folder/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public_folder/css/front.css'); ?>">

	<!--  JavaScript -->
	<script src="<?php echo base_url('public_folder/js/vendor/jquery-1.11.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('public_folder/js/bootstrap.js'); ?>"></script>
	

</head>
<body id="inicio">

<?php include_once('includes_front/header.php'); ?>

<section id="main_content" class="container">

	<?php include_once('includes_front/menu_dos.php'); ?>

	<div class="row"><!-- video y thumbs productos -->
		<div class="col-md-6">
			VIDEO HERE
		</div>
		<div class="col-md-6 no-gutter" id="grupo_productos">
			<div class="col-md-6">
        <img src="<?php echo base_url('public_folder/ejemplos/prod_home.png'); ?>" alt="" class="img-responsive">
        <div class="caption post-content"><hgroup><h3>Placas <br>de madera</h3></hgroup></div>
      </div>
			<div class="col-md-6">
        <img src="<?php echo base_url('public_folder/ejemplos/prod_home.png'); ?>" alt="" class="img-responsive">
        <div class="caption post-content"><hgroup><h3>Placas <br>de madera</h3></hgroup></div>
      </div>
      <div class="col-md-6">
        <img src="<?php echo base_url('public_folder/ejemplos/prod_home.png'); ?>" alt="" class="img-responsive">
        <div class="caption post-content"><hgroup><h3>Placas <br>de madera</h3></hgroup></div>
      </div>
      <div class="col-md-6">
        <img src="<?php echo base_url('public_folder/ejemplos/prod_home.png'); ?>" alt="" class="img-responsive">
        <div class="caption post-content"><hgroup><h3>Placas <br>de madera</h3></hgroup></div>
      </div>
      <div class="col-md-6">
        <img src="<?php echo base_url('public_folder/ejemplos/prod_home.png'); ?>" alt="" class="img-responsive">
        <div class="caption post-content"><hgroup><h3>Placas <br>de madera</h3></hgroup></div>
      </div>
      <div class="col-md-6">
        <img src="<?php echo base_url('public_folder/ejemplos/prod_home.png'); ?>" alt="" class="img-responsive">
        <div class="caption post-content"><hgroup><h3>Placas <br>de madera</h3></hgroup></div>
      </div>
		</div>
	</div><!-- end video y thumbs productos -->
	

	<div class="row"><!-- titulo Servicios -->
		<div class="col-lg-12">
			<h2 class="orange">Nuestros servicios</h2>
			<div class="line_orange"></div>
		</div>
	</div><!-- end titulo Servicios -->
	<div class="row seven-cols no-gutters"><!-- thumbs Servicios  -->
			<?php  
        if(!empty($servicios->result())){

          foreach ($servicios->result() as $servicio) {
            
            echo '<div class="col-md-1"><a href="'.base_url('servicio/'.$servicio->slug.'/'.$servicio->id).'">
            <img src="'.base_url('images-servicios/'.$servicio->filename).'" alt="'.$servicio->nombre.'" class="img-responsive"></a></div>';
          }

        }
      ?>
				
			  
	     </div><!-- end thumbs Servicios -->

	<div class="row"><!-- slider novedades y productos -->
		<div class="col-md-6"><!-- novedades -->
			<h2 class="orange">Novedades</h2>
			<div class="line_orange"></div>
<div id="carousel-novedades" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="http://www.red-eng.com/UI/Images/CaseStudies/Nakheel-1200x400.jpg" alt="..." class="responsive">
      <div class="carousel-caption">
        otro lorem ipsum
      </div>
    </div>
    <div class="item">
      <img src="http://www.amerondiewelle.com/content/user/29/images/08_PHE/Header%20(1200%20x%20400)/Meeting/phe_meetings_1200x400.jpg" alt="..." class="responsive">
      <div class="carousel-caption">
        lorem ipsum
      </div>
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		</div><!-- fin novedades -->

		<div class="col-md-6"><!-- productos -->
			<h2 class="orange">Productos destacados</h2>
			<div class="line_orange"></div>
			<div id="carousel-productos" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="http://www.red-eng.com/UI/Images/CaseStudies/Nakheel-1200x400.jpg" alt="..." class="responsive">
      <div class="carousel-caption">
        otro lorem ipsum
      </div>
    </div>
    <div class="item">
      <img src="http://www.amerondiewelle.com/content/user/29/images/08_PHE/Header%20(1200%20x%20400)/Meeting/phe_meetings_1200x400.jpg" alt="..." class="responsive">
      <div class="carousel-caption">
        lorem ipsum
      </div>
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
		</div><!-- fin productos -->
	</div><!-- slider novedades y productos -->
	
</section><!-- end #main_content -->

<?php include_once('includes_front/footer.php'); ?>



</body>
<script>
	$('#carousel-novedades').carousel({
  interval: 2000
});
	$('#carousel-productos').carousel({
  interval: 2000
});
</script>
</html>