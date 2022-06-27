<?php
class Mod_object_service extends CI_Model{

    public function __construct() {        
        $this->table = "object_service";
        // получаем данные от форм
        $this->data = array(
                        'id' => $this->input->post('id'), 
                        'id_ob_location' => $this->input->post('location_name'), 
                        'id_ob_type' => $this->input->post('type_name'), 
                        'id_ob_parent' => $this->input->post('id_parent'), 
                        'name' => $this->input->post('name'),
                        'object_descr' => $this->input->post('object_descr'),
                        'object_count' => $this->input->post('object_count'),
                        'object_history' => $this->input->post('object_history')
			);        
    }
           
        
        function list_data(){     	
                    
            $getAll = "SELECT object_service.id as id, 
                                `id_object`, 
                                `object_register`.name as name, 
                                `date_plan`, 
                                `date_fact`, 
                                `type_service`, 
                                `service_type`.name as service_name, 
                                `state_id`, 
                                `service_state`.name as state_name, 
                                `object_service`.descript as descript  

                        FROM `object_service`, 
                                `service_type`, 
                                `service_state`, 
                                `object_register`

                        WHERE 
                                service_type.id=object_service.type_service AND
                                service_state.id=object_service.state_id AND
                                object_register.id=object_service.id_object                                
                        ";
            
                $result=$this->db->query($getAll);
		return $result->result();
	}
        
        function get_service_by_object_id(){
            
           $getAll = "SELECT object_service.id as id, 
                                `id_object`, 
                                `object_register`.name as name, 
                                `date_plan`, 
                                `date_fact`, 
                                `type_service`, 
                                `service_type`.name as service_name, 
                                `state_id`, 
                                `service_state`.name as state_name,
                                `object_service`.descript as descript,
                                `id_service_parts` as id_service_parts
                                

                        FROM `object_service`, 
                                `service_type`, 
                                `service_state`, 
                                `object_register`

                        WHERE   id_object = ".$this->data['id']." and
                                service_type.id=object_service.type_service AND
                                service_state.id=object_service.state_id AND
                                object_register.id=object_service.id_object";
            
                $result=$this->db->query($getAll);
		return $result->result();
            
        }
        
        
        function get_service_by_id(){
            
           $getAll = "SELECT object_service.id as id,                                                                 
                                `date_plan`, 
                                `date_fact`, 
                                `type_service`, 
                                `service_type`.name as service_name, 
                                `state_id`, 
                                `service_state`.name as state_name                                 

                        FROM `object_service`,
                                `service_type`, 
                                `service_state`
                                

                        WHERE   id = ".$this->data['id']." and
                                service_type.id=object_service.type_service AND
                                service_state.id=object_service.state_id";
            
                $result=$this->db->query($getAll);
		return $result->result();
            
        }
        
                

        function save_record(){
                
                $this->data = array(
                        'id' => $this->input->post('id'), 
                        'id_object' => $this->input->post('id_object'), 
                        'date_plan' => $this->input->post('date_plan'), 
                        'date_fact' => $this->input->post('date_fact'), 
                        'type_service' => $this->input->post('service_type'),
                        'state_id' => $this->input->post('service_state'),
                        'descript' => $this->input->post('descript')
			);               
                
		$result=$this->db->insert($this->table,$this->data);
		return $result;
	}
        
        function doc_link_add($id_object, $type_doc, $name){           
            $this->data = array(
                        'id' => '', 
                        'id_object' => $id_object, 
                        'id_doc_type' => $type_doc, 
                        'doc_link' => $name
			);                    
            $result_sql=$this->db->insert('object_docs',$this->data);      
                $result=array('filename'=>$name, 'filetype'=>$type_doc, 'id_object'=>$id_object, 'result_sql'=>$result_sql);
		return $result;
	}
        

	function update_record(){
            
             $this->data = array(
                        'id' => $this->input->post('id'), 
                        'id_object' => $this->input->post('id_object'), 
                        'date_plan' => $this->input->post('date_plan'), 
                        'date_fact' => $this->input->post('date_fact'), 
                        'type_service' => $this->input->post('service_type'),
                        'state_id' => $this->input->post('service_state'),
                        'descript' => $this->input->post('descript')
			);       
            
		$this->db->where('id', $this->data['id']);                                
		$result=$this->db->update($this->table,$this->data);                                
		return $result;
	}
                

	function delete_record(){ 
         $this->data = array(
                        'id' => $this->input->post('id')
                 );
                $this->db->trans_start();
                $result=$this->db->query("DELETE FROM $this->table
                                    WHERE id=".$this->data['id']);                
                $this->db->trans_complete();                
		return $result;
	}
        
        
	
}