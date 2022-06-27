<?php
class Mod_docs extends CI_Model{

    // public $table="doc";
    
    public function __construct() {        
        $this->table = "object_docs";
    }
    
    
        function list_data(){
           		
                $getAll = "select * from $this->table";
                $result=$this->db->query($getAll);
		return $result->result();
	}

        
	function save_record(){
		$data = array(
                        'id' => $this->input->post('id'), 
                        'name' => $this->input->post('name')
                    
			);
                
		$result=$this->db->insert($this->table,$data);
		return $result;
	}

	function update_record(){
                
		$id=$this->input->post('id');
		$name=$this->input->post('name');		              

		$this->db->set('id', $id);
		$this->db->set('name', $name);
                
		$this->db->where('id', $id);
                
		$result=$this->db->update($this->table);
                
		return $result;
	}

	function delete_record(){
		$id=$this->input->post('id');
		$this->db->where('id', $id);
		$result=$this->db->delete($this->table);
		return $result;
	}
        
        
	
}