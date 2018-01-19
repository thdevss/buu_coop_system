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





</body>
</html>
