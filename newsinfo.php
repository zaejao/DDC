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
 
$newstype =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_pic'));
$newsdata =$clscont->Load('news_mapping',array('type'=>'news_info','enable'=>'Y'));
 
?>

  <?php include "prepare_css.php";?>
  <body>
    <?php include "prepare_header.php";?>
    <?php include "prepare_bannermain.php";?>

    <!-- #####  START CONTENT ##### -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <section id="content-news">
      <?php 
        //echo "<pre>".print_r($newsdata,true)."</pre>";
      ?>
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
      </div>

        <div class="container">
          <div class="row">

          <?php 
              if($newsdata){
                foreach( $newsdata as $key1 => $val1 ){
                ?>
                  <div class="col-lg-3 mt-5 mb-2">
                    <div class="card card_newsInfo"   >
                      <img class="newsInfo_img" src="<?php echo $path['news'].$val1['cover'];?>" height="200" onerror="this.onerror=null;this.src='<?php echo $path['img'].'logo3.png';?>'" >
                        <div class="card-body">
                          <p> <?php echo DateDisplay($val1['datetime'],8);?> </p>
                          <p class="card-title" style="">
                          <?php echo  mb_substr($val1['title_th'],0,100,'UTF-8' );?> </p>
                          <p class="card-text font5"> <?php echo  $val1['office'];?> </p>
                        </div>
                        <div class="text-center m-auto">
                          <a  href="#" class="btn_round1 ">ดาวน์โหลดเอกสาร</a>
                          <!-- <a class="newsInfo_download" href="#">ดาวน์โหลดเอกสาร <i class="fa fa-long-arrow-down" aria-hidden="true"></i></a> -->
                        </div>
                    </div>
                  </div>
            <?php
                }
              }
              ?>
<!--               
            <div class="col-lg-3">
              <div class="card" id="card_newsInfo" href="1">
                <img class="newsInfo_img" src="img/Chiba1.jpg" height="200" >
                  <div class="card-body">
                    <p>04/04/2019</p>
                    <p class="card-title">หัวข้อ</p>
                    <p class="card-text">รายละเอียด</p>
                  </div>
                  <div class="">
                    <a class="newsInfo_download" href="#">ดาวน์โหลดเอกสาร <i class="fa fa-long-arrow-down" aria-hidden="true"></i></a>
                  </div>
              </div>
            </div>
              -->
        
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
    $( document ).ready(function() {
        //dept.LoadNewsmass();
        contents.LoadCountNewsAuct('ALL','news_info' ,1 ,10);
        contents.LoadNewsMass('ALL','news_info','1',10);
        contents.LoadDepartmentSL('ALL','department_sel');
      

        $("#department_sel").change(function() {
           // alert( $( this ).val() );
           contents.LoadNewsMass($( this ).val(),'news_info',1,10);
           contents.LoadCountNewsAuct($( this ).val() ,'news_info',1 ,10);
           
        });

        $(".page-link.pagenum").click(function(){
            $(".page-link.pagenum").removeClass('active');
            $( this ).addClass('active');
           
            $('body,html').animate({
                scrollTop : 300  
            }, 500);
        });
    });
    </script>  
  </body>
</html>