<?php 
include "duck.conf.php";
include "prepare_html.php"; 

$menucode = "MAIN" ;
$menucode1 = "MAIN_NEWSHR" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
$langcode=$_SESSION['LANGCODE'];

$clsdept = new DeptClass();
$clscont = new ContentsClass();

$newstype =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_hr'));

?>

  <?php include "prepare_css.php";?>
  <body>
    <?php include "prepare_header.php";?>
    <!-- ############################################################################################################### -->
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
                

            <nav aria-label="Page navigation " id="section_paging">
                <ul class="pagination justify-content-end">
                </ul>
                
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
        contents.LoadCountNewsAuct('ALL','news_hr' ,1 ,10);
        contents.LoadNewsMass('ALL','news_hr','1',10);
        contents.LoadDepartmentSL('ALL','department_sel');
      

        $("#department_sel").change(function() {
           // alert( $( this ).val() );
           contents.LoadNewsMass($( this ).val(),'news_hr',1,10);
           contents.LoadCountNewsAuct($( this ).val() ,'news_hr',1 ,10);
           
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