
  
    <div class="sidebar">

    <nav class="sidebar-nav">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Officer/main');?>"><i class="icon-home"></i> หน้าแรก <span class="badge badge-primary">NEW</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#selectTermBox"><i class="fa fa-calendar"></i> เลือกปีการศึกษา</a>
        </li>

        <li class="nav-title">
          เจ้าหน้าที่
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> นิสิต</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <?php echo anchor('Officer/Student_list', '<i class="icon-list"></i> รายชื่อนิสิต', 'class="nav-link"');?>
            </li>
            <li class="nav-item">
              <?php echo anchor('Officer/Coop_Submitted_Form_Search/by_student', '<i class="icon-doc"></i> ตรวจสอบเอกสารรายบุคคล', 'class="nav-link"');?>
            </li>
            <li class="nav-item">
              <?php echo anchor('Officer/Coop_Submitted_Form_Search/by_form', '<i class="icon-docs"></i> ตรวจสอบเอกสารตามประเภท', 'class="nav-link"');?>
            </li>
            <li class="nav-item">
              <?php echo anchor('Officer/Coop_student/', '<i class="icon-graduation"></i> รายชื่อนิสิตสหกิจ', 'class="nav-link"');?>            
            </li>
          </ul>
        </li>


        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-user-following"></i> อาจารย์</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <?php echo anchor('Officer/Management_student_adviser', '<i class="fa fa-gear fa-lg  fa-spin"></i> จัดอาจารย์ที่ปรึกษากับนิสิต', 'class="nav-link"');?>
            </li>
          </ul>
        </li>

        <li class="nav-item nav-dropdown">  
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-drivers-license-o"></i> ผู้ประกอบการ</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <?php echo anchor('Officer/Company/', '<i class="fa fa-address-book-o"></i> ข้อมูลสถานประกอบการ', 'class="nav-link"');?>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Officer/news');?>"><i class="icon-calculator"></i> ประกาศข่าวหน้าเว็บ </a>
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-handshake-o"></i> การอบรม</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <?php echo anchor('Officer/Training/', '<i class="fa fa-address-book-o"></i> ข้อมูลโครงการอบรม', 'class="nav-link"');?>
            </li>
            <li class="nav-item">
              <?php echo anchor('Officer/Train_check_student/', '<i class="fa fa-calendar-check-o"></i>  เช็คชื่อเข้าอบรม', 'class="nav-link"');?>
            </li>
            <li class="nav-item">
              <?php echo anchor('Officer/Train_location/', '<i class="fa fa-edit"></i>  จัดการสถานที่อบรม', 'class="nav-link"');?>
            </li>
          </ul>
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-tasks"></i> การสอบ</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <?php echo anchor('Officer/Test_form/', '<i class="fa fa-leanpub"></i>  จัดการข้อมูลรับสมัครการสอบ', 'class="nav-link"');?>
            </li>
            <li class="nav-item">
            <?php echo anchor('Officer/Test_Management/', '<i class="fa fa-th-list"></i>  จัดการข้อมูลนิสิตเข้าสอบ', 'class="nav-link"');?>
            </li>
            <li class="nav-item">
            <?php echo anchor('Officer/Test_result/', '<i class="fa fa-check"></i>  จัดการผลการสอบ', 'class="nav-link"');?>
            </li>
          </ul>
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-graph"></i> รายงาน</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
              <a class="nav-link" href="pages-login.html" target="_top"><i class="icon-pie-chart"></i> รายงานการไปสหกิจ</a>
            </li>
          </ul>
        </li>
        <li class="nav-item nav-dropdown">
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-file-o"></i> แบบประเมิน</a>
          <ul class="nav-dropdown-items">
            <li class="nav-item">
            <?php echo anchor('Officer/Assessment_company_Form/', '<i class="fa fa-tasks"></i>  จัดการแบบประเมินสถานประกอบการ', 'class="nav-link"');?>
            </li>
            <li class="nav-item">
            <?php echo anchor('Officer/Assessment_coop_student_Form/', '<i class="fa fa-mortar-board "></i> จัดการแบบประเมินนิสิตสหกิจศึกษา', 'class="nav-link"');?>
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
                echo '<option value="'.$term->term_id.'">'.$term->name.'</option>';
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
