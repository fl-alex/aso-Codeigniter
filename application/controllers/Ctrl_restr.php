<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_object_register extends Admin_Controller{
	
    public function __construct(){
		
        parent::__construct();
        
        $this->not_logged_in();
        
	$this->load->model('Mod_object_register');	
        
    }
	public function index(){
            
            {
                if(!in_array('viewProduct', $this->permission)) {
                redirect('dashboard', 'refresh');
            }
        
      
           $this->data['page_title'] = 'Реєстр об\'єктів'; 
            
            $this->data['tbl_th'] = array('id','Прізвище','Ім\'я','По-батькові','Дата народж.','Документ','Клас','Клуб');// загловки таблицы вывода
            $this->data['tbl_td']= array('id','fam','name','father','dateborn','num_doc','id_classiness','club');// поля таблицы вывода
            
            $this->data['tbl_str']=array('id'=>'id',
                                        'Прізвище'=>'name',
                                        'Ім\'я'=>'name',
                                        'По-батькові'=>'father',
                                        'Дата народж'=>'dateborn',
                                        'Документ'=>'num_doc',
                                        'Клас'=>'id_classiness',
                                        'Клуб'=>'club'                                        
                                        );
                                       
            
            

            $this->data['ajax_url']=site_url('Ctrl_reestr'); // куда отсылать аякс-запрос
            $this->data['isAddButton']=1;
            $this->data['isBrowseButton']=1;
            $this->data['isEditButton']=1;
            $this->data['isDeleteButton']=1;
            
		 $this->render_template('reestr/index.php', $this->data);	
            }
         
	}

	function data(){
                
		$data=$this->Mod_object_register->list_data();
		echo json_encode($data);
	}
        
        function get_mod_data(){
                
		$data=$this->Mod_object_register->list_mod_data();
		echo json_encode($data);
	}
        

	function save(){
		$data=$this->Mod_object_register->save_record();
		echo json_encode($data);
	}

	function update(){
		$data=$this->Mod_object_register->update_record();
		echo json_encode($data);
	}

	function delete(){
		$data=$this->Mod_object_register->delete_record();
		echo json_encode($data);
	}

}