      <div class="container-fluid">
        
          <h3 class="mt-4">Учет обслуживаемых объектов (ТОиР ;))</h3>
      
	  
	  
	
	  
	  </div>
	  
	  
	  
	  
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->




  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
	
	
	
    $(document).ready(function() {
    var printCounter = 0;
 
    // Append a caption to the table before the DataTables initialisation
    $('#example').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');
 
    $('#example').DataTable( {
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'pdf', 'print'
        ]
    } );
} );
	
	
	
  </script>






