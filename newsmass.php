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

$newstype =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_mass'));

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
    
        
            <div  id="newsmass" >

            </div> 
                <!--
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <h5 class="card-title">
                                            <a href="#" class="linknonepink"> 
                                                สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                                        เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน    สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                                        เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน 
                                    </a> 
                                        </h5>
                                    </div>                 
                                    <div class="footer-detail">
                                        <div class="row">
                                            <div class=" col-md-2   col-6 time ">
                                            <i class="fa fa-calendar" aria-hidden="true"> </i> 
                                            <span class="ml-0"> 15 March 2019</span>
                                            </div>
                                            <div class=" col-md-2   col-6 view">
                                            <i class="fa fa-eye" aria-hidden="true"> </i> 
                                            <span class="ml-0">20 view</span>
                                            </div>
                                            <div class="col-md-8   col-12 text-right name-depart">
                                            <span class="mr-2"> สำนักสื่อสารความเสี่ยงและพัฒนาพฤติกรรมสุขภาพ </span>  
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                    <hr class="lines linehomenews">
                            </div>  
                        </div>
                    </div>
                </div> -->
            

            
            <!-- <div class="row">
                <div class="pagination-block">
                    <div class="pagination col-lg-6">
                        <a href="#"><i class="fa fa-caret-left" id="fa-pagination" aria-hidden="true"></i></a>
                        <a href="javascript:contents.LoadNewsMass('ALL','1',10)">1</a>
                        <a class="active" href="javascript:contents.LoadNewsMass('ALL','2',10)">2</a>
                        <a href="javascript:contents.LoadNewsMass('ALL','3',10)">3</a>
                        <a href="#">4</a>
                        <a href="#"><i class="fa fa-caret-right" id="fa-pagination" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div> -->

            <nav aria-label="Page navigation " id="section_paging">
                <ul class="pagination justify-content-end">
                </ul>
                <!-- <ul class="pagination justify-content-end">
                    <li class="page-item ">
                        <a class="page-link ic active" href="#" tabindex="-1"> <i class="fa fa-caret-left"  aria-hidden="true"></i> </a>
                    </li>
                    <li class="page-item "><a class="page-link pagenum active" href="javascript:contents.LoadNewsMass('ALL','1',10)">1</a></li>
                    <li class="page-item "><a class="page-link pagenum" href="javascript:contents.LoadNewsMass('ALL','2',10)">2</a></li>
                    <li class="page-item"><a class="page-link pagenum" href="javascript:contents.LoadNewsMass('ALL','3',10)">3</a></li>
                    <li class="page-item">
                        <a class="page-link ic active" href="#"> <i class="fa fa-caret-right" aria-hidden="true"></i> </a>
                    </li>
                </ul> -->
            </nav>


    

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
        contents.LoadCountNewsAuct('ALL','news_mass' ,1 ,10);
        contents.LoadNewsMass('ALL','news_mass','1',10);
        contents.LoadDepartmentSL('ALL','department_sel');
      

        $("#department_sel").change(function() {
           // alert( $( this ).val() );
           contents.LoadNewsMass($( this ).val(),'news_mass',1,10);
           contents.LoadCountNewsAuct($( this ).val() ,'news_mass',1 ,10);
           
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