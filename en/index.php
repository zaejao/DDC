<?php 
include "../duck.conf.php";
include $pathf."/prepare_html_en.php"; 

$menucode = "DEPT" ;
$menucode1 = "HOME" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
include "conf.php";

  $langcode=$_SESSION['LANGCODE'];

  $clsdept = new DeptClass();
  $clscont = new ContentsClass();
 

  
?>
 

  <?php include $pathf."/prepare_css.php";?>

<body>
  <?php //echo $depttype;?>
  <?php include $pathf."/prepare_header_en.php";?>
  <!-- ############################################################################################################### -->
  <?php include $pathf."/prepare_bannermain_en.php";?>
 
    <section class="en_content1">
    
      <div class="container">
         <div class="row">
            <div class="col-12 mb-2"> 
              <div class="row">
                <div class="col-12  mt-4 mb-4"> 
                  <span class="topic_text "> Weekly Disease Forcast </span> 
                </div> 
              </div>  
          </div>
        </div>
      </div>   

      <div class="bg_custom3">
          <div class="container">
              <div class="row ">
                
                <div class="col-12  mt-4 mb-4"> 
                      <div class="row">
                        <div class="col-6"> 
                          <a href="<?php echo $path['banners_en'] ;?>Forecast_No207_P1.JPG" target="_blank">
                            <img src="<?php echo $path['banners_en'] ;?>Forecast_No207_P1.JPG"  class="d-block w-100">
                          </a>
                        </div> 
                        <div class="col-6"> 
                          <a href="<?php echo $path['banners_en'] ;?>Forecast_No207_P1.JPG" target="_blank">
                            <img src="<?php echo $path['banners_en'] ;?>Forecast_No207_P2.JPG"   class="d-block w-100">
                            </a>
                        </div>
                    </div>  
                </div> 
              </div>
            </div>
        </div>

    </section>
 

    <section class="en_content2"> 
      <div class="container">
         <div class="row">
            <div class="col-12 mb-2 mt-2"> 
              <div class="row">
                <div class="col-12  mt-4 mb-4"> 
                  <span class="topic_text "> Highlights </span> 
                </div> 
              </div> 

              <?php 
  
                $data_hi = $clscont->Load('en_data',array('topic'=>'high' ,'status'=>'1' ),' date DESC ','0,2')
              ?> 
              <div class="row">
                <div class="col-12 "> 
                  <?php 
                    if($data_hi  ){
                      foreach( $data_hi  as $k1 => $val1 ){  
                      ?>

                      <div class="box_file">    
                         <a href="<?php echo $path['files_en'].$val1['uploadfile'] ;?>"  class="linkpink2"  target="_blank"> <i class="fa fa-file-pdf-o"> </i> </a> 
                         <a href="<?php echo $path['files_en'].$val1['uploadfile'] ;?> " class="linknone2"  target="_blank"> 
                          <?php echo $val1['title'] ;?>
                          </a>
                    </div>
                      <?php  
                      }
                    }
                    ?> 
                     

                </div> 
              </div> 

          </div>
        </div>
      </div>    

    </section>

   
 
    <section class="en_content3   bg_custom3">
      <div class="container">
         <div class="row">
            <div class="col-12 mt-2 mb-5 "> 
              <div class="row">
                <div class="col-12  mt-4 mb-4"> 
                  <span class="topic_text "> Travelling advice in thailand </span> 
                </div> 
              </div> 
               

              <?php 
  
                $data_trav = $clscont->Load('en_data',array('topic'=>'travelling' ,'status'=>'1' ),' date DESC ','')
              ?> 
              <div class="row">
                <div class="col-12 "> 
                  <?php 
                    if($data_hi  ){
                      foreach( $data_trav  as $k2 => $val2 ){  
                      ?>

                      <div class="box_file">    
                        <a href="<?php echo $path['files_en'].$val2['uploadfile'] ;?>"  class="linkpink2"  target="_blank"> <i class="fa fa-file-pdf-o"> </i> </a> 
                        <a href="<?php echo $path['files_en'].$val2['uploadfile'] ;?> " class="linknone2"   target="_blank"> 
                          <?php echo $val2['title'] ;?>
                          </a>
                    </div>
                      <?php  
                      }
                    }
                    ?> 
      
                  </div> 
                </div>  

          </div>
        </div>
      </div> 
      
       
    </section>



    
  <?php 
  
      $data_bannerlink = $clscont->Load('en_banners',array('enable'=>'Y','deleted'=>0 ,'department_code_ch'=>"dept" ),' orderby DESC ','');
  ?> 
    <section id="bannerlink">
      <div class="container mb-5">
        
        <div class="row">
          <div class="col-md-auto mt-5 mb-4 ">
            <div class="box-title text-left topic_text   "> 
              Epidemiological Update
            </div>
          </div>
        </div>
      

        <div class="owl-carousel owl-theme pad-l-r ">
        
        <?php 
          if($data_bannerlink){
            foreach( $data_bannerlink as $keybl => $valbl){ 
        ?>
        
          <div class="item">
            <div class="mt-3 box_bannerlink2" >
              <a href="<?php echo $valbl['pathlink'];?>" target="_blank" alt="<?php echo $valbl['bannersname_th'];?>" title="<?php echo $valbl['bannersname_th'];?>">
                <div class="box-img text-center align-middle">
                  <img src="<?php echo $path['bannerlink_en'].$valbl['pathpic'];?>"  class="img_bannerlink" alt="<?php echo $valbl['bannersname_th'];?>" title="<?php echo $valbl['bannersname_th'];?>">
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
 



    
 
  
    <?php include $pathf."/prepare_banners_en.php";?>

   <!-- ############################################################################################################### -->

    <?php include $pathf."/prepare_footer_en.php";?>
    <?php include $pathf."/prepare_script_en.php";?>


    
  </body>
</html>



         
       