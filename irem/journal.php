<?php 
include "../duck.conf.php";
include $pathf."/prepare_html.php"; 

$menucode = "DEPT" ;
$menucode1 = "PUBLISH" ;
$navsub = "JOURNAL" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
include "conf.php";

 
$langcode=$_SESSION['LANGCODE'];

$clsdept = new DeptClass();
$clscont = new ContentsClass();

$data_dept = $clscont->LoadOnce('department',array('department_code_ch'=>$deptcode  ));
$newstype =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_mag'));
$data_newsmain = $clscont->Load('news_mapping',array( 'type' =>'news_mag', 'office'=>$deptcode,'enable_th'=>'Y' ),' datetime DESC ','');
   
?>

  
<?php include $pathf."/prepare_css.php";?>
<body>
  <?php include $pathf."/prepare_header.php";?>
  <?php include $pathf."/prepare_bannermain".$depttype.".php";?>
    


   <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
   <section style="background: #ffeaf1;" class="box_officecontent">
    <div class="container py-5" >
      <div class="row"> 
        <div class="col-lg-3 col_munusub pl-0 pr-0" style="">
          <?php include $pathf."/prepare_navsub2.php";?>
        </div>
        <div class="col-lg-9 ">

        
            <section id="content-news"  class="bg_custom2">
                  <?php 
                     
                  ?>
                  <div class="container">
                    <div class="row    "> 
                      <div class="col-12 col-md-4 pt-4 ">
                          <h2 class="titletext"> วารสารออนไลน์  </h2> 
                      </div>
                      <div class="search_row col-12  col-md-8">
                         
                      </div>
                    </div>
                  </div>

                
                  <?php 
                     //echo "<pre>".print_r($data_newsmain,true)."</pre>";
                  ?>
                  <div class="container">
                      <div class="row box_contentinfo mb-5">
                        <section id="journal" style="width:100%">
                                <div class="container mt-4 ">
                                    <div class="row">
                                        
                                        <div class="col-12 mt-2 mb-5 "><!-- /.img  อินโฟกราฟิก -->
                                                <div class="row">
                                                <!-- <div class="col-sm-12 col-md-3 col-lg-3 p-0 mt-3">  --> 
                                                <?php 
                                                    foreach( $data_newsmain as $key => $value ){
                                                        if($value['cover']){ 
                                                    ?>
                                                        <div  class="col-sm-12 col-lg-4 p-0 mt-3 ">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="box-pic-main2">        
                                                                        <a href="journal_detail.php?deptcode=<?php echo  $value['office'];?>&news=<?php echo  $value['id'];?>" >                    
                                                                            <img src="<?php echo $path['news']. $value['cover'] ;?>" alt="" class="image"> 
                                                                        </a>
                                                                        <div class="overlay">
                                                                            <div class="text">
                                                                                <div class="card-body">
                                                                                    <h3><?php  echo DateDisplay($value['datetime'],8) ;?></h3>
                                                                                    <a href="journal_detail.php?deptcode=<?php echo  $value['office'];?>&news=<?php echo  $value['id'];?>" >
                                                                                        <h5 class="card-title"> 
                                                                                        <?php  echo $value['title_'.$_SESSION['LANGCODE']];?>  
                                                                                        </h5>
                                                                                    </a>

                                                                                    <div class="bnt-Download">
                                                                                    <?php 
                                                                                    if($value['file']){ ?>
                                                                                        <a href="<?php echo $path['files'].$value['file'];?>" target="_blank"> 
                                                                                        <button type="button" class="btn btn-outline-danger"><span>ดาวน์โหลดเอกสาร
                                                                                                <i class="fa fa-download" aria-hidden="true"></i></span>
                                                                                            </button>                                    
                                                                                            </a> 
                                                                                    <?php } ?>
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
                    

                                                </div>
                                        </div><!-- /.img  วารสารออนไลน์ -->
                                    </div> <!-- /.row -->


                                </div><!-- /.container -->
                            </section>
                      </div>
                  </div>
 
              </section>  <!--/ section#content-diseasedetail -->
           
      
        </div> <!-- /.9 -->
      </div>
    </div>
    </section>


    <!-- ############################################################################################################### -->
    <?php include  $pathf."/prepare_footer.php";?>
    <?php include  $pathf."/prepare_script.php";?> 
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