<!-- =================================================================== -->
   <!-- ============= Сайдбар ============================================= -->
   <!-- =================================================================== -->
<body>
  <div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"></div>
      
        <div class="list-group list-group-flush">            
            <a class="list-group-item list-group-item-action bg-light nav-link dropdown-toggle" 
             href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
             aria-haspopup="true" aria-expanded="false"><b>Довідники</b></a>
                  <div class="dropdown-menu- dropdown-menu-right" aria-labelledby="navbarDropdown">                                                                      
                    <a class="dropdown-item" href="Ctrl_object_location">Розташування</a>
                    <a class="dropdown-item" href="Ctrl_service_company">Сервісні компанії</a>
                    <a class="dropdown-item" href="Ctrl_object_type">Типи об'єктів</a>
                    <a class="dropdown-item" href="Ctrl_doc_type">Типи документів</a>
                    <a class="dropdown-item" href="Ctrl_service_type">Типи обслуговувань</a>
                    <a class="dropdown-item" href="Ctrl_service_state">Статуси обслуговувань</a>
                    
                  </div>
        </div>
      
        <div class="list-group list-group-flush">            
            <a class="list-group-item list-group-item-action bg-light nav-link dropdown-toggle" 
             href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
             aria-haspopup="true" aria-expanded="false"><b>Дані</b></a>
                  <div class="dropdown-menu- dropdown-menu-right" aria-labelledby="navbarDropdown">                     
                    <a class="dropdown-item" href="Ctrl_object_register">Об'єкти</a>
                    <a class="dropdown-item" href="Ctrl_object_service">Роботи</a>
                    <a class="dropdown-item" href="Ctrl_docs">Документи</a>
                    <a class="dropdown-item" href="Ctrl_service_parts">Запчастини</a>
                    <a class="dropdown-item" href="Ctrl_orders">Заявки</a>
                    <!--a class="dropdown-item" href="Ctrl_doc_reestr">Планові роботи</a>
                    <a class="dropdown-item" href="Ctrl_doc_reestr">Заявки на запчастини</a-->
                    
                  </div>
        </div>
      
        <div class="list-group list-group-flush">            
            <a class="list-group-item list-group-item-action bg-light nav-link dropdown-toggle" 
             href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
             aria-haspopup="true" aria-expanded="false"><b>Адміністрування</b></a>
                  <div class="dropdown-menu- dropdown-menu-right" aria-labelledby="navbarDropdown">                                                                   
                    <a class="dropdown-item" href="Controller_members">Користувачі</a>                    
                    <a class="dropdown-item" href="Controller_permission">Права</a>
                  </div>
        </div>
      
      </div>        
    
  <!-- =================================================================== -->
  <!-- ============= Верхнее меню  ======================================= -->
  <!-- =================================================================== -->
  
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-sm navbar-light bg-light border-bottom">
        <button class="btn border" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
          <span class="navbar-toggler-icon"></span>
        </button>
 
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
<!--            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
                 
            </li>-->
          </ul>            
            <?php echo ($this->session->username." (".$this->session->email.")&nbsp;"); ?>
            <a href="<?php echo base_url('auth/logout') ?>" class="bg-light">Вихід</a> 
            
        </div>
      </nav>
<!-- ================================================================== -->
<!-- ============= Тело страницы ====================================== -->
<!-- ================================================================== -->
