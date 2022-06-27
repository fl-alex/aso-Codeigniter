<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_orders extends Admin_Controller{
	
    public function __construct(){
		
        parent::__construct();
        
        $this->not_logged_in();
        
	$this->load->model('Mod_orders');	
        
    }
	public function index(){
            
            {
                if(!in_array('viewProduct', $this->permission)) {
                redirect('dashboard', 'refresh');
            }
        
      
            $this->data['if_settings']=array(
                
                'base_form_add'=>array(),
                'base_form_edit'=>array(),                
                'page_title' => 'Заявки на запчастини',
                'ajax_url'=>site_url('Ctrl_orders'),
                'child_ctrl'=>'Ctrl_service_parts',// дочерний контроллер, который будет обрабатывать подтаблицу
                
                'base_table'=>array(// базовая таблица, которая сразу отображается на странице                                
                                '№ заявки'=>'number', 
                                'Дата подачи'=>'date_appl',
                                'Дата выполнения'=>'date_exec', 
                                '_Тип-'=>'id_state',
                                'Статус'=>'state_name',                    
                                'Объект'=>'object_name',
                                'Запчасти'=>'parts'
                ),                
                
                'subtable'=>array(// подтаблица и форма модального окна
                    'form_name'=>'Запчастини для обслуговування',
                    'flds'=>array(
                                'id'=>'id', 
                                'id_parent'=>'id_parent', 
                                'Номер'=>'number', 
                                'Дата(план)'=>'d`ate_appl',
                                'Дата(факт)'=>'date_exec',                                 
                                'Статус'=>'state_name',                    
                                'Описание'=>'descript', 
                                'ОБЕКТ'=>'object_name',
                            "_Дії"=>'<button type=\"button\" class=\"btn btn-warning btn-sm btn_edit_work\">Заявка</button>'                            
                            ),
                    'buttons'=>array(//valid value: "add", "edit", "browse", "del"                                                        
                            "edit",
                        "del"
                            )
                    ),
                
                'subform'=>array(                                                         
                    'form_flds'=>array(
                            'id'=>'id', 
                                'id_parent'=>'id_parent', 
                                'Номер'=>'number', 
                                'Дата(план)'=>'date_appl',
                                'Дата(факт)'=>'date_exec', 
                                '_Тип-'=>'id_state',
                                'Статус'=>'state_name',                    
                                'Описание'=>'descript', 
                                'ОБЕКТ'=>'object_name',                  
                            )
                    
                    )                                
                );


            
		 $this->render_template('orders/list.php', $this->data);	
            }
         
	}
        
        function subform(){
            $data=$this->Mod_object_service->get_service_by_object_id();
            echo json_encode($data);
        }
        
        function subtable(){
            $data=$this->Mod_orders->subtable();
            echo json_encode($data);
        }
        

        function data(){                
		$data=$this->Mod_orders->list_data();
		echo json_encode($data);
	}
                                               
        
	function save(){
		$data=$this->Mod_orders->save_record();
		echo json_encode($data);
	}

	function update(){
		$data=$this->Mod_orders->update_record();
		echo json_encode($data);
	}
                       
	function delete(){
		$data=$this->Mod_orders->delete_record();
		echo json_encode($data);
	}
                
}