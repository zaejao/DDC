<?php 
include "../duck.conf.php";
include $pathf."/prepare_html.php"; 

$menucode = "HOME" ;
$menucode1 = "ABOUT" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
include "conf.php";

  $langcode=$_SESSION['LANGCODE'];

  $clsdept = new DeptClass();
  $clscont = new ContentsClass();


 // $deptcode = "bamras";
 

  $data_dept = $clscont->LoadOnce('department',array('department_code_ch'=>$deptcode  ));

  $about = $clscont->LoadOnce('department_about',array('F_shortname'=>$deptcode  ));
?>
<?php include $pathf."/prepare_css.php";?>
<body>
  <?php include $pathf."/prepare_header.php";?>
  <!-- ############################################################################################################### -->
  <?php include $pathf."/prepare_bannermain1.php";?>
  <?php include $pathf."/prepare_navsub.php";?>

    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    
     
    <?php //  echo "<pre>".print_r( $about ,true)."</pre>";?>
    <section id="box_content">
      <div class="container">
        <div class="row">
          <div class="col-12 ">
       

            <div class="row">
              <div class="col-12  mt-4 mb-4"> 
                <span class="topic_text  lang_mission"> พันธกิจ</span> 
              </div> 
            </div>


          
            
            <div class="row">
              <div class="col-12 mt-4">  
                <?php echo htmlspecialchars_decode($about['F_puntakit']);?>
              </div>
            </div>
           
 
             
          </div>
        </div>
      </div>
    </section>  
     <!--/ section#box_content -->
  
    
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### -->
  


    <!-- ############################################################################################################### -->
    <?php include $pathf."/prepare_footer.php";?>
    <?php include $pathf."/prepare_script.php";?>
    <!-- Optional JavaScript -->
    
  </body>
</html> 