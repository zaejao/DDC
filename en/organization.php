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
 
 
 $dept1 = $clscont->Load('department',array('department_type'=>'1','enable'=>'Y','deleted'=>0),'orderby_struc DESC');
$dept2 = $clscont->Load('department',array('department_type'=>'2','enable'=>'Y','deleted'=>0),'orderby_struc DESC');
 
$col1 = CEIL(count($dept1)/2); $clscont = new ContentsClass();
 
?>
 

  <?php include $pathf."/prepare_css.php";?>

<body>
  <?php //echo $depttype;?>
  <?php include $pathf."/prepare_header_en.php";?>
  <!-- ############################################################################################################### -->
  <?php include $pathf."/prepare_bannermain_en.php";?>
 

  <section id="content-diseasedetail">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="row">
                        <div class="col-12 mt-2 mb-4"> 
                            <span class="topic_text lang_organization"> Organization </span> 
                        </div>
                    </div> 
                </div>

                <div>
                    <?php // echo "<pre>".print_r($dept1,true)."</pre>";?>
                </div>
 
                    <div class="department_mainbox mb-2">
                        <div class="row">
                            <div class="department_subbox">
                            <div class="text_department"><h2 class=""> Department of Disease control </h2></div>
                            </div>
                        </div>
                    </div>

                    <div class="department_box  mt-5">
                        <div class="row">
                            <div class="col-8">
                                <div class="department_subbox m-auto" >
                                    <a class="text_department fontb1" > <span class="   ">Central</span> </a>
                                </div>
                            </div>
                           
                            <div class="col-4">
                                <div class="department_subbox m-auto" >
                                    <a class="text_department fontb1" > <span class=" "> Provincial </span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="department_box">
                        <div class="row">
                            <div class="department_mainbox"> 
                                <?php 
                                
                                for( $i=0 ; $i <$col1 ; $i++){
                                ?>
                                    <div class="department_subbox" >
                                        <a class="text_department" href="/<?php echo $dept1[$i]['folderpath_name']; ?>/"><?php echo $dept1[$i]['department_name_en']; ?> </a>
                                    </div>
                                <?php
                                }
                                ?>
                                
                                
                            </div>

                            <div class="department_mainbox"> 
                             <?php 
                                
                                for( $i=$col1 ; $i < count($dept1) ; $i++){
                                ?>
                                    <div class="department_subbox" >
                                        <a class="text_department" href="/<?php echo $dept1[$i]['folderpath_name']; ?>/"><?php echo $dept1[$i]['department_name_en']; ?> </a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="department_mainbox"> 
                                <?php 
                                
                                for( $i=0 ; $i < count($dept2) ; $i++){
                                ?>
                                    <div class="department_subbox" >
                                        <a class="text_department" href="/<?php echo $dept2[$i]['folderpath_name']; ?>/"><?php echo $dept2[$i]['department_name_en']; ?> </a>
                                    </div>
                                <?php
                                }
                                ?>
                               
                            </div>
                        </div>
                        
                    </div>



            </div>
        </div>
    </section>  <!--/ section#content-diseasedetail -->
    


   <!-- ############################################################################################################### -->

    <?php include $pathf."/prepare_footer_en.php";?>
    <?php include $pathf."/prepare_script_en.php";?>
 <script>

      $( document ).ready(function() {
        
       
      });
    </script>  

    
  </body>
</html>



         
       