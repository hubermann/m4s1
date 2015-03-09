
<ul class="sidebar-menu">
<?php  
######## novedades
if($this->uri->segment(2)=="novedades"){
	echo '
	<!-- links novedades -->
	<li class="treeview active">
	<a href="#">
	<i class="fa fa-bar-chart-o"></i>
	<span>Novedades</span></a>
	<i class="fa fa-angle-left pull-right"></i>
	<ul class="treeview-menu">
	<li><a href="'.base_url('control/novedades').'"><i class="fa fa-angle-double-right"></i> Ver Todas</a></li>
	<li><a href="'.base_url('control/novedades/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva</a></li>
	</ul>
	</li>
		';
	}else{
		echo '
		<li>
	        <a href="'.base_url('control/novedades').'">
	            <i class="fa fa-dashboard"></i> <span>Novedades</span>
	        </a>
	    </li>
		';
	}


######## laempresa
if($this->uri->segment(2)=="laempresa"){
	echo '
	<!-- links laempresa -->
	<li class="treeview active">
	<a href="#">
	<i class="fa fa-bar-chart-o"></i>
	<span>La empresa</span></a>
	<i class="fa fa-angle-left pull-right"></i>
	<ul class="treeview-menu">
	<li><a href="'.base_url('control/laempresa').'"><i class="fa fa-angle-double-right"></i> Informacion</a></li>
	<li><a href="'.base_url('control/laempresa/imagenes/1').'"><i class="fa fa-angle-double-right"></i> Imagenes</a></li>

	</ul>
	</li>
		';
	}else{
		echo '
		<li>
	        <a href="'.base_url('control/laempresa').'">
	            <i class="fa fa-dashboard"></i> <span>La empresa</span>
	        </a>
	    </li>
		';
	}

##### servicios
if($this->uri->segment(2)=="servicios"){
	echo '
	<!-- links servicios -->
	<li class="treeview active">
	<a href="#">
	<i class="fa fa-bar-chart-o"></i>
	<span>Servicios</span></a>
	<i class="fa fa-angle-left pull-right"></i>
	<ul class="treeview-menu">
	<li><a href="'.base_url('control/servicios').'"><i class="fa fa-angle-double-right"></i> Ver Todos</a></li>
	<li><a href="'.base_url('control/servicios/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nuevo</a></li>
	</ul>
	</li>
		';
	}else{
		echo '
		<li>
	        <a href="'.base_url('control/servicios').'">
	            <i class="fa fa-dashboard"></i> <span>Servicios</span>
	        </a>
	    </li>
		';
	}

######## sucursales
if($this->uri->segment(2)=="sucursales"){
	echo '
	<!-- links sucursales -->
	<li class="treeview active">
	<a href="#">
	<i class="fa fa-bar-chart-o"></i>
	<span>Sucursales</span></a>
	<i class="fa fa-angle-left pull-right"></i>
	<ul class="treeview-menu">
	<li><a href="'.base_url('control/sucursales').'"><i class="fa fa-angle-double-right"></i> Ver Todos</a></li>
	<li><a href="'.base_url('control/sucursales/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva</a></li>
	</ul>
	</li>
		';
	}else{
		echo '
		<li>
	        <a href="'.base_url('control/sucursales').'">
	            <i class="fa fa-dashboard"></i> <span>Sucursales</span>
	        </a>
	    </li>
		';
	}

######## capacitaciones
if($this->uri->segment(2)=="capacitaciones"){
	echo '
	<!-- links capacitaciones -->
	<li class="treeview active">
	<a href="#">
	<i class="fa fa-bar-chart-o"></i>
	<span>Capacitaciones</span></a>
	<i class="fa fa-angle-left pull-right"></i>
	<ul class="treeview-menu">
	<li><a href="'.base_url('control/capacitaciones').'"><i class="fa fa-angle-double-right"></i> Ver Todos</a></li>
	<li><a href="'.base_url('control/capacitaciones/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva</a></li>
	</ul>
	</li>
		';
	}else{
		echo '
		<li>
	        <a href="'.base_url('control/capacitaciones').'">
	            <i class="fa fa-dashboard"></i> <span>Capacitaciones</span>
	        </a>
	    </li>
		';
	}



##### productos
if($this->uri->segment(2)=="productos"){
	echo '
	<!-- links productos -->
	<li class="treeview active">
	<a href="#">
	<i class="fa fa-bar-chart-o"></i>
	<span>Productos</span></a>
	<i class="fa fa-angle-left pull-right"></i>
	<ul class="treeview-menu">
	<li><a href="'.base_url('control/productos').'"><i class="fa fa-angle-double-right"></i> Ver Todos</a></li>
	<li><a href="'.base_url('control/productos/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nuevo</a></li>
	</ul>
	</li>
		';
	}else{
		echo '
		<li>
	        <a href="'.base_url('control/productos').'">
	            <i class="fa fa-dashboard"></i> <span>Productos</span>
	        </a>
	    </li>
		';
	}
?>




<li class="treeview">
<a href="#">
<i class="fa fa-sign-out"></i>
<span>Finalizar</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="<?php echo base_url('control/logout'); ?>"><i class="fa fa-angle-double-right"></i> Cerrar sesion </a></li>
</ul> 
</li>
    
  </ul>
  