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


$a1 = ( array_key_exists("auctions_plan", $_GET)) ;
$a2 = ( array_key_exists("auctions_announ", $_GET)) ;
$a3 = ( array_key_exists("auctions_draft", $_GET)) ;
$a4 = ( array_key_exists("auctions_public", $_GET)) ;
$a5 = ( array_key_exists("auctions_center", $_GET)) ; 



if( $a1!=1 || $a2!=1|| $a3!=1 || $a4!=1 || $a5!=1 ){
    if( $a1==1 ){
        $atype = "auctions_plan" ;
    }else if($a2==1){
        $atype = "auctions_announ" ;
    }else if($a3==1){
        $atype = "auctions_draft" ;
    }else if($a4==1){
        $atype = "auctions_public" ;
    }else if($a5==1){
        $atype = "auctions_center" ;
    }else{
        $atype = "auctions_plan" ;
    }
}else{
    $atype = "auctions_plan" ;
}

$auctionstype =$clscont->LoadOnce('auctions_type',array('auctions_type_code'=>$atype));

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
                    <h2 class="titletext" style="line-height: 1.5;">  <?php echo  $auctionstype['auctions_type_'.$_SESSION['LANGCODE']];?> </h2> 
                </div>
                <div class="search_row col-12  col-md-4">
                    <div class="clearfix"> 
                        <div class="float-right">  
                            <select class="search_block" id="auctions_category_sel">  </select>
                        </div>
                        <div class="float-right"> 
                            <p class="search_text ">วิธีซื้อ/จ้าง </p>
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
            </div>


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
       
 
        contents.LoadDepartmentSL('ALL','department_sel');
        contents.LoadAuctionsCategorySL('ALL','auctions_category_sel','<?php echo $atype;?>');


        contents.LoadAuctionsList('ALL','ALL','<?php echo $atype;?>',1 , 10 );
        contents.LoadCountAuctions('ALL','ALL','<?php echo $atype;?>',1 , 10 );

        $("#department_sel").change(function() { 
            contents.LoadAuctionsList($( this ).val(),$("#auctions_category_sel").val(),'<?php echo $atype;?>',1 , 10 );
            contents.LoadCountAuctions($( this ).val(),$("#auctions_category_sel").val(),'<?php echo $atype;?>',1 , 10 ); 
        });

        $("#auctions_category_sel").change(function() { 
            contents.LoadAuctionsList($("#department_sel").val(),$( this ).val(),'<?php echo $atype;?>',1 , 10 );
            contents.LoadCountAuctions( $("#department_sel").val(),$( this ).val(),'<?php echo $atype;?>',1 , 10 ); 
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