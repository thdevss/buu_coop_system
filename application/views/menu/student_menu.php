
  
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('Student/main');?>"><i class="icon-speedometer"></i> หน้าแรก <span class="badge badge-primary">NEW</span></a>
          </li>

          <li class="nav-title">
            นิสิต
          </li>
          <li class="nav-item nav-dropdown">
          <a class="nav-link" href="<?php echo site_url('Student/Student_data');?>" target="_top"><i class="icon-star"></i> ประวัตินิสิต</a>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> การอบรม</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
              <?php echo anchor('Student/Training/check_hour/', '<i class="fa fa-star"></i> ตรวจสอบชั่วโมงการอบรม', 'class="nav-link"');?>
              </li>
              <li class="nav-item">
              <?php echo anchor('Student/Training/check_history/', '<i class="fa fa-star"></i> ตรวจสอบประวัติการอบรม', 'class="nav-link"');?>
              </li>
              <li class="nav-item">
                <?php echo anchor('Student/Training/register/', '<i class="fa fa-star"></i> สมัครเข้าร่วมอบรม', 'class="nav-link"');?>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> การสอบสหกิจ</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('student/test');?>" target="_top"><i class="icon-star"></i> สมัครสอบสหกิจ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('student/test/result');?>" target="_top"><i class="icon-star"></i> ประกาศผลสอบ</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> สหกิจศึกษา</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('student/Report_student_info');?>" target="_top"><i class="icon-star"></i> รายการสมัครที่เปิดรับ</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('student/Register_result');?>" target="_top"><i class="icon-star"></i> ประกาศผลการสมัครงาน</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
