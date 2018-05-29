
  
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('Company/main');?>"><i class="icon-home"></i> หน้าแรก <span class="badge badge-primary">NEW</span></a>
          </li>

          <li class="nav-title">
            ผู้ประกอบการ
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-address-book-o"></i> ข้อมูลบริษัท</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <?php echo anchor('Company/Company_info/step1', '<i class="fa fa-edit "></i> จัดการข้อมูลบริษัท', 'class="nav-link"');?>                
              </li>
              <li class="nav-item">
              <?php echo anchor('Company/Company_map/', '<i class="fa fa-map-pin"></i> แผนที่ตั้งบริษัท', 'class="nav-link"');?>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="components-cards.html"><i class="fa fa-address-card-o"></i> จัดการที่อยู่</a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> นิสิต</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <?php echo anchor('Company/Job_list_position/', '<i class="icon-list"></i> รายชื่อที่สมัคร', 'class="nav-link"');?>
              </li>
              <li class="nav-item">
                <?php echo anchor('Company/Coop_Student/coop_student_list', '<i class="icon-list"></i> รายชื่อนิสิตสหกิจ', 'class="nav-link"');?>
              </li>
              <li class="nav-item">
              <?php echo anchor('Company/Coop_student_assessment/', '<i class="icon-doc"></i> ประเมินผลการฝึกงานของนิสิต', 'class="nav-link"');?>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
