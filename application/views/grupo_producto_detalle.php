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
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	
</head>
<body id="grupo_producto">

<?php include_once('includes_front/header.php'); ?>

<section id="main_content" class="container">

<?php include_once('includes_front/menu_dos.php'); ?>

<div class="row">

<div class="col-md-7">

<div id="carousel-productos" class="carousel slide" data-ride="carousel">
  



<?php  

$items_slider_list = "";
$thumbnails_list = "";
$count_list=1;
if($imagenes_producto->result()){

  echo '
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-productos" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-productos" data-slide-to="1"></li>
    <li data-target="#carousel-productos" data-slide-to="2"></li>
  </ol>
  ';

  foreach ($imagenes_producto->result() as $imagen_producto) {
    
    #thumbnails
    $thumbnails_list .= '<a><img src="'.base_url('images-productos/'.$imagen_producto->filename).'" alt="" onclick="view_image(\'item_number'.$count_list.'\');"></a>';
    
    # item del slider
    # paso en cada item un id qeu luego uso desde su thumbanil para quitar la clase "active"
    # y agregar el seleccionado como "active" para que sea el visible.
    $clase_para_activo = "";
    if($count_list==1){$clase_para_activo = "active";}//al primerlo lo pongo activo la primera vez}
    $items_slider_list .='<div class="item '.$clase_para_activo.'" id="item_number'.$count_list.'">
      <img src="'.base_url('images-productos/'.$imagen_producto->filename).'" alt="image" class="responsive">
      <div class="carousel-caption">
        
      </div>
    </div>';

    $count_list++;
  }

}

?>


   <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    
    <?php echo $items_slider_list; ?>
    
  </div>
<?php  

if($imagenes_producto->result()){

  echo '
  <!-- Controls -->
    <a class="left carousel-control" href="#carousel-productos" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-productos" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  ';
}

?>
    
</div>

</div><!-- end slider productos -->


	<div class="col-md-5" ><!-- Descripcion producto -->
    
    <?php  
    echo '<h2 class="orange">'.$producto->titulo.'</h2>
          <p>'.$producto->descripcion.'</p>';

    if(!empty($producto->adjunto)){
      echo '<p id="adjunto_producto"><a target="_blank"href="'.base_url('adjuntos-productos/'.$producto->adjunto).'">Descargar PDF</a></p>';
    }
    ?>


<div id="visualizador"></div>
<div id="thumbs_productos">

<?php  

echo $thumbnails_list;

?>

</div>

	</div><!-- end descripcion producto -->
</div>

</section><!-- end #main_content -->

<?php include_once('includes_front/footer.php'); ?>



</body>


<script>
  function view_image(item){
    console.log(item);
    var item_activo = document.getElementById(item);
    $('.active').removeClass('active');
    item_activo.setAttribute("class", "item active");
    

  }
</script>

</html>