<?php
class Mod_object_register extends CI_Model{

    public function __construct() {        
        $this->table = "object_register";
        // получаем данные от форм
        $this->data = array(
                        'id' => $this->input->post('id'), 
                        'fam' => $this->input->post('fam'), 
                        'name' => $this->input->post('name'),
                        'father' => $this->input->post('father'),
                        'dateborn' => $this->input->post('dateborn'),
                        'num_doc' => $this->input->post('num_doc'),
                        'id_classiness' => $this->input->post('id_classiness'),
                        'club' => $this->input->post('club')
			);        
    }
    
        function list_data(){     
		$getAll = "select id, fam, name, father, dateborn, num_doc, id_classiness, club "
                        . "from $this->table";
                        
                //$str = implode(",", $this->data);
                $result=$this->db->query($getAll);
		return $result->result();
	}
        
        function list_mod_data(){     
		$getAll = "select id, fam, name, father, dateborn, club from $this->table";
                //$str = implode(",", $this->data);
                $result=$this->db->query($getAll);
		return $result->result();
	}
        
        
	function save_record(){           
		$result=$this->db->insert($this->table,$this->data);
		return $result;
	}

	function update_record(){
		$this->db->where('id', $this->data['id']);                
		$result=$this->db->update($this->table,$this->data);                
		return $result;
	}

	function delete_record(){	
		$this->db->where('id', $this->data['id']);
		$result=$this->db->delete($this->table);
		return $result;
	}
        
        
	
}