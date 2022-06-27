<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_service_type extends Admin_Controller{
	
    public function __construct(){
		
        parent::__construct();
        
        $this->not_logged_in();
        
	$this->load->model('Mod_service_type');	
        
    }
	public function index(){
            
            {
                if(!in_array('viewProduct', $this->permission)) {
                redirect('dashboard', 'refresh');
            }
        
      
           $this->data['page_title'] = 'Довідник типів обслуговування'; 
            
            $this->data['tbl_th'] = array('id','Тип');// загловки таблицы вывода
            $this->data['tbl_td']= array('id','name');// поля таблицы вывода
            
            $this->data['tbl_str']=array('id'=>'id',
                                        'Тип'=>'name'
                                        );
                                       
            
            

            $this->data['ajax_url']=site_url('Ctrl_service_type'); // куда отсылать аякс-запрос
            $this->data['isAddButton']=1;
            $this->data['isBrowseButton']=1;
            $this->data['isEditButton']=1;
            $this->data['isDeleteButton']=1;
            
		 $this->render_template('service_type/index.php', $this->data);	
            }
         
	}

	function data(){
                
		$data=$this->Mod_service_type->list_data();
		echo json_encode($data);
	}

	function save(){
		$data=$this->Mod_service_type->save_record();
		echo json_encode($data);
	}

	function update(){
		$data=$this->Mod_service_type->update_record();
		echo json_encode($data);
	}

	function delete(){
		$data=$this->Mod_service_type->delete_record();
		echo json_encode($data);
	}

}