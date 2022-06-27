 <?php
class Mod_service_parts extends CI_Model{

    // public $table="doc";
    
    public function __construct() {        
        $this->table = "service_parts";
    }
    
    
        function list_data(){
           		
            $getAll = "SELECT 
                sp.id as id, 
                sp.id_parent as id_parent, 
                object_register.name as object_name,
                service_type.name as service_name,
                service_state.name as service_state, 
                object_service.date_plan as date_plan,
                object_service.date_fact as date_fact, 
                sp.name as parts_name, 
                sp.catalog_number as parts_code, 
                sp.quantity as parts_quantity, 
                sp.descript as descript 

                FROM service_parts sp, parts_state, object_service, object_register, service_state, service_type
                WHERE sp.id_parent = object_service.id
                and parts_state.id = sp.id_state
                and object_service.id_object = object_register.id
                and service_state.id=sp.id_state
                and service_type.id = object_service.type_service
                ";
                
                $result=$this->db->query($getAll);
		return $result->result();
	}
        
        function list_data_by_id_service(){
           		
            $getAll = "SELECT 
                sp.id as id, 
                sp.id_parent as id_parent,
                object_register.name as object_name,
                service_type.name as service_name,
                service_state.name as service_state, 
                object_service.date_plan as date_plan,
                object_service.date_fact as date_fact, 
                sp.name as parts_name, 
                sp.catalog_number as parts_code, 
                sp.quantity as parts_quantity, 
                sp.descript as descript 

                FROM service_parts sp, parts_state, object_service, object_register, service_state, service_type
                WHERE id_parent = object_service.id
                and parts_state.id = sp.id_state
                and object_service.id_object = object_register.id
                and service_state.id=sp.id_state
                and service_type.id = object_service.type_service
                and id_parent=".$this->input->post('id_parent');
                
                $result=$this->db->query($getAll);                
		return $result->result();
	}

        
	function save_record(){
		$data = array(
                        'id' => $this->input->post('id'), 
                        'id_parent' => $this->input->post('id_parent'),
                        'id_state' => 1,
                        'name' => $this->input->post('parts_name'),
                        'catalog_number' => $this->input->post('parts_code'),
                        'quantity' => $this->input->post('parts_quantity'),
                        'descript' => $this->input->post('descript')
                    
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