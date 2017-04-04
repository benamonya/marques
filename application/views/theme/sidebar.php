<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body class="hold-transition skin-blue  sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BPS PORTAL</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
 

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Welcome   <?= $this->session->userdata('first_name'); ?> &nbsp; <?= $this->session->userdata('last_name'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 <?= $this->session->userdata('first_name'); ?> &nbsp; <?= $this->session->userdata('last_name'); ?> 
                  <small>Last login <?= date('d-m-Y H:i:s A',($this->session->userdata('last_login'))); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
      
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('first_name'); ?> &nbsp; <?= $this->session->userdata('last_name'); ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
         <li class="active"><a href="<?= site_url('auth/dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li><a href="<?= site_url('api/fetchData') ?>"><i class="fa fa-map"></i>map view</a></li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Customers Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?= site_url('facilities') ?>"><i class="fa fa-list"></i> <span>Orders</span></a></li>
          <li><a href="<?= site_url('auth/index') ?>"><i class="fa fa-file-text"></i> <span>Payment details</span> </a></li>
          </ul>
          </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-car"></i>
            <span>fleet</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?= site_url('fleet/fleets') ?>"><i class="fa fa-truck"></i> fleet </a></li>
           <li><a href="<?= site_url('fleet/vehicle_types') ?>"><i class="fa fa-circle-o"></i>Vehicle Types</a></li>
           <li><a href="<?= site_url('fleet/drivers') ?>"><i class="fa fa-users"></i> <span>Drivers</span> </a></li>
           </ul>
           </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-file-o"></i>
            <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?= site_url('stock/suppliers') ?>"><i class="fa fa-circle-o"></i> suppliers</a></li>
            <li><a href="<?= site_url('stock/stock_items') ?>"><i class="fa fa-circle-o"></i>Stocks</a></li>
            <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Stock codes</a></li>
            </ul>
            </li>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Fuel Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         <li><a href="<?= site_url('fuel/fuel_records') ?>"><i class="fa fa-fire"></i> <span>Fuel records</span> </a></li>
           <li><a href="<?= site_url('fuel/fuel_stations') ?>"><i class="fa fa-fire"></i>Fuel Stations</a></li>
         </ul>
         </li>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i>
            <span>Repair & Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?= site_url('maintainance/repair') ?>"><i class="fa fa-wrench"></i> <span>Repairs</span> </a></li>
         <li><a href="<?= site_url('maintainance/index') ?>"><i class="fa fa-flag-checkered"></i> <span>Regular Maintenance</span> </a></li>
         </ul>
         </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-umbrella"></i>
            <span>Insurance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?= site_url('insurance/index') ?>"><i class="fa fa-umbrella"></i>Insurance companies</a></li>
          <li><a href="<?= site_url('insurance/renewal') ?>"><i class="fa fa-refresh"></i> <span>Renenewals</span> </a></li>
          <li><a href="<?= site_url('insurance/accident') ?>"><i class="fa fa-users"></i> <span>Accident records</span> </a></li>
          <li><a href="<?= site_url('insurance/claims') ?>"><i class="fa fa-users"></i> <span>Insurance Claims</span> </a></li>
         </ul>
         </li>
      
         <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           
             <li><a href="<?= site_url('auth/index') ?>"><i class="fa fa-users"></i> <span>Users</span> </a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>



    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">

   
    