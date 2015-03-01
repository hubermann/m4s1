<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Imagenes_Slider_servicios extends CI_Migration
{
    public function up()
    {
        //TABLA 
        $this->dbforge->add_field(
            array(
                "id"        =>        array(
                    "type"                =>        "INT",
                    "constraint"        =>        11,
                    "unsigned"            =>        TRUE,
                    "auto_increment"    =>        TRUE,
 
                ),"slider_servicio_id"    		=>        array(
                    "type"                =>        "INT",
                    "constraint"        	=>        11,
                ),
                "filename"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
                "status"            =>        array(
                    "type"                =>        "INT",
                    "constraint"          =>        1,
                ),

            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('imagenes_slider_servicios');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('imagenes_slider_servicios');
 
    }
}
?>