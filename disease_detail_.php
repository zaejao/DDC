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
        
        
        
        <div class="disease_box">
              <p class="title-underline">รายชื่อโรค</p>
              <ol class="breadcrumb1">
                  <a class="breadcrumb-item" href="#">หน้าหลัก</a>
                  <a class="breadcrumb-item" href="#">รู้ทันโรค</a>
                  <a class="breadcrumb-item" href="#">รายชื่อโรค</a>
              </ol>
        </div>

        <div class="detaildiesaseBox">
          <div class="tab_menuBox">
            <div id="blockbtn"></div>
            <div>
            <p><?php echo $data_id ?></p>
            </div>
          </div>

          <div class="tab_detailBox">
            <div id="block_disease_detail"></div>
            
          </div>
        </div>

        <!-- <div class="tab_box" >
          <div class="row">
            <div class="tab_menu">
              <div class="nav_diesase_detail">
                <a class="nav_link active"  id="" href="#" >รายละเอียดของโรค</a>
                <a class="nav_link"  id="" href="#" >อาการของโรค</a>
                <a class="nav_link"  id="" href="#" >สถานการณ์ในปัจจุบัน</a>
                <a class="nav_link"  id="" href="#" >การป้องกันโรค</a>
              </div>
            </div>
            <div class="tab_content">
              <div class="tab_content tab_content">
                <div class="nav_content" aria-selected="true" >รายละเอียดของโรค__รายละเอียด<i class="fa fa-angle-right" aria-hidden="true"></i></div>
                <div class="nav_content" aria-selected="false" >อาการของโรค__รายละเอียด<i class="fa fa-angle-right" aria-hidden="true"></i></div>
                <div class="nav_content" aria-selected="false" >สถานการณ์ในปัจจุบัน__รายละเอียด<i class="fa fa-angle-right" aria-hidden="true"></i></div>
                <div class="nav_content" aria-selected="false" >การป้องกันโรค__รายละเอียด</div>
              </div>
            </div>
          </div>
        </div> -->

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
      $( document ).ready(function() {
       
      });

      var data_id = '<?php echo $data_id;?>' ;
        $( document ).ready(function() {
            dept.LoadDiseaseHeader(data_id) ;
            $('.btn_diseasedetail').click(function(){
            // alert('btn0' );
            });                 
      });

    </script>  
  </body>
</html>