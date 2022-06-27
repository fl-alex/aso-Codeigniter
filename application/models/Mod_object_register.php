<?php
class Mod_object_register extends CI_Model{

    public function __construct() {        
        $this->table = "object_register";
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
            //$this->data = array(
              //          'id_object_type' => $this->input->post('id_object_type')
                // );
           // return $this->data;
            $this->db->query("SET @@group_concat_max_len = 8192;");                        
                $getAll = "SELECT object_register.id as id, "
                    . "object_register.name as name, "
                    . "object_type.name as type_name, "
                    . "object_register.object_count as object_count, "                    
                    . "(SELECT oreg.name "
                        . "FROM object_register oreg "
                        . "WHERE oreg.id=object_register.id_ob_parent) as parent_name, "
                    . "(SELECT oreg.id "
                        . "FROM object_register oreg "
                        . "WHERE oreg.id=object_register.id_ob_parent) as parent_id, "                    
                    . "object_location.name as location_name, "                    
                    . "object_register.object_descr, "
                    //. "(SELECT GROUP_CONCAT(concat_ws('','</a><a href=\"',doc_link,'\" id=\"link_id_',nnn.id,'\" target=\"_blank\">',nnn.name,':<div><img src=\"',doc_link,'\"></div></a>')SEPARATOR \" \") "                            
                    . "(SELECT GROUP_CONCAT(concat_ws('','<a href=\"',doc_link,'\" id=\"link_id_',nnn.id,'\" target=\"_blank\">Фото</a>')SEPARATOR \" \") "
                        . "FROM object_docs, doc_type nnn "
                        . "WHERE object_docs.id_object=object_register.id and nnn.id=object_docs.id_doc_type and nnn.id=9) as doc_links, "
                    . "object_register.object_history "
                    . "FROM object_register, object_location, object_type "
                    . "WHERE object_register.id_ob_type=object_type.id and "
                            . "object_register.id_ob_location=object_location.id";
            // конструкция для добавления запросом кнопки удаления скриншота возле его анкора на списке объектов
            // этот функционал пока перенесен в модальное окно документов по объекту, и формируется на клиенте:
            // <button type=\"button\" class=\"btn btn-danger link_del_doc\" id=\"link_del_doc_id_',object_docs.id,'\" data-path=\"',doc_link,'\">x</button> 
           
            
                $result=$this->db->query($getAll);                
                //$result['data']=$this->data;
		return $result->result();
	}
        
        function list_data_by_id_type_object () {
            
//            $this->db->query("SET @@group_concat_max_len = 8192;");
//            $getAll = "SELECT object_register.id as id, "
//                    . "object_register.name as name, "
//                    . "object_type.name as type_name, "
//                    . "object_register.object_count as object_count, "                    
//                    . "(SELECT oreg.name "
//                        . "FROM object_register oreg "
//                        . "WHERE oreg.id=object_register.id_ob_parent) as parent_name, "
//                    . "(SELECT oreg.id "
//                        . "FROM object_register oreg "
//                        . "WHERE oreg.id=object_register.id_ob_parent) as parent_id, "                    
//                    . "object_location.name as location_name, "                    
//                    . "object_register.object_descr, "
//                    //. "(SELECT GROUP_CONCAT(concat_ws('','</a><a href=\"',doc_link,'\" id=\"link_id_',nnn.id,'\" target=\"_blank\">',nnn.name,':<div><img src=\"',doc_link,'\"></div></a>')SEPARATOR \" \") "                            
//                    . "(SELECT GROUP_CONCAT(concat_ws('','</a><a href=\"',doc_link,'\" id=\"link_id_',nnn.id,'\" target=\"_blank\"><div><img src=\"',doc_link,'\"></div></a>')SEPARATOR \" \") "                            
//                        . "FROM object_docs, doc_type nnn "
//                        . "WHERE object_docs.id_object=object_register.id and nnn.id=object_docs.id_doc_type and nnn.id=9) as doc_links, "
//                    . "object_register.object_history "
//                    . "FROM object_register, object_location, object_type "
//                    . "WHERE object_register.id_ob_type=object_type.id and "
//                            . "object_register.id_ob_location=object_location.id and "
//                            . "object_type.id=".;
//            // конструкция для добавления запросом кнопки удаления скриншота возле его анкора на списке объектов
//            // этот функционал пока перенесен в модальное окно документов по объекту, и формируется на клиенте:
//            // <button type=\"button\" class=\"btn btn-danger link_del_doc\" id=\"link_del_doc_id_',object_docs.id,'\" data-path=\"',doc_link,'\">x</button> 
//            
//                $result=$this->db->query($getAll);                
//		return $result->result();
//            
        }
        
        function get_docs_by_object_id(){
            
            $str_sql="SELECT object_docs.id, 
                             object_docs.id_object, 
                             object_docs.id_doc_type, 
                             doc_type.name, 
                             doc_link 
                FROM `object_docs`, doc_type 
                WHERE id_object=".$this->data['id']." and doc_type.id=object_docs.id_doc_type";
                $result=$this->db->query($str_sql);
		return $result->result();
            
        }

        function save_record(){           
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
                        'id_ob_location' => $this->input->post('location_name'), 
                        'id_ob_type' => $this->input->post('type_name'), 
                        'id_ob_parent' => $this->input->post('parent_id'), 
                        'name' => $this->input->post('name'),
                        'object_descr' => $this->input->post('object_descr'),
                        'object_count' => $this->input->post('object_count'),
                        'object_history' => $this->input->post('object_history')
			);                 
            
		$this->db->where('id', $this->data['id']);                                
		$result=$this->db->update($this->table,$this->data);                                
		return $result;
	}
                

	function delete_record(){
            
                $this->db->trans_start();
                $result=$this->db->query("DELETE FROM $this->table
                                    WHERE id=".$this->data['id']);                
                $this->db->trans_complete();                
		return $result;
	}
        
        
	
}