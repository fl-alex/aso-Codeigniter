<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>
      <?php if (isset($page_title)) {
        echo $page_title;
      } ?>
      </title>
  
  <!-- =================================================================== -->
  <!-- ============= СТИЛИ =============================================== -->
  <!-- =================================================================== -->
  
  <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
  <!-- My CSS style -->
  <link href="assets/css/mystyle.css" rel="stylesheet"> 
  <!-- DataTable and buttons to export -->
  <link href="assets/vendor/datatables/css/dataTables.min.css" rel="stylesheet">
  <!--link href="assets/vendor/datatables/css/buttons.dataTables.min.css" rel="stylesheet"-->  
  <link href="assets/vendor/datatables/css/datatables.min.css" rel="stylesheet">  
  
  <!-- Multiselect >
  <link href="assets/vendor/bootstrap/css/multiselect.css" rel="stylesheet"-->
  
  <!-- Custom styles for this template -->
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">
  
  <!-- datepickers -->
  <link href="assets/vendor/jquery/jquery-ui.min.css" rel="stylesheet">
   
  
  <!-- =================================================================== -->
  <!-- ============= СКРИПТЫ ============================================= -->
  <!-- =================================================================== -->
  
  <!-- Bootstrap core JavaScript -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables and Export Buttons JavaScript -->
  <script src="assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/js/jszip.min.js"></script>
  <script src="assets/vendor/datatables/js/dataTables.buttons.min.js"></script>
  <script src="assets/vendor/datatables/js/pdfmake.min.js"></script>
  <script src="assets/vendor/datatables/js/vfs_fonts.js"></script>
  <script src="assets/vendor/datatables/js/buttons.html5.min.js"></script>
  <script src="assets/vendor/datatables/js/buttons.print.min.js"></script>
  <!-- DataTables responsive JavaScript -->
  <script src="assets/vendor/datatables/js/dataTables.responsive.min.js"></script>
  <script src="assets/vendor/datatables/js/datatables.min.js"></script>
  <!-- Скрипт с гитхаба для печати конкретного дива. Есть параметры
  http://projects.erikzaadi.com/jQueryPlugins/jQuery.printElement/
  ------------------------------------------------------------------>
  <script src="assets/vendor/jquery.printElement.min.js"></script>
  
  <!-- Multiselect >
  <link href="assets/vendor/bootstrap/js/multiselect.js" rel="stylesheet"-->
 <!-- Select2 -- -->
 <link href="assets/vendor/select2/css/select2.min.css" rel="stylesheet">
 <script src="assets/vendor/select2/js/select2.min.js"></script>
  
 <script src="assets/vendor/jquery/jquery-ui.min.js"></script>
 <script src="assets/vendor/jquery/date.format.js"></script>
    
  <style>
      
      #container_add h6, #inputNumber, #inputCategory {
          display: inline;
          height: 25px;
      }      
      
      input[type=search], select[name=myeditdata_length] {
          height: 25px;
      }
      
      #container_add select, #container_add select option, 
            #myeditdata_length label, myeditdata_filter label,
            #myeditdata2_length label, myeditdata2_filter label,
            #myeditdata2_info, #myeditdata_info, #myeditdata2_next, 
            #myeditdata2_previous, #myeditdata_next, #myeditdata_previous{
          font-size: 12px;
      }
      
      #inputNumber {
          font-weight: bold;
          color: green;
          text-align: center;
          vertical-align: central;
          padding: 0px;
      }
      #inputMemb1, #inputMemb2 {
        display: inline-block;
        height: 25px;
      }
      
      .select2-container--default .select2-selection--single {     
          margin-bottom: 5px;
          min-width: 500px;       
      }
            
            
      #selectMember1 option {
          font-size: 10px;
      }
      
      .form-group.row {
          margin-bottom: 3px!important;
      }
    
      .tbl_chk {
            display: inline-flex;           
            padding-right: 2%;           
        }
      
      .tbl_chk td, .chksl {
          padding-bottom: 0px!important;
          margin-bottom: 0px!important;
      }      
      
      .td_category_list {
          font-size: 80%;
          
          
      }
      td div {
          font-size: 80%;          
          margin:  2px 0px 3px 0px;
          line-height: 12px;
      }
      
      /* ================================================================= 
      ===== Стили подтаблиц, отображаемых на формах ======================
      =================================================================== */
/*      #myeditdata, #myeditdata2, #myeditdata3, #subtbl_ob_works {
          font-size: 80%;
      }
      #myeditdata td, #myeditdata2 td, #myeditdata3 td, #subtbl_ob_works td
      {
          padding: 0px 1px 0px 1px!important;
      }
      
      #myeditdata th, #myeditdata2 th, #myeditdata3 th, #subtbl_ob_works th {
          padding: 0px 3px 0px 3px;
      }
      
      #myeditdata tr:hover, #myeditdata2 tr:hover, #myeditdata3 tr:hover, #subtbl_ob_works tr:hover {
          background: lightgoldenrodyellow;
      }
      
      .mymsg #str_message {
          background:  pink;
          padding: 10px 10px 10px 10px;
          
          text-align: center;
          vertical-align: central;
          
      }*/
  
.chks {
  position: absolute;
  z-index: -1;
  opacity: 0;
}

.chks+label {
  display: inline-flex;
  align-items: center;
  user-select: none;
  font-size: 90%;
}
.chks+label::before {
  content: '';
  display: inline-block;
  width: 1em;
  height: 1em;
  flex-shrink: 0;
  flex-grow: 0;
  border: 1px solid #adb5bd;
  border-radius: 0.25em;
  margin-right: 0.5em;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: 50% 50%;
}

.chks:checked+label::before {
  border-color: #0b76ef;
  background-color: #0b76ef;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3e%3c/svg%3e");
}

/* стили при наведении курсора на checkbox */
.chks:not(:disabled):not(:checked)+label:hover::before {
  border-color: #b3d7ff;
}
/* стили для активного состояния чекбокса (при нажатии на него) */
.chks:not(:disabled):active+label::before {
  background-color: #b3d7ff;
  border-color: #b3d7ff;
}
/* стили для чекбокса, находящегося в фокусе */
.chks:focus+label::before {
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
/* стили для чекбокса, находящегося в фокусе и не находящегося в состоянии checked */
.chks:focus:not(:checked)+label::before {
  border-color: #80bdff;
}
/* стили для чекбокса, находящегося в состоянии disabled */
.chks:disabled+label::before {
  background-color: #e9ecef;
}


.doc_links, td.child {/* второй селектор - для адаптивного дизайна дататейбел, 
    в котором меняется структура и классы скриптом */
font-size: 11px;
text-align: center;
}

/*изображения объектов в главной таблице интерфейса*/
/* второй селектор - для адаптивного дизайна дататейбел, 
   в котором меняется структура и классы скриптом */
.doc_links div img, .dtr-details > li > span > a > div > img {
    width: 40px;
    height: 30px;
}
  

/*#modal_edit*/
.form-control,  .form-select, div.form-group.row {
    height: 25px;
    margin: 0px 0px 3px 0px!important;
    padding: 0px 0px 0px 5px;
    font-size:13px;
    
    
}

.form-control {
    margin-bottom: 10px;
}

#modal_edit .btn {
    height: 30px;
    padding: 2px 5px;
    font-size: 15px;
}

.btn-sm{
    width: 38px;
    height: 25px;
    font-size: 11px;
    padding: 2px;
    margin-right: 1px;
    margin-left: 0px;
}


.link_del_doc {
    color: white;
    font-weight: bold;
    margin-right: 3px;    
    padding: 0px 0px 0px 0px;
    font-size: 10px;
    width: 15px;
    height: 15px;
    
}

.link_del_doc:hover {
    color:  wheat;
}

#show_data td {
    padding: 1px 1px 1px 1px!important;  
    vertical-align: baseline!important;
    font-size: 13px;
}

 /* =========================================================
 ========= Style the tab ====================================
 ============================================================*/
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
} 

/* Переопределение ширины для больших модальных окон бутстрапа  */
.modal-lg{
    max-width: 1024px!important;
}

.form-group {
    margin-bottom: 0px;
}

label {
    margin-bottom: 0px;
}

.col-form-label {
    padding: 0px;    
}

/* .subtable - контейнер для подтаблиц */
.subtable { 
    font-size: 11px;    
}

.subtable td {
    padding: 1px 2px 1px 2px!important;   
    width: max-content;
}

.subtable td:hover {
    cursor: pointer;
}


.dropdown-item {
    padding-top: 0px;
    padding-bottom: 0px; 
    font-size: 15px;
}
.dropdown-item:hover {
    cursor: pointer;
    background:  #e9ecef;
}

  </style>

</head>