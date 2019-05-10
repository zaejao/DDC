<?php 
include "duck.conf.php";
include "prepare_html.php"; 
$menucode = "HOME" ;
$menucode1 = "HOMEALL" ;
$navsub = "publish" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";

$langcode=$_SESSION['LANGCODE'];
$clscont = new ContentsClass();
 
$deptcode = $_GET['dept'];
$newsid =$_GET['news'];

// $deptcode='thaincd';

$data_dept = $clscont->LoadOnce('department',array('department_code_ch'=>$deptcode  ));
$data_news = $clscont->LoadOnce('news_mapping',array('id'=>$newsid ,'office'=>$deptcode  ));


$data_newsetc = $clscont->Load('news_mapping',array( 'type' =>'news_info','office'=> $deptcode , 'enable_th'=>'Y'  ),' datetime DESC ',' 0,3');

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
     

<!-- Banner Slider-->
<!-- <section id="bg-banner">
    <div class="box-bg-banner ">
            <div class="row">
                <div id="banner-main p-0" class="col-12">
                    <div class="bd-example">
                        <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions1" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions1" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions1" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active w-100 ">
                                <img src="img/Banner_U1-01.jpg" class="img-fluid img_header" alt="Responsive image ">
                                    <!-- <img src="img/Banner_U1-01.jpg" class="img-fluid" alt="Responsive image"> -->
                           <!-- </div>
                          </div>
                          
                          <a class="carousel-control-prev" href="#carouselExampleCaptions1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleCaptions1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                      </div>
                 </div> 
              </div>
        </div>
</section> -->
    
    
<?php

   // echo "<pre>".print_r($data_dept,true) ."</pre>";
  //  echo "<pre>".print_r($data_news,true) ."</pre>";
?>





<section>
 <div class="container">
        <div class="row">
                <div id="content-title" class="col-lg-12 mt-5">
                <!-- content-title -->
                <h2> <?php echo $data_news['title_'.$_SESSION['LANGCODE']];?></h2>
            
                </div><!-- class="col-lg-12"-->
        </div> <!-- close row -->

        <div class="row">
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
          </div> 
          <div  class="col-sm-6 col-md-6 col-lg-6">
            <div class="footer-detail-right">
              <div class="time">
                  <i class="fa fa-calendar" aria-hidden="true">
                    <span class="ml-1 mb-5"  >
                      <?php echo  DateDisplay($data_news['datetime'],8) ;?>
                    </span>
                  </i>
              </div>
              <div class="view">
                  <i class="fa fa-eye" aria-hidden="true">
                      <span class="ml-1 mb-5"> 
                      <?php echo $data_news['views'] ;?>
                        <span class="lang_view"> View </span> 
                       </span>
                  </i>
              </div>
            </div>
          </div>  
        </div> 


         <!-- content-detail-->
        <div class="row">
                <div id="content-detail" class="col-lg-12"> 

                        <!-- <img src="img/pexels-photo-1282308b.png"> -->

                        <!-- <img src="<?php echo $path['news']. $data_news['cover'] ;?>" class="card-img-top"  >  -->
                        <p class="p_indent">    

                        <?php echo  htmlspecialchars_decode($data_news['desc_'.$_SESSION['LANGCODE']]);?>

                        </p>   

                         


                         <hr style="margin-left:0; border-top: 3px solid  #e84c93; >
                
                </div>  <!-- close id="content-detail" class="col-lg-12" -->
                
        </div> <!-- close row -->
 </div> <!-- class="container"-->
</section>


  <section id="Infor">
          <div class="container">   
              <div class="row">
                <div class="col-6"> 
                </div>      
                <div class="col-6">  
                    <a id="list-viewAll" href="infographic.php" class="lang_viewall" >ดูทั้งหมด</a>   
                </div>   
              </div>         
              <div class="row">
                      <div class="col-6">
                        <h5>อินโฟกราฟิกอื่นๆ  </h5>
                        <hr style="width:132px;margin-left:0; border-top: 3px solid  #e84c93; ">
                        
                      </div>     
  
                      <div class="col-6">  
                      </div>   
              </div>
              <div class="row mt-3 mb-3">

              
              <?php 
              foreach( $data_newsetc as $key => $value ){
              ?>
                    <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3 info_content">
                      <a href="infographic_detail.php?news=<?php echo $value['id'];?>&dept=<?php echo $value['office'];?>"> 
                      <img src="<?php echo $path['news']. $value['cover'] ;?>" alt=""> 
                      <div class="txt1_cont">
                              <?php  echo $value['title_'.$_SESSION['LANGCODE']];?>
                          </div>
                          <div class="txt1_cont txt2">
                          <?php  echo DateDisplay($value['datetime'],8) ;?>
                          </div>
                          </a>
                    </div>
                  <?php
              }
              ?>

              </div> <!-- close row -->
          </div> <!-- class="container"-->
  </section>

 
  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### -->
  


    <!-- ############################################################################################################### -->
    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?> 
    <!-- Optional JavaScript -->
    <script>
    $( document ).ready(function() {
        
    });
    </script>   

  </body>
</html>