<?php 
include "duck.conf.php";
include "prepare_html.php"; 
$menucode = "HOME" ;
$menucode1 = "HOMEALL" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";

  $langcode=$_SESSION['LANGCODE'];

  $clsdept = new DeptClass();
  $clscont = new ContentsClass();


  $deptcode = "ethics";
  
  $data_dept = $clscont->LoadOnce('department',array('department_code_ch'=>$deptcode  ));

  $data_slidemain = $clscont->Load('news_old',array('NW_menu' => 'mbanner','NW_active'=>'1','NW_home'=>'1' ),' NW_date DESC ','');
 

  $data_newsmain = $clscont->Load('news_mapping',array( 'office'=> $deptcode, 'enable_th'=>'Y' ),' datetime DESC ',''); 

  $data_newsmass = $clscont->Load('news_mapping',array( 'office'=> $deptcode, 'type' => 'news_mass', 'enable_th'=>'Y' ),' datetime DESC ',''); 
  $data_newspic = $clscont->Load('news_mapping',array( 'office'=> $deptcode, 'type' => 'news_pic', 'enable_th'=>'Y' ),' datetime DESC ',''); 

  $data_newsmain1 = array();

  foreach( $data_newsmain  as $key => $value ){
    if($value['cover']){
      $data_newsmain1[] =  $data_newsmain[$key];
    }
  }
?>



  <?php include "prepare_css.php";?>
<body>
  <?php include "prepare_header.php";?>
  <!-- ############################################################################################################### -->
  <?php include "prepare_bannermain2.php";?>
<!-- /////////////////////// รูป ข้างบน และข้างๆ ////////////////////// -->
<?php echo "<pre>".print_r($data_newsmain1 ,true)."</pre>";?>



<!-- /////////////////////// รูป ข้างบน และข้างๆ ////////////////////// -->
<section>
            <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
  
                  <div class="row">
                    <div id="news-main2" class="col-12">
                        <div class="card">
                          <div class="box-img-main mt-5">                     
                              <a href="#">  <img src="<?php echo $path['news']. $data_newsmain1[1]['cover'] ;?> ">" </a> 
                          </div> <!-- /.box-img-main -->
                        </div> <!-- /.card -->
                    </div><!-- ./col-12 -->
                 </div><!-- /.row -->
                 
            </div>

            <div id="news-img2" class="col-sm-12 col-md-12 col-lg-4 mt-5 "><!-- กล่องข้างๆ -->
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-12">
                    <div class="box-img2">
                        <a href="#">  <img src="<?php echo $path['news']. $data_newsmain1[2]['cover'] ;?>"> </a> 
                    </div>   <!--/.container -->
                </div><!-- /.col-12 -->
  
                <div class="col-sm-12 col-md-6 col-lg-12 mt-3">
                    <div class="box-img2">
                        <a href="#"> <img src="<?php echo $path['news']. $data_newsmain1[3]['cover'] ;?>"></a> 
                    </div>   <!--/.container -->
                </div><!-- /.col-12 -->
            </div><!-- /.row col-4 -->
            </div><!-- /.col-4 กล่องข้างๆ-->
            
            </div><!-- /.container -->
</section><!-- /.รูปบน -->
<!-- /////////////////////// /.รูป ข้างบน และข้างๆ ////////////////////// -->  


 <!-- ///////////////////////////////// -->
<section>
 <div class="container"> <!--  /*กล่อง2 กล่อง -->
        <div class="row my-5">  
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="box-img-main mt-2">                     
                        <img src="img/medic-hospital-laboratory-medical-40559.png" class="card-img-top" alt="...">
                    </div> <!-- /.box-img-main -->

                    <div class="card-body">
                    <h5 class="card-title">หัวข้อข่าวสารต่างๆ </h5>
                    <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ </p>
                    <div class="footer-detail">
                                <div class="time">
                                <i class="fa fa-calendar" aria-hidden="true">
                                    <span class="ml-2">Jul/15/2018 </span>
                                </i>
                                 </div>
                                <div class="view">
                                <i class="fa fa-eye" aria-hidden="true">
                                    <span class="ml-2">15view</span>
                                </i>
                                </div>
                                 <div class="see-more">
                                <span class="mr-2">อ่านต่อ</span>
                                <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                </div>
                    </div> <!-- /.footer-detai -->
                </div> <!-- /.card-body -->
            </div><!-- /.card -->                   
        </div><!-- /.col-4 -->

    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="box-img-main mt-2">                     
                  <img src="img/pexels-photo-1282308.png" class="card-img-top" alt="...">
            </div> <!-- /.box-img-main -->
                  <div class="card-body">
                    <h5 class="card-title">หัวข้อข่าวสารต่างๆ </h5>
                    <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ </p>
                    <div class="footer-detail">
                      <div class="time">
                          <i class="fa fa-calendar" aria-hidden="true">
                            <span class="ml-2">Jul/15/2018 </span>
                          </i>
                      </div>
                      <div class="view">
                          <i class="fa fa-eye" aria-hidden="true">
                              <span class="ml-2">15 view</span>
                          </i>
                      </div>
                      <div class="see-more">
                        <span class="mr-2">อ่านต่อ</span>
                        <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                      </div>
                    </div> <!-- /.footer-detai -->
          </div> <!-- /.card-body -->
        </div><!-- /.card -->                      
    </div><!-- /.col-4 -->

<div>
</section>

<!-- //////////////////////////////////// -->
<section id="system">
    <div class="container">

      <div class="row justify-content-md-center">
            <div class="col-md-auto ">
              <div class="box-title text-center">
              ระบบงานบริการภายในกรมควบคุมโรค
            </div>
            </div>
      </div>

      <div class="row my-5">
        <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
          <a href="#">
            <div class="box-system">
              <div class="box-img">
                <img src="img/006-stethoscope-1.svg" alt="">
              </div><!--box-img -->
              <p>E-Meeting </p>
            </div><!-- /.box-system -->
          </a>
        </div>

        <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
            <a href="#">
              <div class="box-system">
                <div class="box-img">
                  <img src="img/024-house.svg" alt="">
                </div><!--box-img -->
                <p>Estimate SM </p>
              </div><!-- /.box-system -->
            </a>
          </div>

          <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
              <a href="#">
                <div class="box-system">
                  <div class="box-img">
                    <img src="img/026-health-care.svg" alt="">
                  </div><!--box-img -->
                  <p>ระบบสารบรรณกรมฯ </p>
                </div><!-- /.box-system -->
              </a>
            </div>

            <div class="col-6 col-sm-6 col-md-3 col-lg-3  mt-3">
                <a href="#">
                  <div class="box-system">
                    <div class="box-img">
                      <img src="img/030-first-aid-kit.svg" alt="">
                    </div><!--box-img -->
                    <p>พรบ.ข้อมูลข่าวสาร </p>
                  </div><!-- /.box-system -->
                </a>
              </div>

      </div>
    </div><!-- /.container -->
  </section> <!-- /.system -->



<!-- เมนูแท๊ป-->
<!--         -->
<section>
    <div class="container">
    <div class="row my-5">
        <div class="col-lg-8">
        <!-- Nav tabs -->
  <div class="row"> 
            <ul id="listColor" class="nav nav-tabs" role="tablist">
               <li  class="nav-item">
                <a  class="nav-link active" data-toggle="tab" href="#news">ข่าวสาร</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#relation">ข่าวประชาสัมพันธ์</a>
             </li>
              <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#media">ข่าวสื่อมวลชน</a>
            </li>
          </ul>
      
        <!-- Tab panes -->
      <div class="tab-content">

          <div id="news" class="container tab-pane active"><br>
         
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                    เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                    <div class="footer-detail">
                        <div class="time">
                            <i class="fa fa-calendar" aria-hidden="true">
                              <span class="ml-0">Jul/15/2018 </span>
                            </i>
                        </div>
                        <div class="view">
                            <i class="fa fa-eye" aria-hidden="true">
                                <span class="ml-0">15 view</span>
                            </i>
                        </div>

                      <div class="icon-sub">
                        <span class="mr-2">+</span>                           
                      </div>
                    </div> <!-- /.footer-detai -->
                </div>
                
               <!-- //////// ปุ่มดาวน์โหลด -->
               <div class="col-md-auto my-3">
                   <div class="sale-text-all">
                           ดาวน์โหลดเอกสาร
                   </div> <!-- close sale-text-all " -->
              </div> <!-- close class="col-md-auto " -->

                <hr class="lines">
              </div>  <!-- close card -->
          
          </div> <!-- close id="home" -->
         



          <div id="relation" class="container tab-pane fade"><br>
            
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                    เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                  <div class="footer-detail">
                      <div class="time">
                          <i class="fa fa-calendar" aria-hidden="true">
                            <span class="ml-0">Jul/15/2018 </span>
                          </i>
                      </div>
                      <div class="view">
                          <i class="fa fa-eye" aria-hidden="true">
                              <span class="ml-0">15 view</span>
                          </i>
                      </div>

                      <div class="icon-sub">
                        <span class="mr-2">+</span>                           
                      </div>
                    </div> <!-- /.footer-detai -->
                </div>
                <hr class="lines">
            </div> 
          </div>  <!-- close id="menu1" -->
          
          <div id="media" class="container tab-pane fade"><br>
            
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                    เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                  <div class="footer-detail">
                      <div class="time">
                          <i class="fa fa-calendar" aria-hidden="true">
                            <span class="ml-0">Jul/15/2018 </span>
                          </i>
                      </div>
                      <div class="view">
                          <i class="fa fa-eye" aria-hidden="true">
                              <span class="ml-0">15 view</span>
                          </i>
                      </div>

                      <div class="icon-sub">
                        <span class="mr-2">+</span>                           
                      </div>
                    </div> <!-- /.footer-detai -->
                </div>
                <hr class="lines">
              </div>
          </div> <!-- close id="menu2" -->
         
      </div> <!-- close class="tab-content" -->
  </div> <!-- close row  -->
   
        </div> <!-- close col-lg-8 -->
    

      <div class="col-lg-4">
          
              <div class="col-md-auto ">
                <div class="sale-text">
                ประกาศจัดซื้อจัดจ้าง
                </div> <!-- close sale-text " -->
               </div> <!-- close class="col-md-auto " -->
      
                <div id="sale" class="col-md-auto my-3">
                    <div class="row col-12"> 
                      <div class="sale-text-detail"> 
                       ประกาศจัดซื้อวัสดุวิทยาศาสตร์และการแพทย์(ด้วยวิธีเจาะจง) จำนวน 11 รายการ ศตม. 14 เชียงใหม่ </div>
                      <div class="downloaddoc">ดาวน์โหลดเอกสาร</div>
                </div> <!-- close row col-12" -->
              </div> <!-- id="sale" class="col-md-auto my-3" -->

              <div id="sale" class="col-md-auto my-3">
                  <div class="row col-12"> 
                    <div class="sale-text-detail"> 
                     ประกาศจัดซื้อวัสดุวิทยาศาสตร์และการแพทย์(ด้วยวิธีเจาะจง) จำนวน 11 รายการ ศตม. 14 เชียงใหม่ </div>
                    <div class="downloaddoc">ดาวน์โหลดเอกสาร</div>
              </div> <!-- close row col-12" -->
            </div> <!-- id="sale" class="col-md-auto my-3" -->

            <div class="col-md-auto my-3">
                <div class="sale-text-all">
                    อ่านทั้งหมด
                </div> <!-- close sale-text-all " -->
              </div> <!-- close class="col-md-auto " -->
  
      

    <!-- ///////////////////////// -->

              <div class="col-md-auto ">
              <div class="sale-text">
                  ประกาศรับสมัครบุคคลากร
              </div> <!-- close sale-text " -->
            </div> <!-- close class="col-md-auto " -->


            <div id="sale" class="col-md-auto my-3">
                <div class="row col-12"> 
                  <div class="sale-text-detail"> 
                   ประกาศจัดซื้อวัสดุวิทยาศาสตร์และการแพทย์(ด้วยวิธีเจาะจง) จำนวน 11 รายการ ศตม. 14 เชียงใหม่ </div>
                  <div class="downloaddoc">ดาวน์โหลดเอกสาร</div>
            </div> <!-- close row col-12" -->
          </div> <!-- id="sale" class="col-md-auto my-3" -->

          <div id="sale" class="col-md-auto my-3">
              <div class="row col-12"> 
                <div class="sale-text-detail"> 
                 ประกาศจัดซื้อวัสดุวิทยาศาสตร์และการแพทย์(ด้วยวิธีเจาะจง) จำนวน 11 รายการ ศตม. 14 เชียงใหม่ </div>
                <div class="downloaddoc">ดาวน์โหลดเอกสาร</div>
          </div> <!-- close row col-12" -->
        </div> <!-- id="sale" class="col-md-auto my-3" -->

        <div class="col-md-auto my-3">
            <div class="sale-text-all">
                อ่านทั้งหมด
            </div> <!-- close sale-text-all " -->
          </div> <!-- close class="col-md-auto " -->

    

      </div> <!-- col-lg-4 -->
    </div> <!-- row my-5-->
    </div> <!-- container-->
</section>

 
 
   <!-- ############################################################################################################### -->

   <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
      $( document ).ready(function() {
       // contents.LoadSlideImageHome();
        
      });
    </script> 


         
         <script>
            function openCity(evt, cityName) {
              // Declare all variables
              var i, tabcontent, tablinks;
            
              // Get all elements with class="tabcontent" and hide them
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
            
              // Get all elements with class="tablinks" and remove the class "active"
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
            
              // Show the current tab, and add an "active" class to the button that opened the tab
              document.getElementById(cityName).style.display = "block";
              evt.currentTarget.className += " active";
            }      
          </script>
         
          </body>
        </html>


        