<?php 
include "../duck.conf.php";
include $pathf."/prepare_html.php"; 
$menucode = "DEPT" ;
$menucode1 = "NEWS" ;
$navsub = "NEWSVDO" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
include "conf.php";


$clsdept = new DeptClass();
$clscont = new ContentsClass();

$data_dept = $clscont->LoadOnce('department',array('department_code_ch'=>$deptcode  ));
$newstype =$clscont->LoadOnce('news_type',array('news_type_code'=>'news_vdo'));
$newsdata = $clscont->Load('news_mapping',array( 'type' =>'news_vdo', 'office'=>$deptcode,'enable_th'=>'Y' ),' datetime DESC ',' 0,10');

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
        
            <section id="content-news" class="bg_custom2">
                    <?php 
                        // echo "<pre>".print_r($newsdata,true)."</pre>";
                    ?>
                        <div class="container">
                            <div class="row  mb-4   "> 
                                <div class="col-12 col-md-4 mt-4">
                                    <h2 class="titletext">  <?php echo $newstype['news_type_'.$_SESSION['LANGCODE']];?>   </h2> 
                                </div>
                                <div class="search_row col-12  col-md-8">
                                    
                                </div>
                            </div>
                        </div>

                            
                        <div class="container">
                            <div class="row box_contentinfo mb-5">

                                <?php 
                                    if($newsdata){
                                        foreach( $newsdata as $key1 => $val1 ){
                                        $datadept = $clscont->LoadOnce('department',array('department_code_ch'=>$val1['office'] )) ;
                                        $title = ContentDisplayEditor( $val1['title_th']) ; 

                                        if($val1['cover']){
                                            $coverpic = $path['news'].$val1['cover'] ;
                                        }else{
                                            $coverpic = $path['news'].'logo_df.jpg' ;
                                        }
                                        ?>
                                        <div class="col-lg-4 mt-5 mb-2">
                                        <div class="card card_newsInfo card_newsvdo">
                                                <?php 
                                                if($val1['youtube']){
                                                    $youtube = GetYoutubeId($val1['youtube'],450);
                                                ?>
                                                <iframe width="100%" height="200"  class="news_youtube" src="//www.youtube.com/embed/<?php echo $youtube;?>" frameborder="0" allowfullscreen></iframe>
                                                <?php
                                                }
                                                ?> 
                                                <div class="caption pt-1 pb-2 px-2 clearfix">
                                                <div class="box_l float-left" style="">
                                                    <a href="https://www.youtube.com/watch?v=<?php echo  $val1['youtube'];?>" target="_blank"  title="เล่นบน Youtube">
                                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div  class="box_r float-right"  style="">
                                                    <p class="datetime"> <i class="fa fa-calendar"></i> <?php echo DateDisplay($val1['datetime'],8);?> </p>
                                                    <p class="card-title">  
                                                    <a href="/<?php echo  $val1['office'];?>/news.php?news=<?php echo $val1['id']."&deptcode=". $val1['office'] ;?>" class=""> 
                                                    <?php echo  mb_substr($title,0,100,'UTF-8' );?>  </a>
                                                    </p>
                                                    <p class="card-text txtdept font5"> 
                                                    <a href="/<?php echo  $val1['office'];?>/" class="font5"> <?php echo  $datadept['department_name_th'];?> </a>
                                                    </p>
                                                </div>
                                                </div>
                                        </div>
                                        </div>

                                    <?php
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </section>
           
      
        </div> <!-- /.9 -->
      </div>
    </div>
    </section>
    
    
    
     
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- #####  END CONTENT ##### -->
  


    <!-- ############################################################################################################### -->
    <!-- ############################################################################################################### -->
    <?php include  $pathf."/prepare_footer.php";?>
    <?php include  $pathf."/prepare_script.php";?> 
    <!-- Optional JavaScript -->
    <script>
    $( document ).ready(function() {
        //dept.LoadNewsmass();
        contents.LoadCountNewsAuctOffice('ALL','news_vdo' ,1 ,10); 
      
 

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