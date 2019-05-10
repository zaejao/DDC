<?php 
include "../duck.conf.php";
include $pathf."/prepare_html.php"; 

$menucode = "MAIN" ;
$menucode1 = "MAIN_DESEASE" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";

?>

  <?php include $pathf."/prepare_css.php";?>
  <body>
    <?php include $pathf."/prepare_header.php";?>
    <!-- ############################################################################################################### -->

    <section class="box_banner">
        <div class="row">
            <div class="col-12 p-0" id="box_banner_image"> 
                <img src="img/Banner_U1-01.jpg" class="img-fluid" alt="Responsive image">
            </div>
        </div>
    </section>

    <!-- #####  START CONTENT ##### -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <section id="content-diseasedetail">
      <div class="container">
        <div class="row">
        
        <div class="container">
            <div class="row">
                    <div class="topic_block col-lg-7">
                      <p class="topic_text">ข่าวประชาสัมพันธ์</p>
                    </div>
                <div class="search_row col-lg-5">
                    <p class="search_text">เลือกหน่วยงาน</p>
                    <select class="search_block">
                        <option>ทุกสำนัก</option>
                        <option>กลุ่มตรวจสอบภายใน</option>
                        <option>กลุ่มพัฒนาระบบบริหาร</option>
                        <option>กองแผนงาน</option>
                        <option>สำนักสื่อสารความเสี่ยงและพัฒนาพฤติกรรมสุขภาพ</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <div class="card" id="card_newsInfo" href="1">
                <img class="newsInfo_img" src="img/Chiba1.jpg" height="200" >
                  <div class="card-body">
                    <p>04/04/2019</p>
                    <p class="card-title">หัวข้อ</p>
                    <p class="card-text">รายละเอียด</p>
                  </div>
                  <div class="">
                    <a class="newsInfo_download" href="#">ดาวน์โหลดเอกสาร <i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card" id="card_newsInfo" href="1">
                <img class="newsInfo_img" src="img/Chiba1.jpg" height="200" >
                  <div class="card-body">
                    <p>04/04/2019</p>
                    <p class="card-title">หัวข้อ</p>
                    <p class="card-text">รายละเอียด</p>
                  </div>
                  <div class="">
                    <a class="newsInfo_download" href="#">ดาวน์โหลดเอกสาร <i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card" id="card_newsInfo" href="1">
                <img class="newsInfo_img" src="img/Chiba1.jpg" height="200" >
                  <div class="card-body">
                    <p>04/04/2019</p>
                    <p class="card-title">หัวข้อ</p>
                    <p class="card-text">รายละเอียด</p>
                  </div>
                  <div class="">
                    <a class="newsInfo_download" href="#">ดาวน์โหลดเอกสาร <i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card" id="card_newsInfo" href="1">
                <img class="newsInfo_img" src="img/Chiba1.jpg" height="200" >
                  <div class="card-body">
                    <p>04/04/2019</p>
                    <p class="card-title">หัวข้อ</p>
                    <p class="card-text">รายละเอียด</p>
                  </div>
                  <div class="">
                    <a class="newsInfo_download" href="#">ดาวน์โหลดเอกสาร <i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card" id="card_newsInfo" href="1">
                <img class="newsInfo_img" src="img/Chiba1.jpg" height="200" >
                  <div class="card-body">
                    <p>04/04/2019</p>
                    <p class="card-title">หัวข้อ</p>
                    <p class="card-text">รายละเอียด</p>
                  </div>
                  <div class="">
                    <a class="newsInfo_download" href="#">ดาวน์โหลดเอกสาร <i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card" id="card_newsInfo" href="1">
                <img class="newsInfo_img" src="img/Chiba1.jpg" height="200" >
                  <div class="card-body">
                    <p>04/04/2019</p>
                    <p class="card-title">หัวข้อ</p>
                    <p class="card-text">รายละเอียด</p>
                  </div>
                  <div class="">
                    <a class="newsInfo_download" href="#">ดาวน์โหลดเอกสาร <i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card" id="card_newsInfo" href="1">
                <img class="newsInfo_img" src="img/Chiba1.jpg" height="200" >
                  <div class="card-body">
                    <p>04/04/2019</p>
                    <p class="card-title">หัวข้อ</p>
                    <p class="card-text">รายละเอียด</p>
                  </div>
                  <div class="">
                    <a class="newsInfo_download" href="#">ดาวน์โหลดเอกสาร <i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card" id="card_newsInfo" href="1">
                <img class="newsInfo_img" src="img/Chiba1.jpg" height="200" >
                  <div class="card-body">
                    <p>04/04/2019</p>
                    <p class="card-title">หัวข้อ</p>
                    <p class="card-text">รายละเอียด</p>
                  </div>
                  <div class="">
                    <a class="newsInfo_download" href="#">ดาวน์โหลดเอกสาร <i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card" id="card_newsInfo" href="1">
                <img class="newsInfo_img" src="img/Chiba1.jpg" height="200" >
                  <div class="card-body">
                    <p>04/04/2019</p>
                    <p class="card-title">หัวข้อ</p>
                    <p class="card-text">รายละเอียด</p>
                  </div>
                  <div class="">
                    <a class="newsInfo_download" href="#">ดาวน์โหลดเอกสาร <i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card" id="card_newsInfo" href="1">
                <img class="newsInfo_img" src="img/Chiba1.jpg" height="200" >
                  <div class="card-body">
                    <p>04/04/2019</p>
                    <p class="card-title">หัวข้อ</p>
                    <p class="card-text">รายละเอียด</p>
                  </div>
                  <div class="">
                    <a class="newsInfo_download" href="#">ดาวน์โหลดเอกสาร <i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
          </div>
        </div>

        </div>
      </div>
    </section>  <!--/ section#content-diseasedetail -->
    
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### -->
  


    <!-- ############################################################################################################### -->
    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>


    </script>  
  </body>
</html>