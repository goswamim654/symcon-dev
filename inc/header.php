<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Symcom | <?php echo $admin; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $absoluteUrl;?>plugins/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $absoluteUrl;?>plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $absoluteUrl;?>plugins/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo $absoluteUrl;?>assets/css/skins/_all-skins.min.css">
  <!-- Date Picker -->
  <!-- <link rel="stylesheet" href="<?php //echo $absoluteUrl;?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> -->
  <link rel="stylesheet" href="<?php echo $absoluteUrl;?>plugins/jquery-ui/themes/base/jquery-ui.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $absoluteUrl;?>plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo $absoluteUrl;?>plugins/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $absoluteUrl;?>assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

  <!-- custom css -->
  <link rel="stylesheet" href="<?php echo $absoluteUrl;?>assets/css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo $absoluteUrl;?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <div class="logo-lg"><img class="img-responsive" src="<?php echo $absoluteUrl;?>assets/img/logo-big.png"></div>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- <div class="navbar-left-search">
        <ul class="nav navbar-nav">
          <li class="search-box">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search here">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-success btn-flat"><i class="fa fa-search"></i></button>
                  </span>
            </div>
          </li>
          <li class="adv-search-link"><a href="#">Erweiterte Suche</a></li>
        </ul>
      </div> -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group search">
              <span class="fa fa-search desktop-show"></span>
              <input type="text" class="form-control search-box" id="navbar-search-input" placeholder="Suche...">
              <span class="closeBtn mobile-show"><button class="btn btn-success btn-sm">x</button></span>
            </div>
          </form>
        <ul class="nav navbar-nav adv-search-link">
            <li class="normal-search mobile-show"><a href="#">Suche</a></li>
            <li><a href="#">Erweiterte Suche</a></li>
        </ul>
      </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="last-login"><a>Last login 2018/09/27 at 13:02</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" id="kuntoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Mukesh G. &nbsp;<i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu kuntoDropdown" aria-labelledby="kuntoDropdown">
                <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profil</a></li>
                <li><a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Abmelden</a></li>
            </ul>
        </li>
        </ul>
      </div>
    </nav>
  </header>