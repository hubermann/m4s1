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
<body id="servicio_detalle">

<?php include_once('includes_front/header.php'); ?>

<section id="main_content" class="container">

<?php include_once('includes_front/menu_dos.php'); ?>


<div class="row">
	<div class="col-lg-12"><h2>Optimizacion de corte</h2></div>
</div>

<div class="row">
	<div class="col-lg-8">
		
	<div class="carousel slide" data-ride="carousel" id="carrousel_detalle">
  	<!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#carrousel_detalle" data-slide-to="0" class="active"></li>
	    <li data-target="#carrousel_detalle" data-slide-to="1"></li>
	    <li data-target="#carrousel_detalle" data-slide-to="2"></li>
	  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="http://www.red-eng.com/UI/Images/CaseStudies/Nakheel-1200x400.jpg" alt="..." class="responsive">
      <div class="carousel-caption">
        
      </div>
    </div>

    <div class="item">
      <img src="http://www.amerondiewelle.com/content/user/29/images/08_PHE/Header%20(1200%20x%20400)/Meeting/phe_meetings_1200x400.jpg" alt="..." class="responsive">
      <div class="carousel-caption">
        
      </div>
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carrousel_detalle" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carrousel_detalle" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 

	</div><!-- end col-8 -->

	<div class="col-lg-4" id="info_sucursales">

	<h2 class="green">Maderera Pinar <br> <span class="orange">Pilar</span></h2>
	<p>Cno. Gral Belgrano 5051 - Florencio Varela</p>
	<p>Buenos Aires - Argentina</p>
	<p>Tel/Fax: 4210-0121 / 4881</p>
	<div class="line_orange_s"></div>

	<h2 class="green">Maderera Pinar <br> <span class="orange">Pilar</span></h2>
	<p>Cno. Gral Belgrano 5051 - Florencio Varela</p>
	<p>Buenos Aires - Argentina</p>
	<p>Tel/Fax: 4210-0121 / 4881</p>
	<div class="line_orange_s"></div>

	<h2 class="green">Maderera Pinar <br> <span class="orange">Pilar</span></h2>
	<p>Cno. Gral Belgrano 5051 - Florencio Varela</p>
	<p>Buenos Aires - Argentina</p>
	<p>Tel/Fax: 4210-0121 / 4881</p>
	<div class="line_orange_s"></div>

	</div><!-- end col-4 -->
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