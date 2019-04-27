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
 //$data_subject = $clscont->Load('news_mapping',array('deleted' => '0','deleted'=>'Y'),' forcollegeyear ASC ','');


  $data_slidemain = $clscont->Load('news_old',array('NW_menu' => 'mbanner','NW_active'=>'1','NW_home'=>'1' ),' NW_date DESC ','');

  // NW_cover : 25923137ddaf8cd202df0f33872eef97.jpg

  $data_newsmain = $clscont->Load('news_mapping',array('main' => 1 ,'home'=>'1' ,'enable_th'=>'Y' ),' datetime DESC ','');


?>



  <?php include "prepare_css.php";?>
<body>
  <?php include "prepare_header.php";?>
  <!-- ############################################################################################################### -->
    
  
    <!-- <img src="..." class="img-fluid" alt="Responsive image"> -->
    <section id="box_slideimg" class="">
      <div class="box-bg-banner">
          <div class="container">
              <!-- Content here -->
              <div class="row">
                  <div id="banner-main" class="col-sm-12 col-md-8 mb-4">
                      <div class="bd-example">
                          <div id="SlideNewsMain" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">

                            <?php 
                              foreach($data_slidemain as $key1 => $val1){
                                  
                                  $flag_active  = "" ; 
                                  if($key1==0){
                                    $flag_active = "active" ; 
                                  }
                                  
                                  $flag_link = "#";
                                  if ( isset($val1['NW_youtube'] )){
                                    $flag_link = $val1['NW_youtube'] ;
                                  }

                              ?>
                                <!-- <li data-target="#SlideNewsMain" data-slide-to="<?php echo $key1;?>" class="<?php echo $flag_active;?>"></li> -->
                              <?php 
                              } 
                              ?> 
                              <li data-target="#SlideNewsMain" data-slide-to="<?php echo $key1;?>" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                              <?php 
                              foreach($data_slidemain as $key1 => $val1){
                                  
                                  $flag_active  = "" ; 
                                  if($key1==0){
                                    $flag_active = "active" ; 
                                  }
                                  
                                  $flag_link = "#";
                                  if ( isset($val1['NW_youtube'] )){
                                    $flag_link = $val1['NW_youtube'] ;
                                  }

                              ?>
                                <div class="carousel-item <?php echo $flag_active;?>">
                                  <a href="<?php echo $flag_link;?>" target="_blank">
                                    <img src="<?php echo $path['news'].$val1['NW_cover'] ; ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                      <h5> <?php echo  $val1['NW_th'] ; ?> </h5> 
                                    </div>
                                  </a>
                                </div>

                              <?php  } ?>
                             <!--
                              <div class="carousel-item">
                                <img src="img/img-03.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5> </h5> 
                                </div>
                              </div>
                              -->
                               
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
                        </div>
                  </div><!-- /. col-8 -->
                  
                  <div id="banner-secon" class="col-sm-12 col-md-4">
                      <div class="bd-example">
                          <div id="SlideNewsMini" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#SlideNewsMini" data-slide-to="0" class="active"></li>
                              <li data-target="#SlideNewsMini" data-slide-to="1"></li>
                              <li data-target="#SlideNewsMini" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="img/img-02.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5> </h5>
                                  <p> </p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="img/img-02.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5> </h5>
                                  <p> </p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="img/img-02.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5> </h5>
                                  <p></p>
                                </div>
                              </div>
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
                        </div>
                      </div><!-- /. col-4 -->
                </div>
          </div>
      </div> <!-- /.box-bg-banner -->
  </section>

  
  <?php 
   //  echo "<pre>".print_r($data_newsmain,true) ."</pre>";

  //  data_newsmain[0]['title_th'] 
  //  data_newsmain[0]['news_desc_th']
  //  data_newsmain[0]['news_cover']
  //  data_newsmain[0]['views']
  ?>


    <?php //echo $_SESSION['LANGCODE'] ; ?>
    <section id="news" class="">
        <div class="container">
            <!-- Content here -->
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-8"> 
                <div class="row">

                  <div id="news-main" class="col-12">
                    <a href="#">
                      <div class="card">
                        <div class="box-img-main mt-5">                     
                                <a href="news1.php?deptcode=<?php echo $data_newsmain[0]['news_office'];?>&news=<?php echo $data_newsmain[0]['id'] ;?>"> 
                                  <!-- <img src="<?php echo $path['news']. $data_newsmain[0]['cover'] ;?>" class="card-img-top"  > -->
                                  <!-- <img src="img/drowningday2018-1_(2)_770_530.jpg" class="card-img-top"  > -->
                                  <img src="<?php echo $path['news']. $data_newsmain[0]['cover'] ;?>" class="card-img-top"  > 
                                </a>
                              </div>  
                              <div class="card-body">
                                <h5 class="card-title"> 
                               
                                  <?php echo $data_newsmain[0]['title_'.$langcode] ;?>
                                  
                                </h5>
                                <div class="footer-detail ">
                                  <div class="time">
                                      <i class="fa fa-calendar" aria-hidden="true"></i>
                                      <span class="ml-2"><?php echo  DateDisplay($data_newsmain[0]['datetime'],8) ;?>  </span>
                                  </div>
                                  <div class="view">
                                      <i class="fa fa-eye" aria-hidden="true">
                                      </i>
                                      <span class="ml-2">
                                           <?php echo $data_newsmain[0]['views'] ;?>
                                        <span class="lang_view"> View </span> 
                                      </span>
                                  </div>
                                  <div class="see-more">
                                  <a href="news1.php?deptcode=<?php echo $data_newsmain[0]['news_office'];?>&news=<?php echo $data_newsmain[0]['id'] ;?>"> 
                                
                                      <span class="mr-2 lang_readmore"> อ่านต่อ   </span>
                                      <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                  </a>
                                  </div>
                                </div> <!-- /.footer-detai -->
                                
                               
                              </div>
                              <hr class="line">

                      </div> <!-- /.card -->
                    </a>
                  </div><!-- ./col-12 -->
                </div><!-- /.row -->

                <div class="row"> 
                  <div class="col-sm-12 col-md-4 col-lg-4 mb-2 boxnewshome">
                    <a href="news1.php?deptcode=<?php echo $data_newsmain[1]['news_office'];?>&news=<?php echo $data_newsmain[1]['id'] ;?>"  class="linknone"> 
                               
                        <div class="card card_new1">
                        
                            <div class="box-img-main mt-2">                      
                              <img src="<?php echo $path['news']. $data_newsmain[1]['cover'] ;?>" class="card-img-top"  > 
                            </div> 
                            <div class="card-body">
                              <h5 class="card-title">  <?php echo $data_newsmain[1]['title_'.$langcode] ;?> </h5>
                              <p > </p>
                              <div class="footer-detail">
                                <div class="time">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <span class="ml-0">   <?php echo  DateDisplay($data_newsmain[1]['datetime'],8) ;?></span>
                                </div>
                                <div class="view">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    <?php echo $data_newsmain[1]['views'] ;?>
                                    <span class="lang_view"> View </span> 
                                </div>
                                <div class="see-more">
                                <a href="news1.php?deptcode=<?php echo $data_newsmain[0]['news_office'];?>&news=<?php echo $data_newsmain[0]['id'] ;?>"> 
                                  <span class="mr-0 lang_readmore">  อ่านต่อ  </span>
                                  <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> </a>
                                </div>
                              </div>  
                          </div>   
                        </div><!-- /.card -->      
                      </a>      
                  </div><!-- /.col-4 -->
                               

                  <div class="col-sm-12 col-md-4 col-lg-4 mb-2 boxnewshome">
                      <div class="card card_new1">
                          <div class="box-img-main mt-2">                     
                          <img src="<?php echo $path['news']. $data_newsmain[2]['cover'] ;?>" class="card-img-top"  > 
                          </div> <!-- /.box-img-main -->
                                <div class="card-body">
                                  <h5 class="card-title"> <?php echo $data_newsmain[2]['title_'.$langcode] ;?> </h5>
                                  <p>   </p>
                                  <div class="footer-detail">
                                    <div class="time">
                                        <i class="fa fa-calendar" aria-hidden="true">
                                        <span class="ml-0">   <?php echo  DateDisplay($data_newsmain[2]['datetime'],8) ;?>   </span>
                                        </i>
                                    </div>
                                    <div class="view">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <?php echo $data_newsmain[2]['views'] ;?>
                                        <span class="lang_view"> View </span> 
                                    </div>
                                    <div class="see-more">
                                    <a href="news1.php?deptcode=<?php echo $data_newsmain[2]['news_office'];?>&news=<?php echo $data_newsmain[2]['id'] ;?>"  class="linknone"> 
                               <span class="mr-0 lang_readmore">  อ่านต่อ </span> 
                                      <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> </a>
                                    </div>
                                  </div> <!-- /.footer-detai -->
                        </div> <!-- /.card-body -->
                      </div><!-- /.card -->                      
                  </div><!-- /.col-4 -->

                  <div class="col-sm-12 col-md-4 col-lg-4 mb-2 boxnewshome">
                      <div class="card card_new1">
                          <div class="box-img-main mt-2">                     
                          <img src="<?php echo $path['news']. $data_newsmain[24]['cover'] ;?>" class="card-img-top"  > 
                          </div> <!-- /.box-img-main -->
                                <div class="card-body">
                                  <h5 class="card-title"><?php echo $data_newsmain[24]['title_'.$langcode] ;?> </h5>
                                  <p>  </p>
                                  <div class="footer-detail">
                                    <div class="time">
                                        <i class="fa fa-calendar" aria-hidden="true">  </i>
                                          <span class="ml-0"> <?php echo  DateDisplay($data_newsmain[24]['datetime'],8) ;?>   </span>
                                      
                                    </div>
                                    <div class="view">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <?php echo $data_newsmain[24]['views'] ;?>
                                        <span class="lang_view"> View </span>
                                    </div>
                                    <div class="see-more">
                                    <a href="news1.php?deptcode=<?php echo $data_newsmain[24]['news_office'];?>&news=<?php echo $data_newsmain[24]['id'] ;?>"  class="linknone"> 
                           
                                        <span class="mr-0 lang_readmore">อ่านต่อ</span>
                                      <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> </a>
                                    </div>
                                  </div> <!-- /.footer-detai -->
                        </div> <!-- /.card-body -->
                      </div><!-- /.card -->                      
                  </div><!-- /.col-8 -->
                </div>  
              </div>

              
              <div id="news-img" class="col-sm-12 col-md-12 col-lg-4 mt-3 "><!-- กล่องข้างๆ -->
                <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-12">
                      <div class="box-img">
                      <a href="<?php echo $data_newsmain[9]['office'] ;?>/news.php?deptcode=<?php echo $data_newsmain[9]['news_office'];?>&news=<?php echo $data_newsmain[9]['id'] ;?>"  class="linknone"> 
                        
                      <img src="<?php echo $path['news']. $data_newsmain[9]['cover'] ;?>"  class="image" >  
                      </a>
                          <div class="overlay">
                            <div class="text">
                              <h5> <?php echo $data_newsmain[9]['title_'.$langcode] ;?> </h5> 
                              <span class="ml-0"> <?php echo  DateDisplay($data_newsmain[9]['datetime'],8) ;?>   </span>
                            </div>
                          </div>
                      </div>   <!--/.container -->
                  </div><!-- /.col-12 -->

                  <div class="col-sm-12 col-md-6 col-lg-12 mt-3">
                      <div class="box-img">
                      <a href="<?php echo $data_newsmain[9]['office'] ;?>/news.php?deptcode=<?php echo $data_newsmain[28]['news_office'];?>&news=<?php echo $data_newsmain[28]['id'] ;?>"  class="linknone"> 
                              
                      <img src="<?php echo $path['news']. $data_newsmain[28]['cover'] ;?>" class="card-img-top"  > 
                                </a>
                          <div class="overlay">
                            <div class="text">
                                <h5>  <?php echo $data_newsmain[28]['title_'.$langcode] ;?> </h5> 
                                <span class="ml-0"> <?php echo  DateDisplay($data_newsmain[28]['datetime'],8) ;?>   </span>
                                <!-- <br> -->
                            </div>

                          </div>
                      </div>   <!--/.container -->
                  </div><!-- /.col-12 -->

                </div><!-- /.row col-4 -->
                  
              </div><!-- /.col-4 กล่องข้างๆ-->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.news -->

    <section id="news-content" class="my-5 ">
      <div class="container pb-4">
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

     </div><!-- /.container -->
    </section><!-- /.news-content -->



 
    <section id="system">
      <div class="container">
        <?php 
          $datasetting =$clscont->Load('setting_bannertype',array('deleted'=>0,'enable'=>'Y'),'ORDERBY DESC','');
        
          if($datasetting){ 

            foreach( $datasetting as $keyb1 => $valb1 ){
            ?>
              <div class="row justify-content-md-center">
                <div class="col-md-auto ">
                  <div class="box-title text-center ">
                    <?php echo $valb1['bannertypename_'.$_SESSION['LANGCODE']];?>
                  </div>
                </div>
              </div>

              <div class="row my-5">
            <?php 

                $datasetting2 =$clscont->Load('setting_banner',array('setting_bannertype_id'=> $valb1['id'],'deleted'=>0,'enable'=>'Y'),'ORDERBY DESC','');
                if($datasetting2){
                  foreach( $datasetting2 as $keyb2 => $valb2){
                    ?>
                     
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
                          <a href="<?php echo $valb2['pathlink'];?>">
                            <div class="box-system">
                              <div class="box-img">
                                <img src="<?php echo $valb2['pathpic'];?>" alt="">
                              </div> 
                              <p class="">   <?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?> </p>
                            </div> 
                          </a>
                        </div>
                    <?php
                  }
                }
            }
        ?>
          </div>
       
          <?php } ?>
  
      </div><!-- /.container -->
    </section> <!-- /.system -->
 
   
    <!-- ############################################################################################################### -->

    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
 
      $( document ).ready(function() {
        contents.LoadSlideImageHome();
        contents.LoadSettingHomeNewsAuction();


       

      }); 

     

    </script>  
  </body>
</html>