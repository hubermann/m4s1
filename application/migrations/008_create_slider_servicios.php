<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Slider_servicios extends CI_Migration
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
 
                ),
                "status"        =>        array(
                    "type"                =>        "INT",
                    "constraint"          =>        1,
 
                ),
                "created_at"          =>        array(
                    "type"                =>        "DATETIME",
                ),

                "updated_at"          =>        array(
                    "type"                =>        "DATETIME",

                ),
		"nombre_imagen"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('slider_servicios');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('slider_servicios');
 
    }
}
?>