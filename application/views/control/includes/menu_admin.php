
<ul class="sidebar-menu">
<?php  
######## novedades
if($this->uri->segment(2)=="novedades"){
	echo '
<!-- links novedades -->
<li class="treeview active">
<a href="#">
<i class="fa fa-bar-chart-o"></i>
<span>novedades</span></a>
<i class="fa fa-angle-left pull-right"></i>
<ul class="treeview-menu">
<li><a href="'.base_url('control/novedades').'"><i class="fa fa-angle-double-right"></i> Ver Todos</a></li>
<li><a href="'.base_url('control/novedades/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva</a></li>
</ul>
</li>
	';
}else{
	echo '
	<li>
        <a href="'.base_url('control/novedades').'">
            <i class="fa fa-dashboard"></i> <span>novedades</span>
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
<!-- <ul class="treeview-menu">
<li><a href="'.base_url('control/laempresa').'"><i class="fa fa-angle-double-right"></i> Ver Todos</a></li>
<li><a href="'.base_url('control/laempresa/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva</a></li>
</ul> -->
</li>
	';
}else{
	echo '
	<li>
        <a href="'.base_url('control/laempresa').'">
            <i class="fa fa-dashboard"></i> <span>laempresa</span>
        </a>
    </li>
	';
}

######## servicios
if($this->uri->segment(2)=="servicios"){
	echo '
<!-- links servicios -->
<li class="treeview active">
<a href="#">
<i class="fa fa-bar-chart-o"></i>
<span>servicios</span></a>
<i class="fa fa-angle-left pull-right"></i>
<ul class="treeview-menu">
<li><a href="'.base_url('control/servicios').'"><i class="fa fa-angle-double-right"></i> Ver Todos</a></li>
<li><a href="'.base_url('control/servicios/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva</a></li>
</ul>
</li>
	';
}else{
	echo '
	<li>
        <a href="'.base_url('control/servicios').'">
            <i class="fa fa-dashboard"></i> <span>servicios</span>
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
<span>sucursales</span></a>
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
            <i class="fa fa-dashboard"></i> <span>sucursales</span>
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
<span>capacitaciones</span></a>
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
            <i class="fa fa-dashboard"></i> <span>capacitaciones</span>
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
<span>productos</span></a>
<i class="fa fa-angle-left pull-right"></i>
<ul class="treeview-menu">
<li><a href="'.base_url('control/productos').'"><i class="fa fa-angle-double-right"></i> Ver Todas</a></li>
<li><a href="'.base_url('control/productos/form_new').'"><i class="fa fa-angle-double-right"></i> Crear nueva</a></li>
</ul>
</li>
	';
}else{
	echo '
	<li>
        <a href="'.base_url('control/productos').'">
            <i class="fa fa-dashboard"></i> <span>productos</span>
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
  