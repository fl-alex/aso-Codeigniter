<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_object_location extends Admin_Controller{
	
    public function __construct(){
		
        parent::__construct();
        
        $this->not_logged_in();
        
	$this->load->model('Mod_object_location');	
        
    }
	public function index(){
            
            {
                if(!in_array('viewProduct', $this->permission)) {
                redirect('dashboard', 'refresh');
            }
        
      
           $this->data['page_title'] = 'Довідник розташувань об\'єктів'; 
            
            $this->data['tbl_th'] = array('id','Тип');// загловки таблицы вывода
            $this->data['tbl_td']= array('id','name');// поля таблицы вывода
            
            $this->data['tbl_str']=array('id'=>'id',
                                        'Тип'=>'name'
                                        );
                                       
            
            

            $this->data['ajax_url']=site_url('Ctrl_object_location'); // куда отсылать аякс-запрос
            $this->data['isAddButton']=1;
            $this->data['isBrowseButton']=1;
            $this->data['isEditButton']=1;
            $this->data['isDeleteButton']=1;
            
		 $this->render_template('object_location/index.php', $this->data);	
            }
         
	}

	function data(){
                
		$data=$this->Mod_object_location->list_data();
		echo json_encode($data);
	}

	function save(){
		$data=$this->Mod_object_location->save_record();
		echo json_encode($data);
	}

	function update(){
		$data=$this->Mod_object_location->update_record();
		echo json_encode($data);
	}

	function delete(){
		$data=$this->Mod_object_location->delete_record();
		echo json_encode($data);
	}

}