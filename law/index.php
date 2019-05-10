<?php 
include "../duck.conf.php";
include $pathf."/prepare_html.php"; 

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


 // $deptcode = "bamras";
 

  $data_dept = $clscont->LoadOnce('department',array('department_code_ch'=>$deptcode  ));

  //$data_slidemain = $clscont->Load('news_old',array('NW_menu' => 'mbanner','NW_active'=>'1','NW_home'=>'1' ),' NW_date DESC ','');
  
  
  $data_slidemain = $clscont->Load('news',array( 'news_office'=> $deptcode ,'news_menu'=>'mbanner' ,'news_active'=>'Y'),' news_datetime DESC ','');
 
  $data_newsmain = $clscont->Load('news',array( 'news_office'=> $deptcode ,'news_menu'=>'news' ,'news_active'=>'Y'),' news_datetime DESC ','');
  $data_newsmain1 = array();

  foreach( $data_newsmain  as $key => $value ){
    if($value['news_cover']){
      $data_newsmain1[] =  $data_newsmain[$key];
    }
  }
?>



  <?php include $pathf."/prepare_css.php";?>
<body>
  <?php include $pathf."/prepare_header.php";?>
  <!-- ############################################################################################################### -->
  <?php include $pathf."/prepare_bannermain".$depttype.".php";?>
  <?php include $pathf."/prepare_navsub.php";?>

  <?php  // echo "<pre>".print_r( $data_newsmain1 ,true)."</pre>";?>


  <?php include $pathf."/home".$depttype."d.php";?>


   <!-- ############################################################################################################### -->

    <?php include $pathf."/prepare_footer.php";?>
    <?php include $pathf."/prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
      $( document ).ready(function() {
       // contents.LoadSlideImageHome();
        
      });
    </script>  
    <script>
            function openCity(evt, cityName) {
              // Declare all variables
              var i, tabcontent, tablinks;
            
              // Get all elements with class="tabcontent" and hide them
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
            
              // Get all elements with class="tablinks" and remove the class "active"
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
            
              // Show the current tab, and add an "active" class to the button that opened the tab
              document.getElementById(cityName).style.display = "block";
              evt.currentTarget.className += " active";
            }      
          </script>
  </body>
</html>



         
       