<?php 
include "duck.conf.php";
include "prepare_html.php"; 
$menucode = "HOME" ;
$menucode1 = "HOMEALL" ;
$navsub = "publish" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";

 
$langcode=$_SESSION['LANGCODE'];

$clsdept = new DeptClass();
$clscont = new ContentsClass();

$newstype =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_mag'));
$data_newsmain = $clscont->Load('news_mapping',array( 'type' =>'news_mag','enable_th'=>'Y' ),' datetime DESC ',' 0,13');

?>

  <?php include "prepare_css.php";?>
  <body>
    <?php include "prepare_header.php";?>
    <?php //include "prepare_bannermain.php";?>
  <!-- ############################################################################################################### -->
    
      <section>
        <div class="row justify-content-center   row_banner">
            <div class="col-12 p-0">
                <div class="box_deptname"> <?php echo $data_dept['department_name_'.$langcode];?> </div>
                <img src="img/banner/Banner_U1.jpg" class="img-fluid" alt="Responsive image">
                
            </div>
        </div>
      </section>
      
         

      <?php  include 'prepare_navsub.php';?> 
      <section id="content-news">
   
        <div class="container">
            <div class="row  mb-4 row_content"> 
                <div class="col-12 col-md-4">
                    <h2 class="titletext"> วารสารออนไลน์ </h2> 
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
            </div></div>
      </section>

      <?php   //echo "<pre>".print_r($data_newsmain,true) ."</pre>";?>


          <!-- /////////////// กล่อง รูป 3รูป หลาย แถว /////////////// -->
          <section id="journal">
              <div class="container mt-4 ">
                  <div class="row">
                     
                      <div class="col-12 mt-2 mb-5 "><!-- /.img  อินโฟกราฟิก -->
                            <div class="row">
                               <!-- <div class="col-sm-12 col-md-3 col-lg-3 p-0 mt-3">  -->

                                
                               <?php 
                                  foreach( $data_newsmain as $key => $value ){
                                      if($value['cover']){ 
                                  ?>
                                  <div id="news-pics2" class="col-sm-12 col-md-4 col-lg-3 p-0 mt-3 ">
                                      <div class="row">
                                        <div class="col-12">
                                              <div class="box-pic-main2">                     
                                              <img src="<?php echo $path['news']. $value['cover'] ;?>" alt="" class="image"> 
                                                <div class="overlay">
                                                    <div class="text">
                                                        <div class="card-body">
                                                            <h3><?php  echo DateDisplay($value['datetime'],8) ;?></h3>
                                                            <h5 class="card-title"> 
                                                            <?php  echo $value['title_'.$_SESSION['LANGCODE']];?>  
                                                            </h5>
                                                            <div class="bnt-Download">
                                                            <a href="journal_detail.php?news=<?php echo $value['id'];?>&dept=<?php echo $value['office'];?>">   
                                                                    <button type="button" class="btn btn-outline-danger"><span>ดาวน์โหลดเอกสาร
                                                                            <i class="fa fa-long-arrow-down" aria-hidden="true"></i></span>
                                                                    </button>                                    
                                                                </a> 
                                                            </div> 
                                                        </div> <!-- /.card-body -->  
                                                    </div>
                                                </div>
                                              </div> <!-- /.box-pic-main -->
                                        </div><!-- ./col-12 -->
                                      </div><!-- /.row -->
                                    </div><!-- ./col-6 -->
                                <?php }
                              } ?>

                              <!--
                                    <div id="news-pics2" class="col-sm-12 col-md-4 col-lg-3 p-0 mt-3">
                                        <div class="row">
                                          <div class="col-12">
                                                <div class="box-pic-main2">                     
                                                    <img src="img/D-RTI62.jpg" alt="Avatar" class="image">
                                                  <div class="overlay">
                                                      <div class="text">
                                                          <div class="card-body">
                                                              <h3>26 พฤศจิกายน 2561</h3>
                                                              <h5 class="card-title"> แนวทางการควบคุมวัณโรคประเทศไทย พ.ศ.  2561 (National Tuberculosis Control  
                                                                      Program Guideline,Thailand 2018)  </h5>
                                                              <div class="bnt-Download">
                                                                  <a href="journal_detail.php">
                                                                      <button type="button" class="btn btn-outline-danger"><span>ดาวน์โหลดเอกสาร
                                                                              <i class="fa fa-long-arrow-down" aria-hidden="true"></i></span>
                                                                      </button>                                    
                                                                  </a> 
                                                              </div> 
                                                          </div>  
                                                      </div>
                                                  </div>
                                                </div> 
                                          </div>
                                        </div>
                                      </div> -->
  

                             </div>
                      </div><!-- /.img  วารสารออนไลน์ -->
                  </div> <!-- /.row -->


              </div><!-- /.container -->
          </section>

         <!-- ############################################################################################################### -->
    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
    $( document ).ready(function() {
        
         
        contents.LoadDepartmentSL('ALL','department_sel');
        
        contents.LoadCountNewsAuct($( this ).val() ,'news_mag',1 ,10);
      

        $("#department_sel").change(function() {
        
           contents.LoadCountNewsAuct($( this ).val() ,'news_mag',1 ,10);
           
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