<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 
class Migration_Create_Laempresa extends CI_Migration
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
		"titulo"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
		"texto_principal"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
		"texto_secundario"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
		"titulo_texto1"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
		"texto1"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
		"titulo_texto2"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
		"texto2"    		=>        array(
                    "type"                =>        "TEXT",
                    "constraint"        	=>        100,
                ),
	
            )
        );
 
        $this->dbforge->add_key('id', TRUE); //ID como primary_key
        $this->dbforge->create_table('laempresa');//crea la tabla
    }
 
    public function down()
    {
        //ELIMINAR TABLA
        $this->dbforge->drop_table('laempresa');
 
    }
}
?>