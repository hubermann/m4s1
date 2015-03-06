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
<body id="sucursales">

<?php include_once('includes_front/header.php'); ?>

<section id="main_content" class="container">

<?php include_once('includes_front/menu_dos.php'); ?>


<div class="row">
	<div class="col-lg-12">
		<h2 class="orange">Sucursales</h2>
	</div>
</div>



<div class="row"><!-- row #1 -->
	

<?php 

if($sucursales->result()){
	foreach ($sucursales->result() as $sucursal) {

		$mapa="";
		if($sucursal->mapa!=""){$mapa=$sucursal->mapa;}
		$nombre="";
		if($sucursal->nombre!=""){$nombre=$sucursal->nombre;}
		$localidad="";
		if($sucursal->localidad!=""){$localidad=$sucursal->localidad;}
		$direccion="";
		if($sucursal->direccion!=""){$direccion=$sucursal->direccion;}
		$telefono="";
		if($sucursal->telefono!=""){$telefono=$sucursal->telefono;}
		$mail="";
		if($sucursal->mail!=""){$mail=$sucursal->mail;}
		$horario="";
		if($sucursal->horario!=""){$horario=$sucursal->horario;}

		# code...
		echo '
		<div class="col-md-4"><!-- suc 1 -->
		
			<div class="thumbnail">
				'.$mapa.'
			</div>
			
			<h2 class="green">'.$nombre.' <br><span class="orange">'.$localidad.'</span></h2>

			<ul id="datos_sucursal">
				<li><i class="fa fa-plus-square fa-2x"></i> '.$direccion.'</li>
				<li><i class="fa fa-phone-square fa-2x"></i> '.$telefono.'</li>
				<li><i class="fa fa-envelope fa-2x"></i> '.$mail.'</li>
				<li><i class="fa fa-clock-o fa-2x"></i> '.$horario.'</li>
			</ul>

		</div><!-- fin suc 1-->
		';

	} 
}

?>

	
</div> <!-- fin row #1 -->

<div class="row">
	<!-- /////////////////////////////ROW-DIVISION/////////////////////////// -->
	<div class="col-lg-12"><hr></div>
</div>


<div class="row"><!-- row #2 -->
	
	
	<form action="#" id="form_contacto">

		<div class="col-md-12">
			<select name="sucursal" id="">
				<option value="Pilar">Pilar</option>
				<option value="Munro">Munro</option>
				<option value="Quilmes">Quilmes</option>
			</select>
		</div>

		
		
		<div class="col-md-6">
			
			<input type="text" name="nombre" placeholder="Ingrese su Nombre" />
			<input type="text" name="telefono" placeholder="Ingrese su Telefono" />
		</div>
		<div class="col-md-6">
			<input type="text" name="apellido" placeholder="Ingrese su Apellido" />
			<input type="text" name="email" placeholder="Ingrese su Email" />
		</div>
	<div class="col-lg-12">
		<textarea name="mensaje" id="" cols="30" rows="7"></textarea>
		<p id="wrapp_container"><button type="submit">Enviar</button>	</p>
	</div>
	</form>

	
	
</div> <!-- fin row #2 -->







</section><!-- end #main_content -->

<?php include_once('includes_front/footer.php'); ?>



</body>
<script>
	$('.carousel').carousel({
  interval: 2000
});
	
</script>
</html>