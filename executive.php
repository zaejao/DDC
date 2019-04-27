<?php 
include "duck.conf.php";
include "prepare_html.php"; 

$menucode = "MAIN" ;
$menucode1 = "MAIN_DESEASE" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";

$clscont = new ContentsClass();

$menuex = $clscont->LoadMenuExecutive(array());
$content = $clscont->LoadExecutive(array());
$name = $clscont->LoadExecutiveName(array());
$position = $clscont->LoadExecutivePosition(array());




?>

  <?php include "prepare_css.php";?>
  <body>
    <?php
     include "prepare_header.php";
    ?>
     <?php include "prepare_bannermain.php";?>
    <!-- ############################################################################################################### -->
  

    <section id="box_content">
      <div class="container">
        <div class="row">
          <div class="col-12 mt-4"> 
         
            <div class="row">
              <div class="col-12 mb-4"> 
                <span class="topic_text  lang_executive"> โครงสร้างผู้บริหาร</span> 
              </div> 
            </div>
           

            <!-- ////////////////////////////////////////////////////////////////////////////////////       -->
            <div class="row"> 
              <div class="col-12 mt-4"> 
        
                <!-- Nav tabs -->
                <div class="row"> 
                    <ul class="nav nav-tab nav-justified" id="manager_MainNav" role="tablist">
                    <?php  // echo "<pre>".print_r($data_excutive,true)."</pre>"; ?>
                    
                    <?php      
                      foreach($menuex as $key => $value) {
                          $active = "";  
                          if($key==0){
                              $active  = " active " ; 
                          }
                                    // echo "<pre>".print_r($value,true)."</pre>";                                           
                        ?>
                        <li class="nav-item" >
                            <a class="nav-link <?php echo  $active;?> manager_text"  data-toggle="tab" href="#z<?php echo $value['id']; ?>"><?php echo $value['boardtype_display_name_'.$_SESSION["LANGCODE"]]; ?></a>
                        </li> 
                        <?php
                        } 
                        ?>
                    </ul>
                </div>
                        
              
                <!-- Tab panes -->
                
                <div class="tab-content tab_manager">
                  <?php 
                  if($menuex){
                    
                  foreach($menuex as $key => $value) {
                    $active= " fade ";
                    if($key==0){
                      $active ="active";
                    }
                    $data_excutive = $clscont->LoadExecutiveAll(array('b.enable'=>'Y' , 'bt.boardtype_display_id'=> $value['id'] ),' bt.orderby DESC , b.orderby DESC ','');
                    
                    $datanone = "";
                    if(!$data_excutive){
                      $datanone = "nonedata" ;
                    }
                  ?>
                    <div id="z<?php echo $value['id']; ?>" class="container tab-pane <?php echo $active?> <?php echo $datanone?>  "><br>
                     
                            <div class="row">
                            <?php           
                            //  echo "<pre>".print_r($name,true)."</pre>";
                            if($data_excutive){
                            foreach($data_excutive as $key1 => $val1) {  
                              
                            $data_contype  = $clscont->Load('boardcontacttype',array('deleted'=>0 ,'enable'=>'Y' ),'orderby DESC ','');
                            
                              //boardcontact
                            ?>                                        
                                <div class="col-sm-6">
                                    <div class="manager_box">
                                        <img class="manager_img" src="<?php echo $path['userboard'].$val1['filename']; ?>">
                                        <div class="manager txt_head">
                                          <?php echo $val1['titlename_'.$_SESSION["LANGCODE"]].$val1['firstname_'.$_SESSION["LANGCODE"]]." ". $val1['lastname_'.$_SESSION["LANGCODE"]]; ?>
                                        </div>
                                        <p class="manager txt"> <?php echo $val1['boardtype_name_'.$_SESSION["LANGCODE"]]; ?></p>
                                        <?php 
                                        
                                          foreach($data_contype as $key2 => $val2 ){
                                            $data_boardcon  = $clscont->Load('boardcontact',array('board_id'=>$val1['id'],'boardcontacttype_id'=>$val2['id'],'deleted'=>0 ,'enable'=>'Y' ),'orderby DESC ','');
                                            if( $data_boardcon){
                                              ?>
                                              <p class="manager txt_phone">   
                                                <?php echo $val2['boardcontacttype_'.$_SESSION["LANGCODE"]];?> : 
                                                <?php
                                                foreach($data_boardcon as $key3 => $val3 ){
                                                  echo $val3['detail_'.$_SESSION['LANGCODE']];
                                                  if($key3+1 < count($data_boardcon) ){
                                                    echo ",";
                                                  }
                                                  ?>  
                                                <?php 
                                                }
                                                ?>
                                              </p>
                                              <?php
                                            }
                                            ?>
                                          
                                            <?php
                                          } 
                                        ?>
                                    </div>
                                </div>
                            <?php
                          
                            }
                          }else{
                          ?>
                              <div class="col-12 text-center p-4">
                              ----   <span class="lang_preparedata"> เตรียมข้อมูล </span> ---- 
                              </div>
                          <?php
                          }
                            ?> 
                            </div>
                      
                    </div>
                          <?php 
                          
                        
                      }
                          
                  } ?>
                </div>

                  
              </div>
            </div>
            <!-- ////////////////////////////////////////////////////////////////////////////////////       -->

          </div>
        </div>
      </div>
    </section>  <!-- /section#box_content -->
    
    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### -->
  


    <!-- ############################################################################################################### -->
    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>

    </script>  
  </body>
</html>