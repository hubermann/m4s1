<footer class="container">
	<div class="row">
		<div class="col-md-3">
			<h4>Galeria de imagenes</h4>
			<div id="galeria_footer">
				
				<?php  

					$imagenes = $this->imagenes_galeria->get_footer();

					if(!empty($imagenes)){

						foreach ($imagenes as $imagen) {
							echo '
							<div class="thumb_footer">
								<a href="'.base_url('imagenes').'"><img src="'.base_url('images-galerias/'.$imagen->filename).'" width="150" alt="..." class="responsive"></a>
							</div>
							';
						}
					}
				?>

			</div>
		</div>

		
		<div class="col-md-3">
			<h4>Productos</h4>
			<ul id="footer_productos_links">
				<li><a href="#">Placas de Madera</a></li>
				<li><a href="#">Construcci&oacute;n en seco</a></li>
				<li><a href="#">Maderas y Molduras</a></li>
				<li><a href="#">Pisos y Revestimientos</a></li>
				<li><a href="#">Herrajes y Complementos</a></li>
				<li><a href="#">M&acute;quinas y Herramientas</a></li>
			</ul>
		</div>
		<div class="col-md-3">
			<h4>Servicios</h4>
			<ul id="footer_servicios_links">
				<li><a href="#">Centro de diseño</a></li>
				<li><a href="#">Optimizaci&oacute;n de corte</a></li>
				<li><a href="#">Cortes a medida</a></li>
				<li><a href="#">Pegado de cantos y soluciones de bordes</a></li>
				<li><a href="#">Fresado de tablero</a></li>
				<li><a href="#">Fabricaci&oacute;n de martes de muebles</a></li>
				<li><a href="#">Colocacion de bisagras</a></li>
			</ul>
		</div>
		<div class="col-md-3">
			<h4>Horarios y direcci&oacute;n</h4>
			<p>Cno. Gral Belgrano 5051 - Florencio Varela</p>
			<p>Buenos Aires - Argentina</p>
			<p>Tel/Fax: 4210-0121 / 4881</p>
			<div id="logos_footer">
				<img src="<?php echo base_url('public_folder/img/logos-footer.png'); ?>" alt="..." class="responsive">
			</div>
		</div>
	</div>
</footer>