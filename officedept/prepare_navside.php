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
          <li class=" nav-item  <?php if($menucode=="SLIDE"){ echo "active open";}?>">
            <a href="#"><i class="la la-feed"></i><span class="menu-title" data-i18n=""> ป้ายประชาสัมพันธ์  </span></a>
            <ul class="menu-content">
              <li class="<?php if($menucode1=="SLIDE1"){ echo "active";}?>"><a class="menu-item" href="newssd.php?mbanner" >  ป้ายประชาสัมพันธ์หลัก </a></li>
              <li class="<?php if($menucode1=="SLIDE2"){ echo "active";}?>"><a class="menu-item" href="newssd.php?msbanner" >  ป้ายประชาสัมพันธ์รอง</a></li>
            </ul>
          </li>
          <li class=" nav-item   <?php if($menucode=="NEWS"){ echo "active open ";} ?>">
            <a href="news.php"><i class="la la-newspaper-o"></i><span class="menu-title" data-i18n=""> ข่าวสาร </span></a> 
          </li>
     
          <li class=" nav-item  <?php if($menucode=="PUBLISH"){ echo "active open";}?>">
            <a href="#"><i class="la la-file-video-o"></i><span class="menu-title" data-i18n=""> สื่อเผยแพร่  </span></a>
            <ul class="menu-content">
              <li class="<?php if($menucode1=="news_info"){ echo "active";}?>"><a class="menu-item" href="publish.php?news_info" >  อินโฟกราฟิค </a></li>
              <li class="<?php if($menucode1=="news_vdo"){ echo "active";}?>"><a class="menu-item" href="publish.php?news_vdo" >  สื่อมัลติมีเดีย </a></li>
              <li class="<?php if($menucode1=="news_mag"){ echo "active";}?>"><a class="menu-item" href="publish.php?news_mag" >  วารสารออนไลน์ </a></li>
            </ul>
          </li>
          <li class=" nav-item  <?php if($menucode=="AUCTIONS"){ echo "active open";}?>">
            <a href="#"><i class="la la-file-video-o"></i><span class="menu-title" data-i18n=""> การจัดซื้อจัดจ้าง  </span></a>
            <ul class="menu-content">
              <li class="<?php if($menucode1=="auctions_plan"){ echo "active";}?>"><a class="menu-item" href="auctions.php?auctions_plan" >  แผนการจัดซื้อจัดจ้าง </a></li>
              <li class="<?php if($menucode1=="auctions_announ"){ echo "active";}?>"><a class="menu-item" href="auctions.php?auctions_announ" >  ประกาศการจัดซื้อ-จัดจ้าง </a></li>
              <li class="<?php if($menucode1=="auctions_draft"){ echo "active";}?>"><a class="menu-item" href="auctions.php?auctions_draft" >  ประกาศร่าง TOR </a></li>
              <li class="<?php if($menucode1=="auctions_public"){ echo "active";}?>"><a class="menu-item" href="auctions.php?auctions_public" >  การเผยแพร่ราคากลางตามแบบ ปปช </a></li>
              <li class="<?php if($menucode1=="auctions_center"){ echo "active";}?>"><a class="menu-item" href="auctions.php?auctions_center" >  ศูนย์ราคากลาง กรมควบคุมโรค </a></li>
            </ul>
          </li>
     

          <li class=" nav-item  <?php if($menucode=="BANNER"){ echo "active open";}?>">
            <a href="#"><i class="la la-link"></i><span class="menu-title" data-i18n=""> ป้ายแบนเนอร์  </span></a>
            <ul class="menu-content">

              <li class="<?php if($menucode1=="BANNERSYSTEM"){ echo "active";}?>"><a class="menu-item" href="bannerssystem.php" >  ป้ายแบนเนอร์ระบบภายใน  </a></li>
              
              <li class="<?php if($menucode1=="BANNERLINK"){ echo "active";}?>"><a class="menu-item" href="bannerslink.php" > ป้ายแบนเนอร์ลิงก์ที่เกี่ยวข้อง  </a></li>
             </ul>
          </li> 
           
          <!-- <li class=" nav-item   <?php if($menucode=="LAWCATE"){ echo "active open ";} ?>">
            <a href="lawcate.php"><i class="la la-list"></i><span class="menu-title" data-i18n=""> ข้อมูลกฎหมาย </span></a> 
          </li>
           
          -->



          <!-- <li class=" nav-item   <?php if($menucode=="ACCOUNT"){ echo "active open ";} ?>">
            <a href="menu.php"><i class="la la la-user"></i><span class="menu-title" data-i18n=""> ข้อมูลผู้ใช้งาน </span></a> 
          </li> -->

 
          <li class=" nav-item ">
              <a href="/logout.php"><i class="ft-power"></i>
              <span class="menu-title" data-i18n="">Logout</span></a> 
          </li>





       </ul>
      </div>
    </div>

  <!-- //////////////////////////////////  end navside  //////////////////////////////////////////-->
