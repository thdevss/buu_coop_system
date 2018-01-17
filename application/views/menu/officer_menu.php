
  
    <div class="sidebar">

    <nav class="sidebar-nav">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> หน้าแรก <span class="badge badge-primary">NEW</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#selectTermBox"><i class="icon-puzzle"></i> เลือกปีการศึกษา</a>
        </li>

        <li class="nav-title">
          เจ้าหน้าที่
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> นิสิต</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a class="nav-link" href="components-buttons.html"><i class="icon-puzzle"></i> รายชื่อนิสิต</a>
            </li>
            <li class="nav-item">
            <?php echo anchor('Officer/Validate_list_coop_student/', '<i class="fa fa-star"></i> ตรวจสอบเอกสารรายบุคคล', 'class="nav-link"');?>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="components-cards.html"><i class="icon-puzzle"></i> ตรวจสอบเอกสารตามประเภท</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="components-forms.html"><i class="icon-puzzle"></i> รายชื่อนิสิตสหกิจ</a>
            </li>
          </ul>
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> ผู้ประกอบการ</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a class="nav-link" href="icons-font-awesome.html"><i class="icon-star"></i> ข้อมูลสถานประกอบการ</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> ประกาศข่าวหน้าเว็บ </a>
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> การอบรม</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a class="nav-link" href="pages-login.html" target="_top"><i class="icon-star"></i> ข้อมูลโครงการอบรม</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i> เช็คชื่อเข้าอบรม</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i> จัดการสถานที่อบรม</a>
            </li>
          </ul>
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> การสอบ</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <?php echo anchor('Officer/Train_register_management/', '<i class="fa fa-star"></i>  จัดการข้อมูลรับสมัครการสอบ', 'class="nav-link"');?>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i> จัดการข้อมูลนิสิตเข้าสอบ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages-404.html" target="_top"><i class="icon-star"></i> จัดการผลการสอบ</a>
            </li>
          </ul>
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> รายงาน</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a class="nav-link" href="pages-login.html" target="_top"><i class="icon-star"></i> รายงานการไปสหกิจ</a>
            </li>
          </ul>
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> แบบประเมิน</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a class="nav-link" href="pages-login.html" target="_top"><i class="icon-star"></i> จัดการแบบประเมินสถานประกอบการ</a>
            </li>
            <li class="nav-item">
            <?php echo anchor('Officer/Assessment_coop_student_Form/', '<i class="fa fa-star"></i> จัดการแบบประเมินนิสิตสหกิจศึกษา', 'class="nav-link"');?>
          </ul>
        </li>
        

      </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
  </div>


<div class="modal fade" id="selectTermBox">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">เลือกปีการศึกษา</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="term_option">ปีการศึกษา</label>
            <select class="form-control" id="term_option">
              <?php 
              foreach($terms as $term) {
                echo '<option value="'.$term->id.'">'.$term->name.'</option>';
              }
              ?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="changeTermAjax()">เปลี่ยนปีการศึกษา</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดหน้าต่าง</button>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url('assets/js/officer/term.js?'.time());?>"></script>
