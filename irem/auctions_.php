<?php 
include "../duck.conf.php";
include $pathf."/prepare_html.php"; 
$menucode = "DEPT" ;
$menucode1 = "AUCTIONS" ;
$navsub = "auctions" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/office.class.php"; 
include $pathf."/gates/func.php";
include "conf.php";

$langcode=$_SESSION['LANGCODE'];


$clsdept = new DeptClass();
$clscont = new ContentsClass();
 
$clsoffice = new OfficeClass(); 


$typedet = $clsoffice->Load('x_auction_type',array('deleted'=>0 ),' orderby DESC','' ); 
if($typedet){ 
  foreach( $typedet as $keyt => $valt ){ 
    $typef = ( array_key_exists($valt['auction_type'] ,$_GET)) ; 
    if($typef == 1 ){
      $typecode  = $valt['auction_type_code'] ;  
      $menuname =  $valt['auction_type_th'];
      break;
    }else{
      $typecode  =	'auction_plan'; 
    } 	 
  }
}
//$typedet =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_mass'));
$typedet = $clsoffice->Load('auctions_type',array('deleted'=>0 ),' orderby DESC','' );   
$data_typedet = $clsoffice->LoadOnce('auctions_type',array('auctions_type_code'=>	$dataset['auctions_type_code']));
$data_catedet = $clsoffice->LoadOnce('auctions_category',array('auctions_category_code'=>	$dataset['auctions_category_code']));
$data_groupdet = $clsoffice->LoadOnce('auctions_group',array('auctions_group_code'=>	$dataset['auctions_group_code']));
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
                            <h2 class="titletext">  <?php echo $data_typedet['auctions_category_th'];?> </h2> 
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
        contents.LoadCountNewsAuctOffice('<?php echo $deptcode;?>','<?php echo  $typecode; ?>' ,1 ,10);
        contents.LoadNewsMassOffice('<?php echo $deptcode;?>','<?php echo  $typecode; ?>','1',10);
     
 

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