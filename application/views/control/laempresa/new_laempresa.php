<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_laempresa');
echo form_open_multipart(base_url('control/laempresa/create/'),$attributes);

echo form_hidden('laempresa[id]');

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
			<label class="control-label">Titulo</label>
			<div class="controls">
			<input value="<?php echo set_value('titulo'); ?>" class="form-control" type="text" name="titulo" />
			<?php echo form_error('titulo','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Texto_principal</label>
			<div class="controls">
			<input value="<?php echo set_value('texto_principal'); ?>" class="form-control" type="text" name="texto_principal" />
			<?php echo form_error('texto_principal','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Texto_secundario</label>
			<div class="controls">
			<input value="<?php echo set_value('texto_secundario'); ?>" class="form-control" type="text" name="texto_secundario" />
			<?php echo form_error('texto_secundario','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Titulo_texto1</label>
			<div class="controls">
			<input value="<?php echo set_value('titulo_texto1'); ?>" class="form-control" type="text" name="titulo_texto1" />
			<?php echo form_error('titulo_texto1','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Texto1</label>
			<div class="controls">
			<input value="<?php echo set_value('texto1'); ?>" class="form-control" type="text" name="texto1" />
			<?php echo form_error('texto1','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Titulo_texto2</label>
			<div class="controls">
			<input value="<?php echo set_value('titulo_texto2'); ?>" class="form-control" type="text" name="titulo_texto2" />
			<?php echo form_error('titulo_texto2','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Texto2</label>
			<div class="controls">
			<input value="<?php echo set_value('texto2'); ?>" class="form-control" type="text" name="texto2" />
			<?php echo form_error('texto2','<p class="error">', '</p>'); ?>
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