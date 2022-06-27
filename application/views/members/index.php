<div class="container-fluid">  
    <section class="content-header">
      <h1 class="mt-4">
          
        <?php if (isset($page_title)){echo $page_title;} else {echo "\$page_title";}?>
              </h1>      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>
          
          <?php if(in_array('createUser', $user_permission)): ?>
            <a href="<?php echo base_url('Controller_Members/create') ?>" class="btn btn-primary">Add New</a>
            <br /> <br />
          <?php endif; ?>

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
          
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
   
      
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
                        foreach ($tbl_str as $key=>$value) {                           
                        echo "<div class='form-group row'>";
                        echo "<label class='col-md-2 col-form-label'>".$key."</label>";
                        echo "<div class='col-md-10'>";
                            if ($value=='id'){
                                echo "<input type='text' name='id_edit' id='id_edit' class='form-control' placeholder='".$key."' readonly>";
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
      
      

    </section>
    <!-- /.content -->
  <!--/div-->
</div>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
            
    show_data(); //call function show all product

    $('#mydata').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'            
        ],
        "order": [[ 1, "asc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false                
            }]       
    } );             

    function show_data(){
              
                          var ttt = "";
        $.ajax({

            type  : 'ajax',
            url   : 'Controller_Members/data',
            async : false,
            dataType : 'json',
            success : 
                    
            
                function(data){
                
                console.log(data);
                var html = '';
                var i;
                // передача массива из ПХП (контроллера) в JSON:
                
                for(i=0; i<data.length; i++)  {
                    html += '<tr>';    
                    // для каждого элемента массива data[] (объекты-записи из БД):
                        $.each(data[i], function (key){
                                        html += '<td>'+data[i][key]+'</td>';
                        });
                    // дозаполняем переменную кнопками действий:
                    //ttt = "<?php // echo base_url('Controller_Members/edit/'); ?>"+data[i]['id']+'';
                    html += '<td style="text-align:right;">'+
                        '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" \n\
                                data-id="'+data[i].id+'" \n\
                                data-username="'+data[i].username+'" \n\
                                data-email="'+data[i].email+'" \n\
                                data-firstname="'+data[i].firstname+'" \n\
                                data-lastname="'+data[i].lastname+'" \n\
                                data-phone="'+data[i].phone+'">Edit</a>'+' '+
                        '<a href="Controller_Members/edit/' + data[i]['id']+ '" class="btn btn btn-warning btn-sm">Edit</a>'+' '+
                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                    '</td></tr>';
            
                }                               
                // заполняем котейнер на старнице полученными результатами:
                $('#show_data').html(html);
                }
                });
    } // ========= END O SHOW_DATA ============
    
    $(".item_edit").on('click', function(){
        console.log($(this).data());
        $("#Modal_Edit").modal('show');
    });
    
    });
  </script>
