<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_object_service extends Admin_Controller{
	
    public function __construct(){
		
        parent::__construct();
        
        $this->not_logged_in();
        
	$this->load->model('Mod_object_service');	
        
    }
	public function index(){
            
            {
                if(!in_array('viewProduct', $this->permission)) {
                redirect('dashboard', 'refresh');
            }
            
            $this->data['if_settings']=array(
                'base_table'=>array(// базовая таблица, которая сразу отображается на странице
                                'id'=>'id', 
                                '_id_ob'=>'id_object', 
                                'Обєкт'=>'name', 
                                'Дата(план)'=>'date_plan',
                                'Дата(факт)'=>'date_fact', 
                                '_Тип-'=>'type_service', 
                                'Тип'=>'service_name', 
                                '_Статус'=>'state_id', 
                                'Статус'=>'state_name', 
                                'Описание'=>'descript'
                ),
                'base_form_add'=>array(),
                'base_form_edit'=>array(),                
                'page_title' => 'Реєстр робіт',
                'ajax_url'=>site_url('Ctrl_object_service'),
                'child_ctrl'=>'Ctrl_service_parts',// дочерний контроллер, который будет обрабатывать подтаблицу
                
                'get_parts_by_service_id'=>array(// подтаблица и форма модального окна
                    'form_name'=>'Запчастини для обслуговування',
                    'flds'=>array(
                            "id"=>"id",
                            "id_parent"=>"id_parent",
                            //"_Обєкт"=>"object_name",                            
                            //"Сервис"=>array("service_name"=>"service_type"), 
                            //"_Статус"=>array("service_state"=>"service_state"),
                            //"Дата план"=>"date_plan",                            
                            //"_Дата факт"=>"date_fact",                            
                            "Запчасти"=>"parts_name",
                            "Код з.ч"=>"parts_code",
                            "Количество"=>"parts_quantity",
                            "Описание"=>"descript",
                            "_Дії"=>'<button type=\"button\" class=\"btn btn-warning btn-sm btn_edit_work\">Заявка</button>'                            
                            ),
                    'buttons'=>array(//valid value: "add", "edit", "browse", "del"                                                        
                            "edit",
                        "del"
                            )
                    ),
                
                'form_edit_service_parts'=>array(                                                         
                    'form_flds'=>array(
                            "_id"=>"id",
                            "id_parent"=>"id_parent",
                            //"_Обєкт"=>"object_name",                            
                            //"_Сервис"=>array("service_name"=>"service_type"), 
                            //"_Статус"=>array("service_state"=>"service_state"),
                            "_Дата план"=>"date_plan",                            
                            "_Дата план"=>"date_fact",                            
                            "Запчасти"=>"parts_name",
                            "Код з.ч"=>"parts_code",
                            "Количество"=>"parts_quantity",
                            "Описание"=>"descript"                       
                            )
                    
                    )                                
                );
            
		 $this->render_template('object_service/list.php', $this->data);	
            }
         
	}
        
        function get_service_by_object_id(){
            $data=$this->Mod_object_service->get_service_by_object_id();
            echo json_encode($data);
        }
        
        function get_parts_by_service_id(){
            $data=$this->Mod_service_parts->list_data_by_id_service();
            echo json_encode($data);
        }
        

        function data(){                
		$data=$this->Mod_object_service->list_data();
		echo json_encode($data);
	}
                                               
        
	function save(){
		$data=$this->Mod_object_service->save_record();
		echo json_encode($data);
	}

	function update(){
		$data=$this->Mod_object_service->update_record();
		echo json_encode($data);
	}
                       
	function delete(){
		$data=$this->Mod_object_service->delete_record();
		echo json_encode($data);
	}
                
}