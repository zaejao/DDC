<?php 
include "duck.conf.php";
include "prepare_html.php"; 

$d = $_GET['type'];

$menucode = "MAIN" ;
$menucode1 = "MAIN_DESEASE" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";

$clscont = new ContentsClass();
$dept = $_GET['dept'];
//$data_office = $clscont->LoadOffice(array('department_type'=>1));
$where = array('department_type'=>$d);
// $data_office = $clscont->LoadOffice($where);
// if(!isset($dept)){

// }
$data_office = $clscont->LoadOfficeByDeptTypeId(2);

?>

  <?php include "prepare_css.php";?>
  <body>
    <?php include "prepare_header.php";?>
    <!-- ############################################################################################################### -->

    <section class="box_banner">
        <div class="row">
            <div class="col-12 p-0" id="box_banner_image"> 
                <img src="img/Banner_U1-01.jpg" class="img-fluid" alt="Responsive image">
            </div>
        </div>
    </section>

    <!-- #####  START CONTENT ##### -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <section id="content-diseasedetail">
      <div class="container">
        <div class="row">
        
        
        
            <div class="container">
                <div class="row">
                    <div class="topic_block">
                      <p class="topic_text lang_deptcentral">หน่วยงานส่วนกลาง</p>
                    </div>
                </div>
            </div>


      <?php
      // echo "<pre>".print_r($data_office,true)."</pre>";
          // foreach($data_office as $key => $value) {          
      ?>


      <!-- <div class="office_block">
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="office_h" data-toggle="collapse" href="#<?php echo $value['department_name_'.$_SESSION["LANGCODE"]]; ?>">                    
                    <a class="card-link "><?php echo $value['department_name_'.$_SESSION["LANGCODE"]]; ?></a>                                      
                      <i class="card-link fa fa-chevron-down" id="office_icon" aria-hidden="true"></i>         
                  </div>
                  <div id="<?php echo $value['department_name_'.$_SESSION["LANGCODE"]]; ?>" class="collapse" data-parent="#accordion">
                    <div class="card-body" id="content_office">
                      <p>หมายเลขโทรศัพท์ : <?php echo $value['department_tel_'.$_SESSION["LANGCODE"]]; ?></p>
                      <p>ตั้งอยู่ : <?php echo $value['department_address_'.$_SESSION["LANGCODE"]]; ?></p>
                      <a href="#"><i class="fa fa-link" aria-hidden="true"></i> เข้าชมหน้าเว็บหน่วยงาน</a>
                    </div>
                  </div>
                </div>
            </div>
      </div> -->

      
            <div id="accordion">
            
      <?php
      // echo "<pre>".print_r($data_office,true)."</pre>";
      foreach($data_office as $key => $value) {          
      ?>
            <div class="card">
                  <div class="card-header" id="office_h" data-toggle="collapse" href="#<?php echo $value['department_code_ch']; ?>">                    
                    <a class="card-link "><?php echo $value['department_name_'.$_SESSION["LANGCODE"]]; ?></a>                                      
                      <i class="card-link fa fa-chevron-down" id="office_icon" aria-hidden="true"></i>         
                  </div>
                  <div id="<?php echo $value['department_code_ch']; ?>" class="collapse" data-parent="#accordion">
                    <div class="card-body" id="content_office">
                      <p>หมายเลขโทรศัพท์ : <?php echo $value['department_tel_'.$_SESSION["LANGCODE"]]; ?></p>
                      <p>ตั้งอยู่ : <?php echo $value['department_address_'.$_SESSION["LANGCODE"]]; ?></p>
                      <a href="#"><i class="fa fa-link" aria-hidden="true"></i> เข้าชมหน้าเว็บหน่วยงาน</a>
                    </div>
                  </div>
                </div>
          
      <?php
      }
      ?>
            </div>


      <?php
      // }
      ?>


        </div>
      </div>
    </section>  <!--/ section#content-diseasedetail -->
    
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### -->
  


    <!-- ############################################################################################################### -->
    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>


    </script>  
  </body>
</html>