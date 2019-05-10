<?php 
include "../duck.conf.php";
include $pathf."/prepare_html.php"; 
 
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
include "conf.php";

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
$menucode = "DEPT" ;
$menucode1 = "AUCTIONS" ;
$navsub =$dataset['auctions_type_code']  ;
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
                        <div class="col-12 col-md-7  mt-4">
                            <h2 class="titletext">    <?php echo  $auctionstype['auctions_type_'.$_SESSION['LANGCODE']];?>  </h2> 
                        </div>
                        <div class=" col-12  col-md-5 mt-2">
                          
                                <div class="float-right">  
                                    <select class="search_block" id="auctions_category_sel">  </select>
                                </div>
                               
                         
                        </div>
                    </div>
            
                
                    <div  id="auctions_list" >

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
      
       
        
        
        contents.LoadAuctionsCategorySL('<?php echo $deptcode ;?>','auctions_category_sel','<?php echo $atype;?>');


        contents.LoadAuctionsList('<?php echo $deptcode ;?>','ALL','<?php echo $atype;?>',1 , 10 );
        contents.LoadCountAuctions('<?php echo $deptcode ;?>','ALL','<?php echo $atype;?>',1 , 10 );

      

        $("#auctions_category_sel").change(function() { 
            contents.LoadAuctionsList( '<?php echo $deptcode ;?>',$( this ).val(),'<?php echo $atype;?>',1 , 10 );
            contents.LoadCountAuctions( '<?php echo $deptcode ;?>',$( this ).val(),'<?php echo $atype;?>',1 , 10 ); 
        });



         
    });
    </script>  
  </body>
</html>