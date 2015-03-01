<?php  

$attributes = array('class' => 'form-horizontal', 'id' => 'new_sucursal');
echo form_open_multipart(base_url('control/sucursales/create/'),$attributes);

echo form_hidden('sucursal[id]');

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
			<label class="control-label">Mapa</label>
			<div class="controls">
			<input value="<?php echo set_value('mapa'); ?>" class="form-control" type="text" name="mapa" />
			<?php echo form_error('mapa','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Nombre</label>
			<div class="controls">
			<input value="<?php echo set_value('nombre'); ?>" class="form-control" type="text" name="nombre" />
			<?php echo form_error('nombre','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Localidad</label>
			<div class="controls">
			<input value="<?php echo set_value('localidad'); ?>" class="form-control" type="text" name="localidad" />
			<?php echo form_error('localidad','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Direccion</label>
			<div class="controls">
			<input value="<?php echo set_value('direccion'); ?>" class="form-control" type="text" name="direccion" />
			<?php echo form_error('direccion','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Telefono</label>
			<div class="controls">
			<input value="<?php echo set_value('telefono'); ?>" class="form-control" type="text" name="telefono" />
			<?php echo form_error('telefono','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Telefono2</label>
			<div class="controls">
			<input value="<?php echo set_value('telefono2'); ?>" class="form-control" type="text" name="telefono2" />
			<?php echo form_error('telefono2','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Mail</label>
			<div class="controls">
			<input value="<?php echo set_value('mail'); ?>" class="form-control" type="text" name="mail" />
			<?php echo form_error('mail','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Horario</label>
			<div class="controls">
			<input value="<?php echo set_value('horario'); ?>" class="form-control" type="text" name="horario" />
			<?php echo form_error('horario','<p class="error">', '</p>'); ?>
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