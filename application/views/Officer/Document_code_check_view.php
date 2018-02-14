<!-- Main content -->
<main class="main">

<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item"><a href="#">เจ้าหน้าที่</a></li>
  <li class="breadcrumb-item active">ตรวจสอบเอกสารเเยกประเภท</li>
</ol>

<div class="container-fluid">
  <div class="animated fadeIn">
      <div class="row" >
      <!--table รายชื่อนิสิต-->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i>ตรวจสอบเอกสารเเยกประเภท</div>
              <div class="card-body">

                <div class="container-fluid">
                  <form action="" method="post" class="form-horizontal">
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="hf-email">เลือกประเภทเอกสาร</label>
                      <div class="col-md-10">
                        <select name="form_id" id="form_id" class="form-control">
                          <option> ------ </option>
                          <?php
                          foreach($forms as $form) {
                            echo '<option value="'.$form['id'].'">'.$form['name'].' - '.$form['document_name'].'</option>';
                          }
                          ?>
                        </select>
                        <!-- <span class="help-block">Please enter your email</span> -->
                      </div>
                    </div>
                  </form>
                </div>

                <table class="table table-bordered" id="form_search_result">
                    <thead>
                      <tr>
                        <th class="text-center">รหัสนิสิต</th>
                        <th class="text-center">ชื่อ-นามสกุล</th>
                        <th class="text-center">สถานะการส่งเอกสาร</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
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

<script>
var table;
$('#form_id').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;

    //get student form search by form code
    // jQuery("#form_search_result tbody").empty();
    // $('#form_search_result').DataTable().clear().draw()
    if(table)
      table.destroy();



    table = $('#form_search_result').DataTable( {
        'order': [[0, 'asc']],
        "ajax": {
          "url": SITE_URL+"/Officer/Coop_Submitted_Form_Search/get_by_form_code/"+valueSelected,
          "dataSrc": ""
        },
        "columns": [
            { "data": "student.id" },
            { "data": "student.fullname" },            
            { "data": "form.status" }
        ],
        
    } );

    // jQuery.getJSON( SITE_URL+"/Officer/Coop_Submitted_Form_Search/get_by_form_code/"+valueSelected, function( result ) {
    //     var items = [];
    //     console.log(result);

    //     jQuery.each( result.data, function( key, val ) {
    //         if(val.form != null) {
    //             $('#form_search_result tbody').append(
    //                 '<tr>'+
    //                 '<td>'+val.student.id+'</td>'+
    //                 '<td>'+val.student.fullname+'</td>'+                    
    //                 '<td><u>ส่งแล้ว</u></td>'+              
    //                 '</tr>');
    //         } else {
    //             $('#form_search_result tbody').append(
    //               '<tr>'+
    //               '<td>'+val.student.id+'</td>'+
    //               '<td>'+val.student.fullname+'</td>'+                    
    //               '<td><b>ยังไม่ส่ง!</b></td>'+              
    //               '</tr>');

    //         }
            
    //     });
    // });

});


</script>