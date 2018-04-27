  </div>

  <footer class="app-footer">
    <span><a href="http://coreui.io">CoreUI</a> © 2017 creativeLabs.</span>
    <span class="ml-auto"><img src="<?php echo base_url('assets/img/footer-logo.png');?>" style="height: 40px;"></span>
  </footer>

  <!-- Bootstrap and necessary plugins -->
  <script src="<?php echo base_url('assets/theme/popper.js/dist/umd/popper.min.js');?>"></script>
  <script src="<?php echo base_url('assets/theme/bootstrap/dist/js/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('assets/theme/pace-progress/pace.min.js');?>"></script>

  <!-- Plugins and scripts required by all views -->

  <!-- GenesisUI main scripts -->

  <script src="<?php echo base_url('assets/js/app.js');?>"></script>

  <!-- Plugins and scripts required by this views -->

  <!-- Custom scripts required by this view -->

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> -->
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/css/dataTables.checkboxes.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet">
  <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/js/dataTables.checkboxes.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">
  <!-- <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script> -->

  <script src="https://cdn.jsdelivr.net/npm/formvalidation@0.6.2-dev/dist/js/formValidation.min.js"></script>
  <script src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>

  <style>
  .help-block {
    color: red;
  }
  </style>

  <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>


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
