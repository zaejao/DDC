<?php 
include "duck.conf.php";
include "prepare_html.php"; 

$menucode = "MAIN" ;
$menucode1 = "MAIN_AUCTION" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
$langcode=$_SESSION['LANGCODE'];

$clsdept = new DeptClass();
$clscont = new ContentsClass();

$newstype =$clscont->LoadOnce('auctions_type',array('auctions_type_code'=>'auction_draft'));

?>

  <?php include "prepare_css.php";?>
  <body>
    <?php include "prepare_header.php";?>
    <?php include "prepare_bannermain.php";?>

    <!-- #####  START CONTENT ##### -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <section id="content-news">
      <div class="container">
        <div class="row"> 
            <div class="container">
             <div class="row  mb-4 row_content"> 
                <div class="col-12 col-md-4">
                    <h2 class="titletext">  <?php echo $newstype['auctions_type_'.$_SESSION['LANGCODE']];?> </h2> 
                </div>
                <div class="search_row col-12  col-md-4">
                    <div class="clearfix"> 
                        <div class="float-right">  
                            <select class="search_block" id="auctions_category_sel">  </select>
                        </div>
                        <div class="float-right"> 
                            <p class="search_text ">ประเภท</p>
                        </div>
                    </div>
                </div>
                <div class="search_row col-12  col-md-4">
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
<!--             
            <div class="row">
                    <div class="topic_block col-lg-4">
                      <p class="topic_text">ประกาศร่าง TOR</p>
                    </div>
                <div class="search_row col-lg-4">
                    <p class="search_text">ประเภท</p>
                    <select class="search_block">
                        <option class="search_text">ทั้งหมด</option>
                        <option class="search_text">ซื้อ</option>
                        <option class="search_text">จ้างก่อสร้าง</option>
                        <option class="search_text">จ้างเหมาบริการ</option>
                        <option class="search_text">เช่า</option>
                    </select>
                </div>
                <div class="search_row col-lg-4">
                    <p class="search_text">หน่วยงาน</p>
                    <select class="search_block">
                        <option>ทุกสำนัก</option>
                        <option>กลุ่มตรวจสอบภายใน</option>
                        <option>กลุ่มพัฒนาระบบบริหาร</option>
                        <option>กองแผนงาน</option>
                        <option>สำนักสื่อสารความเสี่ยงและพัฒนาพฤติกรรมสุขภาพ</option>
                    </select>
                </div>
            
            </div>
        </div> -->


        <div  id="auctions_list" >

                    <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="card">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-11 col-sm-11">
                                    <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                                    เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                                    </div>
                                    <div class="col-lg-1 col-sm-1">
                                        <div class="box_ic">
                                        <i class="fa fa-download icon-2x" aria-hidden="true"></i>
                                        </div>
                                    </div>                  
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
                                <hr class="lines">
                            </div>   
                        </div>
                    </div>
        </div> 

   
<!--
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-lg-11 col-sm-11">
                            <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                            เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                        </div>
                        <div class="col-lg-1 col-sm-1">
                         <i class="fa fa-download icon-2x" aria-hidden="true"></i>
                        </div>                  
                    </div>
                        <div class="footer-detail">
                            <div class="time">
                                <i class="fa fa-calendar" aria-hidden="true">
                                <span class="ml-0">5 มีนาคม 2562 </span>
                                </i>
                            </div>
                            <div class="name-depart">
                                <span class="mr-2">สำนักสื่อสารความเสี่ยงและพัฒนาพฤติกรรมสุขภาพ</span>                           
                            </div>
                        </div>  
                    </div>
                    <hr class="lines">
                </div>   
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-lg-11 col-sm-11">
                        <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                        เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                        </div>
                        <div class="col-lg-1 col-sm-1">
                        <i class="fa fa-download icon-2x" aria-hidden="true"></i>
                        </div>                  
                    </div>
                        <div class="footer-detail">
                            <div class="time">
                                <i class="fa fa-calendar" aria-hidden="true">
                                <span class="ml-0">5 มีนาคม 2562 </span>
                                </i>
                            </div>
                            <div class="name-depart">
                                <span class="mr-2">สำนักสื่อสารความเสี่ยงและพัฒนาพฤติกรรมสุขภาพ</span>                           
                            </div>
                        </div>  
                    </div>
                    <hr class="lines">
                </div>   
            </div>
        </div>
-->


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
        contents.LoadCountNewsAuct('ALL','auction_drf' ,1 ,10);
        contents.LoadNewsMass('ALL','auction_drf','1',10);
        contents.LoadDepartmentSL('ALL','department_sel');
        contents.LoadAuctionsCategorySL('ALL','auctions_category_sel');
      

        $("#department_sel").change(function() {
           // alert( $( this ).val() );
           contents.LoadNewsMass($( this ).val(),'auction_drf',1,10);
           contents.LoadCountNewsAuct($( this ).val() ,'auction_drf',1 ,10);
           
        });

        $("#auctions_category_sel").change(function() { 
           contents.LoadNewsMass($( this ).val(),'auction_drf',1,10);
           contents.LoadCountNewsAuct($( this ).val() ,'auction_drf',1 ,10);
           
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