<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_front.css">
    <title> Disease</title>
  </head> 
  <body>
      <!-- *************************************************************************** -->
<header>
        <!-- menu1 -->
           <nav class="navbar navbar-expand-sm navbar-light bg-menutop ">
             <!--  -->
                <a id="logo-site" class="navbar-brand" href="#">
                  <div class="site-logo"> 
                    <!-- <img src="img/logoDDC.png"> -->
                  </div>
                </a>
             <!--  -->
           
            
               
                 <div id="Menu-right" class="navbar-nav">
                   <ul class="nav"> 
                      <li class="nav-item nav-item-font">
                          <span class="text">ขนาด</span>
                          <span data-font="font-decrease" class="decrease">ก</span>
                          <span data-font="font-default" class="default">ก</span>
                          <span data-font="font-increase" class="increase">ก</span>
                        </li>

                        <li class="nav-item nav-item-bg">
                            <button data-bg="bg-dark" class="btn btn_bg btn-dark " type="button">c</button>
                            <button data-bg="bg-normal" class="btn btn_bg btn-normal  " type="button">c</button>
                            <button data-bg="bg-dark-yellow" class="btn btn_bg btn-dark-yellow  " type="button">c</button>
                        </li>


                        <li class="nav-item nav-item-lang">
                              <div class="lang">
                                <a href="#"><img src="https://ddc.moph.go.th/asset/site/img/icons/flag-en.png" alt=""></a>
                                <a class="active" href="#"><img src="https://ddc.moph.go.th/asset/site/img/icons/flag-th.png" alt=""></a>
                           </div>
                       </li>

                            <li class="nav-item nav-item-call">
                                <a href="tel:1422"> <span class="fa"> <img src="img/call.svg" alt=""> </span> <span>1422</span></a>
                            </li>
                    </ul>
                 </div> <!-- id="Menu-right" class="navbar-nav" -->
            
             </nav>
             <!-- /menu1 -->
       
       
           <!-- menu2 -->
           <nav class="navbar navbar-expand-lg navbar-light navbar-main ">
                 <div id="Menu-right2" class="navbar-nav nav-link">
                     <ul>

                        <li class="nav_disease">
                        <div class="disease-name-dropdown dropdown">
                            <a class="dropdown-toggle bg-white-custom" href="#" data-toggle="dropdown" aria-expanded="false">
                              รายชื่อโรค
                              <span class="arrow"><span class="arrow-down"></span></span>
                            </a>
                    
                            <div class="dropdown-menu bg-white-custom" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(686px, 87px, 0px);">
                              <div class="container">
                                <div class="alphabet clearfix">
                                                  <a href="https://ddc.moph.go.th/th/site/disease/search/th/ก">ก</a>
                                  
                                                  <a href="https://ddc.moph.go.th/th/site/disease/search/th/ข">ข</a>
                                  
                                                  <a href="https://ddc.moph.go.th/th/site/disease/search/th/ค">ค</a>
                                   
                                                                            
                                </div><!--alphabet-->
                              </div><!--container-->
                            </div>
                          </div>

                        </li>

                     <li class="nav_complain" > <a class="nav-item nav-link active" href="#">รับเรื่องร้องเรียน   <span class="sr-only">(current)</span></a> </li>
                     <li  class="nav_line"> <a class="nav-item">| </a> </li>
                     <li  class="nav_sitemap"> <a class="nav-item nav-link" href="#">ผังเว็บไซต์ </a> </li>
                     <li  class="nav_search"> <a class="nav-item nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a> </li>
                     <li  class="nav_linktog"> <a class="nav-item nav-link nav_linktog" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a> </li>

                     

                   </ul>
               </div>
             </nav>
          <!-- /menu2 -->
       
           <!-- menu -->
         
           <nav class="navbar navbar-expand-lg navbar-light navbar_main_1 ">
             <!-- <a class="navbar-brand " href="#">Navbar</a> -->

             <button id="bbh" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
             </button>

             <div class="collapse navbar-collapse clearfix" id="navbarNavAltMarkup">
                
               <div id="Menu-right3" class="navbar-nav">
                   <ul>
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">รู้ทันโรค</a>
                       <div class="dropdown-menu">
                         <a class="dropdown-item" href="#">รายชื่อโรค</a>
                         <a class="dropdown-item" href="#">สื่อเผยแพร่</a>             
                       </div>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">เกี่ยวกับกรม</a>
                         <div class="dropdown-menu">
                           <a class="dropdown-item" href="#">ประวัติกรม</a>
                           <a class="dropdown-item" href="#">โครงสร้างกรม</a>
                           <a class="dropdown-item" href="#">ผู้บริหารกรมควบคุมโรค</a>
                           <!-- <div class="dropdown-divider"></div> -->
                           <a class="dropdown-item" href="#">ติดต่อกรม</a>
                         </div>
                       </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">กฎหมายที่เกี่ยวข้อง</a>
                           <div class="dropdown-menu">
                             <a class="dropdown-item" href="#">พ.ร.บ. โรคติดต่อ 2558</a>
                             <a class="dropdown-item" href="#">พ.ร.บ. ควบคุมผลิตภัณฑ์ยาสูบ 2560</a>
                             <a class="dropdown-item" href="#">พ.ร.บ. ควบคุมเครื่องดื่มแอลกอฮอล์ 2551</a>
                           </div>
                         </li>
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ข่าวจัดซื้อจัดจ้าง</a>
                             <div class="dropdown-menu">
                               <a class="dropdown-item" href="#">ประกาศร่าง TOR </a>
                               <a class="dropdown-item" href="#">ประกาศ/ผล สอบราคา </a>
                               <a class="dropdown-item" href="#">ประกาศ/ผล ประกวดราคา </a>
                               <a class="dropdown-item" href="#">ประกาศ/ผล E-auction  </a>
                               <a class="dropdown-item" href="#">ประกาศ/ผล E-Bidding  </a>
                               <a class="dropdown-item" href="#">ประกาศ/ผล E-Market  </a>
                               <a class="dropdown-item" href="#">ประกาศ/ผล วิธีเฉพาะเจาะจง  </a>
                               <a class="dropdown-item" href="#">ประกาศ/ผล วิธีคัดเลือก  </a>
                               <a class="dropdown-item" href="#">การเผยแพร่ราคากลางตามแบบของสำนัก ป.ป.ช. </a>
                               <a class="dropdown-item" href="#">แผนการจัดซื้อจัดจ้าง</a>
                             </div>
                           </li>
                           <li class="nav-item dropdown">
                               <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ข่าวสาร</a>
                               <div class="dropdown-menu">
                                 <a class="dropdown-item" href="#">ข่าวเพื่อสื่อมวลชน</a>
                                 <a class="dropdown-item" href="#">ข่าวรับสมัครบุคลากร</a>
                                 <a class="dropdown-item" href="#">ข่าวประชาสัมพันธ์</a>
                                 <!-- <div class="dropdown-divider"></div> -->
                                 <a class="dropdown-item" href="#">วีดีโอข่าวประชาสัมพันธ์</a>
                                 <a class="dropdown-item" href="#">ปฏิทินกิจกรรม</a>
                               </div>
                             </li>
                             <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">คลังข้อมูล</a>
                                 <div class="dropdown-menu">
                                   <a class="dropdown-item" href="#">ฐานข้อมูลงานวิจัย</a>
                                   <a class="dropdown-item" href="#">ฐานข้อมูล KM หน่วยงาน</a>
                                   <a class="dropdown-item" href="#">ฐานข้อมูลนวัตกรรม</a>
                                   <a class="dropdown-item" href="#">ฐานข้อมูลวิชาการ</a>
                                   <a class="dropdown-item" href="#">ฐานข้อมูลทำเนียบนักวิจัย</a>
                                   <a class="dropdown-item" href="#">ฐานข้อมูลทำเนียบผู้เชี่ยวชาญ</a>
                                   <a class="dropdown-item" href="#">อำเภอควบคุมโรคเข้มแข็ง</a>                                
                                 </div>
                               </li>
                               <li class="nav-item dropdown">
                                   <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">หน่วยงานในสังกัด</a>
                                   <div class="dropdown-menu">
                                     <a class="dropdown-item" href="#">หน่วยงานส่วนกลาง</a>
                                     <a class="dropdown-item" href="#">หน่วยงานส่วนภูมิภาค</a>
                                   </div>
                                 </li>
                               
                             
                                 <li class="nav-item dropdown disease-name-dropdown dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">รายชื่อโรค</a>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="#">  xx </a>
                                      <a class="dropdown-item" href="#"> yy </a>
                                    </div>
                                  </li>
                             </ul>
       
       
       
       
               </div>
             </div>
           </nav>
          
           <!-- /menu -->
           <!-- <img src="..." class="img-fluid" alt="Responsive image"> -->
       
</header>


  <section>
      <div class="row">
          <div class="col-12 p-0">
              <img src="img/Banner_U1-01.jpg" class="img-fluid" alt="Responsive image">
          </div>
      </div>
  </section>



   <!-- #content-disease -->
   <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <section id="content-disease">
    <div class="container"> <!-- Content here -->
        <div class="row">
        <div class="container">
    <div class="disease_box">
  
    <div class="container">
    <p class="disease_listmain">รายชื่อโรค</p>
  </div>

        <div class="container">
        <div>
                <div class="alphabet clearfix">
                  <a class="font_disease" href="#">ก</a>
                  <a class="font_disease" href="#">ข</a>
                  <a class="font_disease" href="#">ฃ</a>
                  <a class="font_disease" href="#">ค</a>
                  <a class="font_disease" href="#">ต</a>
                  <a class="font_disease" href="#">ฆ</a>
                  <a class="font_disease" href="#">ง</a>
                  <a class="font_disease" href="#">จ</a>
                  <a class="font_disease" href="#">ฉ</a>
                  <a class="font_disease" href="#">ช</a>
                  <a class="font_disease" href="#">ซ</a>
                  <a class="font_disease" href="#">ฌ</a>
                  <a class="font_disease" href="#">ญ</a>
                  <a class="font_disease" href="#">ฎ</a>
                  <a class="font_disease" href="#">ฏ</a>
                  <a class="font_disease" href="#">ฐ</a>
                  <a class="font_disease" href="#">ฑ</a>
                  <a class="font_disease" href="#">ฒ</a>
                  <a class="font_disease" href="#">ณ</a>
                  <a class="font_disease" href="#">ด</a>
                  <a class="font_disease" href="#">ต</a>
                  <a class="font_disease" href="#">ถ</a>
                  <a class="font_disease" href="#">ท</a>
                  <a class="font_disease" href="#">ธ</a>
                  <a class="font_disease" href="#">น</a>
                  <a class="font_disease" href="#">บ</a>
                  <a class="font_disease" href="#">ท</a>
                  <a class="font_disease" href="#">ธ</a>
                  <a class="font_disease" href="#">น</a>
                  <a class="font_disease" href="#">บ</a>
                  <a class="font_disease" href="#">ป</a>
                  <a class="font_disease" href="#">ผ</a>
                  <a class="font_disease" href="#">ฝ</a>
                  <a class="font_disease" href="#">พ</a>
                  <a class="font_disease" href="#">ฟ</a>
                  <a class="font_disease" href="#">ภ</a>
                  <a class="font_disease" href="#">ม</a>
                  <a class="font_disease" href="#">ย</a>
                  <a class="font_disease" href="#">ร</a>
                  <a class="font_disease" href="#">ล</a>
                  <a class="font_disease" href="#">ว</a>
                  <a class="font_disease" href="#">ศ</a>
                  <a class="font_disease" href="#">ษ</a>
                  <a class="font_disease" href="#">ส</a>
                  <a class="font_disease" href="#">ห</a>
                  <a class="font_disease" href="#">ฬ</a>
                  <a class="font_disease" href="#">อ</a>
                  <a class="font_disease" href="#">ฮ</a>
                </div>
                <div class="alphabet clearfix">
                  <a class="font_disease" href="#">A</a>
                  <a class="font_disease" href="#">B</a>
                  <a class="font_disease" href="#">C</a>
                  <a class="font_disease" href="#">D</a>
                  <a class="font_disease" href="#">E</a>
                  <a class="font_disease" href="#">F</a>
                  <a class="font_disease" href="#">G</a>
                  <a class="font_disease" href="#">H</a>
                  <a class="font_disease" href="#">I</a>
                  <a class="font_disease" href="#">J</a>
                  <a class="font_disease" href="#">K</a>
                  <a class="font_disease" href="#">L</a>
                  <a class="font_disease" href="#">M</a>
                  <a class="font_disease" href="#">N</a>
                  <a class="font_disease" href="#">O</a>
                  <a class="font_disease" href="#">P</a>
                  <a class="font_disease" href="#">Q</a>
                  <a class="font_disease" href="#">R</a>
                  <a class="font_disease" href="#">S</a>
                  <a class="font_disease" href="#">T</a>
                  <a class="font_disease" href="#">U</a>
                  <a class="font_disease" href="#">V</a>
                  <a class="font_disease" href="#">W</a>
                  <a class="font_disease" href="#">X</a>
                  <a class="font_disease" href="#">Y</a>
                  <a class="font_disease" href="#">Z</a>
                </div>
        </div>
      </div>
    


  <div class="container">
      <p class="  disease_list">ก</p>
        <div class="">
          <a class="disease_listsub" href="#"><i class="fa fa-circle-o disease_listsub_icon" aria-hidden="true"></i> กามโรคของต่อมและท่อน้ำเหลือง</a>
          <a class="disease_listsub" href="#"><i class="fa fa-circle-o disease_listsub_icon" aria-hidden="true"></i> การบาดเจ็บจากการจารจรทางถนน</a>
          <a class="disease_listsub" href="#"><i class="fa fa-circle-o disease_listsub_icon" aria-hidden="true"></i> การป้องกันการจมน้ำ</a>
          
        
      </div>
  </div>


      </div>
  </div>
        </div>
    </div>
  </section>



  
  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <!-- /#content-disease -->
 
     

<section id="footer">
      <div class="container">
        <div class="row name">
          <div class="name col-6 col-sm-6 col-md-3 col-lg-2 mt-5">
            <h5>กลุ่มโรค</h5>
              <nav class="name nav flex-column">
                  <a class="name nav-link p-0 " href="#">รายชื่อโรค</a>
                  <a class="name nav-link p-0"  href="#">โรคกับสถานที่</a>
                  <a class="name nav-link p-0"  href="#">กลุ่มโรค</a>
                  <a class="name nav-link p-0"  href="#">สื่อเผยแพร่</a>
              </nav>
          </div>

          <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-5 ">
              <h5>ข่าวสาร</h5>
                <nav class="nav flex-column">
                    <a class="nav-link p-0 " href="#">ข่าวเพื่อสือมวลชน</a>
                    <a class="nav-link p-0 "  href="#">ภาพข่าวประชาสัมพันธ์</a>
                    <a class="nav-link p-0"  href="#">ข่าวรับสมัครบุคลากร</a>
                    <a class="nav-link p-0"  href="#">ปฏิทินกิจกรรม</a>
                    </nav>
            </div>

            <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-5">
                <h5>เกี่ยวกับกรม</h5>
                  <nav class="nav flex-column">
                      <a class="nav-link p-0 " href="#">ประวัติกรม</a>
                      <a class="nav-link p-0" href="#">โครงสร้างกรม</a>
                      <a class="nav-link p-0" href="#">ผู้บริหารกรมควบคุมโรค</a>
                      <a class="nav-link p-0" href="#">ติดต่อกรม</a>
                    </nav>
              </div>

              <div class="col-6 col-sm-6 col-md-3 col-lg-2 mt-5">
                  <h5>รับเรื่องร้องเรียน</h5>
                    <nav class="nav flex-column">
                        <a class="nav-link p-0" href="#">สายด่วน 1422</a>
                  </nav>
              </div>                
        </div>
        <hr>
        <div class="row">
          <div class="col">
              <div class="row justify-content-between">
                  <div class="col-sm-12 col-md-6 col-lg-2 ">
                    <h5>กรมควบคุมโรค</h5>
                  </div>

                  <div class="col-sm-12 col-md-6 col-lg-8 ">
                      <span class="add float-left"> <p> ที่อยู่ : 88/21 ถนนติวานนท์ ตำบลตลาดขวัญ อำเภอเมือง จังหวัดนนทบุรี 11000 </p> </span>
                    </div>

                  <div class="col-4 col-sm-12 col-md-6 col-lg-2 b-m-auto">
                    <div class="box-social">
                        <ul class="nav">
                            <li class="nav-item mr-3">
                              <img src="img/Facebook.png" alt="">
                            </li>
                            <li class="nav-item">
                                <img src="img/Youtube.png" alt="">
                            </li>
                          </ul>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div><!-- /.container -->
    </section>

    <section id="footer-button">
      <div class="container">
          <div class="row justify-content-center text-center">
              <div class="col-4">
                  <p> © สงวนลิขสิทธิ์ 2561 : กรมควบคุมโรค</p>
              </div>
              <div class="col-4">
                <a href="#">นโยบายเว็บไซต์</a>
              </div>
            </div>
      </div><!-- /.container -->
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>