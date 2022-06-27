<div class="container-fluid">                  
    <h1 class="mt-4"><?php echo $page_title; ?></h1>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add">
            Додати
        </button><br><br>
        
<section class="content">
    <div class="row">
        <div class="col-md-12 col-xs-12">
        <div id="messages"></div>
        <table class="table table-striped" id="mydata">
            <thead>
                <tr>
                    <?php //заголовкик таблицы 
                        foreach ($tbl_str as $key=>$value) {
                          print_r('<th>'.$key.'</th>');   
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
 

<!-- MODAL ADD -->
<form id="my_add_modal">
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $page_title; ?> - додати</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <?php //поля выборки - они же - подписи полей формы. Передается
               // из контроллера.
                    foreach ($tbl_td as $value) {                           
                    echo "<div class='form-group row'>";
                    echo "<label class='col-md-2 col-form-label'>".$value."</label>";
                    echo "<div class='col-md-10'>";
                        if ($value=='id'){
                            echo "<input type='text' name='id_edit' id='id_edit' class='form-control' placeholder='".$value."' readonly value='0'>";
                        }
                        else
                        {
                            ?> <?php echo "<input type='text' name='".$value."_edit' id='".$value."_edit' class='form-control' placeholder='".$value."'>" ?>
                       <?php }

                    echo "</div>";
                echo "</div>";
                  }
                ?>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
</form>
<!--END MODAL ADD-->
    
<!-- MODAL EDIT -->
    <form id="my_edit_modal">
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редагування: <?php echo $page_title; ?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                   <?php //поля выборки - они же - подписи полей формы. Передается
                   // из контроллера.
                        foreach ($tbl_td as $value) {                           
                        echo "<div class='form-group row'>";
                        echo "<label class='col-md-2 col-form-label'>".$value."</label>";
                        echo "<div class='col-md-10'>";
                            if ($value=='id'){
                                echo "<input type='text' name='id_edit' id='id_edit' class='form-control' placeholder='".$value."' readonly>";
                            }
                            else
                            {
                                ?> 
                                    <?php echo "<input type='text' name='".$value."_edit' id='".$value."_edit' class='form-control' placeholder='".$value."'>" ?>
                           <?php }
                        echo "</div>";
                    echo "</div>";
                      }
                    ?>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Скасувати</button>
                <button type="submit" id="btn_update" class="btn btn-primary">Зберегти зміни</button>
              </div>
            </div>
            </div>
        </div>
    </form>
<!--END MODAL EDIT-->

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

<!--Modal Window-->
<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--End of Modal Window-->

</div>


<script type="text/javascript">
$(document).ready(function(){
            
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
            
    show_data(); //call function show all product

    $('#mydata').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );             

    function show_data(){
        var ajaxurl='<?php echo $ajax_url ?>';            
                          
        $.ajax({

            type  : 'ajax',
            url   : ajaxurl+'/data',
            async : false,
            dataType : 'json',
            success : 

                function(data){
                //  console.log(data);
                var html = '';
                var i;
                // передача массива из ПХП (контроллера) в JSON:
                var tbltd = <?php echo json_encode($tbl_td); ?>;                        
                for(i=0; i<data.length; i++)  {
                    html += '<tr>';    
                    // для каждого элемента массива data[] (объекты-записи из БД):
                        $.each(data[i], function (key){
                                        html += '<td>'+data[i][key]+'</td>';
                        });
                    // дозаполняем переменную кнопками действий:

                    html += '<td style="text-align:right;">'+
//                        '<a href="javascript:void(0);" class="btn btn-secondary btn-sm item_browse" \n\
//                                data-id="'+data[i].id+'" \n\
//                                data-fam="'+data[i].fam+'" \n\
//                                data-name="'+data[i].name+'" \n\
//                                data-short_name="'+data[i].short_name+'">Browse</a>'+' '+
                        '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" \n\
                                data-id="'+data[i].id+'" \n\
                                data-fam="'+data[i].fam+'" \n\
                                data-name="'+data[i].name+'" \n\
                                data-short_name="'+data[i].short_name+'"\n\
                                data-short_name="'+data[i].type_dance+'">Edit</a>'+' '+
                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                    '</td></tr>';
                }                               
                // заполняем котейнер на старнице полученными результатами:
                $('#show_data').html(html);
                }
                });
    } // ========= END O SHOW_DATA ============


// ------ вешаем событие онклик на кнопку при нажатии Ентер:
$("#btn_save").on("keyup", function (evt) {
       if (evt.which===13) $("#yourButton").trigger("click");
   });

//=================================================================
//=============== Форма ДОБАВЛЕНИЯ. Обработка. ====================
//=================================================================

$('#btn_save').on('click',function(){
            
    var data = {}; // определяем data для ajax-запроса из всех input,textarea,
    // и select формы с id="my_add_modal"
    $('#my_add_modal').find ('input').each(function() {
      // обрезка имени єлемента (пять символов в конце: убираем _edit).
      data[this.name.substr(0, this.name.length - 5)] = $(this).val();    
    });
        var ajaxurl='<?php echo $ajax_url ?>';
        
            $.ajax({
                type : "POST",
                url  : "<?php echo ($ajax_url.'/save')?>",
                dataType : "JSON",                
                data: data,
                success: function(data){                   
                  $('#Modal_Add').modal('hide');
                  document.getElementById('my_add_modal').reset();
                  show_data();
                }
            });
            return false;
        });

//==========================================================================
//========= Форма РЕДАКТИРОВАНИЯ. Обработка. ===============================
//==========================================================================

    // ------ заполняем форму редактирования существующими данными ----------

    $('#show_data').on('click','.item_edit',function(){
        $('#Modal_Edit').modal('show');           
         var tbltd = <?php  echo json_encode($tbl_td); ?>;// передаем объект JSON
          // из контроллера - список полей выборки.
          for (key in tbltd) { // перебор объекта
             if (tbltd.hasOwnProperty(key)) {
             // присваиваем полю формы редактирования по его имени 
             // значение, равное значению, полученному из
             // результатов выборки (массив data[]). Определяем по ключу, 
             // равному текущему свойству объекта с полями выборки (tbltd[key]) 
                 $('[name="'+tbltd[key]+'_edit"]').val($(this).data(tbltd[key]));
            } 
          }
    });
    // ---------------- получаем отредактированные данные  --------------
    $('#btn_update').on('click',function(){
       var tbltd = <?php  echo json_encode($tbl_td); ?>;
       var data = {};
    $('#my_edit_modal').find ('input').each(function() {
      // обрезка имени єлемента (пять символов в конце: _edit).
      data[this.name.substr(0, this.name.length - 5)] = $(this).val();
    });   
    // запрос на обновление и отображение обновленных данных на странице
            $.ajax({
                type : "POST",
                url  : "<?php echo ($ajax_url.'/update')?>",
                dataType : "JSON",
                data: data,
              
                success: function(data){
                        for (key in tbltd) { // перебор объекта (не массива)
                            // и обнуление полей формы перед закрытием
                              if (tbltd.hasOwnProperty(key)) {  
                                  $('[name="'+tbltd[key]+'_edit"]').val("");
                             } 
                         }
                    $('#Modal_Edit').modal('hide');
                    show_data(); // показ/обновление списка
                }
            });
            return false;
        });

//=============================================================================
//==================== Форма УДАЛЕНИЯ. Обработка ==============================
//=============================================================================

    $('#show_data').on('click','.item_delete',function(){
        var id = $(this).data('id'); // id - имя класса в бутонах
         // на удаление
        $('#Modal_Delete').modal('show');
        $('[name="id_delete"]').val(id);
    });

    //-------------- запрос на удаление и обновление отображения данных

     $('#btn_delete').on('click',function(){
        var id = $('#id_delete').val();      
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
        return false;
    });
}); // --- End document ready function

</script>