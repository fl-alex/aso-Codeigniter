<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_service extends Admin_Controller{
	
    public function __construct(){
		
        parent::__construct();
        
        $this->not_logged_in();
        
	$this->load->model('Mod_service');	
        
    }
	public function index(){
            
            {
                if(!in_array('viewProduct', $this->permission)) {
                redirect('dashboard', 'refresh');
            }
                    
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;
		$this->render_template('dashboard', $this->data);
            }
         
	}

	function get_field_by_id(){
                
                if (isset($_POST['table'])){
                    $table= $this->input->post('table');
                }
                if (isset($_POST['field'])){
                    $field= $this->input->post('field');
                }
                if (isset($_POST['id'])){
                    $id= $this->input->post('id');
                }
                
            
		$data=$this->Mod_service->get_field_by_id($table, $field, $id);
		echo json_encode($data);
	}
        
        function get_id_by_field(){
                
                if (isset($_POST['table'])){
                    $table= $this->input->post('table');
                }
                if (isset($_POST['field_name'])){
                    $field_name= $this->input->post('field_name');
                }
                if (isset($_POST['field_value'])){
                    $field_value= $this->input->post('field_value');
                }                
                
		$data=$this->Mod_service->get_id_by_field($table, $field_name, $field_value);
		echo json_encode($data);
	}
        
        public function file_delete(){
            $str = 'error';
            if (isset($_POST['file_to_delete'])){                
                $file_to_delete = $this->input->post('file_to_delete');                             
                if (unlink($file_to_delete)) {    
                    $str = "success";                    
                }                                    
            }
            echo json_encode($str);                    
        }
        
        function make_db_backup (){
            // Load the DB utility class
            $this->load->dbutil();

          $prefs = array(
                //'tables'        => array('table1', 'table2'),   // Array of tables to backup.
                //'ignore'        => array(),                     // List of tables to omit from the backup
                'format'        => 'txt',                       // gzip, zip, txt
                'filename'      => 'aso_backup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
                'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
                'newline'       => "\n"                         // Newline character used in backup file
            );

            
            // Backup your entire database and assign it to a variable
            $backup = $this->dbutil->backup($prefs);

            // Load the file helper and write the file to your server
            $this->load->helper('file');
            write_file('/tmp/aso_backup.sql', $backup);

            // Load the download helper and send the file to your desktop
            $this->load->helper('download');
            force_download('aso_backup.sql', $backup);
        }
}