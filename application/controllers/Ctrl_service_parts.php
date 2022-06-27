<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_service_parts extends Admin_Controller{
	
    public function __construct(){		
        parent::__construct();        
        $this->not_logged_in();        
	$this->load->model('Mod_service_parts');
        
        $this->data['if_construct']=array(
            
                'ajax_url'=>"Ctrl_service_parts",
            
                'base_data'=>array(
                    "columns"=>array(
                                "_id"=>"id",
                                "_id_service"=>"id_service", 
                                "Об'єкт"=>"object_name",
                                "Сервіс"=>"service_name",
                                "Статус"=>"service_state",
                                "Дата план"=>"date_plan",
                                "Дата факт"=>"date_fact",
                                "Запчастини"=>"parts_name", 
                                "Код запч."=>"parts_code", 
                                "Кількість"=>"parts_quantity",
                                "Опис"=> "descript"
                                ),
                    "function"=>"data",
                    "buttons"=>array(
                        "edit",
                        "del"
                        )
                )                           
        );
        
        
    }
	public function index(){
            
            {
                if(!in_array('viewProduct', $this->permission)) {
                redirect('dashboard', 'refresh');
            }
       
           $this->data['page_title'] = 'Необхідні запчастини';
           
           // =================================================================
           // ====== Код для формирования страницы по умолчанию ===============
           // ==== все параметры указываюстя в конструкторе (if_construct). ===
           // =================================================================
                      
           // =================================================================
           // ================= Т А Б Л И Ц А =================================
           // =================================================================
           // ----------------- Шапка таблицы
           $str='<style>.btn_edit{background:yellow;}.btn_del{background:red;}</style>'.PHP_EOL;                
                $excluded_columns = array();
                $str .='<table class="table table-striped responsive" id="mydata">'.PHP_EOL;
                    $str .= '<thead>'.PHP_EOL;
                        $str .= '<tr>'.PHP_EOL;
                            foreach ($this->data['if_construct']['base_data']['columns'] as $key=>$value) {
                                if (substr($key,0,1)!='_'){
                                    $str .= '<th>'.$key.'</th>'.PHP_EOL; 
                                }
                                else{ // формирование массива скрытых полей выборки (для скриптов)                                  
                                     array_push($excluded_columns, $value);
                                }
                            }
                            $str .='<th>Дії</th>';
                         $str .= '</tr>'.PHP_EOL;
                        $str .= '</thead>'.PHP_EOL;
                        $str .= '<tbody>'.PHP_EOL;
                        
                        
            // ----------------- Данные таблицы                        
                $data=$this->Mod_service_parts->list_data();
                foreach ($data as $key => $value) {
                    $str .= '<tr>'.PHP_EOL;
                    foreach ($value as $key => $value) {
                        if (in_array($key,$excluded_columns)==false){                            
                            $str .= '<td>'.$value.'</td>'.PHP_EOL;
                        }
                        else {
                            if ($key=='id'){
                                $curr_id = $value;
                                echo($curr_id);
                        }
                        }
                    }
                    
                    $button_array = $this->data['if_construct']['base_data']['buttons'];
                    if (is_array($button_array)!==false) {
                        $str .= '<td>'.PHP_EOL;
                        foreach ($button_array as $key => $value) {
                            $str .= '<a href="javascript:void(0);" class="btn btn_'.$value.' btn-sm item_'.$value.'" data-id="'.$curr_id.'">'.$value.'</a>'.PHP_EOL;
                        }
                        // Дополнительные кнопки к записям на таблице 
                        $str .='<a href="javascript:void(0);" class="btn btn_orders btn-sm" data-id="'.$curr_id.'" style="background:lightgreen;">Заявки</a>'.PHP_EOL;
                        $str .= '</td>'.PHP_EOL;
                    }
                    
                    $str .= '</tr>'.PHP_EOL;
                }
                $str .= '</tbody>'.PHP_EOL;
            $str .= '</table>'.PHP_EOL;                                                           
            $this->data['table']=$str;
            
                $this->render_template('service_parts/list.php', $this->data);
                
            }
         
	}

	function data(){                
            $data=$this->Mod_service_parts->list_data();
            echo json_encode($data);
	}

	function save(){
		$data=$this->Mod_service_parts->save_record();
		echo json_encode($data);
	}

	function update(){
		$data=$this->Mod_service_parts->update_record();
		echo json_encode($data);
	}

	function delete(){
		$data=$this->Mod_service_parts->delete_record();
		echo json_encode($data);
	}

}