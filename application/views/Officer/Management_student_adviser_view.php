<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row" >
      <!--table รายชื่อนิสิต-->
      <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> จัดอาจารย์ที่ปรึกษากับนิสิต</div>
          <div class="card-body">
              <table class="table table-bordered" id="student_table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th class="text-left">รหัสนิสิต</th>
                        <th class="text-left">ชื่อ-สกุล</th>
                        <th class="text-left">อาจารย์ที่ปรึกษา</th>
                        <th class="text-left">ชื่อบริษัท</th>
                        <th class="text-left">แขวง</th>
                        <th class="text-left">จังหวัด</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                   
              </table>
            <div style="height:40px;"></div>
                    <!---->
                        <div class="container-fluid row">
                          <div class="col-sm-12">
                            <label>เลือกอาจารย์ที่ปรึกษา</label>
                          </div>
                          <div class="col-sm-4">
                                <div class="form-group">
                                <select id="update_student_into_adviser_all" name="update_student_into_adviser_all" class="form-control adviser_val">
                                    <option value="">---กรุณาเลือก--</option>
                                    <?php foreach ($adviser as $row){?>
                                    <option value="<?php echo $row['adviser_id'];?>"> <?php echo $row['adviser_fullname'];?></option>
                                    <?php } ?>
                                </select>
                                </div>
                          </div>
                            <div class="col-sm-4">
                                <label></label>
                                <button type="button" class="btn btn-success" id="select_adviser_btn">ตั้งค่า</button>                             
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
</main>


<script>
$(document).ready(function() {
    var dataSrc = [];

    var table = $('#student_table').DataTable( {
        'columnDefs': [
          {
            'targets': 0,
            'checkboxes': {
              'selectRow': true
            }
          }, 
          {
            "searchable": false,
            "orderable": false,
            "targets": [1, 4]
          },
          {
            "targets": [ 8 ],
            "visible": false,
            "searchable": true,
          }
        ],
        'select': {
          'style': 'multi'
        },
        'order': [[2, 'asc']],
        "ajax": {
          "url": "<?php echo site_url('Officer/Management_student_adviser/ajax_list?company_id='.$this->input->get('company_id'));?>",
          "dataSrc": ""
        },
        "columns": [
            { "data": "student.student_id" },          
            { "data": "student.student_id" },
            { "data": "student.id_link" },            
            { "data": "student.student_fullname" },
            { "data": "adviser.select_box" },
            { "data": "company.company_name_th" },
            { "data": "company_address.company_address_area" },
            { "data": "company_address.company_address_province" },
            { "data": "adviser.adviser_fullname" },
        ],

        'initComplete': function(){
          var api = this.api();

          // Populate a dataset for autocomplete functionality
          // using data from first, second and third columns
          api.cells('tr', [2, 3, 8, 5, 6, 7]).every(function(){
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
        table.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    $('#select_adviser_btn').click( function () {
      var arr = $('#student_table').DataTable().column(0).checkboxes.selected()
      var adviser_id = jQuery(".adviser_val option:selected").val()
      
      update_student_into_adviser_ajax(arr, adviser_id)

    });
});

function update_student_into_adviser(student_id, adviser_id)
{
  update_student_into_adviser_ajax([student_id], adviser_id)
}

function update_student_into_adviser_ajax(arr, adviser_id)
{
  var current_table_page = $('#student_table').DataTable().page.info().page
      
      if(!arr) {
        swal("โปรดเลือกนิสิตที่ต้องการเพิ่ม", {
          icon: "warning",
        });
        return;
      }
      if(!adviser_id) {
        swal("โปรดเลือกอาจารย์ที่ปรึกษา", {
          icon: "warning",
        });
        return;
      }
      
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willUpdate) => {
        if (willUpdate) {
          var student_arr = []
          jQuery.each(arr, function( index, value ) {            
            student_arr.push(value)
          });



          var data = { students: student_arr, adviser: adviser_id }
          jQuery.post(SITE_URL+"/Officer/Management_student_adviser/ajax_change_status/", data, function(response) {
            if(response.status) {
              swal("เพิ่มนิสิตในอาจารย์เรียบร้อย", {
                icon: "success",
              });
            } else {
              swal("ผิดพลาด", {
                icon: "warning",
              });
            }
            $('.adviser_val').prop('selectedIndex', 0)
            $('#student_table').DataTable().clear().draw().ajax.reload(function(){ 
              $('#student_table').DataTable().page( current_table_page ).draw( 'page' );              
            });            

          }, 'json');


          
        }
      });
}

</script>