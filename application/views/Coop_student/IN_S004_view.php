<!-- Main content -->
<main class="main">
<!-- Breadcrumb -->
<?php echo $this->breadcrumbs->show(); ?>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> แบบแจ้งรายละเอียดการปฏิบัติงาน และแผนที่ตั้งสถานประกอบการ
                    </div>
                    <div class="card-body">   
                     <!-- ข้อ 1 -->
                     <label for="name"><b>๑.	ชื่อ/ที่อยู่สถานประกอบการ </b></label>
                        <div class="row">
                            <div class="form-group col-sm-6">           
                                <label>ชื่อสถานประกอบการ (ภาษาไทย)</label><code>*</code>
                                <input type="text" class="form-control" id="name_th" name="name_th" value="" required>
                            </div>
                        </div>
                          <div class="row">
                              <div class="form-group col-sm-12">
                                  <label>ที่ตั้ง </label><code>*</code>
                                  <input type="text" class="form-control" id="name_en" name="name_en" value="" required>                     
                              </div>
                          </div>
                          <div class="row">
                                <div class="form-group col-sm-3">
                                    <label>โทรศัพท์</label><code>*</code>
                                    <input type="text" class="form-control" id="number" name="number" value="" required>                                                        
                                </div>
                                <div class="form-group col-sm-5">
                                    <label>โทรสาร</label><code></code>
                                    <input type="text" class="form-control" id="building" name="building" value="" required>                                       
                                </div>
                              <div class="form-group col-sm-4">
                                  <label>E-mail </label><code>*</code>
                                  <input type="text" class="form-control" id="road" name="road" value="" required>                                     
                              </div>
                          </div>
                        <div class="row">
                          <div class="form-group col-sm-6">
                               <label>	ชื่อผู้จัดการสถานประกอบการ </label><code>*</code>
                               <input type="text" class="form-control" id="alley" name="alley" value="" required>                                             
                          </div>
                          <div class="form-group col-sm-4">
                               <label>ตำแหน่ง(เลือก)</label><code>*</code>
                               <select id="select2" name="select2" class="form-control form-control-md">
                                  <option value="0">---------------------  กรุณาเลือกตำเเหน่ง  --------------------</option>
                                  <option value="1">โปรเเกรมเมอร์</option>
                                  <option value="2">Developer</option>
                                  <option value="3">Admin</option>
                                  <option value="3">Support</option>
                                  <option value="3">System design</option>                                
                                  </div></select>                                                
                          </div>
                          <div class="form-group col-sm-12">
                               <label>การติดต่อประสานงานกับคณะวิทยาการสารสนเทศ (การนิเทศงานนักศึกษา และอื่นๆ) ขอมอบให้</label><code>*</code>       
                                  <div class="col-md-9 col-form-label">
                                      <div class="form-check form-check-inline mr-2">
                                      <input class="form-check-input" type="radio" id="inline-radio1" value="option1" name="inline-radios">
                                      <label class="form-check-label" for="inline-radio1">ติดต่อกับผู้จัดการโดยตรง</label>
                                      </div>
                                      <div class="form-check form-check-inline mr-2">
                                      <input class="form-check-input" type="radio" id="inline-radio2" value="option2" name="inline-radios">
                                      <label class="form-check-label" for="inline-radio2">มอบหมายให้บุคคลต่อไปนี้ประสานงานแทน</label>
                                      </div>
                                  </div>                     
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>ชื่อ-นามสกุล</label><code>*</code>
                                <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                            </div>
                            <div class="form-group col-sm-4">
                            <label>ตำแหน่ง(เลือก)</label><code>*</code>
                            <select id="select2" name="select2" class="form-control form-control-md">
                              <option value="0">---------------------  กรุณาเลือกตำเเหน่ง  --------------------</option>
                              <option value="1">โปรเเกรมเมอร์</option>
                              <option value="2">Developer</option>
                              <option value="3">Admin</option>
                              <option value="3">Support</option>
                              <option value="3">System design</option>                    
                              </div></select>                                            
                         </div>
                     <div class="form-group col-sm-4">
                     <label>แผนก(เลือก)</label><code>*</code>
                     <select id="select2" name="select2" class="form-control form-control-md">
                        <option value="0">---------------------  กรุณาเลือกเเผนกงาน  --------------------</option>
                        <option value="1">โปรเเกรมเมอร์</option>
                        <option value="2">Developer</option>
                        <option value="3">Admin</option>
                        <option value="3">Support</option>
                        <option value="3">System design</option>                  
                        </div></select>                                          
                      </div>
                          <div class="form-group col-sm-4">
                               <label>โทรศัพท์ </label><code>*</code>
                               <input type="text" class="form-control" id="alley" name="alley" value="" required>                                                     
                          </div>
                          <div class="form-group col-sm-4">
                               <label>โทรสาร</label><code></code>
                               <input type="text" class="form-control" id="alley" name="alley" value="" required>                                   
                          </div>
                          <div class="form-group col-sm-8">
                               <label>E-mail</label><code></code>
                               <input type="text" class="form-control" id="alley" name="alley" value="" required>                                   
                          </div>
                        </div>
                        <!-- ข้อ 2 -->
                    <label for="name"><b>๒.	ผู้นิเทศงาน </b></label>
                      <div class="row">
                          <div class="form-group col-sm-6">
                               <label>ชื่อ-นามสกุล</label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                          <label>ตำแหน่ง(เลือก)</label><code>*</code>
                          <select id="select2" name="select2" class="form-control form-control-md">
                             <option value="0">---------------------  กรุณาเลือกตำเเหน่ง  --------------------</option>
                             <option value="1">โปรเเกรมเมอร์</option>
                             <option value="2">Developer</option>
                             <option value="3">Admin</option>
                             <option value="3">Support</option>
                             <option value="3">System design</option>                    
                             </div></select>                                            
                         </div>
                     <div class="form-group col-sm-4">
                     <label>แผนก(เลือก)</label><code>*</code>
                     <select id="select2" name="select2" class="form-control form-control-md">
                        <option value="0">---------------------  กรุณาเลือกเเผนกงาน  --------------------</option>
                        <option value="1">โปรเเกรมเมอร์</option>
                        <option value="2">Developer</option>
                        <option value="3">Admin</option>
                        <option value="3">Support</option>
                        <option value="3">System design</option>                  
                        </div></select>                                          
                      </div>
                        <div class="form-group col-sm-4">
                               <label>โทรศัพท์ </label><code>*</code>
                               <input type="text" class="form-control" id="alley" name="alley" value="" required>                                                     
                         </div>
                          <div class="form-group col-sm-4">
                               <label>โทรสาร</label><code></code>
                               <input type="text" class="form-control" id="alley" name="alley" value="" required>                                   
                          </div>
                          <div class="form-group col-sm-8">
                               <label>E-mail</label><code>*</code>
                               <input type="text" class="form-control" id="alley" name="alley" value="" required>                                   
                          </div>
                        </div>
                     <!-- ข้อ 3 -->
                     <label for="name"><b>๓. งานที่มอบหมายนิสิต</b></label>
                    <div class="row">
                          <div class="form-group col-sm-6">
                               <label>ชื่อ – นามสกุล (นิสิต)</label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-6">
                               <label>รหัสประจำตัว  (นิสิต)</label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>                         
                          <div class="form-group col-sm-5">
                          <label>สาขาวิชา (เลือก)</label><code>*</code>
                          <select id="select2" name="select2" class="form-control form-control-md">
                             <option value="0">---------------------  กรุณาเลือกสาขาวิชา  --------------------</option>
                             <option value="1">เทคโนโลยีสารสนเทศ</option>
                             <option value="2">วิทยาการคอมพิวเตอร์</option>
                             <option value="3">วิศวกรรมซอร์ฟเเวร์</option>                                           
                             </div></select>                                            
                         </div>
                     <div class="form-group col-sm-5">
                     <label>คณะ (เลือก)</label><code>*</code>
                     <select id="select2" name="select2" class="form-control form-control-md">
                        <option value="0">---------------------  กรุณาเลือกเเผนกงาน  --------------------</option>
                        <option value="1">วิทยาการสารสนเทศ</option>                      
                        </div></select>                                          
                      </div>
                      <div class="form-group col-sm-5">
                               <label>ตำแหน่งงานที่นักศึกษาปฏิบัติ (Job Position)(เลือก)</label><code>*</code>
                               <select id="select2" name="select2" class="form-control form-control-md">
                                  <option value="0">-----------------ตำแหน่งงานที่นักศึกษาปฏิบัติ (Job Position)----------------</option>
                                  <option value="1">โปรเเกรมเมอร์</option>
                                  <option value="2">Developer</option>
                                  <option value="3">Admin</option>
                                  <option value="3">Support</option>
                                  <option value="3">System design</option>                                
                                  </div></select>                                                
                          </div>
                          <div class="form-group col-sm-12">
                               <label>ลักษณะงานที่นักศึกษาปฏิบัติ (Job Description)</label><code></code>
                               <input type="text" class="form-control" id="alley" name="alley" value="" required>                                   
                          </div>
                        </div>
                    <!-- ปิดข้อ 3 -->
                    <!-- ข้อ 4 -->
                    <label for="name"><b>๔.	ที่อยู่ที่นิสิตพักระหว่างการทำสหกิจศึกษา</b></label>
                    <div class="row">
                          <div class="form-group col-sm-8">
                               <label>ชื่อหอพัก/อพาร์ทเมนท์ </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>ห้อง</label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-2">
                               <label>เลขที่ </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>ซอย </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>ถนน </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>แขวง/ตำบล </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>เขต/อำเภอ </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>จังหวัด </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>รหัสไปรษณีย์</label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>โทรศัพท์</label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>โทรสาร </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>                
                        </div>
                      <!-- ปิดข้อ 4 -->
                         <!-- ข้อ 5 -->
                    <label for="name"><b>๕. การรับเอกสารติดต่อจากทางมหาวิทยาลัย </b></label>
                        <div class="row">
                          <div class="col-md-6 col-form-label">
                              <div class="form-check checkbox">
                              <input class="form-check-input" type="checkbox" value="" id="check1">
                              <label class="form-check-label" for="check1">
                              ไม่รับ โดยจะติดตามข่าวสารจาก <u>http://www.informatics.buu.ac.th/coop</u>
                              </label>
                              </div>
                              <div class="form-check checkbox">
                              <input class="form-check-input" type="checkbox" value="" id="check2">
                              <label class="form-check-label" for="check2">
                              รับเอกสารจากมหาวิทยาลัย โดยขอให้ส่งไปที่
                              </label>
                              </div>
                              <div class="form-check checkbox">
                              <input class="form-check-input" type="checkbox" value="" id="check3">
                              <label class="form-check-label" for="check3">
                              ที่พัก                             
                              </label>
                            </div>
                            <div class="form-check checkbox">
                              <input class="form-check-input" type="checkbox" value="" id="check3">
                              <label class="form-check-label" for="check3">
                              สถานประกอบการ                             
                              </label>
                            </div>
                          </div>                                             
                        </div>
                      <!-- ปิดข้อ 5 -->
                       <!-- ข้อ 6 -->
                    <label for="name"><b>๖.	ชื่อที่อยู่ ผู้ที่สามารถติดต่อได้กรณีฉุกเฉิน</b></label>
                    <div class="row">
                          <div class="form-group col-sm-8">
                               <label>ชื่อ - สกุล  </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-2">
                               <label>เลขที่ </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>ซอย </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>ถนน </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>แขวง/ตำบล </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>เขต/อำเภอ </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-3">
                               <label>จังหวัด </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>รหัสไปรษณีย์</label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>โทรศัพท์</label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>
                          <div class="form-group col-sm-4">
                               <label>โทรสาร </label><code>*</code>
                               <input type="text" class="form-control" id="postal_code" name="postal_code" value="" required>                          
                          </div>                       
                        </div>
                      <!-- ปิดข้อ 6 -->
                      <!-- ข้อ 7 -->
                    <label for="name"><b>๗.	แผนที่ตั้งสถานประกอบการ</b></label>
                    <div class="row">
                          <div class="form-group col-sm-8">
                               <label>แผนที่ตั้งสถานประกอบการ : ความสะดวกในการนิเทศงานอาจารย์ โปรดระบุชื่อถนนและสถานที่สำคัญ ใกล้เคียงที่สามารถเข้าใจง่าย</label><code>*</code>                                      
                          </div>                     
                        </div>
                      <!-- ปิดข้อ 7 -->
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">บันทึก </button>
                            <button type="reset" class="btn btn-secondary">ยกเลิก </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</main>


<style>
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}
#progressbar li {
	list-style-type: none;
	color: #000;
	text-transform: uppercase;
	font-size: 9px;
	width: 33.33%;
	/* width: 25%; */
    text-align: center;
	float: left;
	position: relative;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #27AE60;
	color: white;
}
</style>

<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.thailand/dependencies/JQL.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.thailand/dependencies/typeahead.bundle.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/jquery.thailand/dist/jquery.Thailand.min.css');?>">
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery.thailand/dist/jquery.Thailand.min.js');?>"></script>
<script>
$.Thailand({
    $district: $('#district'), // input ของตำบล
    $amphoe: $('#area'), // input ของอำเภอ
    $province: $('#province'), // input ของจังหวัด
    $zipcode: $('#postal_code'), // input ของรหัสไปรษณีย์
});
</script>