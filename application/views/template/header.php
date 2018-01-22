<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard ระบบสหกิจ | มหาวิทยาลัยบูรพา</title>

  <!-- Icons -->
  <link href="<?php echo base_url('assets/theme/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/theme/simple-line-icons/css/simple-line-icons.css');?>" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">

  <script src="<?php echo base_url('assets/theme/jquery/dist/jquery.min.js');?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
  <script>
    var SITE_URL = '<?php echo site_url();?>';
    var BASE_URL = '<?php echo base_url();?>';
  </script>

  <style>
  .btn {
    color:#fff !important;
  }
  </style>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav d-md-down-none">
      <li class="nav-item px-3">
        <a class="btn btn-xs btn-success" href="#">ปีการศึกษา: <?php echo $user->term_name;?></a>
      </li>
      
      
    </ul>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item d-md-down-none">
        <a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>
      </li>
      <li class="nav-item d-md-down-none">
        <img src="http://reg.buu.ac.th/registrar/getstudentimage.asp?id=57660137" class="rounded-circle" style="width:30px;">            
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="d-md-down-none"><?php echo $user_info->fullname;?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Account</strong>
          </div>
          <a class="dropdown-item" href="#"><img src="http://reg.buu.ac.th/registrar/getstudentimage.asp?id=<?php echo $user->login_value;?>" class="rounded-circle"></a>          
          <a class="dropdown-item" href="#"><i class="fa fa-users"></i> <?php echo strToLevel($user->login_type);?></a>
          <a class="dropdown-item" href="<?php echo site_url('member/logout');?>"><i class="fa fa-lock"></i> ออกจากระบบ</a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler" type="button">
      <!-- <span class="navbar-toggler-icon"></span> -->
    </button>

  </header>
  <div class="app-body">