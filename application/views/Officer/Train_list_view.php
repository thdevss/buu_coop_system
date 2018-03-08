<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#">เจ้าหน้าที่</a></li>
  <li class="breadcrumb-item active">จัดการข้อมูลการอบรม</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> จัดการข้อมูลการอบรม
              <a class="btn btn-primary float-right" href="<?php echo site_url('officer/Training/add');?>"><i class="fa fa-hand-pointer-o"></i> เพิ่มการอบรม</a>

            </div>
              <div class="card-body">
              <?php 
                  if($status){
                    echo '<div class="alert alert-'.$status['color'].'">'.$status['text'].'</div>';
                  }
          
                ?>
              <table class="table table-bordered" id="train_table">
                    <thead>
                      <tr bgcolor="">
                        <th class="text-center"></th>
                        <th class="text-center">วันที่</th>
                        <th class="text-center">ประเภท</th>
                        <th class="text-center">ชื่อโครงการ</th>
                        <th class="text-center">วิทยากร</th>
                        <th class="text-center">สถานที่อบรม</th>                        
                        <th class="text-center">จำนวนชั่วโมง</th>
                        <th class="text-center">จำนวนที่นั่ง</th>
                        <th class="text-center"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;
                    foreach ($data as $row){?>
                      <tr>
                        <td class="text-center"></td>
                        <td class="text-left"><?php echo thaiDate($row['train']['date']); ?></td>
                        <td class="text-left"><?php echo $row['train_type']['name'] ?></td>
                        <td class="text-left"><?php echo $row['train']['title'] ?></td>
                        <td class="text-left"><?php echo $row['train']['lecturer'] ?></td>
                        <td class="text-left"><?php echo $row['train_location']['room'] ?></td>                        
                        <td class="text-right"><?php echo $row['train']['number_of_hour'] ?></td>
                        <td class="text-right"><?php echo $row['train']['number_of_seat'] ?></td>
                        <td class="text-center">
                            <form action="<?php echo site_url('Officer/Training /delete'); ?>" class="form-inline" method="post">
                              <input type="hidden" name="id" value="<?php echo $row['train']['id'] ; ?>">
                              <?php echo anchor('Officer/Training/edit/'.$row['train']['id'], '<i class="fa fa-eraser"></i> เเก้ไขข้อมูล', 'class="btn  btn-primary"');?>                              
                              <p style="width:10px;"></p>
                              <button type="submit" class="btn btn-danger btn-submit"><i class="fa fa-trash-o"></i> ลบ</button>
                            </form>
                        </td>
                      </tr>
                    <?php 
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


        
      </div>
    </div>
  </div>
</div>



<script>


$('.btn-submit').on('click',function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "คุณแน่ใจใช่ไหม",
        text: "ที่จะลบข้อมูลที่เลือก",
        icon: "warning",
        buttons: true,
        dabgerMode: true
    })
    .then((isConfirm) => {
      if (isConfirm) {
        form.submit();
      } else {

      }
    })

});

$(document).ready(function() {

    var dataSrc = [];

    var table = $('#train_table').DataTable( {
        'columnDefs': [
       
        {
              "searchable": false,
              "orderable": false,
              "targets": 0
        }
        ],
        
        'initComplete': function(){
          var api = this.api();

          // Populate a dataset for autocomplete functionality
          // using data from first, second and third columns
          api.cells('tr', [2, 3, 4, 5, 6, 7]).every(function(){
              // Get cell data as plain text
              var data = $('<div>').html(this.data()).text();           
              if(dataSrc.indexOf(data) === -1){ dataSrc.push(data); }
          });
                
          // Sort dataset alphabetically
          dataSrc.sort();
                
          // Initialize Typeahead plug-in
          $('.dataTables_filter input[type="search"]', api.table().container())
              .typeahead({
                source: dataSrc,
                afterSelect: function(value){
                    api.search(value).draw();
                }
              }
          );
        }
        
    } );

    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


})

</script>