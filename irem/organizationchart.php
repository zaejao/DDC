<?php 
include "../duck.conf.php";
include $pathf."/prepare_html.php"; 
$menucode = "DEPT" ;
$menucode1 = "ABOUT" ;
$navsub = "about" ;
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
  <?php include $pathf."/prepare_bannermain".$depttype.".php";?>
  <?php //include $pathf."/prepare_navsub.php";?>
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    
     
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <section style="background: #ffeaf1;" class="box_officecontent">
    <div class="container py-5" >
      <div class="row"> 
        <div class="col-lg-3 col_munusub pl-0 pr-0" style="">
          <?php include $pathf."/prepare_navsub2.php";?>
        </div>
        <div class="col-lg-9 ">
        
            <section id="box_content" class="bg_custom2">
                <div class="container">
                  <div class="row">
                    <div class="col-12 ">
                          
                          <div class="row">
                            <div class="col-12  mt-4 mb-4"> 
                              <span class="topic_text  lang_organizationchart"> โครงสร้างองค์กร </span> 
                            </div> 
                          </div>


                        
                          
                          <div class="row conorg">
                            <div class="col-12 mt-4">  
                              <?php echo htmlspecialchars_decode($about['F_orgchart']);?>
                            </div>
                          </div>
                        
                      
                    </div>
                  </div>
                </div>
              </section> 

        </div> <!-- /.9 -->
      </div>
    </div>
    </section>

  

    
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### -->
  

    <style>
    .conorg img{  
      max-width: 100%;
      height: auto !important;
    }
    </style>
    <!-- ############################################################################################################### -->
    <?php include $pathf."/prepare_footer.php";?>
    <?php include $pathf."/prepare_script.php";?>
    <!-- Optional JavaScript -->
    
  </body>
</html> 