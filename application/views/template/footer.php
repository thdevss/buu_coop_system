  </div>

  <footer class="app-footer">
    <span><a href="http://coreui.io">CoreUI</a> © 2017 creativeLabs.</span>
    <span class="ml-auto"><img src="<?php echo base_url('assets/img/footer-logo.png');?>" style="height: 40px;"></span>
  </footer>








  <!-- javascript -->
  <?php
  foreach($src_scripts as $file) {
    echo '<script src="'.$file.'"></script>';
  }
  ?>

  <!-- css -->
  <?php
  foreach($src_css as $file) {
    echo '<link rel="stylesheet" href="'.$file.'" />';
  }
  ?>




  <style>
  .help-block {
    color: red;
  }
  </style>



  <script>
    $(document).ready(function(){

      var table = $('.datatable').DataTable({
        "autoWidth": false,
        
        'columnDefs': [
        {
              "searchable": false,
              "orderable": false,
              "targets": 0
        }
        ],

      });
      table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
      } ).draw();




      $(".deleteForm").submit(function(event){
        event.preventDefault();
      });


    });

    function confirmDelete(e)
      {
        var link = jQuery(e).attr('href')
        
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.replace(link)
          }
        });

        return false;


      }
  </script>





</body>
</html>
