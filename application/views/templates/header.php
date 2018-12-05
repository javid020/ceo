<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.html">
    <title>CEO</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/lib/stroke-7/style.css');?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css');?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/lib/theme-switcher/theme-switcher.min.css');?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/lib/datepicker/css/bootstrap-datepicker3.min.css');?>"/>  
    <link type="text/css" href="<?php echo site_url('assets/css/app.css');?>" rel="stylesheet">

  </head>
  <body>
    <?php 
      $query = $this->db->get_where('users', array('id' => $this->session->userdata('user_id'))); 
      $usersinformation = $query->row_array();  
      ?>
    <div class="mai-wrapper">
      <nav class="navbar mai-sub-header">
        <div class="container">
                    <!-- Mega Menu structure-->
                    <nav class="navbar navbar-toggleable-sm">
                      <button type="button" data-toggle="collapse" data-target="#mai-navbar-collapse" aria-controls="#mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler hidden-md-up collapsed">
                        <div class="icon-bar"><span></span><span></span><span></span></div>
                      </button>
                      <div id="mai-navbar-collapse" class="navbar-collapse collapse mai-nav-tabs">
                        <ul class="nav navbar-nav">
                          <li class="nav-item parent <?php if($this->uri->uri_string() == '') { echo 'open'; } ?>"><a href="<?= base_url(); ?>" role="button" aria-expanded="false" class="nav-link"><span class="icon s7-home"></span><span>Home</span></a>
                          </li>
                          <li class="nav-item parent <?php if($this->uri->uri_string() == 'tasks') { echo 'open'; } ?>"><a href="<?= base_url(); ?>tasks" role="button" aria-expanded="false" class="nav-link"><span class="icon s7-rocket"></span><span>Tasks</span></a>
                          </li>
                          <li class="nav-item parent <?php if($this->uri->uri_string() == 'user') { echo 'open'; } ?>"><a href="<?= base_url(); ?>user" role="button" aria-expanded="false" class="nav-link"><span class="icon s7-user"></span><span>Users</span></a>
                          </li>
                        </ul>
                      </div>
                    </nav>
          <!--Search input-->
          <div class="search" style="padding-top: 17px;">
            <ul class="nav navbar-nav float-lg-right mai-user-nav">
            <li class="dropdown nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle nav-link"> <img src="<?= base_url(); ?>assets/img/avatars/<?= $usersinformation['photo']; ?>"><span class="user-name"><?= $usersinformation['full_name']; ?></span><span class="angle-down s7-angle-down"></span></a>
            <div role="menu" class="dropdown-menu">
              <a href="<?= base_url(); ?>user/<?= $this->session->userdata('user_id') ?>" class="dropdown-item"> <span class="icon s7-id"> </span>My Account</a>
              <a href="<?= base_url(); ?>user/logout" class="dropdown-item"> <span class="icon s7-power"> </span>Logout</a>
            </div>
          </li>
        </ul> 
          </div>
        </div>
      </nav>