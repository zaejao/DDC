<?php 
include "duck.conf.php";
include $pathf."/prepare_html.php"; 

$menucode = "MAIN" ;
$menucode1 = "MAIN_NEWSACTIVITY" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
include "conf.php";
$langcode=$_SESSION['LANGCODE'];

$clsdept = new DeptClass();
$clscont = new ContentsClass();

 $newstype =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_calendar'));
$newsdata =$clscont->Load('news_mapping',array('type'=>'news_calendar','enable'=>'Y'));


?>
 
<?php include $pathf."/prepare_css.php";?>
  <body>
    <?php include $pathf."/prepare_header.php";?>
    <?php include $pathf."/prepare_bannermain".$depttype.".php";?>
    <?php include $pathf."/prepare_navsub.php";?>
 

    <!-- #####  START CONTENT ##### -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <section id="content-news">
      <?php 
      //echo "<pre>".print_r($newsdata,true)."</pre>";
      ?>
      <div class="container">
        <div class="row  mb-4 row_content"> 
            <div class="col-12 col-md-4">
                <h2 class="titletext">  <?php echo $newstype['news_type_'.$_SESSION['LANGCODE']];?> </h2> 
            </div>
            <div class="search_row col-12  col-md-8">
            </div>
        </div>

   
        <div  id=" " >
          <div class="container">
            <div class="row">
              <?php 
              if($newsdata){
                foreach( $newsdata as $key1 => $val1 ){
                ?>
                 <div class="col-lg-3">
                   <a href="/<?php echo $val1['office'];?>/news.php?news=<?php echo $val1['id'];?>">
                    <div class="card" id="card_newsInfo"  >
                      <img class="newsInfo_img" src="<?php echo $path['news'].$val1['cover'];?>"   onerror="this.onerror=null;this.src='<?php echo $path['img'].'logo3.png';?>'" >
                        <div class="card-body">
                          <p> <?php echo DateDisplay($val1['datetime'],8);?> </p>
                          <p class="card-title"> <?php echo  $val1['title_th'];?> </p>
                          <p class="card-text"> <?php echo $val1['office'];?> </p>
                        </div>
                    </div>
                  </a>
                </div> 
                <?php
                }
              }
              ?>
             
            </div>
          </div> 
       </div>  

       <nav aria-label="Page navigation " id="section_paging">
          <ul class="pagination justify-content-end">
          </ul>
       </nav>


   </div> 

</section>  <!--/ section#content-news -->

   
    
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### --> 

    <!-- ############################################################################################################### -->
    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>


    </script>  
  </body>
</html>