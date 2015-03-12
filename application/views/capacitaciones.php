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
<body id="capacitaciones">

<?php include_once('includes_front/header.php'); ?>

<section id="main_content" class="container">


<?php include_once('includes_front/menu_dos.php'); ?>


<div class="row iconos_servicios">
<div class="col-lg-12">
<h1>Capacitaciones</h1>
<?php 

$fecha = $this->uri->segment(2);
if(preg_match('/^\d{4}-\d{1,2}-\d{1,2}$/', $fecha)) {
    #fecha OK
    list($anio, $mes, $dia) = explode("-", $fecha);
	$fecha_separada = $anio."-".$mes."-".$dia;

	//MES EN CURSO
	switch ($mes) {
		case 12:
			$mes_en_curso ="Diciembre"; 
			break;
		case 11:
			$mes_en_curso ="Noviembre"; 
			break;
		case 10:
			$mes_en_curso ="Octubre";
			break;
		case 9:
			$mes_en_curso ="Septiembre";
			break;
		case 8:
			$mes_en_curso ="Agosto";
			break;
		case 7:
			$mes_en_curso ="Julio";
			break;
		case 6:
			$mes_en_curso ="Junio";
			break;
		case 5:
			$mes_en_curso ="Mayo";
			break;
		case 4:
			$mes_en_curso ="Abril";
			break;
		case 3:
			$mes_en_curso ="Marzo"; 
			break;
		case 2:
			$mes_en_curso ="Febrero"; 
			break;
		case 1:
			$mes_en_curso ="Enero"; 
			break;
		
	}

	//SIGUIENTE
	$anio_link_siguiente = $anio;
	$mes_link_siguiente = $mes +1;

	if($mes_link_siguiente==13){$mes_link_siguiente=1; $anio_link_siguiente = $anio_link_siguiente+1;}


	//ANTERIOR
	$anio_link_anterior = $anio;
	$mes_link_anterior = $mes -1;
	
	if( $mes_link_anterior==0){$mes_link_anterior=12; $anio_link_anterior = $anio_link_anterior-1;}

	
	switch ($mes_link_anterior) {
		case 12:
			$mes_link_anterior = '12';$titulomes ="Diciembre"; $meses_anteriores = ['Diciembre','Noviembre', 'Octubre', 'Septiembre', 'Agosto'];
			break;
		case 11:
			$mes_link_anterior = '11';$titulomes ="Noviembre"; $meses_anteriores = ['Noviembre','Octubre', 'Septiembre', 'Agosto', 'Julio'];
			break;
		case 10:
			$mes_link_anterior = '10';$titulomes ="Octubre"; $meses_anteriores = [ 'Octubre','Septiembre', 'Agosto', 'Julio', 'Junio'];
			break;
		case 9:
			$mes_link_anterior = '09';$titulomes ="Septiembre"; $meses_anteriores = [ 'Septiembre','Agosto', 'Julio', 'Junio', 'Mayo'];
			break;
		case 8:
			$mes_link_anterior = '08';$titulomes ="Agosto"; $meses_anteriores = [  'Agosto','Julio', 'Junio', 'Mayo', 'Abril'];
			break;
		case 7:
			$mes_link_anterior = '07';$titulomes ="Julio"; $meses_anteriores = [ 'Julio','Junio', 'Mayo', 'Abril', 'Marzo'];
			break;
		case 6:
			$mes_link_anterior = '06';$titulomes ="Junio"; $meses_anteriores = [ 'Junio','Mayo', 'Abril', 'Marzo', 'Febrero'];
			break;
		case 5:
			$mes_link_anterior = '05';$titulomes ="Mayo"; $meses_anteriores = [ 'Mayo','Abril', 'Marzo', 'Febrero', 'Enero'];
			break;
		case 4:
			$mes_link_anterior = '04';$titulomes ="Abril"; $meses_anteriores = [ 'Abril','Marzo', 'Febrero', 'Enero', 'Diciembre'];
			break;
		case 3:
			$mes_link_anterior = '03';$titulomes ="Marzo"; $meses_anteriores = [ 'Marzo','Febrero', 'Enero', 'Diciembre', 'Noviembre'];
			break;
		case 2:
			$mes_link_anterior = '02';$titulomes ="Febrero"; $meses_anteriores = [ 'Febrero','Enero', 'Diciembre', 'Noviembre', 'Octubre'];
			break;
		case 1:
			$mes_link_anterior = '01';$titulomes ="Enero"; $meses_anteriores = ['Enero','Diciembre', 'Noviembre', 'Octubre', 'Septiembre'];
			break;
		
	}
	
	$mes_link_anterior = '<a href="'.base_url('capacitaciones/'.$anio_link_anterior.'-'.$mes_link_anterior.'-01').'"><i class="fa fa-2x fa-arrow-circle-left"></i></a>';



	//siguiente
	
	switch ($mes_link_siguiente) {
		case 12:
			$mes_link_siguiente = '12';$titulomes ="Diciembre"; $meses_siguientes = ['Diciembre'];
			break;
		case 11:
			$mes_link_siguiente = '11';$titulomes ="Noviembre"; $meses_siguientes = ['Noviembre'];
			break;
		case 10:
			$mes_link_siguiente = '10';$titulomes ="Octubre"; $meses_siguientes = [ 'Octubre'];
			break;
		case 9:
			$mes_link_siguiente = '09';$titulomes ="Septiembre"; $meses_siguientes = [ 'Septiembre'];
			break;
		case 8:
			$mes_link_siguiente = '08';$titulomes ="Agosto"; $meses_siguientes = [  'Agosto'];
			break;
		case 7:
			$mes_link_siguiente = '07';$titulomes ="Julio"; $meses_siguientes = [ 'Julio'];
			break;
		case 6:
			$mes_link_siguiente = '06';$titulomes ="Junio"; $meses_siguientes = [ 'Junio'];
			break;
		case 5:
			$mes_link_siguiente = '05';$titulomes ="Mayo"; $meses_siguientes = [  'Mayo'];
			break;
		case 4:
			$mes_link_siguiente = '04';$titulomes ="Abril"; $meses_siguientes = ['Abril'];
			break;
		case 3:
			$mes_link_siguiente = '03';$titulomes ="Marzo"; $meses_siguientes = [ 'Marzo'];
			break;
		case 2:
			$mes_link_siguiente = '02';$titulomes ="Febrero"; $meses_siguientes = [ 'Febrero'];
			break;
		case 1:
			$mes_link_siguiente = '01';$titulomes ="Enero"; $meses_siguientes = [ 'Enero',];
			break;
		
	}

	$anteriores ="";
	foreach (array_reverse($meses_anteriores)  as $meses_pasados) {
		$anteriores .= '<span class="meses_anteriores">'.$meses_pasados.'</span>';
	}

	$mes_link_siguiente = '<a href="'.base_url('capacitaciones/'.$anio_link_siguiente.'-'.$mes_link_siguiente.'-01').'"><i class="fa fa-2x fa-arrow-circle-right"></i></a>';


	//BARRA NAVEGACION
	echo '
	<p id="navegacion_capacitaciones"> '.$anteriores.' '.$mes_link_anterior.' <span id="mes_en_curso"> '.$mes_en_curso.'</span> '.$mes_link_siguiente .' '.$meses_siguientes[0].'</p>
	';

	$capacitaciones = $this->capacitacion->get_by_date($anio, $mes);
	if($capacitaciones->result()){
			
		foreach ($capacitaciones->result() as $capacitacion) {
			list($anio, $mes, $dia) = explode("-", $capacitacion->fecha);
			echo '<div class="row cuadro_capacitacion">
			<div class="col-lg-12"><hr></div>
				<div class="col-lg-2 dia_capacitacion">
					'.$dia.'
				</div>
				<div class="col-lg-10">
					<h2>'.$capacitacion->titulo.'</h2>
					<p>'.$capacitacion->descripcion.' </p>
				</div>
				
			</div>';

		}



	}else{
		echo '<div class="col-lg-12">
				<h4 class="sin_capacitaciones">Sin capacitaciones programadas para esta fecha.</h4>
			  </div>';
	}



}else{;
	$hoy = date("Y-m-01");
	redirect('capacitaciones/'.$hoy);
}



?>



</div>
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