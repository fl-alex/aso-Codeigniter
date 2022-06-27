<?php
class Mod_service extends CI_Model{


    
    public function __construct() {        
        
    }
    
        function get_field_by_id($table, $field, $id){
        
            $this->table = $table;
            $this->field = $field;
            $this->id = $id;
        
            $get_field = "select $this->field "
                        . "from $this->table "
                        . "where $this->table.id = $this->id";
            $result=$this->db->query($get_field);
            return $result->result();
            
	}
        
        function get_id_by_field($table, $field_name, $field_value){
        
            $this->table = $table;
            $this->field_name = $field_name;
            $this->field_value = $field_value;
        
            $get_id = "select id "
                        . "from $this->table "
                        . "where $this->field_name = '$this->field_value'";
            $result=$this->db->query($get_id);
            return $result->result();
            
	}
	
}