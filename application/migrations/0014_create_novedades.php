<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Novedades extends CI_Migration
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
		"fecha"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
		"titulo"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
		"descripcion"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
		"tags"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
		"slug"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('novedades');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('novedades');
 
    }
}
?>