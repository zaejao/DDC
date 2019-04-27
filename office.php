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

 
  $central = ( array_key_exists("central", $_GET)) ;
  $provincial = ( array_key_exists("provincial", $_GET)) ;


  if($provincial==1){
    $depttype = 2 ;
  }else{
    $depttype = 1 ;
  }
  
  $data_office = $clsdept->LoadOfficeByDeptTypeId($depttype);

?>

  <?php include "prepare_css.php";?>
  <body>
    <?php include "prepare_header.php";?>
    <?php include "prepare_bannermain.php";?>
    <!-- ############################################################################################################### -->
 

    <!-- #####  START CONTENT ##### -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <section id="box_content">
      <div class="container">
        <div class="row">
        
        
        
            <div class="container">
                <div class="row">
                    <div class="topic_block">
                      <p class="topic_text"> <?php echo setDeptType($depttype);?></p>
                    </div>
                </div>
            </div>

            
            <div id="accordion">
              <div class="row">
                <?php
                // echo "<pre>".print_r($data_office,true)."</pre>";
                foreach($data_office as $key => $value) {          
                ?>

                  <div class="card card_officelist col-lg-12 pl-0">
                      <div class="card-header"  data-toggle="collapse" href="#<?php echo $value['department_code_ch']; ?>">                    
                        <a class="card-link "> 
                          <i class="fa fa-bandcamp ic" aria-hidden="true"></i> 
                          <?php echo $value['department_name_'.$_SESSION["LANGCODE"]]; ?></a>                    
                          <i class="card-link fa fa-chevron-down" id="office_icon" aria-hidden="true"></i> 
                      </div>
                      <div id="<?php echo $value['department_code_ch']; ?>" class="collapse" data-parent="#accordion">
                        <div class="card-body officecontent">
                           <?php if($value['department_tel_'.$_SESSION["LANGCODE"]]){?>
                          <p> <span class="lang_tel"> หมายเลขโทรศัพท์ </span> : <?php echo $value['department_tel_'.$_SESSION["LANGCODE"]]; ?></p>
                          <?php } ?>
                          <?php if($value['department_fax_'.$_SESSION["LANGCODE"]]){?>
                          <p> <span class="lang_fax"> โทรสาร </span> : <?php echo $value['department_fax_'.$_SESSION["LANGCODE"]]; ?></p>
                          <?php } ?>

                          <?php if($value['department_address_'.$_SESSION["LANGCODE"]]){?>
                          <p> <span class="lang_address"> ที่อยู่ </span> : <?php echo $value['department_address_'.$_SESSION["LANGCODE"]]; ?></p>
                          <?php } ?>

                          <a href="/<?php echo $value['folderpath_name']; ?>/" class="office_link">
                            <span class="icon_circle">    
                              <i class="fa fa-link" aria-hidden="true"></i> 
                            </span>
                            &nbsp; <span class="lang_visitsite"> เข้าชมหน้าเว็บหน่วยงาน </span>
                          </a>
                        </div>
                      </div>
                    </div>           
                <?php
                }
                ?>
              </div>
            </div> 
            

        </div>
      </div>
    </section>  <!--/ section#content-diseasedetail -->
    
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### -->
  


    <!-- ############################################################################################################### -->
    <?php include "prepare_footer.php"; ?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>


    </script>  
    <script type="text/javascript">  
      $(function(){ 
  
            
            var _get = function(val){
                var result = null; 
                    tmp = []; 
                var items = location.search.substr(1).split("&"); 
                for(var index = 0; index < items.length; index++) { 
                    tmp = items[index].split("="); 
                      console.log("GET: "+ items[index]);
                    if(!items[index]){
                      console.log("  NOTHING TO GET");
                    
                    }else{
                  
                    }
                    if(tmp[0] === val) result = decodeURIComponent(tmp[1]);
                }
                return result;  
            } 
      

            if(_get('a') && _get('b')){ // ใช้ตรวจสอบ ถ้ามีการส่งค่าของตัวแปร a และ b
                console.log("OK");  
            }
       
                
        });
    </script>
  </body>
</html>