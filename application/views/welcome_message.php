<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Masisa</title>
	<link rel="stylesheet" href="<?php echo base_url('public_folder/css/bootstrap.min.css'); ?>">

	<!--  JavaScript -->
	<script src="<?php echo base_url('public_folder/js/vendor/jquery-1.11.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('public_folder/js/bootstrap.js'); ?>"></script>
	<style>
	body{background: #018249;}
	header{margin-bottom: 1em;}

	.green{color: #018249;}
	.orange{color: #f28e1c;}
	.line_orange{width: 100%; float: left; border-bottom: 2px solid  #f28e1c; margin:.6em 0 .6em 0; }
	#main_content{background: #fff; }
	#menu_uno li{float: left; list-style: none;}
	#menu_uno li a{padding-left: 1em; padding-bottom: .5em; padding-top: .5em; color: #fff;}

	
	#menu_dos{margin-top: 1em;}
	#menu_dos li{float: left; list-style: none;}
	#menu_dos li a{padding: .5em .8em;  color: #018249;}
	#menu_dos li a:hover{padding: .5em .8em; background:#018249;  color: #FFF;}

	.no-gutter [class*="-6"] {
    	padding:0;
	}

	.no-gutter [class*="-12"] {
    	padding:0;
	}

	footer h4{color: #FFF;}
	#footer_servicios_links, #footer_productos_links{color: #fff; float: left; width:100%; list-style: none;}

/* COLUMNAS DE 7 SERVICIOS */
@media (min-width: 768px){
  .seven-cols .col-md-1,
  .seven-cols .col-sm-1,
  .seven-cols .col-lg-1  {
    width: 100%;
    *width: 100%;
  }
}

@media (min-width: 992px) {
  .seven-cols .col-md-1,
  .seven-cols .col-sm-1,
  .seven-cols .col-lg-1 {
    width: 14.285714285714285714285714285714%;
    *width: 14.285714285714285714285714285714%;
  }
}


@media (min-width: 1200px) {
  .seven-cols .col-md-1,
  .seven-cols .col-sm-1,
  .seven-cols .col-lg-1 {
    width: 14.285714285714285714285714285714%;
    *width: 14.285714285714285714285714285714%;
  }
}


	</style>
</head>
<body>
<header class="container">
	<div class="row">
		<div class="col-md-12">logo Placacentro</div>
		<div class="col-md-12">
		<!-- Menu uno -->
		<nav id="menu_uno" class="pull-right">
			<ul>
				<li><a href="#">link</a></li>
				<li><a href="#">link</a></li>
				<li><a href="#">link</a></li>
				<li><a href="#">link</a></li>
			</ul>
		</nav>
		</div>
	</div>
</header>


<section id="main_content" class="container">

	<div class="row"><!-- menu y titulo -->
		<div class="col-md-5"><h2 class="green">Maderera Pinar</h2></div>
		<div class="col-md-7">
			<!-- Menu dos -->
			<nav id="menu_dos" class="pull-right">
				<ul>
					<li><a href="#">link</a></li>
					<li><a href="#">link</a></li>
					<li><a href="#">link</a></li>
					<li><a href="#">link</a></li>
				</ul>
			</nav>
		</div>
	</div><!-- end menu y titulo -->

	<div class="row"><!-- video y thumbs productos -->
		<div class="col-md-6">
			VIDEO HERE
		</div>
		<div class="col-md-6 no-gutter">
			<div class="col-md-6"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
			<div class="col-md-6"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
			<div class="col-md-6"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
			<div class="col-md-6"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
			<div class="col-md-6"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
			<div class="col-md-6"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
		</div>
	</div><!-- end video y thumbs productos -->
	

	<div class="row"><!-- titulo Servicios -->
		<div class="col-lg-12">
			<h2 class="orange">Nuestros servicios</h2>
			<div class="line_orange"></div>
		</div>
	</div><!-- end titulo Servicios -->
	<div class="row seven-cols"><!-- end thumbs Servicios  -->
			<div class="col-lg-12 no-gutter">
				<div class="col-md-1"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
			    <div class="col-md-1"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
			    <div class="col-md-1"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
			    <div class="col-md-1"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
			    <div class="col-md-1"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
			    <div class="col-md-1"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
			    <div class="col-md-1"><img src="http://www.veterinariaportalmayor.cl/wp-content/uploads/2013/12/Curar-una-herida-a-un-gato.jpg" alt="" class="img-responsive"></div>
			</div>
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
      <img src="..." alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="..." alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
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
      <img src="http://placehold.it/300x200" alt="..." class="responsive">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="http://placehold.it/300x200" alt="..." class="responsive">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
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


<footer class="container">
	<div class="row">
		<div class="col-md-3">
			<h4>Galeria de imagenes</h4>

		</div>
		<div class="col-md-3">
			<h4>Productos</h4>
			<ul id="footer_productos_links">
				<li><a href="#">Lorem ipsum</a></li>
				<li><a href="#">Lorem ipsum</a></li>
				<li><a href="#">Lorem ipsum</a></li>
				<li><a href="#">Lorem ipsum</a></li>
			</ul>
		</div>
		<div class="col-md-3">
			<h4>Servicios</h4>
			<ul id="footer_servicios_links">
				<li><a href="#">Lorem ipsum</a></li>
				<li><a href="#">Lorem ipsum</a></li>
				<li><a href="#">Lorem ipsum</a></li>
				<li><a href="#">Lorem ipsum</a></li>
			</ul>
		</div>
		<div class="col-md-3">
			<h4>Horarios y direccion</h4>
		</div>
	</div>
</footer>

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