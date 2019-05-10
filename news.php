<?php 
include "duck.conf.php";
include "prepare_html.php"; 
$menucode = "DEPT" ;
$menucode1 = "NEWS" ;
$navsub = "news" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
//include "conf.php";

$langcode=$_SESSION['LANGCODE'];
$clscont = new ContentsClass();
 
$deptcode = $_GET['deptcode'];
$newsid =$_GET['news'];

// $deptcode='thaincd';
 //$newsid= 4454;
$data_dept = $clscont->LoadOnce('department',array('department_code_ch'=>$deptcode  ));
$data_news = $clscont->LoadOnce('news',array('id'=>$newsid  ));


$data_newsetc = $clscont->Load('news_mapping',array( 'type' =>$data_news['news_type'],'office'=>$deptcode  , 'enable_th'=>'Y'  ),' datetime DESC ',' 0,3');

?> 

  <?php include $pathf."/prepare_css.php";?>
<body>
  <?php include $pathf."/prepare_header.php";?>
  <?php include $pathf."/prepare_bannermain".$depttype.".php";?>
  <?php include $pathf."/prepare_navsub2.php";?>

  <!-- ############################################################################################################### -->
    
        

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
                    <img src="<?php echo $path['img'];?>Facebook.png" alt="">
                  </li>
                  <li class="nav-item mr-3">
                      <img src="<?php echo $path['img'];?>Twitter.png" alt="">
                  </li>
                  <li class="nav-item mr-3">
                          <img src="<?php echo $path['img'];?>Share.png" alt="">
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
                        <span class="ml-1 mb-5"> <?php echo $data_news['news_views'] ;?>    
                        <span class="lang_view"> View </span>  </span>
                    </i>
                </div>
              </div> <!--  class="col-sm-6 col-md-6 col-lg-6"-->
            </div>  <!-- class="row mb-5"-->
          </div>

          <!-- content-detail-->
          <div class="row">
                  <div id="content-detail" class="col-lg-12"> 
                    <?php
                    
                    if($data_news['news_cover']){
                      //  if($newsid=='4454'){
                          ?>
                           <img src="<?php //echo $path['news']. $data_news['news_cover'] ;?>" class="card-img-top"  >
                          <?php
                      //  }
                    ?>
                  <!-- <img src="<?php echo $path['news']. $data_news['news_cover'] ;?>" class="card-img-top"  > -->
                  <?php } ?>
                 
                     
                          <?php  echo htmlspecialchars_decode($data_news['news_desc_'.$langcode]) ;?>  


                          <?php 
                            if($data_news['news_file']){
                              ?>
                                ดาวน์โหลดเอกสารเพิ่มเติม : <a href="<?php $path['files'].$data_news['news_file']; ?>" class="linkpink2" target="_blank">     เอกสาร   <i class="fa fa-download"></i> </a>
                              <?php
                            }
                          ?>
                          <hr class="line mt-4">
                  
                  </div>  <!-- close id="content-detail" class="col-lg-12" -->
                  
          </div> <!-- close row -->
  </div> <!-- class="container"-->
  </section>


  <section id="home_diseaselist" class="my-0 "> 
      <div class="container pb-4">
        <div class="row col-12 mt-5">
          <h2 class="titletext">ข่าวสารอื่นๆ</h2>     
        </div>

        <div class="row pt-2">
          <div class="col-12">
            <div class="row"> 
  
            <?php 
          
            if($data_newsetc){
              foreach($data_newsetc as $key_n1 => $val_n1){
                $diseasedet = "";
              //  $newsdetail = $clscont->LoadOnce('news_mapping',array('id'=>$val_n1['id'],'enable'=>'Y'));
                $desc_th = ContentDisplayEditor($val_n1['desc_th']);
                $desc_th = mb_substr($desc_th,0,200,'UTF-8');
              ?>
                <div class="col-sm-12 col-md-4 col-lg-4 mb-4">
                  <div class="card card1 card1_det">
                    <a href="news.php?news=<?php echo $val_n1['id'];?>&deptcode=<?php echo $deptcode;?>" class="linknone"> 
                      <div class="box-img-main mt-2 text-center">                     
                        <img src="<?php echo $path['news'].$val_n1['cover'];?>" class="card-img-top img_blur" onerror="this.onerror=null;this.src='<?php echo $path['news'].'logo_df.jpg';?>'" style="    height: 210px;
    overflow: hidden;width:auto;" > 
                        <div class="overlay"> </div>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title"> <?php echo $val_n1['title_th'];?> </h5> 
                        <!-- <p class="detail"> <?php echo $desc_th;?></p> -->
                        <div class="footer-detail">
                          <div class="time">
                              <i class="fa fa-calendar" aria-hidden="true">  </i>
                                <span class="ml-0"> <?php echo DateDisplay($val_n1['update_time'],8);?>  </span> 
                          </div>
                          <div class="view">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                              <?php echo $val_n1['views'];?> 
                              <span class="lang_view"> View </span>
                          </div>
                          <div class="see-more">
                            <a href="news.php?news=<?php echo $val_n1['id'];?>&deptcode=<?php echo $deptcode;?>"> <span class="mr-0">อ่านเพิ่มเติม</span>
                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> </a>
                          </div>
                        </div> 
                      </div>
                    </a>
                  </div>
                </div>
              <?php
              }
            } 
            ?> 

            </div> 
          </div>
        </div> 
     </div>
    </section>
     <!-- /section#home_diseaselist -->

 
   <!-- ############################################################################################################### -->

   <?php include $pathf."/prepare_footer.php";?>
    <?php include $pathf."/prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
      $( document ).ready(function() {
      //  contents.LoadSlideImageHome();
    //    dept.LoadCharOfDisease();
      });
    </script>  
  </body>
</html>