 <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="container-fluid">  
    <section class="content-header">
      <h1 class="mt-4">
          ---
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

          <?php if(in_array('createGroup', $user_permission)): ?>
            <a href="<?php echo base_url('Controller_Permission/create') ?>" class="btn btn-primary">Add Permission</a>
            <br /> <br />
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Permission</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="groupTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Permission Name</th>
                  <?php if(in_array('updateGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                    <th>Action</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($groups_data): ?>                  
                    <?php foreach ($groups_data as $k => $v): ?>
                      <tr>
                        <td><?php echo $v['group_name']; ?></td>

                        <?php if(in_array('updateGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                        <td>
                          <?php if(in_array('updateGroup', $user_permission)): ?>
                          <a href="<?php echo base_url('Controller_Permission/edit/'.$v['id']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>  
                          <a href="<?php echo "#" ?>" class="btn btn-warning btn-sm btn_edit" data-id="<?php echo $v['id'] ?>"><i class="fa fa-edit"></i>Edit</a>  
                          <?php endif; ?>
                          <?php if(in_array('deleteGroup', $user_permission)): ?>
                          <a href="" data-toggle="modal" data-target="#delete_levels<?php echo $v['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          
                          <div class="modal fade" id="delete_levels<?php echo $v['id'] ?>" role="dialog">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Are You Sure ? </h4>
                                </div>
                                <div class="modal-body">
                                  <p></p>
                                </div>
                                <div class="modal-footer">
                                <form action="<?php echo base_url('Controller_Permission/delete/'.$v['id']) ?>" method="post">
            
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-danger" name="confirm" value="Delete">
          </form>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php endif; ?>
                        </td>
                        <?php endif; ?>
                      </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
      

    </section>
    </div>
    <!-- /.content -->
  <!--/div-->
  <!-- /.content-wrapper -->
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
        
        
        $('.btn_edit').on('click', function(){           
            alert($(this).data('id'));
           $('#Modal_Edit').modal('show');   
        });
        
      $('#groupTable').DataTable({
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print'
        ]
      });

      $("#mainGroupNav").addClass('active');
      $("#manageGroupNav").addClass('active');
    });
  </script>
