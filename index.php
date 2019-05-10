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

  $deptcode = 'dept';
  $data_dept = $clscont->LoadOnce('department',array('department_code_ch'=>$deptcode  ));

 // $data_slidemain = $clscont->Load('news_old',array('NW_menu' => 'mbanner','NW_active'=>'1','NW_home'=>'1' ),' NW_date DESC ','');
 //$data_newsmain = $clscont->Load('news_mapping',array('home'=>'1' ,'enable_th'=>'Y' ),' datetime DESC ','');

 $data_newsmain = $clscont->Load('news',array('news_home'=>'1' ,'enable'=>'Y' ),' news_datetime DESC ','');

 
   
  
  $data_setting['slide_head1'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'slide_head1' , 'department_code_ch'=>"dept" ));
  $data_setting['diseaselist'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'diseaselist' , 'department_code_ch'=>"dept" ));
  $data_setting['news_auctions'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'news_auctions' , 'department_code_ch'=>"dept" ));
  $data_setting['bannerssystem'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'bannerssystem' , 'department_code_ch'=>"dept" ));
  $data_setting['bannerlink'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'bannerlink' , 'department_code_ch'=>"dept" ));

 

?>
 
<body>
  <?php include "prepare_header.php";?>
  <!-- ############################################################################################################### -->
    <?php 
    // echo "<pre>".print_r($data_slidemainsub,true)."</pre>";
    ?>
    <?php 
    if($data_setting['slide_head1']['enable']=="Y" ){ 
      // $data_slidemain = $clscont->Load('news_mapping',array( 'menu' => 'mbanner','home'=>'1' ,'enable'=>'Y' ),' datetime DESC ','');
      // $data_slidemainsub = $clscont->Load('news_mapping',array( 'menu' => 'msbanner','home'=>'1' ,'enable'=>'Y' ),' datetime DESC ','');
      $data_slidemain = $clscont->Load('news',array( 'news_menu' => 'mbanner','news_home'=>'1' ,'enable'=>'Y' ),' news_datetime DESC ','');
      $data_slidemainsub = $clscont->Load('news',array( 'news_menu' => 'msbanner','news_home'=>'1' ,'enable'=>'Y' ),' news_datetime DESC ','');
    ?>
      
    <section id="box_slideimg" class="">
      <div class="box-bg-banner">
        <div class="container">
          <div class="row">
                
                  <div id="banner-main" class="col-sm-12 col-md-8">
                      <div class="bd-example">
                      <?php if($data_slidemain){ ?>
                          <div id="SlideNewsMain" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                            <?php  
                              foreach($data_slidemain as $key1 => $val1){
                                  
                                  $flag_active  = "" ; 
                                  if($key1==0){
                                    $flag_active = "active" ; 
                                  } 
                               ?>
                               <li data-target="#SlideNewsMain" data-slide-to="<?php echo $key1;?>" class="<?php echo $flag_active;?>"></li>
                            <?php 
                              } 
                              ?> 
                            </ol>

                            <div class="carousel-inner">
                              <?php  
                                foreach($data_slidemain as $key1 => $val1){
                                  $flag_active  = "" ; 
                                  if($key1==0){
                                    $flag_active = "active" ; 
                                  }
                                  $flag_link = "#";
                                  $target ="";
                                  if ( isset($val1['youtube'] )){
                                    $flag_link = $val1['youtube'] ;
                                    $target ="_blank";
                                  }


                              ?>
                                
                                <div class="carousel-item <?php echo $flag_active;?>"> 
                                  <a href="<?php echo $flag_link;?>"  target="<?php echo $target;?>">
                                    <img src="<?php echo $path['news'].$val1['news_cover']?>" class="d-block w-100" alt="<?php echo $val['news_title_th']?>">
                                  </a>
                                </div>
                                
                              <?php 
                              } // end foreach 
                              ?> 
                            </div>
                            <a class="carousel-control-prev" href="#SlideNewsMain" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#SlideNewsMain" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                       
                      <?php } ?> 
                    </div>
                  </div><!-- /. col-8 -->
                
                
                  <div id="banner-secon" class="col-sm-12 col-md-4">
                    <div class="bd-example">
                    <?php 
                      if($data_slidemainsub){ 
                      ?>
                       
                      <div id="SlideNewsMini" class="carousel slide" data-ride="carousel">
                        <!--                           
                         <ol class="carousel-indicators">
                              <li data-target="#SlideNewsMini" data-slide-to="0" class="active"></li>
                              <li data-target="#SlideNewsMini" data-slide-to="1"></li>
                              <li data-target="#SlideNewsMini" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="img/img-02.jpg" class="d-block w-100" alt="AAA">
                              </div>
                              <div class="carousel-item">
                                <img src="img/img-02.jpg" class="d-block w-100" alt="BBB">
                              </div>
                              <div class="carousel-item">
                                <img src="img/img-02.jpg" class="d-block w-100" alt="CCC">
                              </div>
                            </div> -->


                       
                        <ol class="carousel-indicators">  
                          <?php  
                            foreach($data_slidemainsub as $key2 => $val2){
                                
                                $flag_active  = "" ; 
                                if($key2==0){
                                  $flag_active = "active" ; 
                                } 
                              ?>
                              <li data-target="#SlideNewsMini" data-slide-to="<?php echo $key2;?>" class="<?php echo $flag_active;?>"></li>
                          <?php 
                            } 
                          ?>  
                        </ol>
                        <div class="carousel-inner">
                          <?php  
                            foreach($data_slidemainsub as $key2 => $val2){
                              $flag_active  = "" ; 
                              if($key2==0){
                                $flag_active = "active" ; 
                              }
                              $flag_link = "#";
                              $target ="";
                              if ( isset($val2['youtube'] )){
                                $flag_link = $val2['youtube'] ;
                                $target ="_blank";
                              }
                          ?>
                                
                              <div class="carousel-item <?php echo $flag_active;?>"> 
                                <a href="<?php echo $flag_link;?>"  target="<?php echo $target;?>">
                                  <img src="<?php echo $path['news'].$val2['news_cover']?>" class="d-block w-100" alt="<?php echo $val['news_title_th']?>">
                                </a>
                              </div> 
                          <?php 
                            } // end foreach 
                          ?>  
                        </div>
                         
                        <a class="carousel-control-prev" href="#SlideNewsMini" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#SlideNewsMini" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                          
                      <?php } ?>
                    </div>
                  </div><!-- /. col-4 -->

          </div>
        </div>
      </div> <!-- /.box-bg-banner -->
    </section>
    <?php } ?>

  <!-- ############################################################################################################### -->

  <?php 
    if($data_setting['diseaselist']['enable']=="Y" ){ 
      $data_disease = $clscont->Load('disease',array('enable'=>'Y','enable_dept'=>'Y','deleted'=>'0' ),' orderby DESC ','');

  ?>
  <?php 
    //echo "<pre>".print_r($data_disease,true)."</pre>";
    ?>
    <section id="home_diseaselist" class="my-0 ">
      <div class="container pb-4">
        <?php 
          if($data_setting['diseaselist']['sectionname_'.$_SESSION['LANGCODE']]) {
        ?>
        <div class="row">
          <div class="col-md-auto mt-4 mb-4 ">
            <div class="box-title text-left topic_text   "> 
              <?php echo $data_setting['diseaselist']['sectionname_'.$_SESSION['LANGCODE']];?>
            </div>
          </div>
        </div>
          <?php } ?>

        <div class="row pt-2">
          <div class="col-12">
            <div class="row"> 
  
            <?php 
          
            if($data_disease){
              foreach($data_disease as $key_dis => $val_dis){
                $diseasedet = "";
                $data_diseasedetail = $clscont->LoadOnce('disease_detail',array('disease_header_id'=>'1','disease_id'=>$val_dis['id'],'enable'=>'Y','deleted'=>'0' ));
                $diseasedet = ContentDisplayEditor($data_diseasedetail['detail_th']);
                $diseasedet = mb_substr($diseasedet,0,200,'UTF-8');
              ?>
                <div class="col-sm-12 col-md-4 col-lg-4 mb-4">
                  <div class="card card1">
                    <a href="disease_detail.php?d=<?php echo $val_dis['id'];?>" class="linknone"> 
                      <div class="box-img-main mt-2">                     
                        <img src="<?php echo $path['disease'].$val_dis['disease_pic'];?>" class="card-img-top img_blur"  > 
                        <div class="overlay"> </div>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title"> <?php echo $val_dis['disease_name_th'];?> </h5> 
                        <p class="detail"> <?php echo $diseasedet;?></p>
                        <div class="footer-detail">
                          <div class="time">
                              <i class="fa fa-calendar" aria-hidden="true">  </i>
                                <span class="ml-0"> <?php echo DateDisplay($val_dis['update_time'],8);?>  </span> 
                          </div>
                          <div class="view">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                              <?php echo $val_dis['views'];?> 
                              <span class="lang_view"> View </span>
                          </div>
                          <div class="see-more">
                            <a href="disease_detail.php?d=<?php echo $val_dis['id'];?>"> <span class="mr-0">อ่านเพิ่มเติม</span>
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
  <?php 
    }
  ?>
  <!-- ############################################################################################################### -->
   
  <?php 
    if($data_setting['news_auctions']['enable']=="Y" ){ 
  ?> 
    <section id="news-content" class="mb-5 ">
      <div class="container pb-4">
        <?php 
          if($data_setting['news_auctions']['sectionname_'.$_SESSION['LANGCODE']]) {
        ?>
        <div class="row">
          <div class="col-md-auto mt-4 mb-4 ">
            <div class="box-title text-left topic_text   "> 
              <?php echo $data_setting['news_auctions']['sectionname_'.$_SESSION['LANGCODE']];?>
            </div>
          </div>
        </div>
          <?php } ?>

        <div class="row pt-4">
          <div class="col-12">
            <div class="row"> 
              <ul id="nav_newshome" class="nav nav-tabs m-auto" role="tablist">
              </ul>
              <div class="tab-content  w-100 news_main_content" id="news_main_home">
              </div> 
            </div> 
          </div>
        </div> 
     </div>
    </section>
    <!-- /section#news-content -->
  <?php } ?>
  <!-- ############################################################################################################### -->
  <?php 
    if($data_setting['bannerssystem']['enable']=="Y" ){ 
  ?>  
    <section id="system">
      <div class="container"> 
              <div class="row justify-content-md-center">
                <div class="col-md-auto ">
                  <div class="box-title text-center ">
                    <?php //echo $valb1['bannertypename_'.$_SESSION['LANGCODE']];?>
                    <?php echo $data_setting['bannerssystem']['sectionname_'.$_SESSION['LANGCODE']].$data_dept['department_name_'.$_SESSION['LANGCODE']];?>
                  </div>
                </div>
              </div>

              <div class="row mt-2  ">
            <?php 

              $datasetting2 =$clscont->Load('bannerssystem',array('department_code_ch'=>'dept','deleted'=>0,'enable'=>'Y'),'ORDERBY DESC',' 0,4 ');
              $num_bannersystem =$clscont->LoadCount('bannerssystem',array('department_code_ch'=>'dept','deleted'=>0,'enable'=>'Y'));
           //   $num_bannersystem = count($datasetting2);  
              if($datasetting2){
                foreach( $datasetting2 as $keyb2 => $valb2){
                  ?>
                    
                      <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
                        <a href="<?php echo $valb2['pathlink'];?>"  alt="<?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?>"  title="<?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?>" target="_blank">
                          <div class="box-system">
                            <div class="box-img">
                              <img src="<?php echo $path['bannerlink'].$valb2['pathpic'];?>" alt="<?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?>"  title="<?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?>">
                            </div> 
                            <p class=""> <?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?> </p>
                          </div> 
                        </a>
                      </div>
                  <?php
                }
              }
              
        ?>
          </div>
          
          <?php // echo $num_bannersystem['cnt']  ;?>

        <?php  if( $num_bannersystem['cnt'] >4 ){?>
          <div class="row mt-2 mb-5 collapse" id="seemorelist">
            <?php 
              $datasetting2 =$clscont->Load('bannerssystem',array('department_code_ch'=>'dept','deleted'=>0,'enable'=>'Y'),'ORDERBY DESC','4,20 ');
              if($datasetting2){
                foreach( $datasetting2 as $keyb2 => $valb2){
            ?>
                  <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
                    <a href="<?php echo $valb2['pathlink'];?>"   target="_blank" alt="<?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?>"  title="<?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?>" target="_blank">
                      <div class="box-system">
                        <div class="box-img">
                          <img src="<?php echo $path['bannerlink'].$valb2['pathpic'];?>" alt="<?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?>"  title="<?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?>">
                        </div> 
                        <p class=""> <?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?> </p>
                      </div> 
                    </a>
                  </div>
            <?php
                }
              }
            ?>
          </div>  
          <div class="text-center">
            <i class="fa fa-play-circle-o seemorebtn icon-pink collapsed" aria-hidden="true" data-toggle="collapse" data-target="#seemorelist"></i>
          </div> 
        <?php } ?>


      </div>
    </section> 
    <!-- /section#system -->
  <?php } ?>
  

   <!-- ############################################################################################################### -->

  <?php 
    if($data_setting['bannerlink']['enable']=="Y" ){ 
      $data_bannerlink = $clscont->Load('banners',array('enable'=>'Y','deleted'=>0 ,'department_code_ch'=>"dept" ),' orderby DESC ','');
  ?> 
    <section id="bannerlink">
      <div class="container mb-5">
        
        <div class="row">
          <div class="col-md-auto mt-5 mb-4 ">
            <div class="box-title text-left topic_text   "> 
              <?php echo $data_setting['bannerlink']['sectionname_'.$_SESSION['LANGCODE']];?>
            </div>
          </div>
        </div>
        <!--begin-->
        <!-- <div class="row mt-3 ">
          <?php 
            if($data_bannerlink){
              foreach( $data_bannerlink as $keybl => $valbl){ 
          ?>
          <div class="mt-3 mx-3 box_bannerlink2" >
            <a href="<?php echo $valbl['pathlink'];?>">
                <div class="box-img text-center align-middle">
                  <img src="<?php echo $path['bannerlink'].$valbl['pathpic'];?>"  class="img_bannerlink" alt="">
                </div> 
            </a>
          </div> 
          <?php 
              }
            }
          ?>
        </div>  --> <!--enditem-->



        <div class="owl-carousel owl-theme pad-l-r ">
        
        <?php 
          if($data_bannerlink){
            foreach( $data_bannerlink as $keybl => $valbl){ 
        ?>
        
          <div class="item">
            <div class="mt-3 box_bannerlink2" >
              <a href="<?php echo $valbl['pathlink'];?>" target="_blank" alt="<?php echo $valbl['bannersname_th'];?>" title="<?php echo $valbl['bannersname_th'];?>">
                <div class="box-img text-center align-middle">
                  <img src="<?php echo $path['bannerlink'].$valbl['pathpic'];?>"  class="img_bannerlink" alt="<?php echo $valbl['bannersname_th'];?>" title="<?php echo $valbl['bannersname_th'];?>">
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
    </section> 
    <!-- /section#bannerlink -->
    <?php } ?>



 
   
    <!-- ############################################################################################################### -->
    <style type="text/css" id="slider-css"></style>
    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
 
      $( document ).ready(function() {
        /*
        $("#menu").mmenu({
            // options
         }, {
            // configuration
         });
*/
      //  contents.LoadSlideImageHome();
        contents.LoadSettingHomeNewsAuction();
        /*$('.owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          nav:true,
          dots:true,
          navText : ['<i class="fa fa-play-circle-o prev-left" aria-hidden="true"></i>','<i class="fa fa-play-circle-o next-right" aria-hidden="true"></i>'],
          responsive:{
            0:{
              items:1
            },
            481:{
              items:2
            },
            768:{
              items:3
            },
            1024:{
              items:4,
			  loop:true
            }
          }
        });*/
      }); 
      /*document.addEventListener(
      "DOMContentLoaded", () => {
         const menu = mmlight( document.querySelector( "#menu" ) );
         menu.init( "selected" );
         menu.create( "(min-width: 600px)" );

         document.querySelector( 'a[href="#menu"]' )
            .addEventListener( 'click', ( evnt ) => {
               menu.open();

               evnt.preventDefault();
               evnt.stopPropagation();
            });
      }
   );*/
    </script>  
  </body>
</html>


