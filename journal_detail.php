<?php 
include "duck.conf.php";
include "prepare_html.php"; 
$menucode = "HOME" ;
$menucode1 = "HOMEALL" ;
$navsub = "publish" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";

$langcode=$_SESSION['LANGCODE'];
$clscont = new ContentsClass();
 
$deptcode = $_GET['deptcode'];
$newsid =$_GET['news'];

// $deptcode='thaincd';

$data_dept = $clscont->LoadOnce('department',array('department_code_ch'=>$deptcode  ));
$data_news = $clscont->LoadOnce('news_mapping',array('id'=>$newsid ,'office'=>$deptcode  ));


$data_newsetc = $clscont->Load('news_mapping',array( 'type' =>'news_mag', 'enable_th'=>'Y'  ),' datetime DESC ',' 0,4');

?> 

  <?php include "prepare_css.php";?>
<body>
  <?php include "prepare_header.php";?>
  <!-- ############################################################################################################### -->
    
  <section>
        <div class="row justify-content-center   row_banner">
            <div class="col-12 p-0">
                <div class="box_deptname"> <?php echo $data_dept['department_name_'.$langcode];?> </div>
                <img src="img/banner/Banner_U1.jpg" class="img-fluid" alt="Responsive image">
                
            </div>
        </div>
      </section>
      
     
      <?php  include 'prepare_navsub.php';?> 
      <?php

// echo "<pre>".print_r($data_dept,true) ."</pre>";
 //echo "<pre>".print_r($data_newsetc,true) ."</pre>";
?>


<section>
    <div class="container">
         <div class="row">
            <div id="content-title" class="col-lg-12 mt-5">
                <h2> <?php echo $data_news['title_'.$_SESSION['LANGCODE']];?></h2>
            </div>
        </div> 

        <div class="row">
            <div  class="col-sm-6 col-md-6 col-lg-6">
            
                        <div class="box-social">
                            <ul class="nav">
                                <li class="nav-item mr-3">
                                  <img src="img/Facebook.png" alt="">
                                </li>
                                <li class="nav-item mr-3">
                                    <img src="img/Twitter.png" alt="">
                                </li>
                                <li class="nav-item mr-3">
                                        <img src="img/Share.png" alt="">
                                    </li>
                              </ul>
                        </div>
            </div> <!--  class="col-sm-6 col-md-6 col-lg-6"-->


        
        <div  class="col-sm-6 col-md-6 col-lg-6">
            
                <div class="footer-detail-right">
                        <div class="time">
                            <i class="fa fa-calendar" aria-hidden="true">
                              <span class="ml-1 mb-5" >  <?php echo  DateDisplay($data_news['datetime'],8) ;?> </span>
                            </i>
                        </div>
                        <div class="view">
                            <i class="fa fa-eye" aria-hidden="true">
                            <span class="ml-1 mb-5"> 
                              <?php echo $data_news['views'] ;?>
                                <span class="lang_view"> View </span> 
                              </span>
                            </i>
                        </div>
        

        </div> <!--  class="col-sm-6 col-md-6 col-lg-6"-->
    </div>  <!-- class="row mb-5"-->

         <!-- content-detail-->
        <div class="row">

                <div class="col-sm-12 col-md-12 col-lg-8 mt-5 mb-5">
                    <img src="<?php echo $path['news']. $data_news['cover'] ;?>" class="card-img-top"  >  
                 </div>
                <div class="col-sm-12 col-md-12 col-lg-4 mt-5 mb-5">
                        <div id="content-detail"> 
                        <p class="p_indent"> 
                          <?php echo  htmlspecialchars_decode($data_news['desc_'.$_SESSION['LANGCODE']]);?>
                        </p>   
                        <?php 
                        if($data_news['file']){ ?>
                        <a href="<?php echo $path['files'].$data_news['file'];?>" class="btn_round1" target="_blank">
                          <span>ดาวน์โหลดเอกสาร  
                            <i class="fa fa-download" aria-hidden="true"></i>
                          </span>                                    
                        </a> 
                        <?php } ?>
                        
                        
                </div>  <!-- close id="content-detail" class="col-lg-12" -->
            </div>
                
        </div> <!-- close row -->
 </div> <!-- class="container"-->
</section>

<?php if( $data_newsetc){ ?>
<section id="journal">
        <div class="container">            
                <div class="row">
                        <div class="col-8">
                          <h5>วารสารออนไลน์อื่นๆ  </h5>
                          <hr style="width:140px;margin-left:0; border-top: 3px solid  #e84c93; ">
                          
                        </div>     
    
                        <div class="col-4 text-right"> 
                        <a class="btn_round1" href="journal.php" >ดูทั้งหมด</a>  
                        
                        </div>   
                </div>


                <div class="row mt-3 mb-3">


                <?php 

              foreach( $data_newsetc as $key => $value ){
              ?>
                    


                        <div class="col-lg-3 mt-3 mb-3">
                                <div class="box-pic-main2">
                                  <a href="journal_detail.php?news=<?php echo $value['id'];?>&deptcode=<?php echo $value['office'];?>">                      
                                    <img src="<?php echo $path['news']. $value['cover'] ;?>" class="image"> 
                                  </a>
                                  <div class="overlay">
                                      <div class="text">
                                          <div class="card-body">
                                              <h3> <?php  echo DateDisplay($value['datetime'],8) ;?></h3>
                                              <a href="journal_detail.php?news=<?php echo $value['id'];?>&deptcode=<?php echo $value['office'];?>">       
                                                <h5 class="card-title">  <?php  echo $value['title_'.$_SESSION['LANGCODE']];?>  </h5>
                                              </a>
                                              <div class="bnt-Download">
                                              <?php 
                                                if($value['file']){ ?>
                                                  <a href="<?php echo $path['files'].$value['file'];?>" target="_blank"> 
                                                      <button type="button" class="btn btn-outline-danger"><span>ดาวน์โหลดเอกสาร
                                                              <i class="fa fa-download" aria-hidden="true"></i></span>
                                                      </button>                                    
                                                  </a> 
                                                <?php } ?>
                                              </div> 
                                          </div> <!-- /.card-body -->  
                                      </div>
                                  </div>
                                </div> <!-- /.box-pic-main -->
                          </div><!-- ./col-3 -->
                          <?php
              }
              ?>
  

 

            </div> <!-- close row -->
        </div> <!-- class="container"-->
</section>

            <?php } ?>

             
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