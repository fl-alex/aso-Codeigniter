<div class="modal fade" tabindex="-1" role="dialog" id="modal_ob_works">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Обслуговування об'єкта</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="modal-body">             
            <input type="text" class="col-md-12 col-sm-12 text-center bg-transparent" value="" id="name_ob" disabled="true">                    
            <input type="text" class="col-md-6 col-sm-6" value="" id="id_ob" disabled="true" hidden="true">  
            <div class="container-fluid">                                  
                <section class="content">
    
            <div class="tab">
              <button class="tablinks" id = "defaultOpen" onclick="openCity(event, 'tab_add_work')">Додати</button>
              <button class="tablinks" onclick="openCity(event, 'tab_view_works')">Перелік робіт</button>
              
            </div>

            <div id="tab_add_work" class="tabcontent">
                <span onclick="this.parentElement.style.display='none'">x</span>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div id="adding_messages"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form id="form_add_work" name="form_add_work" action="">
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
                    <!-- Подтаблица  -->                        
                    <div class="col-md-6">
                                                    
                    </div>                          
                    </div>
      
                </div> <!-- Конец первой вкладки-->

                <div id="tab_view_works" class="tabcontent">
                    <span onclick="this.parentElement.style.display='none'">x</span>
                    <table class="table table-striped responsive col-md-12" id="subtbl_ob_works">
                            <thead>
                                <tr>
                                    <?php //заголовки подтаблицы из массива
                                          // $subqueries в контроллере с ключом = $subquery_name                                         
                                        $subquery_name='get_service_by_object_id';
                                        $fields_array=array();                                                                             
                                        foreach ($subqueries as $key=>$value) {                                                                                                                        
                                            $tbl_col = $value;                                    
                                            $tbl_name = $key;                                            
                                            if ($key==$subquery_name){                                                
                                                $fields_array[]=$tbl_col;
                                                foreach ($tbl_col as $value) {                                                                                                                                                            
                                                    print_r('<th>'.$value.'</th>');
                                                }                                                            
                                                print_r('<th>Дії</th>');
                                            }
                                        }                                        
                                    ?>                        
                                    <!--th style="text-align: right;">Дії</th-->
                                </tr>
                            </thead>
                            <tbody id=<?php echo '"show_'.$subquery_name.'"';?>>                    
                            </tbody>
                        </table>
                    
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

<script>
    // Скрипт для работы вкладок ---------------------------------------------
    document.getElementById("defaultOpen").click();
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }
</script> 