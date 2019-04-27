<?php 
include "duck.conf.php";
include "prepare_html.php"; 
$menucode = "HOME" ;
$menucode1 = "HOMEALL" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
$navsub = "publish" ;
$langcode=$_SESSION['LANGCODE'];

  $clscont = new ContentsClass();
 //$data_subject = $clscont->Load('news_mapping',array('deleted' => '0','deleted'=>'Y'),' forcollegeyear ASC ','');


  $data_slidemain = $clscont->Load('news_old',array('NW_menu' => 'mbanner','NW_active'=>'1','NW_home'=>'1' ),' NW_date DESC ','');

  // NW_cover : 25923137ddaf8cd202df0f33872eef97.jpg

  $data_newsmain = $clscont->Load('news',array('news_main' => 1 ,'news_home'=>'1' ,'news_active'=>'Y' ),' news_datetime DESC ','');


?>



  <?php include "prepare_css.php";?>
<body>
<?php include "prepare_header.php";?>
    <?php include "prepare_bannermain.php";?>
<!-- Banner Slider-->
<!-- 
<section id="bg-banner">
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
                            </div>
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
</section>
     -->
<?php  include 'prepare_navsub.php';?>
 

          <!-- /////////////// กล่อง รูป 3รูป หลาย แถว /////////////// -->
          <section id="Infor">
              <div class="container">
                  <div class="row">
                      <div class="textInfor clo-12">
                        <h5>อินโฟกราฟิก</h5>
                        <hr>
                        <!-- <h5><u>อินโฟกราฟิก</u></h5> -->
                      </div><!-- /.text  อินโฟกราฟิก -->
                      <div class="col-12 mt-2 mb-5"><!-- /.img  อินโฟกราฟิก -->
                            <div class="row">
                               <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                   <a href="infog1_detail.php"> <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                   <a href="infog1_detail.php">  <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                    <a href="infog1_detail.php"> <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                    <a href="infog1_detail.php"> <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                    <a href="infog1_detail.php"> <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                    <a href="infog1_detail.php"> <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                    <a href="infog1_detail.php"> <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                    <a href="infog1_detail.php">  <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                    <a href="infog1_detail.php"> <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                    <a href="infog1_detail.php"> <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                    <a href="infog1_detail.php"> <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                    <a href="infog1_detail.php"> <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div> 
                             </div>
                      </div><!-- /.img  อินโฟกราฟิก -->
                  </div> <!-- /.row -->


              </div><!-- /.container -->
          </section>
 
  
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