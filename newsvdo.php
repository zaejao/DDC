<?php 
include "duck.conf.php";
include "prepare_html.php"; 

$menucode = "MAIN" ;
$menucode1 = "MAIN_NEWSMASS" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
$langcode=$_SESSION['LANGCODE'];

$clsdept = new DeptClass();
$clscont = new ContentsClass();
 
$newstype =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_vdo'));
?>
  <?php include "prepare_css.php";?>
  <body>
  <?php include "prepare_header.php";?>
    <?php include "prepare_bannermain.php";?>
    
    <!-- #####  START CONTENT ##### -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <section id="content-news">
   
        <div class="container">
            <div class="row  mb-4 row_content"> 
                <div class="col-12 col-md-4">
                    <h2 class="titletext">  <?php echo $newstype['news_type_'.$_SESSION['LANGCODE']];?> </h2> 
                </div>
                <div class="search_row col-12  col-md-8">
                    <div class="clearfix">
                        
                        <div class="float-right">  
                            <select class="search_block" id="department_sel">  </select>
                        </div>
                        <div class="float-right"> 
                            <p class="search_text lang_choosedept">เลือกหน่วยงาน</p>
                        </div>
                    </div>
                </div>
            </div>
    
         

        <div class="container">
          <div class="row">
            <!-- <div class="c-video col-lg-4">
                <video id="video1" >
                  <source src="img/video_test.mp4" type="video/mp4" >
                </video>
                <button onclick="playPause()">Play/Pause</button>
            </div> -->

            <div class="c-video col-lg-4">
                <video src="img/video_test.mp4" controls></video>
            </div>

            <div class="c-video col-lg-4">
                <video src="img/video_test.mp4" controls></video>
            </div>

            <div class="c-video col-lg-4">
                <video src="img/video_test.mp4" controls></video>
            </div>
            


               
          </div>
        </div>

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

      var myVideo = document.getElementById("video1");

      function playPause() { 
        if (myVideo.paused) 
          myVideo.play(); 
        else 
          myVideo.pause(); 
      } 

      $( document ).ready(function() {
         
        contents.LoadDepartmentSL('ALL','department_sel');
      
      });

    </script>  
  </body>
</html>




  