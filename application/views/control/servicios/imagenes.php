
<script type="text/javascript">
function confirma_eliminar(idvar, urldel) {
    var result = confirm("Confirma eliminar esta imagen?");
    if (result==true) {
        //Confirmada la eliminacion de la img
        $.ajax({
            url: "<?php echo base_url('/control/servicios/delete_imagen') ?>/"+idvar,
            context: document.body,
            success: function(data){
              //wrapper del thumbnail
              $(".wrapp_thumb"+idvar).remove();
              $("#"+idvar).remove();

            }
        }); 
    }
}

function validate_image(){

        var avatar = $("#adjunto").val();

        var extension = avatar.split('.').pop().toUpperCase();
        if(avatar.length < 1) {
            avatarok = 0;
        }
        else if (extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
            avatarok = 0;
            alert("invalid extension "+extension);
        }
        else {
            avatarok = 1;
        }

        if(avatarok == 1) {
            $('#form_imagenes').addClass("sending");
            $("#form_imagenes").submit();
        }
        else {
            $('#form_imagenes').addClass("validationError");
        }
        return false;
    }

function notificar(tipo, mensaje) {
    mensajes_div = document.getElementById("notificacion_main");
    mensajes_div.innerHTML = mensaje;
    mensajes_div.setAttribute("class", tipo);
    //hide msg
    setTimeout(function () {
        mensajes_div.innerHTML = "";
        mensajes_div.setAttribute("class", "none");
    }, 3000);
}



function update_main2(idimagen){
    var formData = new FormData();
    formData.append('idimagen', idimagen);
    formData.append('idservicio', idservicio);
    $.ajax({
        url: "<?php echo base_url('/control/servicios/main_imagen_update/') ?>",
        type: "post",
        data: {idimagen: idimagen, idservicio: $('#idservicio').val()},
        success: function(){
            //Saco el borde de "seleccionado a otodos"
            $('#imagenes img').css('border', 'none');
            $("#wrapp_thumb"+idimagen+"  img").css("border", "3px solid #9acd32");
        },
        error:function(){
            alert("failure");
            $("#result").html('There is error while submit');
        }
    });
}

</script>
<div id="result"></div>

<style>
    .container_img{height: 140px;  overflow: hidden;}
    .seleccionado{border:1px solid red;}
</style>



<div class="panel panel-default">
    <div class="panel-body">
    <div id="notificacion_main"></div>
    <?php 

    $atts = array('id' => 'form_imagenes', 'class' => "navbar-form navbar-left", 'role'=> 'search');
    echo form_open_multipart(base_url('control/servicios/add_imagen'), $atts);
    echo form_hidden('id', $this->uri->segment(4));

    echo '<input type="file" class="form-control" name="adjunto" id="adjunto" />
    <input type="hidden" id="idservicio" value="'.$this->uri->segment(4).'" />
    <button onclick="validate_image();" class="btn btn-default"><span class="glyphicon glyphicon-camera"></span> Agregar Imagen</button>
    ';
    echo form_close();
    ?>
    </div>
</div>


<?php

if($query_imagenes->result()!=""){
    $count = 1;
    echo '<div id="imagenes">';
    foreach ($query_imagenes->result() as $imagen) {
        $marcada_principal="";
        if($servicio->main_image==$imagen->id){
            #$marcada_principal = 'style="border:2px solid #9acd32;"';
            $marcada_principal = '';
        }
        echo '
        <div id="wrapp_thumb'.$imagen->id.'">
        <div class="thumbnail_delete thumbnail" id="box'.$imagen->id.'" style="float:left; margin: 1em; padding:.8em; text-align:center;">
        <div class="container_img" ><img src="'.base_url('images-servicios/'.$imagen->filename).'" width="120" alt="" '.$marcada_principal.' /></div>
        <p onclick="confirma_eliminar('.$imagen->id.')" class="btn btn-default" role="button">Quitar imagen</p>
        <!--<p onclick="update_main2('.$imagen->id.')" class="btn btn-default" role="button">Principal</p>-->
        </div>
        </div>';
        

    }   
    echo '</div>';
}#fin if

?>
