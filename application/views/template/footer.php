  </div>

  <footer class="app-footer">
    <span><a href="http://coreui.io">CoreUI</a> © 2017 creativeLabs.</span>
    <span class="ml-auto">Powered by <a href="http://coreui.io">CoreUI</a></span>
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
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script>
    $(document).ready(function() {
      $('.datatable').DataTable();
    } );
  </script>


  <link rel="stylesheet" href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
  <script>
  jQuery(function () {
    jQuery("#datetime").datetimepicker({
      format:'YYYY-MM-DD hh:mm:00 a'
    })
  });
  </script>
</body>
</html>
