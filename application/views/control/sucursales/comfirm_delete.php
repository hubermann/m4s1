<?php  
$attributes = array('class' => 'form-horizontal', 'id' => 'delete_sucursal');
echo form_open(base_url('control/sucursales/delete/'.$query->id), $attributes);
echo '<fieldset>'.form_hidden('id', $query->id); 

?>
<legend><?php echo $title ?></legend>
<div class="well well-large well-transparent">
 <!-- <p>Categoria id: <?php #echo $nombre_categoria = $this->categoria->traer_nombre($query->categoria_id); ?></p> -->

 <p>Mapa: <?php echo $query->mapa; ?></p>
 <p>Nombre: <?php echo $query->nombre; ?></p>
 <p>Localidad: <?php echo $query->localidad; ?></p>
 <p>Direccion: <?php echo $query->direccion; ?></p>
 <p>Telefono: <?php echo $query->telefono; ?></p>
 <p>Telefono2: <?php echo $query->telefono2; ?></p>
 <p>Mail: <?php echo $query->mail; ?></p>
 <p>Horario: <?php echo $query->horario; ?></p>

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