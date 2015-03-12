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
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_producto');
echo form_open_multipart(base_url('control/productos/update/'),$attributes);

echo form_hidden('id', $query->id); 
?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">

 


<!-- Text input-->
<!--
<div class="control-group">
<label class="control-label">Categoria id</label>
	<div class="controls">
	<select name="categoria_id" id="categoria_id">
		<?php 
		/* 
		$categorias = $this->categoria->get_records_menu();
		if($categorias){

			foreach ($categorias as $value) {
				if($query->categoria_id == $value->id){$sel= "selected";}else{$sel="";}
				echo '<option value="'.$value->id.'" '.$sel.'>'.$value->nombre.'</option>';
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
			<label class="control-label">Titulo</label>
			<div class="controls">
			<input value="<?php echo $query->titulo; ?>" type="text" class="form-control" name="titulo" />
			<?php echo form_error('titulo','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Descripcion</label>
			<div class="controls">
			<textarea name="descripcion" id="descripcion" class="form-control"><?php echo $query->descripcion; ?></textarea>
			<?php echo form_error('descripcion','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input
			<div class="control-group">
			<label class="control-label">Tags</label>
			<div class="controls">
			<input value="<?php echo $query->tags; ?>" type="text" class="form-control" name="tags" />
			<?php echo form_error('tags','<p class="error">', '</p>'); ?>
			</div>
			</div> -->

			<!-- Text input-->
			<div class="checkbox">
		    <label>
		    <?php
		    if($query->destacado==1){
		    	$checked = "checked";
		    }else{
		    	$checked = "";
		    }
		    ?>
		      <input type="checkbox" name="destacado" id="destacado" <?php echo $checked; ?>> Producto Destacado
		    </label>
		  	</div>


		  	<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Adjunto</label>
			<div class="controls">

			<?php if($query->adjunto){
			echo '<p>Actual archivo adjunto: <a href="'.base_url('adjuntos-productos/'.$query->adjunto).'" target="_blank">'.$query->adjunto.'</a></p>';
			} ?>


			<input value="<?php echo set_value('adjunto'); ?>" type="file" class="form-control" name="adjunto" />
			<?php echo form_error('adjunto','<p class="error">', '</p>'); ?>
			</div>
			</div>


<div class="control-group">
	<label class="control-label">Portada <span class="small">(Nombre para la pagina de inicio )</span></label>
	<div class="controls">
	<div id="previewImg">
	<?php if($query->filename){
	echo '<p><img src="'.base_url('images-productos/'.$query->filename).'" width="140" /></p>';
	} ?>

</div>
	<input value="<?php echo set_value('filename'); ?>" type="file" class="form-control" name="filename" onchange="show_preview(this)"/>
	<?php echo form_error('filename','<p class="error">', '</p>'); ?>
	</div>
</div>
			

<div class="control-group">
<label class="control-label"></label>
	<div class="controls">
		<button class="btn" type="submit">Actualizar</button>
	</div>
</div>

</fieldset>

<?php echo form_close(); ?>

</div>
