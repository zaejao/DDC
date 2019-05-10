<?php 
include "duck.conf.php";
include "prepare_html.php"; 

$menucode = "MAIN" ;
$menucode1 = "MAIN_DESEASE" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
$langcode=$_SESSION['LANGCODE'];

$clsdept = new DeptClass();
$clscont = new ContentsClass();



$data_id = $_GET['d'];
if( !isset($data_id) && gettype($data_id)!= "" ){
  //echo " XXX";
}else{
 // echo "YYY" . gettype($_GET['d']);
}
// echo $date_id;


$dheader = $clscont->Load('disease_header',array('enable'=>'Y','deleted'=>0),' orderby DESC ','');


?>

  <?php include "prepare_css.php";?>
  <body>
    <?php include "prepare_header.php";?>
    <!-- ############################################################################################################### -->
    <?php include "prepare_bannermain.php";?>

    <!-- #####  START CONTENT ##### -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <section id="content-diseasedetail">
      <div class="container">
        <div class="row">
          <div class="col-12 mt-4">
          
          
            <div class="row">
              <div class="col-12" > 
                <span class="topic_text lang_diseasedetail"> รายละเอียดโรค</span> 
              </div>
              <!-- <div class="col-9 box_headerdisease font_title">  
                <span class="diseasename "> </span>
              </div> -->
            </div>
<!-- 
            <div class="row mt-4 row_prepare"> 
              <div class="col-12 text-center p-4">
              ----   <span class="lang_preparedata"> เตรียมข้อมูล </span> ---- 
              </div>
            </div>
 
            <div class="row mt-4 row_data">
              <div class="col-3">
                <div class="nav flex-column nav-pills pillstab" id="pills_tab" role="tablist" aria-orientation="vertical">
                </div>
              </div>
              <div class="col-9">
                <div class="tab-content" id="pills_tab_content">

                </div>
              </div>
            </div> -->
          
          
          
            
            
                    <div class="row  mt-4 row_data">
                      <div class="col-3">
                        <div class="nav flex-column nav-pills pillstab" id="pills_tab" role="tablist" aria-orientation="vertical">
                          <?php 
                          if($dheader ){
                            foreach( $dheader  as $key1 => $val1){
                              $active = " ";
                              if($key1==0){
                                $active = " active";
                              }
                            
                            ?> 
                                <a class="nav-link   linknone2 <?php echo $active;?>" data-toggle="pill" href="#dis<?php echo $val1['id'];?>" role="tab" aria-selected="true"> <?php echo $val1['disease_header_th'];?> <i class="fa fa-chevron-down"></i> </a>
                     
                            <?php
                            }
                          }
                          ?>
                           <!-- <a class="nav-link linknone2"  data-toggle="pill" href="#v-pills-profile" role="tab" aria-selected="false">Profile <i class="fa fa-chevron-down"></i> </a> -->
                       </div>
                      </div>
                      <div class="col-9 "> 

                        <div class="  box_headerdisease font_title">  
                          <span class="diseasename "> </span>
                        </div>

                        <div class="tab-content mt-2" id="pills_tab_contentss">
                        <?php 
                          if($dheader ){
                            foreach( $dheader  as $key1 => $val1){
                                $active = "";
                                $show = "";
                              if($key1==0){ 
                                $active = " active";
                                $show = " show";
                              }

                              $ddetail = $clscont->LoadOnce('disease_detail',array('disease_id'=>$data_id,'disease_header_id'=>$val1['id'],'enable'=>'Y','deleted'=>0));
                              
                         ?>
                            <div class="tab-pane fade <?php echo $active." ".$show;?>" id="dis<?php echo $val1['id'];?>" role="" > 
                              <?php 
                              if( $ddetail ){ 
                                echo htmlspecialchars_decode($ddetail['detail_th']); 
                              }else{ 
                                ?>
                                <div class="text-center">
                                   ---- <span class="lang_preparedata"> เตรียมข้อมูล </span> ---- 
                                </div>
                                <?php
                              }
                              ?> 
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
      </div>
    </section>  <!--/ section#content-diseasedetail -->
    
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### -->
  


    <!-- ############################################################################################################### -->
    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
   

    <script type="text/javascript">  
    
    var data_id = '<?php echo $data_id;?>' ;
      $( document ).ready(function() {
     //  dept.LoadDiseaseContents(data_id) ;    
       dept.LoadDiseaseName(data_id,'diseasename');
      });

    </script>  
  </body>
</html>