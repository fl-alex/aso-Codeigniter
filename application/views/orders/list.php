<div class="container-fluid">                  
    <h1 class="mt-4"><?php echo $if_settings['page_title']; ?></h1>
    <hr>
        
        
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-xs-12">
            <div id="messages"></div>
            <table class="table table-striped responsive" id="mydata">
                <thead>
                    <tr>
                        <?php //заголовки таблицы
                            $excluded_columns = array();
                            foreach ($if_settings['base_table'] as $key=>$value) {                                                            
                                if (substr($key,0,1)!=='_'){
                                  print_r('<th>'.$key.'</th>');
                                }
                                else {// формируем массив полей-исключений для вывода в интерфейсе через аякс
                                    array_push($excluded_columns, $value);
                                }
                            }
                        ?>                        
                        <th style="text-align: right;">Дії</th>
                    </tr>
                </thead>
                <tbody id="show_data">                    
                </tbody>
            </table>  
          </div><!-- col-md-12 -->
        </div><!-- /.row -->
    </section>    
 

    
        
        
 
 
 <!-- ======================================================================
 ===============  Модальное окно редактирования объекта =============
 ======================================================================== -->  
 
 <div class="modal fade" tabindex="-1" role="dialog" id="modal_edit">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Редагування об'єкту</h5>
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
                            <form id="myeditform" name="myeditform" action="">
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
                                        <table class="table table-striped responsive col-md-12" id="myeditdata3">
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
     
 
<!-- ======================================================================
 ===============  Модальное окно связанного объекта =======================
 ======================================================================== -->  
 
 <div class="modal fade" tabindex="-1" role="dialog" id="modal_rel_object">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header border-bottom border-success">
          <!--h6 class="modal-title col-sm-12 col-md-3">Обслуговування об'єкта</h6-->
          <!--input type="text" class="col-sm-12 col-md-4 text-center bg-transparent border-none" value="" id="name_ob" disabled="true"-->
          <h3 id="name_ob" class="modal-title col-sm-6 text-center"></h3>
          <h6 id="other_data_ob" class="modal-title col-sm-6 text-center"></h6>

        </div>
        
        <div class="modal-body">                         
            <div class="container-fluid">                                                                                
                <input type="text"  id="id_ob" class="col-sm-6" value="" hidden="true"/>
                <section class="content">                    
                    
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
 

<!--MODAL DELETE-->
 <form>
    <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Видалення запису</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
               <strong>Ви дійсно бажаєте видалити запис?</strong>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id_delete" id="id_delete" class="form-control">
            <button class="btn btn-secondary" data-dismiss="modal">Ні</button>
            <button type="submit" id="btn_delete" class="btn btn-primary">Так</button>
          </div>
        </div>
      </div>
    </div>
    </form>
<!--END MODAL DELETE-->
</div>

<script type="text/javascript">   
var select_array = [];// массив для id селектов. в модальном окне добавления        
var array_fields=[];  // массив видимых полей таблицы/формы

$(document).ready(function(){
        
$(".js-example-basic-tags").select2({
  tags: true
});

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });    
   
   show_data(); //call function show all product

    $('#mydata').DataTable( {
               //responsive: true,
        dom: 'Bfrtip',
        "order": [[ 2, "desc"], [ 3, "desc"],[0,"desc"]],
        buttons: [ 'copy', 'csv', 'excel', 'pdf',            
            {
                extend: 'print',                
                exportOptions: {
                    columns: [ 0, 1, 3,5,6 ]
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
    
    function show_data(){
        var ajaxurl='<?php echo $if_settings['ajax_url'] ?>';            
                          
        $.ajax({

            type  : 'ajax',
            url   : ajaxurl+'/data',
            async : false,
            dataType : 'json',
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
                                        html += '<td>'+data[i][key]+'</td>';                                                                         
                                }                                
                         });                                                
                    html += '<td style="padding:0px;">\n\
                    <a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Del</a>'+
                    '<a href="javascript:void(0);" class="btn btn-warning btn-sm btn_child" data-id="'+data[i].id+'" data-name_ob="'+data[i].name+'" data-name_service="'+data[i].service_name+'" data-date_plan="'+data[i].date_plan+'">З/ч</a>'+
                    '</td></tr>';
                }                               
                $('#show_data').html(html);                
                
            }
       });
    } // ========= END O SHOW_DATA ============

//=============================================================================
//==================== Форма УДАЛЕНИЯ. Обработка ==============================
//=============================================================================
var id_del='';
$('#show_data').on('click','.item_delete',function(){      
        $('#Modal_Delete').modal('show');
        id_del=$(this).data('id');        
    });
    
//-------------- запрос на удаление и обновление отображения данных

     $('#btn_delete').on('click',function(){        
        $.ajax({
            type : "POST",
            url  : "<?php echo ($if_settings['ajax_url'].'/delete')?>",
            dataType : "JSON",
            data : {id:id_del},
            success: function(){                            
                $('#Modal_Delete').modal('hide');
                show_data();
            }
        });        
    });  
 
 // ======================== Удаление на форме дочернего объекта ===============    
    $('body').on('click', '.btn_del_this', function(){                   
        $.ajax({
            type : "POST",
            url  : "<?php echo ($if_settings['child_ctrl'].'/delete')?>",
            dataType : "JSON",
            data : {id:$(this).data('id')},
            success: function(){   
                refresh_subtable();                  
            }
        });  
    });
    
    
    
    $('body').on('click', '.btn_add_child', function(){
        console.log('#'+$('#modal_rel_object form').attr('id')+'_'+'id_parent');
    });
    
    
 
    // ==========================================================================
    // ============ Открытие модальной формы дочернего объекта =================
    // ==========================================================================
    $('body').on('click','.btn_child', function(){        
        $('#modal_rel_object').modal('show');
        $('#name_ob').append($(this).data('name_ob'));
        $('#other_data_ob').append($(this).data('name_service')+' '+$(this).data('date_plan'));
        $('#id_ob').val($(this).data('id'));                
        get_interface_settings ('subtable', '#modal_rel_object #mysubtable', $(this).data('id'));                        
            $('#modal_rel_object').on('hidden.bs.modal', function () {// обработка закрытия модального окна        
                $('#name_ob').empty();//имя объекта
                $('#other_data_ob').empty();// дополнительные данные по объекту
                $('#mysubtable').empty();//контейнер для таблицы
                $('#form_edit').empty();//контейнер для формы
            });
        get_interface_settings ('subform', '#modal_rel_object #form_edit');        
    });
  
  
  // ----------------- Обновление подтаблицы c дочерним объектом -----------------
  function refresh_subtable(){
      $('#mysubtable').empty();//контейнер для таблицы      
      get_interface_settings ('subform', '#modal_rel_object #mysubtable', $('#'+$('#modal_rel_object form').attr('id')+'_'+'id_parent').val());
  }
  
  // ----------------- Обновление формы c дочерним объектом -----------------   
  function refresh_form(){                   
      $.each($('#modal_rel_object form input, #modal_rel_object form textarea' ), function(){            
          let t = $(this).attr('id');
          if ((t.substr(t.length-9)!=='id_parent') && (t.substr(t.length-2)!=='id')){              
             $(this).val('');
          }         
      });
  }
  
  $('<button type="button" class="btn btn-info" id="btn_group_action">Сформувати заявку</button>').insertAfter($('#btn_service_save_change'));
  
  
  // -----------------------------------------------------------------------
  // -------- Функция отображения форм и подтаблиц с данными ---------------
  // -----------  структура и данные передаются из контроллера -------------
  //------------------------------------------------------------------------
  var func='';//для смены функции контроллера добавление/редактирование данных
  function get_interface_settings (cur_set, el_set_id, par){      
      var ifs = '<?php echo json_encode($if_settings); ?>';                    
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
                            url  : "<?php echo $if_settings['ajax_url'].'/'; ?>"+cur_set,
                            dataType : "JSON",
                            data:{id:$('#id_ob').val(), id_parent:par},
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
                                                        tmp_str+='<a href="javascript:void(0);" class="btn btn-danger btn-sm btn_del_this" data-id="'+myid+'">Del</a>';
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

                                // обработка для кликов по первой подтаблице                                
                                $('#'+cur_set+' tbody').on('click', 'tr', function () {                                     
                                    var ttr=[];                                                                                 
                                     // получение текущей строки из таблицы в массив                                        
                                      var cur_row = $$mytable.rows(this).data();                          
                                       $.each(cur_row, function (index, value){        
                                           $.each(this, function (key, value){
                                               ttr.push(value);
                                               document.getElementById('btn_service_save_change').removeAttribute('disabled','');
                                               document.getElementById('btn_service_add').style.display='none';
                                               document.getElementById('btn_state').hidden = false;
                                           });
                                       });                                    
                                        // !!!ПОСЛЕДОВАТЕЛЬНОЕ!!! заполнение полей и селектов формы из массива с текущей строкой Datatable:                                   
                                        var qqq = -1;                                    
                                        $.each(JSON.parse(ifs)[cur_set]['flds'], function(key, value){                                        
                                             if (typeof value!=='object'){
                                                if (array_fields.indexOf(value)!==-1){
                                                    qqq = Number(qqq+1);
                                                    $('#'+$('#form_edit form').attr('id')+'_'+value).val(ttr[qqq]);                                                                                                  
                                                }
                                             } 
                                             else {
                                                 qqq = Number(qqq+1);                                            
                                                 $('#'+$('#form_edit form').attr('id')+'_'+Object.values(value)[0]+" option:contains(" + ttr[qqq] + ")").prop('selected', 'selected');                                            
                                             }                                                                     
                                        });                                  
                                   //$('#mysubtable2').empty();//чистка дива со второй подтаблицей если она есть
                                   //get_interface_settings ('get_parts_by_service_id', '#modal_ob_works #mysubtable2',ttr[0]);
                                });
                            }                                                
                        });                       
                }
                
                if (key=='form_flds'){ // ------------------------ Для формы
                
                      var myhtml = '';                      
                      myhtml += '<div class="row">';
                      myhtml += '<div class="col-md-12 col-xs-12">';                      
                      myhtml += '<form name="'+cur_set+'" id="'+cur_set+'">';                      
                    
                    $.each(value, function(key, value){                        
                        if (typeof value!=='object'){                            
                            if (array_fields.indexOf(value)!==-1){//если значение не объект, обычный инпут                                
                                if (value.substring(0,4)=='date'){
                                    myhtml +='<div class="col-sm-12 col-md-5 d-inline"><label class="col-form-label">'+key+'</label></div>';
                                    myhtml +='<div class="col-sm-12 col-md-7">';
                                    myhtml +='<input id="'+cur_set+'_'+value+'" class="form-control" type="date" name="'+value+'" value="">';
                                    myhtml +='</div>';
                                }
                                if (value.substring(0,4)!=='date'){
                                    if (value.substring(0,5)=='descr'){
                                        myhtml +='<div class="col-sm-12 col-md-5 d-inline"><label class="col-form-label">'+key+'</label></div>';
                                        myhtml +='<div class="col-sm-12 col-md-12">';
                                        myhtml +='<textarea rows = "5" cols = "50" style="width:100%;" id="'+cur_set+'_'+value+'" class="form-control" type="textarea" name="'+value+'" value=""></textarea>';
                                        myhtml +='</div>';
                                    }
                                    
                                    else if ((value=='id')||(value=='id_parent')){                                        
                                        myhtml +='<input id="'+cur_set+'_'+value+'" class="form-control" type="text" name="'+value+'" value="" hidden="true">';                                    
                                    }
                                    else{
                                        myhtml +='<div class="col-sm-12 col-md-5 d-inline"><label class="col-form-label">'+key+'</label></div>';
                                        myhtml +='<div class="col-sm-12 col-md-7">';
                                        myhtml +='<input id="'+cur_set+'_'+value+'" class="form-control" type="text" name="'+value+'" value="">';
                                        myhtml +='</div>';
                                    }                                            
                                }                                                                                                                                                     
                              }                              
                        }  
                        
                        else {// если значение - объект, вывод селекта с данными из справочника 
                            if (array_fields.indexOf(Object.keys(value)[0])!==-1){                                                                             
                                myhtml +='<div class="col-sm-12 col-md-4"><label class="col-form-label">'+Object.keys(value)[0]+'</label></div>';
                                myhtml +='<div class="col-sm-12 col-md-8">';                                            
                                    myhtml +='<select id="'+cur_set+'_'+Object.values(value)[0]+'" name="'+Object.values(value)[0]+'" class="form-control form-select" data-tbl="'+Object.values(value)[0]+'"></select>';
                                myhtml += '</div><!-- col-md-8 -->';                                                                          
                            }
                        }
                    });  
                       
                        myhtml += '<button type="submit" class="btn btn-success col-sm-12 mb-sm-1" id="btn_service_add";>Додати</button></form>';                       
                        $(el_set_id).append(myhtml);// Запись сформированных полей формы
                        // заполнение селектов
                        for_each_select("#"+cur_set+" select");            
                        //=========== Родительский id ------------------------
                        $('#'+cur_set+'_id_parent').val($('#id_ob').val());
                        $('#btn_state').on('click', function(){
                            document.getElementById('btn_service_save_change').setAttribute('disabled','');
                            document.getElementById('btn_service_add').style.display='inline';
                            this.hidden = true;                            
                            refresh_form();
                        });
                        
                        func = 'save';
                        $('#'+cur_set).submit(function(e){
                            if (func=='save'){$('#'+cur_set+'_id').val('');}//убирать id в форме, если остался после редактирования, иначе сработает constrait duplicate БД.
                            var fsd = $(this).serialize()+'&id_object='+$('#id_ob').val();                                                        
                            $.ajax({
                                type : "POST",
                                url  : 'Ctrl_service_parts/'+func,                                
                                dataType : "JSON",
                                data:fsd,
                                success: function(data){                                                                       
                                    refresh_subtable();
                                    refresh_form();                                                                                                            
                                }
                            });                            
                            return false;                           
                        });
                        
                        $('#btn_service_save_change').on('click', function(){// если нажата кнопка
                            func='update';    
                            $('#'+cur_set+' button[type="submit"]').trigger('click');// имитация сабмита, но с параметром update
                        });                    
                }                
            });                        
          }          
      });           
  }
   
   
   $('body').on('click', '#btn_group_action', function(){
     var data = $$mytable.data().toArray();
 
        data.forEach(function(row, i) {
          row.forEach(function(column, j) {
            console.log('row ' + i + ' column ' + j + ' value ' + column);
          });
        });

   });
   
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
    
});  // --- End document ready function

</script>