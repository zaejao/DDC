    <!-- //////////////////////////////////   navside  //////////////////////////////////////////-->
    <?php
      // $menucode  ["PORTFOLIO","COURSE","EVALUATE","GRADE","LOGBOOK","REPORT","NEWS","SCHEDULE"]
      // $menucode1
    ?>
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow menu-bordered" data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


          <li class=" nav-item   <?php if($menucode=="MENU"){ echo "active open ";} ?>">
            <a href="menu.php"><i class="la la-credit-card"></i><span class="menu-title" data-i18n=""> กำหนดเมนู </span></a> 
          </li>

          <li class=" nav-item  <?php if($menucode=="SLIDE"){ echo "active open";}?>">
            <a href="#"><i class="la la-feed"></i><span class="menu-title" data-i18n=""> ป้ายประชาสัมพันธ์  </span></a>
            <ul class="menu-content">
              <li class="<?php if($menucode1=="SLIDE1"){ echo "active";}?>"><a class="menu-item" href="#" >  ป้ายประชาสัมพันธ์หลัก </a></li>
              <li class="<?php if($menucode1=="SLIDE2"){ echo "active";}?>"><a class="menu-item" href="#" >  ป้ายประชาสัมพันธ์รอง</a></li>
            </ul>
          </li>

      

          <li class=" nav-item   <?php if($menucode=="SETTINGHOME"){ echo "active open ";} ?>">
            <a href="setting_home.php"><i class="la la la-gear"></i><span class="menu-title" data-i18n=""> ตั้งค่าหน้าแรก </span></a> 
          </li>
          <li class=" nav-item  <?php if($menucode=="DISEASE"){ echo "active open";}?>">
            <a href="#"><i class="la la-file-text-o"></i><span class="menu-title" data-i18n=""> รายชื่อโรค  </span></a>
            <ul class="menu-content">
              <li class="<?php if($menucode1=="DISEASELIST"){ echo "active";}?>"><a class="menu-item" href="disease.php" >  รายชื่อโรค </a></li>
              <li class="<?php if($menucode1=="DISEASETYPE"){ echo "active";}?>"><a class="menu-item" href="diseasetype.php" >  ประเภทข้อมูลโรค</a></li>
            </ul>
          </li>
          
          <li class=" nav-item   <?php if($menucode=="BANNER"){ echo "active open ";} ?>">
            <a href="bannerslink.php"><i class="la la-link"></i><span class="menu-title" data-i18n=""> ป้ายแบนเบอร์ </span></a> 
          </li>

          <li class=" nav-item  <?php if($menucode=="AUCTIONSCATE"){ echo "active open";}?>">
            <a href="#"><i class="la la-files-o"></i><span class="menu-title" data-i18n=""> หมวดหมู่การจัดซื้อจัดจ้าง  </span></a>
            <ul class="menu-content">
              <li class="<?php if($menucode1=="AUCTIONSCATE"){ echo "active";}?>"><a class="menu-item" href="auctionscate.php" >  หมวดหมู่ </a></li>
              <li class="<?php if($menucode1=="AUCTIONSTYPECATE"){ echo "active";}?>"><a class="menu-item" href="auctionstypecate.php" >  จัดประเภทหมวดหมู่ </a></li>
            </ul>
          </li>
          

 
          <li class=" nav-item   <?php if($menucode=="LAWCATE"){ echo "active open ";} ?>">
            <a href="lawcate.php"><i class="la la-list"></i><span class="menu-title" data-i18n=""> หัวข้อข้อมูลกฎหมาย </span></a> 
          </li>
          <!-- <li class=" nav-item   <?php if($menucode=="ACCOUNT"){ echo "active open ";} ?>">
            <a href="menu.php"><i class="la la la-user"></i><span class="menu-title" data-i18n=""> ข้อมูลผู้ใช้งาน </span></a> 
          </li> -->


          <!--

          <li class=" nav-item <?php if($menucode=="PORTFOLIO"){ echo "active";}?>" ><a href="#" data-i18n="nav.portfolio.main"  ><i class="la la-users"></i><span class="menu-title" data-i18n="">E-Portfolio</span></a>
            <ul class="menu-content">
                <li class="<?php if($menucode1=="STUDENT"){ echo "active";}?>" ><a class="menu-item" href="/portfolio/student_data.php" data-i18n="nav.portfolio.student"> นักศึกษา </a></li>
			      <li class="<?php if($menucode1=="PERSONALLITY"){ echo "active";}?>"><a class="menu-item" href="/portfolio/personality_data.php" data-i18n="nav.portfolio.staff">บุคลิกภาพ</a></li>
				      <li class="<?php if($menucode1=="USERGROUP"){ echo "active";}?>"><a class="menu-item" href="/setting/usergroup_data.php" > กลุ่มนักศึกษา </a></li>
                <li class="<?php if($menucode1=="LECTURER"){ echo "active";}?>"><a class="menu-item" href="/portfolio/lecturer_data.php" data-i18n="nav.portfolio.lecturer">อาจารย์</a></li>
                <li class="<?php if($menucode1=="ADVISOR"){ echo "active";}?>"><a class="menu-item" href="/portfolio/advisor_data.php" data-i18n="nav.portfolio.staff">อาจารย์ที่ปรึกษา</a></li>
                <li class="<?php if($menucode1=="STAFF"){ echo "active";}?>"><a class="menu-item" href="/portfolio/staff_data.php" data-i18n="nav.portfolio.staff">เจ้าหน้าที่</a></li>
                <li class="<?php if($menucode1=="MEDIC"){ echo "active";}?>"><a class="menu-item" href="/portfolio/medic_data.php" data-i18n="nav.portfolio.medic">แพทย์ประจำบ้าน </a></li>
            </ul>
          </li>
        
          <li class=" nav-item <?php if($menucode=="NEWS"){ echo "active";}?>"><a href="#"><i class="la la-feed"></i><span class="menu-title" data-i18n="">E-News</span></a>
            <ul class="menu-content">
              <li class="<?php if($menucode1=="NEWSDATA"){ echo "active";}?>"><a class="menu-item" href="/news/news_data.php" >  ข่าวประชาสัมพันธ์ </a></li>
              <li class="<?php if($menucode1=="ACTIVITY"){ echo "active";}?>"><a class="menu-item" href="/news/activity_data.php" >  กิจกรรมเพื่อสังคม</a></li>
              <li class="<?php if($menucode1=="ACTIVITYLECTURER"){ echo "active";}?>"><a class="menu-item" href="/news/news_activity_lecturer.php" >  กิจกรรม/สัมมนา/อบรม</a></li>
            </ul>
          </li>
          
          <li class=" nav-item <?php if($menucode=="SETTING"){ echo "active";}?>"><a href="#"><i class="la la-gear"></i><span class="menu-title" data-i18n="">Setting</span></a>
              <ul class="menu-content">
                <li class="<?php if($menucode1=="MILITARYRANK"){ echo "active";}?>"><a class="menu-item" href="/setting/militaryrank_data.php" > ยศทางทหาร (อาจารย์) </a></li>
                <li class="<?php if($menucode1=="ACADEMICPOSITION"){ echo "active";}?>"><a class="menu-item" href="/setting/academic_data.php" > ตำแหน่งทางวิชาการ </a></li>
                <li class="<?php if($menucode1=="DEPARTMENTPOSITION"){ echo "active";}?>"><a class="menu-item" href="/setting/department_position_data.php" > ตำแหน่งอาจารย์  </a></li>
                <li class="<?php if($menucode1=="DEPARTMENT"){ echo "active";}?>"><a class="menu-item" href="/setting/department_data.php" > แผนก </a></li>
                <li class="<?php if($menucode1=="LECTURERSTATUS"){ echo "active";}?>"><a class="menu-item" href="/setting/lecturerstatus_data.php" > สถานะอาจารย์</a></li>
                <li class="<?php if($menucode1=="MILITARYRANK2"){ echo "active";}?>"><a class="menu-item" href="/setting/militaryrank2_data.php" > ยศทางทหาร (เจ้าหน้าที่) </a></li>
                <li class="<?php if($menucode1=="STAFFPOSITION"){ echo "active";}?>"><a class="menu-item" href="/setting/staffposition_data.php" > ตำแหน่งเจ้าหน้าที่</a></li>
                <li class="<?php if($menucode1=="STUDENTTITLENAME"){ echo "active";}?>"><a class="menu-item" href="/setting/studenttitlename_data.php" > คำนำหน้านักศึกษา </a></li> 
              </ul>
          </li>
        -->
          <li class=" nav-item ">
              <a href="/logout.php"><i class="ft-power"></i>
              <span class="menu-title" data-i18n="">Logout</span></a> 
          </li>





       </ul>
      </div>
    </div>

  <!-- //////////////////////////////////  end navside  //////////////////////////////////////////-->
