<div class="container-fluid">                  
    <h1 class="mt-4"><?php echo $page_title; ?></h1>
    <hr>
        <button type="button" id="btn_add" class="btn btn-success" data-toggle="modal">
            Додати
        </button>&nbsp;
            Фільтр:
            <div id="cont_filter" class="d-inline"><select id="sel_filter" data-tbl="object_type" aria-label="123"></select></div>
        <div>&nbsp;</div>
        <!--button type="button" id="bkp" class="btn btn-primary">
            Архів
        </button-->
        
    <section class="content">
            
        <div class="row">
            <div class="col-md-12 col-xs-12">            
            <table class="table table-striped responsive" id="mydata">
                <thead>
                    <tr>
                        <?php //заголовки таблицы
                            foreach ($tbl_str as $key=>$value) {                              
                              if (in_array($value, $excluded_columns)==false){
                                  print_r('<th>'.$key.'</th>');                                  
                              }                              
                            }
                        ?>                        
                        <th style="text-align: right;">Дії</th>
                    </tr>
                </thead>
                <tbody id="show_data">                    
                </tbody>
            </table>  
          </div> <!--col-md-12 -->
        </div> <!--/.row ->
    </section>    
 

    <!-- FORM MODAL ADD -->
    <!--form id="my_add_modal"-->
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Додавання об'єкту</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">             
                <div class="container-fluid">                                  
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div id="adding_messages"></div>                                                                        
                            </div>
                        </div>

   <?php //поля выборки - они же - подписи полей формы. Передается из контроллера. Потому через пхп.              
                    foreach ($tbl_str as $key=>$value) {                           
                    echo "<div class='form-group row'>";
                    echo "<label class='col-md-2 col-form-label'>".$key."</label>";
                    echo "<div class='col-md-10'>";
                        if ($value=='id'){// если поле id
                            echo "<input type='text' name='id' id='id' class='form-control' placeholder='".$value."' readonly value='0'>";
                        }                       
                        else if (array_key_exists($value, $tbl_select)) {// если селекты формы
                            echo '<select class="form-select" name="'.$value.'" id="'.$value.'" data-tbl="'.$tbl_select[$value].'" aria-label="'.$key.'"></select>';
                        }
                                                
                        else // остальное - просто инпуты
                        {
                            ?> <?php echo "<input type='text' name='".$value."' id='".$value."' class='form-control' placeholder='".$value."'>" ?>
                       <?php }

                    echo "</div>";
                echo "</div>";
                  }                                                      
                ?>
                        <!-- Подтаблица для выбора родительского объекта (заполнится аякс запросом при открытии формы) -->
                        
                        <div class="form-group">
                            <table class="table subtable table-striped col-md-12" id="myeditdata2">
                                <thead>
                                    <tr>
                                        <?php //заголовкик таблицы                                                    
                                            foreach ($subtables as $key=>$value) {                                                                                                                        
                                                $tbl_col = $value;
                                                $tbl_name = $key;
                                                foreach ($tbl_col as $value) {
                                                    print_r('<th>'.$value.'</th>');
                                                }                                                            
                                                print_r('<th>Дії</th>');
                                            }
                                        ?>                                                                
                                    </tr>
                                </thead>
                                <tbody id="show_edit_data2">                    
                                </tbody>
                            </table>                            
                            <div class="form-group ">
                                <input type="button" id="btn_reg" class="btn btn-success" value="Записати"/>                                        
                            </div>                               
                        </div>    
                           
                    </section>  
                </div><!-- CONTAINER fluid -->
                </div><!-- MODAL BODY -->
                </div><!-- MODAL CONTENT -->
            </div><!-- MODAL DIALOG -->       
        </div>    <!--END MODAL ADD-->
    <!--/form-->
    
 <!-- ======================================================================
 ===============  Модальное окно добавления документов объекта =============
 ======================================================================== -->         
  <div class="modal fade" tabindex="-1" role="dialog" id="doc_add_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom border-primary">
              <h5 class="modal-title">Документы объекта</h5>
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              
            <div class="container-fluid">                                  
                <section class="content">                                                                
                    <div class="modal-body" id="add_modal_body">
                        <input type="text" class="col-md-12 col-sm-12 text-center bg-transparent" value="" id="name_object" disabled="true">                    
                    <input type="text" class="col-md-6 col-sm-6" value="" id="id_object" disabled="true" hidden="true">  
                        <select class="form-control form-control-sm col-md-4 col-md-4 offset-md-2 d-inline" id="sel_type_doc" name="sel_type_doc" data-tbl="doc_type"></select>
                        <input type="button" class="btn btn-primary col-md-4 col-sm-4 d-inline" value="Завантажити файл" id="btn_download_file">
                        <!--div class="row"-->
                            <form id="myform" method="post" class="col-6" enctype="multipart/form-data">            
                                <div class="form-group">                         
                                    <input type="file" class="btn btn-success btn-lg col-md-12 col-sm-12" id="sel_files" name="file[]" style="display:none" multiple="true"><br>
                                    <input type="submit" class="btn btn-lg col-md-12 col-sm-12" id="btn_upload_photo" value="Отправить" style="display:none">
                                </div>                
                            </form>
                            <div class="col-md-12 col-sm-12" id="log">
                            </div>
                            <div class="row col-md-12 col-sm-12" id="ob_foto">
                            </div>
                        
                        <!--/div-->             
                        <!--div class="modal-footer">                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div-->
                    </div>
                </section>
            </div>
        </div>
    </div>    
</div>
  
 <!-- ======================================================================
 ===============  Модальное окно работ по объекту ==========================
 ======================================================================== -->  
 
 <div class="modal fade" tabindex="-1" role="dialog" id="modal_ob_works">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header border-bottom border-success">
          <!--h6 class="modal-title col-sm-12 col-md-3">Обслуговування об'єкта</h6-->
          <!--input type="text" class="col-sm-12 col-md-4 text-center bg-transparent border-none" value="" id="name_ob" disabled="true"-->
          <h3 id="name_ob" class="modal-title col-sm-12 text-center"></h3>          
        </div>
        
        <div class="modal-body">                         
            <div class="container-fluid">                                  
                <section class="content">                    
                    <input type="text" class="id col-sm-6" value="" id="id_ob" disabled="true" hidden="true">                                  
                    <div class="row">
                        <!-- Форма  -->                        
                        <div class="col-sm-12 col-md-4  border-right border-success" id="form_edit"></div>
                        <div class="col-sm-12 col-md-8">
                            <!-- Подтаблица  -->                        
                            <div class="col-sm-12 col-md-12 subtable" id="mysubtable"></div>                          
                            <!-- Подтаблица  -->                        
                            <div class="col-sm-12 col-md-12 subtable" id="mysubtable2"></div>                          
                        </div>                          
                    </div>
                        
                </section>  
            </div><!-- CONTAINER fluid -->
        </div><!-- MODAL BODY -->
        
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_state" hidden="true">В режим додавання</button>
            <button type="button" class="btn btn-warning" id="btn_service_save_change" disabled="true">Зберегти зміни</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        </div>
    </div>
  </div>
</div>
 
 
 <!-- ======================================================================
 ===============  Модальное окно редактирования объекта =============
 ======================================================================== -->  
 
 <div class="modal fade" tabindex="-1" role="dialog" id="modal_edit">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom border-warning">
        <h5 class="modal-title">РЕДАГУВАННЯ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">             
                <div class="container-fluid">                                  
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div id="adding_messages"></div>                                                                        
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form id="myeditform" class="border-right border-warning" name="myeditform" action="">
   <?php //поля выборки - они же - подписи полей формы. Передается из контроллера. Потому через пхп.              
                    foreach ($tbl_str as $key=>$value) {                           
                    echo "<div class='form-group row'>";
                        echo "<label class='col-md-3 col-form-label'>".$key."</label>";
                        echo "<div class='col-md-9'>";
                            if ($value=='id'){// если поле id
                                echo "<input type='text' name='id' id='id_edit' class='form-control' placeholder='".$value."' readonly value='0'>";
                            }                       
                            else if (array_key_exists($value, $tbl_select)) {// если селекты формы
                                echo '<select class="form-select" name="'.$value.'" id="'.$value.'_edit" data-tbl="'.$tbl_select[$value].'" aria-label="'.$key.'"></select>';
                            }

                            else // остальное - просто инпуты
                            {
                                echo "<input type='text' name='".$value."' id='".$value."_edit' class='form-control' placeholder='".$value."'>";
                            }
                        echo "</div>";
                        
                    echo "</div>";
                  }                                                      
                ?>
                          </form>  
                        </div>
                        <!-- Подтаблица для выбора родительского объекта (заполнится аякс запросом при открытии формы) -->                        
                        <div class="col-md-6">
                                        <table class="table subtable table-striped responsive col-md-12" id="myeditdata3">
                                            <thead>
                                                <tr>
                                                    <?php //заголовкик таблицы                                                    
                                                        foreach ($subtables as $key=>$value) {                                                                                                                        
                                                            $tbl_col = $value;
                                                            $tbl_name = $key;
                                                            foreach ($tbl_col as $value) {
                                                                print_r('<th>'.$value.'</th>');
                                                            }                                                            
                                                            print_r('<th>Дії</th>');
                                                        }
                                                    ?>                        
                                                    <!--th style="text-align: right;">Дії</th-->
                                                </tr>
                                            </thead>
                                            <tbody id="show_edit_data3">                    
                                            </tbody>
                                        </table>                            
                        </div>                          
                        </div>                        
                    </section>  
                </div><!-- CONTAINER fluid -->
                </div><!-- MODAL BODY -->
        
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn_edit_save">Зберегти зміни</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
      </div>
    </div>
  </div>
</div>
     
 

<!--MODAL DELETE-->
 <form>
    <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom border-danger">
            <h5 class="modal-title text-danger" id="exampleModalLabel">Видалення запису</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
               <strong>Ви дійсно бажаєте видалити запис?</strong>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id_delete" id="id_delete" class="form-control">
            <button class="btn btn-success" data-dismiss="modal">Ні</button>
            <button type="submit" id="btn_delete" class="btn btn-danger">Так</button>
          </div>
        </div>
      </div>
    </div>
    </form>
<!--END MODAL DELETE-->
</div>

<script type="text/javascript">
    var data1=[];    
    var select_array = [];// массив для id селектов. в модальном окне добавления
    var mystr = "";// строка для заполнения подтаблицы
    var current_links = "";// существующие линки по текущей записи
$(document).ready(function(){

    // заполнение селекта с фильтром главной таблицы и обработчик onchange селекта
    for_each_select('#cont_filter select');
    $('#sel_filter').on('change', function(){
       show_data(Number($(this).val()));
    });


$(".js-example-basic-tags").select2({
  tags: true
});

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });    
   
   show_data(); //call function show all product

    $('#mydata').DataTable( {
       // responsive: true,
        dom: 'Bfrtip',
        "order": [[ 1, "asc"]],
        "pageLength": 100,
        buttons: [ 'copy', 'csv', 'excel', 'pdf',            
            {
                extend: 'print',                
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                },
                
                customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '14px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', '14px')
                                .css('color','black') ;
                    }  
            }
        ]        
    });
 
    
    // =========================================================
    // ========== Функция показ общих данных на странице =======
    // =========================================================
    
    function show_data(id_object_type=0){
        var ajaxurl='<?php echo $ajax_url ?>';
        //alert(id_object_type+', '+typeof(id_object_type));
        $.ajax({

            type  : 'ajax',
            url   : ajaxurl+'/data',
            async : false,
            data:{id_object_type:id_object_type},
            dataType : 'JSON',
            success : function(data){                
                var html = '';
                var i;              
                var mydata = data;                
                var tmp_var="";
                var excluded_columns;
                excluded_columns=JSON.parse('<?php echo json_encode($excluded_columns); ?>');                
                for(i=0; i<mydata.length; i++)  {                    
                    html += '<tr>';                    
                        $.each(mydata[i], function (key){                                                        
                                if (excluded_columns.indexOf(key)=== -1){
                                    if (key=='doc_links'){
                                        if (data[i][key]!==null){
                                            html += '<td class="doc_links">'+data[i][key]+'</td>';
                                        }
                                        else {
                                            html += '<td class="doc_links"></td>';
                                        }
                                        // вывод с сервера линков на документы объекта
                                        
                                        //html += '<td></td>';
                                    }
                                    else {
                                        html += '<td>'+data[i][key]+'</td>';
                                    }
                                     
                                }                                
                         });                                                
                    html += '<td style="padding:0px;width:170px;">\
                            <a href="javascript:void(0);" class="btn btn-success btn-sm btn_works mr-1" \
                                data-id="'+data[i].id+'" data-name="'+data[i].name+'">Service</a><a href="javascript:void(0);" class="btn btn-primary btn-sm btn_add_doc mr-1" \
                                data-id="'+data[i].id+'" \
                                data-name="'+data[i].name+'">Docs</a><a href="javascript:void(0);" class="btn btn-warning btn-sm btn_edit_object mr-1" \
                                data-id="'+data[i].id+'" \
                                data-name="'+data[i].name+'" \
                                data-type_name="'+data[i].type_name+'" \
                                data-object_count="'+data[i].object_count+'" \
                                data-parent_name="'+data[i].parent_name+'" \
                                data-location_name="'+data[i].location_name+'" \
                                data-object_descr="'+data[i].object_descr+'" \
                                data-object_history="'+data[i].object_history+'" \
                                >Edit</a><a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Del</a>'+
                    '</td></tr>';
                }                               
                $('#show_data').html(html);
                set_event_btn_add_doc();
                set_event_btn_works();
                set_event_link_del_doc();                
            }
       });
    } // ========= END O SHOW_DATA ============

//=============================================================================
//==================== Форма УДАЛЕНИЯ. Обработка ==============================
//=============================================================================

$('#show_data').on('click','.item_delete',function(){      
        $('#Modal_Delete').modal('show');
        $('[name="id_delete"]').val($(this).data('id'));
    });
    
//-------------- запрос на удаление и обновление отображения данных

     $('#btn_delete').on('click',function(){
        var id = $('[name="id_delete"]').val();        
        get_field_by_id();
        $.ajax({
            type : "POST",
            url  : "<?php echo ($ajax_url.'/delete')?>",
            dataType : "JSON",
            data : {id:id},
            success: function(data){                
                $('[name="id_delete"]').val("");
                $('#Modal_Delete').modal('hide');
                show_data();
            }
        });        
    });

//=============================================================================
//==================== Форма ДОБАВЛЕНИЯ. Обработка ==============================
//=============================================================================
$("#btn_add").on('click', function(e){
    $("#Modal_Add").one('shown.bs.modal', function(){         
        for_each_select ("#Modal_Add select");
        get_subtable('<?php echo $tbl_name; ?>','add');        
    });
    
    $("#Modal_Add").modal('show');    
    $('#Modal_Add').on('hidden.bs.modal', function () {// обработка закрытия модального окна        
        $('#myeditdata2').dataTable().fnDestroy();        
    });               
   }); // ---- End btn_add onClick function     

   // -------------- Формирование подтаблицы на форме добавления нового объекта
   function get_subtable(param, param2){              
       $.ajax({
           type : "POST",
           url  : 'Ctrl_'+param+'/data',
            dataType : "JSON",            
            success: function(data){                      
                let mystr = "";                                
                $.each(data, function (key, value){                                       
                   mystr = mystr+'<tr>';
                   $.each($(this), function(key, value){                       
                       mystr = mystr+'<td>'+value['id']+'</td>';
                       mystr = mystr+'<td>'+value['name']+'</td>';                       
                       if ($('#parent_id_edit').val()==value['id']){
                           mystr = mystr+"<td><input data-name='"+value['name']+"' class='chk_add' name = 'mychk' id = '"+value['id']+"' type='radio' value='"+value['id']+"' checked></td>";
                       }
                       else
                       {
                           mystr = mystr+"<td><input data-name='"+value['name']+"' class='chk_add' name = 'mychk' id = '"+value['id']+"' type='radio' value='"+value['id']+"'></td>";
                       }
                       
                   });                    
                   mystr = mystr + '</tr>';
                });
                if (param2=='edit'){                    
                    $("#show_edit_data3").html(mystr);
                    $('#myeditdata3').DataTable({ "pageLength": 10, "order": [[ 2, "desc"],[1, "desc"]]});                    
                }
                else{
                    $("#show_edit_data2").html(mystr);
                    $('#myeditdata2').DataTable( {"pageLength": 10, "order": [[ 2, "desc"],[1, "desc"]]});                
                }                
            }
       });       
        
        // ------ обработка для чекбоксов в полученной подтаблице          
        $('#show_edit_data2').on('change', '.chk_add', function(e) {                
            $('.chk_add').each(function() {                            
              if ($(this).is(':checked')){
                   $('#id_parent').val($(this).attr('id'));                   
                } else {	
            }                      
            });                       
        });
                
        $('#show_edit_data3').on('change', '.chk_add', function(e) {                
            $('.chk_add').each(function() {                            
              if ($(this).is(':checked')){
                   $('#parent_id_edit').val($(this).attr('id'));
                   $('#id_parent_edit').val($(this).data('name'));
                } else {	
            }                      
            });                       
        });
        
   } // --------------------- > END GET SUBTABLE
   
   // ---------- Кнопка Записать формы добавления нового объекта ---------------
   $('#btn_reg').on('click', function (){          
    var tmpdata = {};//массив для занесения пар "имя поля" - "значение"
    $('#Modal_Add').find('select').each(function() {      
      tmpdata[this.name] = $(this).find('option:selected').attr('value').replace(/"/g, '&quot;');      
    });
    $('#Modal_Add').find('input').each(function() {              
      tmpdata[this.name] = $(this).val().replace(/"/g, '&quot;');
    });      
        $.ajax({
            type : "POST",
            url  : "Ctrl_object_register/save",
            dataType : "JSON",
            data : tmpdata,
            success: function(){                
                $('#Modal_Add').modal('hide');
                show_data();
                $('#mydata').draw();
            }
        });
        return false;   
   });
   
   // ======================================================================
   // ====================== Работы по объекту =============================
   // ======================================================================
   
   function set_event_btn_works (){      
      $('#show_data').on('click', '.btn_works', function(){
          for_each_select('#modal_ob_works select');
           $('#modal_ob_works').on('hidden.bs.modal', function () {// обработка закрытия модального окна                  
               $('#modal_ob_works #mysubtable').empty();
               $('#modal_ob_works #form_edit').empty();
               $('#name_ob').empty();
               
           });  
           $('#name_ob').append($(this).data('name'));           
           $('#modal_ob_works').modal('show');
           $('#id_ob').val($(this).data('id'));           
           
           var str_rez='';
           // создание формы и получение данных
           get_interface_settings ('form_edit_object_service', '#form_edit');                        
           // создание подтаблицы и получение данных
           get_interface_settings ('get_service_by_object_id', '#modal_ob_works #mysubtable');                                  
      });
   }
   
   // ======================================================================
   // ========= Добавление документа к объекту =============================
   // ======================================================================
   
   function set_event_btn_add_doc(){       
        $('#show_data').on('click', '.btn_add_doc', function(){            
            get_foto_by_id_object($(this).data('id'),'#ob_foto');//получение и вывод фото документов
            $('#doc_add_modal').on('hidden.bs.modal', function () {// обработка закрытия модального окна  
                //$('#ob_foto').empty();
            });  
            $('#doc_add_modal').modal('show');      
            // заполнение селекта типов документов (у селекта д.б. атрибут data-tbl для функции)
            for_each_select('#doc_add_modal select');          
            $('#id_object').val($(this).data('id'));
            $('#name_object').val($(this).data('name'));           
        });
   }
   
   // =============================================================================
   // ========= Удаление скриншота/фото документа по объекту и ссылки на него в БД
   // =============================================================================
   
   function set_event_link_del_doc(){   
        $('.link_del_doc').on('click', function(){            
            var sss = $(this).attr('id');
            sss = sss.substring(16,sss.length);            
            var path = $(this).data('path');
            console.log('Удаляем файл id='+sss+'____'+path);
      $.ajax({                
                type : "POST",
                url  : "Ctrl_service/file_delete",
                dataType : "JSON",
                data : {file_to_delete:path},
                success: function (data){                        
                        $.ajax({
                            type : "POST",
                            url  : "Ctrl_docs/delete",
                            dataType : "JSON",
                            data : {id:sss},
                            success: function(data){                                                
                                get_foto_by_id_object($('#id_object').val(), '#ob_foto');
                            }                            
                        });                        
                }              
            });        
        });                         
   }
   
   // ======================================================================
   // ============= Обработки формы загрузки файла на сервер =================
   // ======================================================================
   
   // ----------- Выбрать файл для загрузки -------------------------
   $('#btn_download_file').on('click', function(){       
      document.getElementById('sel_files').click();//эмуляция клика по скрытому input type=files
   });
   
       // ---------- onchange инпута для загрузки файлов -----------------------
        $('#sel_files').on('change', function(){
            if (document.getElementById("sel_files").files[0].name.length>0){                 
                 document.getElementById('btn_upload_photo').click();// эмуляция клика Загрузить файлы на сервер                 
             }
             else {
                 alert("Помилка. Немає фото для завантаження");
             }
        });                     
     // -------- САБМИТ формы Загрузки файлов на сервер --------------------
     $('#myform').submit( function(e) {        
         var fd = new FormData(this);
         fd.append("dir_upl", "img");//на будущее - забить в справочник типов объектов
         fd.append("type_doc", $('#sel_type_doc').val());
         fd.append("id_object", $('#id_object').val());
         
        $.ajax({
          url: 'Ctrl_object_register/upload_files',
          type: 'POST',
          data: fd,
          processData: false,
          contentType: false,
            
          success: function (data){
              //$('#ob_foto').empty();
              get_foto_by_id_object($('#id_object').val(),'#ob_foto');
              $.each(JSON.parse(data), function (key, value){
                if (key=='success'){
                    $('#btn_download_file').val("Файл завантажено!");                    
                    $('#btn_download_file').css({'background':'#ffc107'});
                    $('#btn_download_file').css({'color':'black'});
                    window.setTimeout(clear_info, 1500); 
                    show_data(); //call function show all product
                }
                if (key=='error'){
                    
                    $('#btn_download_file').val("Файл НЕ завантажено! Спробуйте ще раз!");                    
                    $('#btn_download_file').css({'background':'#F8D7DA'});
                    $('#btn_download_file').css({'color':'red'});
                    window.setTimeout(clear_info, 2000);
                }                    
                
              });                            
          },
          
          error: function (jqXHR, exception) {
                // обработка ошибок
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                $('#log').append(Date()+"  "+msg+"<br>");
                    
                    $.ajax({
                      url: 'client_log.php',
                      type: 'POST',
                      data: msg,
                      processData: false,
                      contentType: false,
                      success: function (data){                          
                          console.log(data);
                      }          
                    });
                    
                $('#btn_download_file').val("Файл НЕ завантажено! Спробуйте ще раз!");                
                $('#btn_download_file').css({'background':'#F8D7DA'});
                $('#btn_download_file').css({'color':'red'});
                window.setTimeout(clear_info, 5000);               
            }          
        });        
          e.preventDefault();
    });
         
   
   
   // ======================================================================
   // ========= Кнопка Редактировать объект ================================
   // ======================================================================
   
   $('#show_data').on('click', '.btn_edit_object',  function(){
       
      $('#modal_edit').on('hidden.bs.modal', function () {// обработка закрытия модального окна  
        $('#myeditdata3').DataTable().destroy();  
        $('#show_edit_data3').empty();                       
        });  
       
      $("#modal_edit").modal('show');            
      $('#id_edit').val($(this).data('id'));      
      $('#name_edit').val($(this).data('name'));
      $('#object_count_edit').val($(this).data('object_count'));                                
      for_each_select('#modal_edit select');
      $("#type_name_edit option:contains(" + $(this).data('type_name') + ")").prop('selected', 'selected');
      $("#location_name_edit option:contains(" + $(this).data('location_name') + ")").prop('selected', 'selected');      
      $('#object_descr_edit').val($(this).data('object_descr'));
      $('#doc_link_edit').val($(this).data('object_links'));
      $('#object_history_edit').val($(this).data('object_history'));
      $('#id_parent_edit').val($(this).data('parent_name'));      
      get_id_by_field('object_register', 'name', $(this).data('parent_name'), '#parent_id_edit');
      get_subtable('<?php echo $tbl_name; ?>','edit');      
    });
    
   // ======================================================================
   // ========= Кнопка Сохранить редактирование объекта ====================
   // ======================================================================
   
   $('#btn_edit_save').on('click', function(){      
        var tmpdata = {};//массив для занесения пар "имя поля" - "значение"
        $('#modal_edit').find('select').each(function() {      
            tmpdata[this.name] = $(this).find('option:selected').attr('value').replace(/"/g, '&quot;');      
        });
        $('#modal_edit').find('input').each(function() {              
            tmpdata[this.name] = $(this).val().replace(/"/g, '&quot;');
        });  
        $.ajax({
            url: 'Ctrl_object_register/update',
            type: 'POST',
            datatype:'JSON',
            data: tmpdata,                     
            success: function (data){     
                $('#modal_edit').modal('hide');
                show_data();
            }
        });      
   });
   
   // =========================================================================
   // === Функция получения фото по объекту из БД и вывод в элемент страницы ==
   // ========================================================================= 
   
   function get_foto_by_id_object(id_ob, id_el){
       
       $(id_el).empty();//очистка контейнера для вывода
       
        $.ajax({
            url: 'Ctrl_object_register/get_docs_by_object_id',
            type: 'POST',
            datatype:'JSON',
            data: {id:id_ob},                     
            success: function (data){                
                $.each(JSON.parse(data), function(key, value){                    
                    $.each($(this), function (key, value){
                        let nnn=value['name'];
                        let link=value['doc_link'];
                        let doc_id=value['id'];                        
                        $(id_el).append('<div class="col-sm-3 col-md-3 doc_links">\n\
                            <button type="button" class="btn btn-danger link_del_doc" id="link_del_doc_id_'+doc_id+'" data-path="'+link+'">x</button>\n\
                            <a href="'+link+'" target="_blank" class="col-md-1 col-sm-1">'+nnn+
                            '<br><img src="'+link+'" style="width:100%; max-width:100px" class="col-md-1 col-sm-1">\
                            </a>\n\
                        </div>');
                    });                    
                });                                
                set_event_link_del_doc();
            }
        });  
   }
   
   
   // ======================================================================
   // ========= Служебные функции ==========================================
   // ======================================================================    
    
    function get_field_by_id(table, field, id, element){
    $.ajax({
           type : "POST",
           url  : 'Ctrl_service/get_field_by_id',
           dataType : "JSON",
           data: {table:table,field:field, id:id},
            success: function(data){                                      
                $(element).val((data[0][field]));                
            }
       });       
   }
      
   function get_id_by_field(table, field_name, field_value, element){
    $.ajax({
           async:false,
           type : "POST",
           url  : 'Ctrl_service/get_id_by_field',
           dataType : "JSON",
           data: {table:table,field_name:field_name, field_value:field_value},
            success: function(data){                                   
                $(element).val((data[0].id));                
            }
       });      
   }  
   
   //------------- Заполнение всех селектов модального окна из справочников ----
   function for_each_select (id_div){
    $.each($(id_div), function(){              
       let rrr = $(this).attr('id');
       select_array.push(rrr);
       $.ajax({
           type : "POST",
           url  : 'Ctrl_'+$(this).data('tbl')+'/data',
           async:false,
           dataType : "JSON",            
            success: function(data){                
                $('#'+rrr).empty();
                $('#'+rrr).append($('<option>').val('99999').text('Оберіть значення').attr({selected:true, disabled:true}));
                $.each(data, function (key, value){                    
                    $.each($(this), function (key, value){                      
                      $('#'+rrr).append($('<option>').val(value['id']).text(value['name']));                      
                    });
                });                                
            }
       });        
    });
   } // --------------------- > END FOR EACH SELECT
   
   // ---- очистка состояния интерфейса после загрузки файла документа объекта ------
   function clear_info(){       
       $('#btn_download_file').val('Завантажити файл');
       $('#btn_download_file').css({'background':'#337ab7'});
       $('#btn_download_file').css({'color':'white'});
       document.getElementById("sel_files").value = null;
       $('#dir_upl_name').val('type');
   }
   var my_buttons='';
  // -----------------------------------------------------------------------
  // -------- Функция отображения форм и подтаблиц с данными ---------------
  // -----------  структура и данные передаются из контроллера -------------
  //------------------------------------------------------------------------
  var func='';//для смены функции контроллера добавление/редактирование данных
  function get_interface_settings (cur_set, el_set_id, par){      
      var ifs = '<?php echo json_encode($if_settings); ?>';
      var array_fields=[];                
        $.each(JSON.parse(ifs), function(key, value){
          if (key==cur_set){
              $.each(value, function(key, value){                                    
                  if (key=='flds'){ // --------------------- Для таблицы                    
                      //$('#name_ob').prepend(JSON.parse(ifs)[cur_set]["form_name"]+' ');
                      var myhtml = '';
                      myhtml += '<div class="row">';
                      myhtml += '<div class="col-sm-12">';                      
                      myhtml += '<table class="table table-striped responsive" id="'+cur_set+'">';
                      myhtml += '<thead>';                      
                      myhtml += '<tr>';                  
                      console.log(JSON.parse(ifs)[cur_set]['buttons']);
                      $.each(value, function(key, value){                          
                            if (typeof value!=='object'){//если значение не объект, обычный инпут                                
                                // если разрешено к выводу в интерфейсе (нет ведущего символа '_')
                                if (key.substring(0,1)!=='_'){                                    
                                        myhtml += '<th>'+key+'</th>';
                                        array_fields.push(value);
                                }                                                                    
                            }                            
                            else {// если значение - объект, вывод селекта с данными из справочника                                                                                                
                                myhtml += '<th>'+key+'</th>';                                
                                var fn = key;// Имя поля (для форм) запоминаем в переменную
                                $.each(value, function(key, value){                                    
                                    //$(el_set_id).append('<br>&nbsp;&nbsp;&nbsp;&nbsp;'+key+'--->'+value);
                                    // продолжаем заносить поля для вывода в массив
                                    if (key.substring(0,1)!=='_'){
                                        array_fields.push(key);
                                    }
                                });                                
                            }                           
                      });                                                  
                        if (JSON.parse(ifs)[cur_set]['buttons'].length>0){
                               myhtml += '<th>Дії</th>';
                        }
                        myhtml += '</tr>';                      
                        myhtml += '</thead>';
                        myhtml += '<tbody class="show_data" id="sd_">';
                        myhtml += '</tbody>';
                        myhtml += '</table>';
                        myhtml += '</div><!-- col-md-12 -->';
                        myhtml += '</div>';
                        $(el_set_id).append(myhtml);// Запись сформированного заголовка таблицы
        
                    // Получение данных в таблицу от соотвествующей функции контроллера:
                    var str_rez='';
                    var tmp_str='';
                    var myid;
                    $.ajax({
                            async:true,
                            type : "POST",
                            url  : "Ctrl_object_register/"+cur_set,
                            dataType : "JSON",
                            data:{id:$('#id_ob').val(), id_service:par},
                            success: function(data){                                                 
                                $.each(data, function(key, value){                                   
                                   str_rez=str_rez+'<tr>';
                                   $.each(value, function(key, value){                                       
                                      if ((array_fields).indexOf(key)!==-1){
                                           str_rez=str_rez+'<td>'+value+'</td>';                               
                                       }
                                       if (key=='id'){
                                           myid = value;
                                       }
                                   });  
                                    
                                        if (JSON.parse(ifs)[cur_set]['buttons'].length>0){
                                        
                                            $.each(JSON.parse(ifs)[cur_set]['buttons'], function(key,value){
                                                switch (value){
                                                    case 'add':
                                                        tmp_str+='--add--';
                                                        break
                                                    case 'edit':
                                                        tmp_str+='<a href="javascript:void(0);" class="btn btn-warning btn-sm btn_add_child" data-id="'+myid+'">Edit</a>';
                                                        break
                                                    case 'browse':
                                                        tmp_str+='--browse--';
                                                        break
                                                    case 'del':
                                                        tmp_str+='--del--';
                                                        break
                                                    default:
                                                        break
                                                }
                                            });
                                        }
                                        str_rez+='<td>'+tmp_str+'</td>';
                                        str_rez=str_rez+'</tr>';
                                        tmp_str='';
                                    
                                });
                                
                                $('#'+cur_set+' .show_data').append(str_rez);
                                var mytable = cur_set;// переменная для загона таблицы под ее ИД.
                                $$mytable = $('#'+cur_set).DataTable({select:true,
                                    "order":[[2, "desc"],[1,"desc"]],
                                    columnDefs: [ {
                                    targets: 5,
                                    render: function ( data, type, row ) {
                                        return type === 'display' && data.length > 50 ?
                                        data.substr( 0, 50 ) +'…' :
                                        data;
                                    }
                                }]
                                });// загон таблицы. используем дальше 
                                // при получении текущей выбраной строки

                                // обработка для кнопок редактирования работ по объекту
                                //$('.btn_edit_work').on('click', function(){
                                $('#'+cur_set+' tbody').on('click', 'tr', function () {
                                    
                                      var ttr=[];                                                                                 
                                       // получение текущей строки из таблицы в массив
                                        //var cur_row = $$mytable.rows( { selected: true } ).data();                          
                                        var cur_row = $$mytable.rows(this).data();                          
                                         $.each(cur_row, function (index, value){        
                                             $.each(this, function (key, value){
                                                 ttr.push(value);
                                                 document.getElementById('btn_service_save_change').removeAttribute('disabled','');
                                                 document.getElementById('btn_service_add').style.display='none';
                                                 document.getElementById('btn_state').hidden = false;
                                             });
                                         }); 
                                    // занесение значений нужных колонок строки
                                    // в массив полей и селектов формы (которая уже выведена):                                                                  
                                   $('#form_edit_object_service_id').val(ttr[0]);
                                   $('#form_edit_object_service_date_plan').val(ttr[1]);
                                   $('#form_edit_object_service_date_fact').val(ttr[2]);
                                   $("#form_edit_object_service_service_type option:contains(" + ttr[3] + ")").prop('selected', 'selected');
                                   $("#form_edit_object_service_service_state option:contains(" + ttr[4] + ")").prop('selected', 'selected');
                                   $('#form_edit_object_service_descript').val(ttr[5]);
                                   $('#mysubtable2').empty();//чистка дива со второй подтаблицей если она есть
                                   get_interface_settings ('get_parts_by_service_id', '#modal_ob_works #mysubtable2',ttr[0]);
                                });
                            }                                                
                        });                        
                }
                
                if (key=='form_flds'){ // ------------------------ Для формы
                
                      var myhtml = '';
                      array_fields.length=0;
                
                      myhtml += '<div class="row">';
                      myhtml += '<div class="col-md-12 col-xs-12">';                      
                      myhtml += '<form name="'+cur_set+'" id="'+cur_set+'">';                      
                
                      $.each(value, function(key, value){                            
                            if (typeof value!=='object'){//если значение не объект, обычный инпут                                                                
                                    //myhtml +='<div class="form-group">';
                                        myhtml +='<div class="col-sm-12 col-md-5 d-inline"><label class="col-form-label">'+key+'</label></div>';                                        
                                        if (value.substring(0,4)=='date'){
                                            myhtml +='<div class="col-sm-12 col-md-7">';
                                            myhtml +='<input id="'+cur_set+'_'+value+'" class="form-control" type="date" name="'+value+'" value="">';
                                            myhtml +='</div>';
                                        }
                                        if (value.substring(0,4)!=='date'){
                                            if (value.substring(0,5)=='descr'){
                                                myhtml +='<div class="col-sm-12 col-md-12">';
                                                myhtml +='<textarea rows = "5" cols = "50" style="width:100%;" id="'+cur_set+'_'+value+'" class="form-control" type="textarea" name="'+value+'" value=""></textarea>';
                                                myhtml +='</div>';
                                            }
                                            else{
                                                myhtml +='<div class="col-sm-12 col-md-7">';
                                                myhtml +='<input id="'+cur_set+'_'+value+'" class="form-control" type="text" name="'+value+'" value="">';
                                                myhtml +='</div>';
                                            }
                                            
                                        }                                        
                                        
                                        //myhtml +='<input id="'+cur_set+'_'+value+'" class="form-control" type="text" name="'+value+'" value="">';
                                        //myhtml += '</div><!-- col-md-8 -->';
                                    //myhtml += '</div><!-- form-group -->';
                                    
                                    array_fields.push(value);                                                                                            
                            }
                            else {// если значение - объект, вывод селекта с данными из справочника                                
                                var fn = key;// Имя поля (для форм) запоминаем в переменную
                                $.each(value, function(key, value){//                                                                                                           
                                        //myhtml +='<div class="form-group">';
                                        myhtml +='<div class="col-sm-12 col-md-4"><label class="col-form-label">'+fn+'</label></div>';
                                        myhtml +='<div class="col-sm-12 col-md-8">';                                            
                                            myhtml +='<select id="'+cur_set+'_'+value+'" name="'+value+'" class="form-control form-select" data-tbl="'+value+'"></select>';
                                        myhtml += '</div><!-- col-md-8 -->';
                                        //myhtml += '</div><!-- form-group -->';
                                        
                                        array_fields.push(value);                                                                                
                                });                                
                            }                            
                      });  
                       
                        myhtml += '<button type="submit" class="btn btn-success col-sm-12 mb-sm-1" id="btn_service_add";>Додати обслуговування</button></form>';
                       
                        $(el_set_id).append(myhtml);// Запись сформированных полей формы
                        // заполнение селектов
                        for_each_select("#form_edit_object_service select");                                
                        $('#btn_state').on('click', function(){
                            document.getElementById('btn_service_save_change').setAttribute('disabled','');
                            document.getElementById('btn_service_add').style.display='inline';
                            this.hidden = true;                            
                            $('#'+cur_set).trigger('reset');
                        });
                        
                        func = 'save';
                        $('#'+cur_set).submit(function(e){                            
                            var fsd = $(this).serialize()+'&id_object='+$('#id_ob').val();                                                        
                            $.ajax({
                                type : "POST",
                                url  : 'Ctrl_object_service/'+func,                                
                                dataType : "JSON",
                                data:fsd,
                                success: function(data){                                    
                                   $('#modal_ob_works #mysubtable').empty();
                                   $('#form_edit_object_service_id').val('');
                                   $('#form_edit_object_service_date_plan').val('');
                                   $('#form_edit_object_service_date_fact').val('');
                                   $("#form_edit_object_service_service_type option:contains('Оберіть значення')").prop('selected', 'selected');
                                   $("#form_edit_object_service_service_state option:contains('Оберіть значення')").prop('selected', 'selected');
                                   $('#form_edit_object_service_descript').val('');
                                    // создание подтаблицы и получение данных
                                    $('#mysubtable').empty();
                                    get_interface_settings ('get_service_by_object_id', '#modal_ob_works #mysubtable');  
                                }
                            });                            
                            return false;                           
                        });
                        
                        $('#btn_service_save_change').on('click', function(){                            
                            func='update';                            
                            $('#'+cur_set+' button[type="submit"]').trigger('click');
                        });                    
                }                
            });                        
          }          
      });            
  }
  
  
  $('body').on('click','.btn_add_child', function(){
    alert($(this).data('id'));
    document.location.href = "Ctrl_object_service";
  });
  
  
  $('#bkp').on('click', function make_db_backup (){
  console.log("--- начало архивации");
    $.ajax ({
       type: "POST",
       url:"Ctrl_service/make_db_backup",
       success: function(data){
           console.log(data);
           console.log("--- конец архивации");
       }       
    });
  });
    
   
});  // --- End document ready function

</script>