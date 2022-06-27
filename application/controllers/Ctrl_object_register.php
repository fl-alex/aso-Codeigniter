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
              
            $this->data['page_title'] = 'Реєстр об\'єктів обслуговування';
            // Сопоставление имен полей ВЫБОРКИ и названий колонок для вывода 
            // и ИСПОЛЬЗОВАНИЯ! в интерфейсе
            $this->data['tbl_str']=array('id'=>'id',                                        
                                        'Назва'=>'name',
                                        'Тип'=>'type_name',                                        
                                        'Кількість'=>'object_count',
                                        'Батьк.об\'єкт'=>'id_parent',
                                        'Ід. батьк'=>'parent_id',
                                        'Розташування'=>'location_name',                                        
                                        'Опис'=>'object_descr',
                                        'Фото'=>'doc_link',
                                        'Історія'=>'object_history'                                        
                                        );                      
            
            // наименования СЛУЖЕБЫНХ полей выборки из массива tbl_str, 
            // которые будут игнорироваться к выводу в главной таблице
            $this->data['excluded_columns']=array(
                                            'object_history', 
                                            'parent_id', 
                                            'type_name', 
                                            'object_descr');
            
            // имена полей из массива tbl_str, которые нужно выводить 
            // в виде селектов для отображения справочников системы
            // В такий таблицах (справочниках) поля id и name обязательны.
            // структура массива: 'имя поля'=>'имя таблицы (справочника) в БД'
            $this->data['tbl_select']=array('location_name'=>'object_location', 
                                            'type_name'=>'object_type',                                            
                                            'dtype_name'=>'doc_type');                        
            
            // Подзапросы для формирования подтаблиц интерфейса
            // КЛЮЧИ массива subquries - имя функции, которая должна быть в этом контроллере.
            // Функция может выбирать из БД все поля, для вывода на клиенте 
            // пойдут только указанные во втором параметре поля:
            // ЗНАЧЕНИЯ массива - массив со списком необходимых полей из запроса, 
            // который находится в модели, вызываемой из функции этого контроллера.
            $this->data['subqueries']=array(                        
                        'get_service_by_object_id'=>array(                                                         
                            "date_plan",
                            "date_fact",
                            "service_name", 
                            "state_name",
                            "descript"
                            ),
                        'object_service+'=>array(
                            "id", 
                            "na----me"
                            ),
                        );
            //------ Подтаблицы для вывода пользователю (СТАРАЯ ОСТАВЛЕНА ПОКА).
            // параметры:            
            //            
            //function_name->inputs_name or select (with array: name_select=>table_spr)
            // для добавления вывода нового поля из таблицы выполнить два действия:
            // 1 - в модели добавить поле для вывода в запрос
            // 2 - в массив настроек добавить соответсвующую пару
            //  "имя колонки таблицы интерфейса" => "имя выводимого поля из БД"
            // ведущий _ - не отображать для таблиц
            
            $this->data['if_settings']=array(
                'base_table'=>array(),
                'base_form_add'=>array(),
                'base_form_edit'=>array(),                                   
                
                'get_service_by_object_id'=>array(
                    'form_name'=>'Роботи по',
                    'flds'=>array(
                            "id"=>"id",
                            "_id_object"=>"id_object",
                            "Дата план"=>"date_plan",
                            "Дата факт"=>"date_fact",
                            "Тип"=>array("service_name"=>"service_type"), 
                            "Статус"=>array("state_name"=>"service_state"),
                            "Описание"=>"descript",
                            "_id_parts"=>"id_service_parts",
                            "_Дії"=>'<button type=\"button\" class=\"btn btn-warning btn-sm btn_edit_work\">e</button>'                            
                            ),
                    'buttons'=>array(//valid value: "add", "edit", "browse", "del"                                                        
                            "edit"
                           
                            )
                    ),
                
                'form_edit_object_service'=>array(                                                         
                    'form_flds'=>array(
                            "id"=>"id",                            
                            "Дата план"=>"date_plan",
                            "Дата факт"=>"date_fact",
                            "Тип"=>array("service_name"=>"service_type"), 
                            "Статус"=>array("state_name"=>"service_state"),
                            "Описание"=>"descript",
                            "id_parts"=>"id_service_parts"
                            )
                    ),
                
                'get_parts_by_service_id'=>array(                                                         
                    'flds'=>array(
                            "id"=>"id",                            
                            "Запчастини"=>"parts_name",
                            "Кількість"=>"parts_quantity",
                            "Опис"=>"descript"
                            )
                    )                                
                );
            
            
            
            $this->data['subtables']=array(
                        'object_register'=>array("id", "name")
                        );

            $this->data['ajax_url']=site_url('Ctrl_object_register'); // куда отсылать аякс-запрос
            $this->data['ajax_mod_url']=site_url('Ctrl_dancers'); // куда отсылать аякс-запрос
            $this->data['isAddButton']=1;
            $this->data['isBrowseButton']=1;
            $this->data['isEditButton']=1;
            $this->data['isDeleteButton']=1;            
		 $this->render_template('object_register/list.php', $this->data);	
            }         
	}
        
        function get_docs_by_object_id(){
            $data=$this->Mod_object_register->get_docs_by_object_id();
            echo json_encode($data);
        }
        
        function form_edit_object_service (){// из другой модели!!
            $this->load->model('Mod_object_service');
            $data=$this->Mod_object_service->get_service_by_id();
            echo json_encode($data);
        }
        
        function get_service_by_object_id (){// из другой модели!!
            $this->load->model('Mod_object_service');
            $data=$this->Mod_object_service->get_service_by_object_id();
            echo json_encode($data);
        }
        
        function get_parts_by_service_id (){// из другой модели!!
            $id_service = $this->input->post('id_service');
            $this->load->model('Mod_service_parts');
            $data=$this->Mod_service_parts->list_data_by_id_service();
            echo json_encode($data);
        }

        function data(){                            
                $data=$this->Mod_object_register->list_data();
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
        
        function upload_files(){
            $input_name = 'file';
            // Расширения файлов.
            $allow = array();
            $deny = array();

            // Директория куда будут загружаться файлы.
            if (isset($_REQUEST['dir_upl'])) {
                $dir_upl=$_REQUEST['dir_upl'];            
            $path = $base_url . $dir_upl.'/';
            }
            else {
                //$path = __DIR__ . '/img/';
            }
            
            // Тип загружаемого документа (из селекта модального окна)
            if (isset($_REQUEST['type_doc'])) {
                $type_doc = $_REQUEST['type_doc'];
            }
            else {                
            }
            
            // Тип загружаемого документа (из селекта модального окна)
            if (isset($_REQUEST['id_object'])) {
                $id_object = $_REQUEST['id_object'];
            }
            else {                
            }
            
            if (isset($_FILES[$input_name])) {

                    if (!is_dir($path)) {
                            mkdir($path, 0777, true);
                    }
 
            // Преобразуем массив $_FILES в удобный вид для перебора в foreach.
            $files = array();
            $diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
            if ($diff == 0) {
                    $files = array($_FILES[$input_name]);
            } else {
                    foreach($_FILES[$input_name] as $k => $l) {
                            foreach($l as $i => $v) {
                                    $files[$i][$k] = $v;
                            }
                    }		
            }	

                foreach ($files as $file) {
                    $error = $success = '';		
                    if (!empty($file['error']) || empty($file['tmp_name'])) {
                            switch (@$file['error']) {
                                    case 1:
                                    case 2: $error = 'Превышен размер загружаемого файла.'; break;
                                    case 3: $error = 'Файл был получен только частично.'; break;
                                    case 4: $error = 'Файл не был загружен.'; break;
                                    case 6: $error = 'Файл не загружен - отсутствует временная директория.'; break;
                                    case 7: $error = 'Не удалось записать файл на диск.'; break;
                                    case 8: $error = 'PHP-расширение остановило загрузку файла.'; break;
                                    case 9: $error = 'Файл не был загружен - директория не существует.'; break;
                                    case 10: $error = 'Превышен максимально допустимый размер файла.'; break;
                                    case 11: $error = 'Данный тип файла запрещен.'; break;
                                    case 12: $error = 'Ошибка при копировании файла.'; break;
                                    default: $error = 'Файл не был загружен - неизвестная ошибка.'; break;
                            }
                    } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
                            $error = 'Не удалось загрузить файл.';
                    } else {
                            // Оставляем в имени файла только буквы, цифры и некоторые символы.
                            $pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
                            $name = mb_eregi_replace($pattern, '-', $file['name']);
                            $name = mb_ereg_replace('[-]+', '-', $name);

                            // Т.к. есть проблема с кириллицей в названиях файлов (файлы становятся недоступны).
                            // Сделаем их транслит:
                            $converter = array(
                                    'а' => 'a',   'б' => 'b',   'в' => 'v',    'г' => 'g',   'д' => 'd',   'е' => 'e',
                                    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',    'и' => 'i',   'й' => 'y',   'к' => 'k',
                                    'л' => 'l',   'м' => 'm',   'н' => 'n',    'о' => 'o',   'п' => 'p',   'р' => 'r',
                                    'с' => 's',   'т' => 't',   'у' => 'u',    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
                                    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',  'ь' => '',    'ы' => 'y',   'ъ' => '',
                                    'э' => 'e',   'ю' => 'yu',  'я' => 'ya', 

                                    'А' => 'A',   'Б' => 'B',   'В' => 'V',    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
                                    'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
                                    'Л' => 'L',   'М' => 'M',   'Н' => 'N',    'О' => 'O',   'П' => 'P',   'Р' => 'R',
                                    'С' => 'S',   'Т' => 'T',   'У' => 'U',    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
                                    'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',  'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
                                    'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
                            );

                            $name = strtr($name, $converter);
                            $parts = pathinfo($name);

                            if (empty($name) || empty($parts['extension'])) {
                                    $error = 'Недопустимое тип файла';
                            } elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
                                    $error = 'Недопустимый тип файла';
                            } elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
                                    $error = 'Недопустимый тип файла';
                            } else {
                                    // Чтобы не затереть файл с таким же названием, добавим префикс.
                                    $i = 0;
                                    $prefix = '';
                                    while (is_file($path . $parts['filename'] . $prefix . '.' . $parts['extension'])) {
                                            $prefix = '(' . ++$i . ')';
                                    }
                                    $name = $parts['filename'] . $prefix . '.' . $parts['extension'];

                                    // Перемещаем файл в директорию.
                                    if (move_uploaded_file($file['tmp_name'], $path . $name)) {
                                            // Далее можно сохранить название файла в БД и т.п.
                                            $success = 'Файл «' . $name . '» успешно загружен. ';
                                    } else {
                                            $error = 'Не удалось загрузить файл.';
                                    }
                            }
                    }

                    // Выводим сообщение о результате загрузки.
                    if (!empty($success)) {                        
                        file_put_contents($base_url . 'all_logs.log', date('[Y-m-d H:i:s] ').$success. PHP_EOL, FILE_APPEND | LOCK_EX);                        
                            echo json_encode(array('success'=>$success, 'filename'=>$name, 'type_doc'=>$type_doc));		
                            $data=$this->Mod_object_register->doc_link_add($id_object, $type_doc, $dir_upl.'/'.$name);                        
                            
                    } else {
                            echo json_encode(array('error'=>$error));
                            file_put_contents($path = $base_url . 'all_logs.log', date('[Y-m-d H:i:s] ').$error. PHP_EOL, FILE_APPEND | LOCK_EX);

                    }
                }
            }
        }
        
        

}