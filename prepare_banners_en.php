
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
    if($data_setting['newsactivity']['enable']=="Y" ){ 
      $data_news = $clscont->Load('news_mapping',array('office'=>$deptcode ,'main'=>1 , 'type'=>'news_pic'  ,'enable'=>'Y' ),' datetime DESC ','');
      $data_news1 = array();
      $x=0;
      foreach( $data_news  as $keyn2 => $valuen2 ){
        if($x<3){ 
          $data_news1[] =  $data_news[$keyn2];
          $x++;
          // if($valuen2['cover']){
          //   $data_news1[] =  $data_news[$keyn2];
          //   $x++;
          // }
        }
      }
     // $data_news1 = $data_news  ;

      
  ?>
  <?php 
   // echo "<pre>".print_r($data_news1,true)."</pre>";
    ?>
    <section id="home_diseaselist" class="my-0 ">
      <div class="container pb-4">
        <?php 
          if($data_setting['newsactivity']['sectionname_'.$_SESSION['LANGCODE']]) {
        ?>
        <div class="row">
          <div class="col-md-auto mt-4 mb-4 ">
            <div class="box-title text-left topic_text   "> 
              <?php echo $data_setting['newsactivity']['sectionname_'.$_SESSION['LANGCODE']];?>
            </div>
          </div>
        </div>
          <?php } ?>

        <div class="row pt-2">
          <div class="col-12">
            <div class="row"> 
  
            <?php 
          
            if($data_news1){
              foreach($data_news1 as $key_n1 => $val_n1){
                $diseasedet = "";
              //  $newsdetail = $clscont->LoadOnce('news_mapping',array('id'=>$val_n1['id'],'enable'=>'Y'));
                $desc_th = ContentDisplayEditor($val_n1['desc_th']);
                $desc_th = mb_substr($desc_th,0,200,'UTF-8');
              ?>
                <div class="col-sm-12 col-md-4 col-lg-4 mb-4">
                  <div class="card card1">
                    <a href="news.php?news=<?php echo $val_n1['id'];?>&deptcode=<?php echo $deptcode;?>" class="linknone"> 
                      <div class="box-img-main mt-2 text-center">                     
                        <img src="<?php echo $path['news'].$val_n1['cover'];?>" class="card-img-top img_blur" onerror="this.onerror=null;this.src='<?php echo $path['news'].'logo_df.jpg';?>'" style="    height: 210px;
    overflow: hidden;width:auto;" > 
                        <div class="overlay"> </div>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title"> <?php echo $val_n1['title_th'];?> </h5> 
                        <p class="detail"> <?php echo $desc_th;?></p>
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
  <?php 
    }
  ?>

<!-- ############################################################################################################### -->




<?php 
    if($data_setting['bannerssystem']['enable']=="Y" ){ 
  ?>  
    <section id="system">
      <div class="container mt-5"> 
              <div class="row justify-content-md-center">
                <div class="col-md-auto ">
                  <div class="box-title text-center ">
                    <?php // echo $valb1['bannertypename_'.$_SESSION['LANGCODE']];?>
                    <?php echo $data_setting['bannerssystem']['sectionname_'.$_SESSION['LANGCODE']].$data_dept['department_name_'.$_SESSION['LANGCODE']];?>
                  </div>
                </div>
              </div>
              <div class="row mt-0  ">
            <?php 
              $datasetting2 =$clscont->Load('bannerssystem',array('department_code_ch'=>$deptcode,'deleted'=>0,'enable'=>'Y'),'ORDERBY DESC',' 0,4 ');
              $num_bannersystem =$clscont->LoadCount('bannerssystem',array('department_code_ch'=>$deptcode,'deleted'=>0,'enable'=>'Y'));
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
        <?php  if( $num_bannersystem['cnt'] >4 ){ ?>
          <div class="row mt-2 mb-5 collapse" id="seemorelist">
            <?php 
              $datasetting2 =$clscont->Load('bannerssystem',array('department_code_ch'=>$deptcode,'deleted'=>0,'enable'=>'Y'),'ORDERBY DESC','4,20 ');
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
      $data_bannerlink = $clscont->Load('banners',array('enable'=>'Y','deleted'=>0 ,'department_code_ch'=>$deptcode),' orderby DESC ','');
      
      if($data_bannerlink){
 
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
              <a href="<?php echo $valbl['pathlink'];?>">
                <div class="box-img text-center align-middle">
                  <img src="<?php echo $path['bannerlink'].$valbl['pathpic'];?>"  class="img_bannerlink"  alt="<?php echo $valbl['bannersname_th'];?>" title="<?php echo $valbl['bannersname_th'];?>">
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
    <?php
     }
    }
    ?> 

 <!-- ############################################################################################################### -->


