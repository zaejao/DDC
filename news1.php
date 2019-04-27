<?php 
include "duck.conf.php";
include "prepare_html.php"; 
$menucode = "HOME" ;
$menucode1 = "HOMEALL" ;
$navsub = "news" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";

$langcode=$_SESSION['LANGCODE'];
$clscont = new ContentsClass();
 
$deptcode = $_GET['deptcode'];
$newsid =$_GET['news'];

 $deptcode='thaincd';
 //$newsid= 4454;
$data_dept = $clscont->LoadOnce('department',array('department_code_ch'=>$deptcode  ));
$data_news = $clscont->LoadOnce('news',array('id'=>$newsid  ));


$data_newsetc = $clscont->Load('news_mapping',array( 'type' =>'news_mass', 'enable_th'=>'Y'  ),' datetime DESC ',' 0,3');

?> 

  <?php include "prepare_css.php";?>
<body>
  <?php include "prepare_header.php";?>
  <!-- ############################################################################################################### -->
    
      <section>
        <div class="row justify-content-center   row_banner">
            <div class="col-12 p-0">
                <div class="box_deptname"> <?php echo $data_dept['department_name_'.$langcode];?> </div>
                <img src="img/banner/Banner_U1.jpg" class="img-fluid" alt="Responsive image">
                
            </div>
        </div>
      </section>
      
     
      <?php  include 'prepare_navsub.php';?>
     

  <section>
  <div class="container">
          <div class="row">
                  <div id="content-title" class="col-lg-12 mt-5">
                  <!-- content-title -->
                  <h2>  <?php echo $data_news['news_title_'.$langcode] ;?> 
                    </h2>
              
                  </div><!-- class="col-lg-12"-->
          </div> <!-- close row -->

          <div class="row mb-5">
          <div  class="col-sm-6 col-md-6 col-lg-6">
              
                  
                          <div class="box-social">
                              <ul class="nav">
                                  <li class="nav-item mr-3">
                                    <img src="img/Facebook.png" alt="">
                                  </li>
                                  <li class="nav-item mr-3">
                                      <img src="img/Twitter.png" alt="">
                                  </li>
                                  <li class="nav-item mr-3">
                                          <img src="img/Share.png" alt="">
                                      </li>
                                </ul>
                          </div>
              </div> <!--  class="col-sm-6 col-md-6 col-lg-6"-->


          
          <div  class="col-sm-6 col-md-6 col-lg-6">
              
                  <div class="footer-detail-right">
                          <div class="time">
                              <i class="fa fa-calendar" aria-hidden="true">
                                <span class="ml-1 mb-5" > <?php echo  DateDisplay($data_news['news_datetime'],8) ;?>   </span>
                              </i>
                          </div>
                          <div class="view">
                              <i class="fa fa-eye" aria-hidden="true">
                                  <span class="ml-1 mb-5"> <?php echo $data_newsmain[0]['news_views'] ;?>    
                                  <span class="lang_view"> View </span>  </span>
                              </i>
                          </div>
          

          </div> <!--  class="col-sm-6 col-md-6 col-lg-6"-->
      </div>  <!-- class="row mb-5"-->

          <!-- content-detail-->
          <div class="row">
                  <div id="content-detail" class="col-lg-12"> 
                    <?php
                    
                    if($data_news['news_cover']){
                        if($newsid=='4454'){
                          ?>
                           <img src="img/drowningday2018-1_(2)_770_530.jpg" class="card-img-top"  >
                          <?php
                        }
                    ?>
                  <!-- <img src="<?php echo $path['news']. $data_news['news_cover'] ;?>" class="card-img-top"  > -->
                  <?php } ?>
                 
                     
                          <?php //  echo ContentDisplay($data_news['news_desc_'.$langcode]) ;?>  
                         

                        <p> ขอเชิญท่านที่สนใจร่วมประกวดออกแบบสร้างสรรค์สื่อ "infographic ในกิจกรรมรณรงค์ป้องกันเด็กจมน้ำ ปึ 2562 " 

                          สามารถดาวน์โหลด "กติกา"และ" "ใบสมัคร" การประกวดการออกแบบ infographic ได้ที่นี่ 

                          http://www.thaincd.com/2016/news/hot-news-detail.php?id=13408&gid=18
                          <br>
                          <br>
                          <p><iframe allowfullscreen="" frameborder="0" height="360" src="//www.youtube.com/embed/ouzx564lyhw" width="640"></iframe></p>
                          
                          <br>

                        <br>
                          อัพเดท ข้อมูลข่าวสาร โรคไม่ติดต่อและการบาดเจ็บได้ที่
                        <br>
                         Facebook :  https://www.facebook.com/thaincd/

 

                        </p> 

                          <hr class="line">
                  
                  </div>  <!-- close id="content-detail" class="col-lg-12" -->
                  
          </div> <!-- close row -->
  </div> <!-- class="container"-->
  </section>


  <section>
          <div class="container">            
              <div class="row col-12">
                      <h3>ข่าวสารอื่นๆ</h3> 
                      <hr>
                      <br> 
                      <br>
                      <br>
              </div>


              <div class="row mb-5">

              
              <?php 

              foreach( $data_newsetc as $key => $value ){
              ?>
      

                      <div class="col-sm-12 col-md-12 col-lg-4"> 
                              <div class="card">
                                <a href="journal_detail.php?news=<?php echo $value['id'];?>&dept=<?php echo $value['office'];?>">   
                                      <div class="box-img-main mt-2" style="    height: 245px">                     
                                      <img  style="width:100%;" src="<?php echo $path['news']. $value['cover'] ;?>" class="image"> 
                                    </a>
                                      </div> <!-- /.box-img-main -->
                                            <div class="card-body">
                                              <h5 class="card-title mb-2">  <?php  echo $value['title_'.$_SESSION['LANGCODE']];?>  </h5>
                                               
                                              <div class="footer-detail">
                                                <div class="time">
                                                    <i class="fa fa-calendar" aria-hidden="true">
                                                      <span class="ml-1"> <?php  echo DateDisplay($value['datetime'],8) ;?> </span>
                                                    </i>
                                                </div>
                                                <div class="view">
                                                    <i class="fa fa-eye ml-2" aria-hidden="true">
                                                        <span class="ml-1">  <?php  echo $value['views'];?>  view</span>
                                                    </i>
                                                </div>
                                                <div class="see-more">
                                                  <span class="mr-1">อ่านต่อ</span>
                                                  <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                                </div>
                                              </div> <!-- /.footer-detai -->
                                    </div> <!-- /.card-body -->
                                  </div><!-- /.card -->  
                              </div> <!-- close class="col-sm-12 col-md-12 col-lg-4"  -->  

                <?php } ?>
 
          
              </div> <!-- close row -->
          </div> <!-- class="container"-->
  </section>
`
 
   <!-- ############################################################################################################### -->

   <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
      $( document ).ready(function() {
        contents.LoadSlideImageHome();
    //    dept.LoadCharOfDisease();
      });
    </script>  
  </body>
</html>