<script>
	function show_preview(input) {
	if (input.files && input.files[0]) {
	var reader = new FileReader();
	reader.onload = function (e) {
	$('#previewImg').html('<img src="'+e.target.result+'" width="140" />' );
	}
	reader.readAsDataURL(input.files[0]);
	}
}
</script>

<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_novedad');
echo form_open_multipart(base_url('control/novedades/create/'),$attributes);

echo form_hidden('novedad[id]');

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">


<!-- Text input-->
<!--
<div class="control-group">
<label class="control-label">Categoria</label>
	<div class="controls">
		
		<select name="categoria_id" id="categoria_id">
		<?php  
		/*
		$categorias = $this->Categoria->get_records_menu();
		if($categorias){

			foreach ($categorias->result() as $value) {
				echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
			}
		}
		*/
		?>
		</select>

		<?php echo form_error('categoria_id','<p class="error">', '</p>'); ?>
	</div>
</div>
-->
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Fecha</label>
			<div class="controls">
			<input value="<?php echo set_value('fecha'); ?>" class="form-control" type="text" name="fecha" id="fecha" />
			<?php echo form_error('fecha','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Titulo</label>
			<div class="controls">
			<input value="<?php echo set_value('titulo'); ?>" class="form-control" type="text" name="titulo" />
			<?php echo form_error('titulo','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Descripcion</label>
			<div class="controls">
			<textarea name="descripcion" id="descripcion" class="form-control"><?php echo set_value('descripcion'); ?></textarea>
			<?php echo form_error('descripcion','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<!-- <div class="control-group">
			<label class="control-label">Tags</label>
			<div class="controls">
			<input value="<?php echo set_value('tags'); ?>" class="form-control" type="text" name="tags" />
			<?php echo form_error('tags','<p class="error">', '</p>'); ?>
			</div>
			</div> -->
			
			<!-- Text input-->
			<div class="control-group">
				<label class="control-label">Imagen</label>
				<div class="controls">
				<div id="previewImg"></div>
				<input value="<?php echo set_value('filename'); ?>" type="file" class="form-control" name="filename" onchange="show_preview(this)"/>
				<?php echo form_error('filename','<p class="error">', '</p>'); ?>
				</div>
			</div>



<div class="control-group">
<label class="control-label"></label>
	<div class="controls">
		<button class="btn" type="submit">Crear</button>
	</div>
</div>



</fieldset>

<?php echo form_close(); ?>

</div>


<script type="text/javascript">
    CKEDITOR.replace( 'descripcion');
	$('#fecha').datepicker({
      format: 'dd-mm-yyyy',
    });

</script>