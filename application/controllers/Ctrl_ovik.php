<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_ovik extends Admin_Controller{
	
    public function __construct(){
		
        parent::__construct();
        
        $this->not_logged_in();
        
	//$this->load->model('Mod_ovik');	
        
    }
	public function index(){
            
            {
                if(!in_array('viewProduct', $this->permission)) {
                redirect('dashboard', 'refresh');
            }
        
      
           $this->data['page_title'] = 'Моніторинг температури та вологості'; 
            
            $this->data['tbl_th'] = array('id','Тип');// загловки таблицы вывода
            $this->data['tbl_td']= array('id','name','Тип1','Тип2','Тип3' );// поля таблицы вывода
            
            $this->data['tbl_str']=array('id'=>'id',
                                        'Тип'=>'name',
                'Тип2'=>'name',
                'Тип3'=>'name',
                'Тип4'=>'name'
                
                                        );
                                       
            
            

            $this->data['ajax_url']=site_url('Ctrl_ovik'); // куда отсылать аякс-запрос
            $this->data['isAddButton']=1;
            $this->data['isBrowseButton']=1;
            $this->data['isEditButton']=1;
            $this->data['isDeleteButton']=1;
            
		 $this->render_template('ovik/index.php', $this->data);	
            }
         
	}

	function data(){
                      
		
		

        try
	{       

                //$data = array("id" => $id, "name" => $name, "address" => $address,"phone"=>$phone);
                //$data = '{"request":"getvargroup", "data":"", "authority":"1234", "date":"2020-04-02 07:03:58"}';                              
                
                $convertedText = '{"request":"getvargroup", "data":"", "authority":"1234", "date":"2020-04-02 07:03:58"}';                              
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_USERPWD, "Supervisor:1015");
		curl_setopt($ch, CURLOPT_URL, 'http://169.254.234.252:65000');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $convertedText);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		$out = curl_exec($ch);
		curl_close($ch);
		echo $out;
                
                } catch (Exception $e) {
			
			echo $e->getMessage();
			
		};

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