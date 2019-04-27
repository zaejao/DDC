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


$char =$_GET['char'];
$langchar =$_GET['e'];

?>



  <?php include "prepare_css.php";?>
  <body>
    <?php include "prepare_header.php";?>
    <?php include "prepare_bannermain.php";?>
    <!-- ############################################################################################################### -->  
    


    <!-- #content-disease -->
   <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <section id="content-disease">
    <div class="container"> <!-- Content here -->
      <div class="row"> 
        <div class="col-12 mt-4">
        
        
          <div class="row">
            <div class="col-3 mt-2 mb-4"> 
              <span class="topic_text lang_diseasedetail"> รายละเอียดโรค</span> 
            </div>
          </div>


          <div class="row">
            <div class="col-12 mt-4">
              <div class="alphabet clearfix">
              <?php  
             
              foreach ($thaichar as $alphabet_th) {
                $where_th['enable'] ="Y";
                $where_th['deleted'] =0 ;
                $wherelike_th['disease_name_th'] = $alphabet_th ;
                $data_charth = $clsdept->LoadLikeTitle('disease',$where_th, $wherelike_th,'',''); 
                
                if($data_charth) { 
                ?>
                  <a class="font_disease" href="javascript:dept.LoadDiseaseByTitleName('<?php echo  $alphabet_th;?>','th');"> <?php echo  $alphabet_th;?> </a>
                <?php
                  }  
                }
              ?>  
              </div>
              <div class="alphabet clearfix">
                <?php 
                foreach(range('A','Z') as $alphabet_en) {  
              
                  //LoadLikeTitle($table, $where=array(), $wherelike=array(), $orderby='', $limit='') 
                  $where_en['enable'] ="Y";
                  $where_en['deleted'] =0 ;
                  $wherelike_en['disease_name_en'] = $alphabet_en ;
                  $data_charen = $clsdept->LoadLikeTitle('disease',$where_en, $wherelike_en,'',''); 
                  
                  if($data_charen) { 
                ?>
                    <a class="font_disease" href="javascript:dept.LoadDiseaseByTitleName('<?php echo  $alphabet_en;?>','en');"> <?php echo  $alphabet_en;?> </a>
                  <?php 
                  } 
                }
                ?> 
              </div>
            </div>
          </div>
          
            

            <div class="box_disease_list"> 
              
            </div>
                  
         
        </div>
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
 
         var char = '<?php echo $char;?>'; 
         var langchar = '<?php echo $langchar;?>';
         if(char){
          dept.LoadDiseaseByTitleName(char,langchar);
         }else{
          dept.LoadDiseaseAllByStep();
         }

      });
    </script>  
   
  </body>
</html>