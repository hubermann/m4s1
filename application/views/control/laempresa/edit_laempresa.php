<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_laempresa');
echo form_open_multipart(base_url('control/laempresa/update/'),$attributes);

echo form_hidden('id', 1); 
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
			<label class="control-label">Titulo principal</label>
			<div class="controls">
			<input value="<?php echo $query->titulo; ?>" type="text" class="form-control" name="titulo" />
			<?php echo form_error('titulo','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Texto principal</label>
			<div class="controls">
			<textarea name="texto_principal" id="texto_principal" cols="30" rows="10" class="form-control"><?php echo $query->texto_principal; ?></textarea>
			<?php echo form_error('texto_principal','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Titulo secundario</label>
			<div class="controls">
			<input value="<?php echo $query->titulo_secundario; ?>" type="text" class="form-control" name="titulo_secundario" />
			<?php echo form_error('titulo_secundario','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Texto secundario</label>
			<div class="controls">
			<textarea name="texto_secundario" id="texto_secundario" cols="30" rows="10" class="form-control"><?php echo $query->texto_secundario; ?></textarea>
			
			<?php echo form_error('texto_secundario','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Titulo recuadro 1</label>
			<div class="controls">
			<input value="<?php echo $query->titulo_texto1; ?>" type="text" class="form-control" name="titulo_texto1" />
			<?php echo form_error('titulo_texto1','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Texto recuadro 1</label>
			<div class="controls">
			<textarea name="texto1" id="texto1" cols="30" rows="5" class="form-control"><?php echo $query->texto1; ?></textarea>
			<?php echo form_error('texto1','<p class="error">', '</p>'); ?>
			</div>
			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Titulo recuadro 2</label>
			<div class="controls">
			<input value="<?php echo $query->titulo_texto2; ?>" type="text" class="form-control" name="titulo_texto2" />
			<?php echo form_error('titulo_texto2','<p class="error">', '</p>'); ?>
			</div>

			</div>
			<!-- Text input-->
			<div class="control-group">
			<label class="control-label">Texto recuadro 2</label>
			<div class="controls">
			<textarea name="texto2" id="texto2" cols="30" rows="5" class="form-control"><?php echo $query->texto2; ?></textarea>
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

<script type="text/javascript">
    CKEDITOR.replace( 'texto_principal');
    CKEDITOR.replace( 'texto_secundario');
    CKEDITOR.replace( 'texto1');
    CKEDITOR.replace( 'texto2');

</script>
