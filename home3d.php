
<!-- 
src="https://ddc.moph.go.th/uploads/news/646fad8b23c5516c0fff92dcc6d13f7a.jpg"

-->
<?php   //echo "<pre>".print_r( $data_slidemainsub ,true)."</pre>";?>

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
                                  if ( isset($val1['news_youtube'] )){
                                    $flag_link = $val1['news_youtube'] ;
                                  } 
                            ?>
                                <li data-target="#SlideNewsMain" data-slide-to="<?php echo $key1;?>" class=""></li>
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
                                  if ( isset($val1['news_youtube'] )){
                                    $flag_link = $val1['news_youtube'] ;
                                  }

                              ?>
                                <div class="carousel-item <?php echo $flag_active;?>">
                                  <a href="<?php echo $flag_link;?>" target="_blank">
                                    <img src="<?php echo $path['news'].$val1['news_cover'] ; ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                      <h5> <?php echo  $val1['news_title_th'] ; ?> </h5> 
                                    </div>
                                  </a>
                                </div>

                              <?php  } ?>
                           
                               
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
                            <?php 
                              foreach($data_slidemainsub as $key2 => $val2){
                                  
                                  $flag_active  = "" ; 
                                  if($key2==0){
                                    $flag_active = "active" ; 
                                  }
                                  
                                  $flag_link = "#";
                                  if ( isset($val2['news_youtube'] )){
                                    $flag_link = $val2['news_youtube'] ;
                                  } 
                            ?>
                              <li data-target="#SlideNewsMini" data-slide-to="<?php echo $key2;?>"></li> 
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
                                  if ( isset($val2['news_youtube'] )){
                                    $flag_link = $val2['news_youtube'] ;
                                  }

                              ?>

                              <div class="carousel-item  <?php echo $flag_active;?>">
                              <img src="<?php echo $path['news'].$val2['news_cover'] ; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5> </h5>
                                  <p> </p>
                                </div>
                              </div>
                              <?php  } ?>

                         

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

 






    
<!--


<?php 
    if($data_setting['system_similar']['enable']=="Y" ){ 
  ?>  
    <section id="system">
      <div class="container mt-5">
         
              <div class="row justify-content-md-center">
                <div class="col-md-auto ">
                  <div class="box-title text-center ">
                    <?php echo $valb1['bannertypename_'.$_SESSION['LANGCODE']];?>
                    <?php echo $data_setting['system_similar']['sectionname_'.$_SESSION['LANGCODE']];?>
                  </div>
                </div>
              </div>

              <div class="row mt-2 mb-5">
            <?php 

                $datasetting2 =$clscont->Load('setting_banner',array('deleted'=>0,'enable'=>'Y'),'ORDERBY DESC','');
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
      </div> 
    </section>  

  <?php } ?>
            -->
 <!--
  
  <?php 
    if($data_setting['bannerlink']['enable']=="Y" ){ 
      $data_bannerlink = $clscont->Load('banners',array('enable'=>'Y','deleted'=>0 ,'department_code_ch'=>"DEPT" ),' orderby DESC ','');

  ?> 
    <section id="bannerlink">
      <div class="container mb-5">
        
        <div class="row">
          <div class="col-md-auto mt-2 mb-4 ">
            <div class="box-title text-left topic_text   "> 
              <?php echo $data_setting['bannerlink']['sectionname_'.$_SESSION['LANGCODE']];?>
            </div>
          </div>
        </div>
        

       
        <div class="row mt-3 ">
          <?php 
            //for ($i=0;$i<=3;$i++){ 
          ?>
          <div class="mt-3 mx-3 box_bannerlink2" >
            <a href="<?php echo $valb2['pathlink'];?>">
                <div class="box-img text-center align-middle">
                  <img src="<?php echo $path['bannerlink'];?>d1.png"  class="img_bannerlink" alt="">
                </div> 
            </a>
          </div>

          <div class="mt-3 mx-3 box_bannerlink2" >
            <a href="https://ehealth.moph.go.th/">
                <div class="box-img text-center align-middle">
                  <img src="<?php echo $path['bannerlink'];?>d4.png"  class="img_bannerlink" alt="">
                </div> 
            </a>
          </div>
          
          <div class="mt-3 mx-3 box_bannerlink2" >
            <a href="https://www.thailandmedicalhub.net/">
                <div class="box-img text-center align-middle">
                  <img src="<?php echo $path['bannerlink'];?>d5.png"  class="img_bannerlink" alt="">
                </div> 
            </a>
          </div>

          <div class="mt-3 mx-3 box_bannerlink2" >
            <a href="https://www.cgd.go.th/cs/internet/internet/%E0%B8%AB%E0%B8%99%E0%B9%89%E0%B8%B2%E0%B8%AB%E0%B8%A5%E0%B8%B1%E0%B8%812.html?page_locale=th_TH">
                <div class="box-img text-center align-middle">
                  <img src="<?php echo $path['bannerlink'];?>d3.png"  class="img_bannerlink" alt="">
                </div> 
            </a>
          </div>

         
         
          <?php 
           //}
          ?>
        </div> 
        
 
      </div> 
    </section>  
    <?php } ?> -->
            