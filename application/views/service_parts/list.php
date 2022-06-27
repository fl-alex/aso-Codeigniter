<div class="container-fluid">                  
    <h1 class="mt-4"><?php echo $page_title; ?></h1>
    <hr>
        <button type="button" id="btn_add" class="btn btn-success" data-toggle="modal">
            Додати
        </button>&nbsp;
            Фільтри:
            <div id="cont_filter" class="d-inline"><select id="sel_filter" data-tbl="object_type" aria-label="123"></select></div>
        <div>&nbsp;</div>        
            
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <?php echo $table;?>                
            </div>
        </div>

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
                            <table class="table table-striped col-md-12" id="myeditdata2">
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
                        <!-- Подтаблица  -->                        
                        <div class="col-sm-12 col-md-8" id="mysubtable"></div>                          
                        </div>
                        <!-- Подтаблица  -->                        
                        <div class="col-sm-12 col-md-8" id="mysubtable2"></div>                          
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
$(document).ready(function(){

$('#mydata').DataTable({
       // responsive: true,
        dom: 'Bfrtip',
        "order": [[ 1, "asc"]],
        buttons: [ 'copy', 'csv', 'excel', 'pdf',            
            {
                extend: 'print',                
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
                                
            }
        ]        
    });
    
    
    
   
});  // --- End document ready function

</script>