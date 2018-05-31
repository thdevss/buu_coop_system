  </div>

  <footer class="app-footer">
    <span><a href="#" data-toggle="modal" data-target="#credit_modal">ระบบสหกิจ</a> © 2017 uLab</span>
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


<!-- The Modal -->
<div class="modal" id="credit_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ระบบสหกิจ</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p>รายนามผู้พัฒนารุ่นแรก</p>
        <p>อาจารย์ที่ปรึกษา: ผศ.ดร ณัฐนนท์ ลีลาตระกูล ( nutthanon@buu.ac.th )</p>
        <ol>
          <li>57160419 ปิยวัฒน์ น้อยภู่ ( 57160419@go.buu.ac.th )</li>
          <li>57660074 โกเมนทร์ เวียงคำ ( 57660074@go.buu.ac.th )</li>
          <li>57660132 พิเชษฐ์ ซื่อสัตย์ ( 57660132@go.buu.ac.th )</li>
          <li>57660135 ศานติกร อภัย ( 57660135@go.buu.ac.th )</li>
        </ol>
        <p class="text-center">
          <h1>Good luck, have fun lol ~</h1>
        </p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



</body>
</html>
