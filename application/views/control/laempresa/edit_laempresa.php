<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_laempresa');
echo form_open_multipart(base_url('control/laempresa/update/'),$attributes);

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
			<label class="control-label">Texto_principal</label>
			<div class="controls">
			<input value="<?php echo $query->texto_principal; ?>" type="text" class="form-control" name="texto_principal" />
			<?php echo form_error('texto_principal','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Texto_secundario</label>
			<div class="controls">
			<input value="<?php echo $query->texto_secundario; ?>" type="text" class="form-control" name="texto_secundario" />
			<?php echo form_error('texto_secundario','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Titulo_texto1</label>
			<div class="controls">
			<input value="<?php echo $query->titulo_texto1; ?>" type="text" class="form-control" name="titulo_texto1" />
			<?php echo form_error('titulo_texto1','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Texto1</label>
			<div class="controls">
			<input value="<?php echo $query->texto1; ?>" type="text" class="form-control" name="texto1" />
			<?php echo form_error('texto1','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Titulo_texto2</label>
			<div class="controls">
			<input value="<?php echo $query->titulo_texto2; ?>" type="text" class="form-control" name="titulo_texto2" />
			<?php echo form_error('titulo_texto2','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Texto2</label>
			<div class="controls">
			<input value="<?php echo $query->texto2; ?>" type="text" class="form-control" name="texto2" />
			<?php echo form_error('texto2','<p class="error">', '</p>'); ?>
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
