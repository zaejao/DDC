
<!-- 
src="https://ddc.moph.go.th/uploads/news/646fad8b23c5516c0fff92dcc6d13f7a.jpg"

-->
<?php   //echo "<pre>".print_r( $data_slidemainsub ,true)."</pre>";?>
<?php 
    if($data_setting['slide_head1']['enable']=="Y" ){ 
  ?>  
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
<?php } ?>

 <!-- ############################################################################################################### -->



