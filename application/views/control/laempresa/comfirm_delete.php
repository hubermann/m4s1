<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_laempresa');
echo form_open(base_url('control/laempresa/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Titulo: <?php echo $query->titulo; ?></p>
 <p>Texto_principal: <?php echo $query->texto_principal; ?></p>
 <p>Texto_secundario: <?php echo $query->texto_secundario; ?></p>
 <p>Titulo_texto1: <?php echo $query->titulo_texto1; ?></p>
 <p>Texto1: <?php echo $query->texto1; ?></p>
 <p>Titulo_texto2: <?php echo $query->titulo_texto2; ?></p>
 <p>Texto2: <?php echo $query->texto2; ?></p>

<!--  -->
<div class="control-group">

<label class="checkbox inline">

<input type="checkbox" name="comfirm" id="comfirm" />
<p>Confirma eliminar?</p>
<?php echo form_error('comfirm','<p class="error">', '</p>'); ?>
 </label>
</div>
<!--  -->
<div class="control-group">
<button class="btn btn-danger" type="submit"><i class="icon-trash icon-large"></i> Eliminar</button>
</div>


</fieldset>

<?php echo form_close(); ?>