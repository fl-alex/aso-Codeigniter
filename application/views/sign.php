<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
  
    <title>Вхід в систему</title>

    
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: url("img/T08995AE_DSC04246.JPG");
            background-size: cover;
        }                
        
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
     
    <link href="assets/css/sign.css" rel="stylesheet">
  </head>
  <body class="text-center">

      
      <!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Accounting of serviced objects</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <form class="form-signin" action="<?php echo base_url('auth/login') ?>" method="post">
        
        <div class="form-group has-feedback">
        <!--input type="email" class="form-control" name="email" id="email" value="" placeholder="Email" autocomplete="off"-->
        <input type="text" class="form-control" name="username" id="email" value="" placeholder="Username" autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" autocomplete="off">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
      
        <div class="col-xs-4">
          <br><button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
       
      </div>
        

</form>

      </div>

    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $("#loginModal").modal('show');    
});

</script>      
      
</body>
</html>

