<?php 
include "duck.conf.php";
include "prepare_html.php"; 

$menucode = "MAIN" ;
$menucode1 = "MAIN_DESEASE" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";

$clsdept = new DeptClass();

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

      <!-- #content-disease -->
   <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <section id="content-disease">
    <div class="container"> <!-- Content here -->
      <div class="row">

      

      </div>
    </div>
  </section>  <!-- /#content-disease -->
  
  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <!-- / END #content-disease -->
  


    <!-- ############################################################################################################### -->
    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
      $( document ).ready(function() {
        // dept.LoadDiseaseByTitleName('อ','th');
        //dept.LoadDiseaseAllByStep(); 
 
         
      });
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
                  dept.LoadDiseaseAllByStep();
                }else{
                  dept.LoadDiseaseByTitleName(items[index],'');
                }
                if(tmp[0] === val) result = decodeURIComponent(tmp[1]);
            }
            return result;  
        }
      
       // console.log(_get('a'));  // ได้ค่าของตัวแปร  a
   

        if(_get('a') && _get('b')){ // ใช้ตรวจสอบ ถ้ามีการส่งค่าของตัวแปร a และ b
            console.log("OK");  
        }
       
            
    });
</script>
  </body>
</html>