<?php 
include "duck.conf.php";
include "prepare_html.php"; 

$menucode = "NEWS" ;
$menucode1 = "NEWSINFO" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
$langcode=$_SESSION['LANGCODE'];

$clsdept = new DeptClass();
$clscont = new ContentsClass();
 
$newstype =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_info'));
$newsdata =$clscont->Load('news_mapping',array('type'=>'news_info', 'home'=>1,'enable'=>'Y'),' datetime DESC ','');
 
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
              <h2 class="titletext"> อินโฟกราฟิก  </h2> 
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
        <div class="row box_contentinfo">

          <?php 
              if($newsdata){
                foreach( $newsdata as $key1 => $val1 ){
                  $datadept = $clscont->LoadOnce('department',array('department_code_ch'=>$val1['office'] )) ;
                  $title = ContentDisplayEditor( $val1['title_th']) ; 
                  if($val1['cover']){
                    $coverpic = $path['news'].$val1['cover'] ;
                }else{
                    $coverpic = $path['news'].'logo_df.jpg' ;
                }
                ?>
                
                <div class="col-lg-3 mt-5 mb-2">
                  <div class="card card_newsInfo">
                    <div class="thumbnail ">
                        <a class="photo-group border-custom" href="/<?php echo  $val1['office'];?>/news.php?news=<?php echo $val1['id']."&deptcode=". $val1['office'] ;?>"> 
                            <div class="photo" style="background-image: url('<?php echo  $coverpic;?>');">
                                <img src="<?php echo $path['img']?>photo-100x142--blank.png" alt="">
                                <div class="overlay">  </div>
                            </div>
                        </a> 
                        <div class="caption  py-2 px-2">
                            <p class="datetime"> <i class="fa fa-calendar"></i> <?php echo DateDisplay($val1['datetime'],8);?> </p>
                            <p class="card-title">  
                              <a href="/<?php echo  $val1['office'];?>/news.php?news=<?php echo $val1['id']."&deptcode=". $val1['office'] ;?>" class=""> <?php echo  mb_substr($title,0,50,'UTF-8' );?>  </a>
                            </p>
                            <p class="card-text txtdept font5"> 
                              <a href="/<?php echo  $val1['office'];?>/" class="font5"> <?php echo  $datadept['department_name_th'];?> </a>
                            </p>
                            
                        </div>
                    </div>
                    <div class="text-center m-auto box_newsfooter hide">
                      <a  href="<?php echo $path['files'].$val1['file'];?>" class="btn_round1" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> ดาวน์โหลดเอกสาร</a> 
                    </div>
                  </div>
                </div>

            <?php
                }
              }
              ?>

              <!--
                  <div class="col-lg-4 mt-5 mb-2">
                    <div class="card card_newsInfo">
                      <div class="boximg">
                        <img class="newsinfo_img" src="<?php echo $path['news'].$val1['cover'];?>" onerror="this.onerror=null;this.src='<?php echo $path['img'].'logo3.png';?>'" >
                       </div>
                        <div class="card-body">
                          <p class="datetime"> <i class="fa fa-calendar"></i> <?php echo DateDisplay($val1['datetime'],8);?> </p>
                          <p class="card-title">
                          <?php echo  mb_substr($val1['title_th'],0,50,'UTF-8' );?> 
                         </p>
                          <p class="card-text txtdept font5"> <?php echo  $datadept['department_name_th'];?> </p>
                        </div>
                        <div class="text-center m-auto">
                          <a  href="#" class="btn_round1 "><i class="fa fa-long-arrow-down" aria-hidden="true"></i> ดาวน์โหลดเอกสาร</a> 
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