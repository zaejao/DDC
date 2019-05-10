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

$newstype =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_info'));
$data_newsmain = $clscont->Load('news_mapping',array( 'type' =>'news_info','enable_th'=>'Y' ),' datetime DESC ','');

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
                    <h2 class="titletext"> อินโฟกราฟิก </h2> 
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
    
        <?php   //  echo "<pre>".print_r($data_newsmain,true) ."</pre>";?>
           
            <section id="Infor">
              <div class="container">
                  <div class="row">
                      <div class="textInfor clo-12">
                        
                      </div> 
                      <div class="col-12 mt-2 mb-5"> 
                            <div class="row">
                                  
                            <?php 
                                if($data_newsmain){ 
                                    foreach( $data_newsmain as $key => $value ){
                                        if($value['cover']){ 
                                        ?>
                                            <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3 info_content">
                                                <a href="infographic_detail.php?news=<?php echo $value['id'];?>&dept=<?php echo $value['office'];?>"> 
                                                    <img src="<?php echo $path['news']. $value['cover'] ;?>" alt=""> 
                                                
                                                
                                                    <div class="txt1_cont">
                                                        <?php  echo $value['title_'.$_SESSION['LANGCODE']];?>
                                                    </div>
                                                    <div class="txt1_cont txt2">
                                                    <?php  echo DateDisplay($value['datetime'],8) ;?>
                                                    </div>
                                                    </a>
                                                </div>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                                <!-- 
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                    <a href="infog1_detail.php"> <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 p-0 mt-3">
                                    <a href="infog1_detail.php"> <img src="img/pexels-photo-207381.png" alt=""> </a>
                                </div>  -->
                             </div>
                      </div><!-- /.img  อินโฟกราฟิก -->
                  </div> <!-- /.row -->

                  <nav aria-label="Page navigation " id="section_paging">
                <ul class="pagination justify-content-end">
                </ul> 
            </nav>

              </div><!-- /.container -->
          </section>
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