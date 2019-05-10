<?php 
include "../duck.conf.php";
include $pathf."/prepare_html.php"; 
$menucode = "DEPT" ;
$menucode1 = "NEWS" ;
$navsub = "NEWSMASS" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
include "conf.php";

$langcode=$_SESSION['LANGCODE'];


$clsdept = new DeptClass();
$clscont = new ContentsClass();
 

$newstype =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_mass'));

?>

<?php include $pathf."/prepare_css.php";?>
<body>
  <?php include $pathf."/prepare_header.php";?>
  <?php include $pathf."/prepare_bannermain".$depttype.".php";?>

    
    <!-- #####  START CONTENT ##### -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <section style="background: #ffeaf1;" class="box_officecontent">
    <div class="container py-5" >
      <div class="row"> 
        <div class="col-lg-3 col_munusub pl-0 pr-0" style="">
          <?php include $pathf."/prepare_navsub2.php";?>
        </div>
        <div class="col-lg-9 ">
        
            <section id="content-news "  class="bg_custom2"> 
                <div class="container">
                    <div class="row  mb-4"> 
                        <div class="col-12 col-md-4  mt-4">
                            <h2 class="titletext">  <?php echo $newstype['news_type_'.$_SESSION['LANGCODE']];?> </h2> 
                        </div>
                        <div class="search_row col-12  col-md-8">
                    
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
           
      
        </div> <!-- /.9 -->
      </div>
    </div>
    </section>


    
    
    
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### -->
  


    <!-- ############################################################################################################### -->
    <?php include  $pathf."/prepare_footer.php";?>
    <?php include  $pathf."/prepare_script.php";?> 
    <!-- Optional JavaScript -->
    <script>
    $( document ).ready(function() {
        //dept.LoadNewsmass();
        contents.LoadCountNewsAuctOffice('<?php echo $deptcode;?>','news_mass' ,1 ,10);
        contents.LoadNewsMassOffice('<?php echo $deptcode;?>','news_mass','1',10);
     
 

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