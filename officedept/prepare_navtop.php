    <!-- //////////////////////////////////   prepare_navtop  //////////////////////////////////////////-->
<style>
.main-menu.menu-dark .navigation > li.open > a { 
    border-right: 4px solid #e84c93 !important;
}
</style>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns"> 
    
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top   navbar-brand-center bg-menu navbar-dark bg-pink" data-nav="brand-center">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item  ">
              <a class="navbar-brand" href="/index.php"><img class="brand-logo" alt="modern admin logo" src="/office/images/logo/logo_mini.png">
                 <h3 class="brand-text ">  <span class="txt_dept"> กรมควบคุมโรค  </span>  </h3>
              </a>
			      </li> 
          </ul>
        </div>
        
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user nav-item">
			        	<a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                  <span class="mr-1"> 
                    <span class="user-name text-bold-700 " style="font-size: 18px;text-align: right;">  
                     
                    <?php  echo $_SESSION['usertypename'] ;?>
                    <br>
                    <?php echo $_SESSION['deptname'] ;  ?>
                    </span> 
                  </span>
                  <span class="avatar avatar-online" style="margin-bottom: 10px;">
                    <img src="images/icon/staff.png" alt="avatar" onerror="this.onerror=null;this.src='" ><i></i>
                  </span>
                </a>
				
				<!--
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a> 
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="../logout.php"><i class="ft-power"></i> Logout</a>
                </div>
				-->
				
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  <!-- //////////////////////////////////  end prepare_navtop  //////////////////////////////////////////-->
\