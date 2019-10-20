
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Educ8 Learning Management System - Teacher</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin/src/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin/src/assets/vendors/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin/src/assets/vendors/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin/src/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin/src/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin/src/assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin/src/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin/src/assets/css/demo_1/style.css">
    <!-- End Layout styles -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>img/logo.png" />
	<style>
		.nav-item a:hover{
			background: #49BEB7 !important;
		}
	</style>
</head>

<body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row" >
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" style="background: #49BEB7">
          <a class="navbar-brand brand-logo" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url(); ?>img/logo/logo.png" alt="" height="80%" /> </a>
          <a class="navbar-brand brand-logo-mini" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url(); ?>img/logo/logo-mini.svg" alt="" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center" style="background: #49BEB7">
		<ul class="navbar-nav">
            
          </ul>
         
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-bell-outline"></i>
                
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-left">You have  unread mails </p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                
                
                
              </div>
            </li>
            
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
			  	<?php foreach($info as $row1){
					  if(!empty($row1->image)){
              ?>
                <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>img/user/<?php echo $row1->image; ?>" alt="">
              <?php
            }else{
              ?>
                <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>img/default.png" alt="">
              <?php
            }
         	}
					  
					  ?>
                </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  
				  <?php 
				 	foreach($info as $row){
            if(!empty($row->image)){
              ?>
                <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>img/user/<?php echo $row->image; ?>" alt="">
              <?php
            }else{
              ?>
                <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>img/default.png" alt="">
              <?php
            }
            ?>
          	 	<p class="font-weight-light text-muted mb-0"><?php echo $row->fname.' '.$row->lname; ?>
							<p class="font-weight-light text-muted mb-0"><?php echo $row->email; ?>
						 <?php
					 } 
				  ?></p>
                </div>
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/teacher/my_profile">My Profile<i class="dropdown-item-icon ti-dashboard"></i></a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/teacher/logout">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-image: linear-gradient(45deg, #5EDFFF, #7ECFC0 )">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
				<?php 
					foreach($info as $row2){
						?>
							<div class="profile-image">
                <?php 
                  if(!empty($row2->image)){
                    ?>
                      <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>img/user/<?php echo $row2->image; ?>" alt="">
                    <?php
                  }else{
                    ?>
                      <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>img/default.png" alt="">
                    <?php
                  }
                ?>
								<div class="dot-indicator bg-success"></div>
							</div>
							<div class="text-wrapper">
								<p class="profile-name"><?php echo $row2->fname.' '.$row2->lname ?></p>
								<p class="designation">Teacher</p>
							</div>
						<?php
					}
				?>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
			</li>
			<li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
				<span class="menu-title">Classes (<?php 
					$cnt = 0;
					foreach($class as $Crow){
						$cnt++;
					}
					echo $cnt;
				?>)</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
				  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/teacher/class">Add Class</a>
                  </li>
                  
				  <?php 
				 	foreach($class as $CRow){
						 ?>
             <li class="nav-item">
							 <a class="nav-link" href="<?php echo base_url(); ?>index.php/teacher/classes/<?php echo $CRow->id; ?>"><?php echo $CRow->class; ?></a>
              </li>
             <?php
					 } 
				  ?>
          <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/teacher/join_class">Join Class</a>
                  </li>
                </ul>
              </div>
            </li>
            
          </ul>
        </nav>
        <!-- partial -->