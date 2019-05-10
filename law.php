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

//$newstype =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_mass'));


$law = $_GET['law'] ;

if($law != '1' && $law != '2' &&$law != '3'){

    $law = '1' ;
}
//$lawdata = $clscont->LoadOnce('sub_category',array('SCAT_id'=>$law)); //8 9 10

$lawdata = $clscont->LoadOnce('law_category',array('id'=>$law)); //8 9 10
?>

<?php include "prepare_css.php";?>
  <body>
    <?php include "prepare_header.php";?>
    <?php include "prepare_bannermain.php";?>

    <!-- #####  START CONTENT ##### -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <section id="box_content">
      <div class="container">
        <div class="row">
          <div class="col-12 ">
          <?php  //echo "<pre>".print_r( $lawdata ,true)."</pre>";?>

                <div class="row">
                    <div class="col-12  mt-4 mb-4"> 
                        <span class="topic_text "> <?php echo $lawdata['category_th'];?></span> 
                    </div> 
                </div>

                <div class="row datali">
                    <div class="col-12 mt-4"> 
                    <?php //echo htmlspecialchars_decode($lawdata['SCAT_desc_th']);
                    
                    $lawdatahead = $clscont->Load('law_header',array('law_category_id'=>$law ,'deleted'=>0 ),' orderby DESC' ,'');
                    if($lawdatahead){
                         foreach(   $lawdatahead  as $key => $val ){
                            $lawd = $clscont->Load('law_detail',array('law_header_id'=>$val['id'] ,'deleted'=>0 ),' orderby DESC','' );
                             ?>
                             <div class="row  ">
                             <div class=" col-12 box_law mb-2"  >
                                <h4>  <?php echo $val['law_header_name'] ; ?></h4> 
                                <div> 
                                    <?php 
                                    if( $lawd ){
                                    ?>
                                    <ul> 
                                        <?php 
                                         foreach(   $lawd  as $key1 => $val1 ){
                                        ?>
                                        <li > <a href="<?php echo $path['uploads'].$val1['lawfiles'];?>" target="_blank"> <?php echo  $val1['lawname'];?> </a> </li>
                                         <?php } ?>
                                    </ul>    
                                    <?php } ?>
                                         </div>
                            </div> </div>
                             <?php
                         }
                    }
                    ?>

                    </div>
                </div>


            </div>
        </div>
      </div>
    </section>  
     <!--/ section#box_content -->
    
    <!-- 
    <section id="content-diseasedetail">
      <div class="container">
        <div class="row">
        
            <div class="container">
                <div class="row">
                    <div class="topic_block">
                      <p class="topic_text">พระราชบัญญัติโรคติดต่อ พ.ศ. 2558</p>
                    </div>
                </div>
            </div>

            <div class="container law_block">
                <div class="row">
                    <p class="law_topic">พระราชบัญญัติโรคติดต่อ พ.ศ. 2558</p>

                        <div class="container">
                            <div class="row">
 
                                    <div class="col-lg-1 col-xs-1">
                                        <a href="#"><i class="fa fa-download icon-2x" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-11 col-xs-11">
                                        <p>พระราชบัญญัติโรคติดต่อ พ.ศ. 2558</p>
                                    </div>

                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
 
                                    <div class="col-lg-1 col-xs-1">
                                        <a href="#"><i class="fa fa-download icon-2x" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-11">
                                        <p>Communicable Disease Act B.E. 2558 (A.D. 2015) (Tentative Translation*)</p>
                                    </div>

                            </div>
                        </div>
                    
                    <p class="law_topic">ประกาศกระทรวงสาธารณะสุข</p>

                        <div class="container">
                            <div class="row">
 
                                    <div class="col-lg-1 col-xs-1">
                                        <a href="#"><i class="fa fa-download icon-2x" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-11">
                                        <p>ประกาศกระทรวงสาธารณสุข เรื่อง ชื่อและอาการสำคัญของโรคติดต่ออันตราย พ.ศ. 2559</p>
                                    </div>

                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
 
                                    <div class="col-lg-1 col-xs-1">
                                        <a href="#"><i class="fa fa-download icon-2x" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-11">
                                        <p>ประกาศกระทรวงสาธารณสุข เรื่อง หลักเกณฑ์และวิธีการแจ้งในกรณีที่มีโรคติดต่ออันตรายโรคติดต่อที่ต้องเฝ้าระวัง หรือโรคระบาดเกิดขึ้น พ.ศ. 2560</p>
                                    </div>

                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
 
                                    <div class="col-lg-1 col-xs-1">
                                        <a href="#"><i class="fa fa-download icon-2x" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-11">
                                        <p>ประกาศกระทรวงสาธารณสุข เรื่อง การสร้างเสริมภูมิคุ้มกันโรคไข้เหลือง พ.ศ. 2560 ประกาศกระทรวงสาธารณสุข เรื่อง การสร้างเสริมภูมิคุ้มกันโรคไข้เหลือง พ.ศ. 2560 ประกาศกระทรวงสาธารณสุข เรื่อง การสร้างเสริมภูมิคุ้มกันโรคไข้เหลือง พ.ศ. 2560</p>
                                    </div>

                            </div>
                        </div>

                </div>
            </div>
          


        </div>
      </div>
    </section>  
    -->
    <!--/ section#content-diseasedetail -->
    
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### -->
  
    <style>
    .datali ul li{
            display: block;
        position: relative;
        padding: 0 0 0 25px;
        margin: 10px 0;
    }
    .datali ul li:before {
    content: '';
    position: absolute;
    left: 0;
    top: 11px;
    width: 0;
    height: 0;
    border-left: 0px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #179c9b;
    }
    .datali ul li a{
        color: #333;
    }
    .datali ul li a:hover{
        color: #E91E6F;
    }
    </style>
    <!-- ############################################################################################################### -->
    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
    $( document ).ready(function() {
        
    });
    </script>  
  </body>
</html>