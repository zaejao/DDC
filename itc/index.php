<?php 
include "../duck.conf.php";
include $pathf."/prepare_html.php"; 

$menucode = "DEPT" ;
$menucode1 = "HOME" ;

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";
include "conf.php";

  $langcode=$_SESSION['LANGCODE'];

  $clsdept = new DeptClass();
  $clscont = new ContentsClass();


 // $deptcode = "bamras";
 
  
  
 $data_setting['slide_head1'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'slide_head1' , 'department_code_ch'=>$deptcode));
 $data_setting['diseaselist'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'diseaselist' , 'department_code_ch'=>$deptcode ));
 $data_setting['newsactivity'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'newsactivity' , 'department_code_ch'=>$deptcode ));
 $data_setting['news_auctions'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'news_auctions' , 'department_code_ch'=>$deptcode));
 $data_setting['bannerssystem'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'bannerssystem' , 'department_code_ch'=>$deptcode));
 $data_setting['bannerlink'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'bannerlink' , 'department_code_ch'=>$deptcode));


  $data_dept = $clscont->LoadOnce('department',array('department_code_ch'=>$deptcode  ));

  //$data_slidemain = $clscont->Load('news_old',array('NW_menu' => 'mbanner','NW_active'=>'1','NW_home'=>'1' ),' NW_date DESC ','');
  
  
  $data_slidemain = $clscont->Load('news',array( 'news_office'=> $deptcode ,'news_menu'=>'mbanner' ,'enable'=>'Y'),' news_datetime DESC ','');
  $data_slidemainsub = $clscont->Load('news',array( 'news_office'=> $deptcode ,'news_menu'=>'msbanner' ,'enable'=>'Y'),' news_datetime DESC ','');

  $data_newsmain = $clscont->Load('news',array( 'news_office'=> $deptcode ,'news_menu'=>'news' ,'enable'=>'Y'),' news_datetime DESC ','');
  $data_newsmain1 = array();

  foreach( $data_newsmain  as $key => $value ){
    if($value['news_cover']){
      $data_newsmain1[] =  $data_newsmain[$key];
    }
  }
?>
 

  <?php include $pathf."/prepare_css.php";?>

<body>
  <?php //echo $depttype;?>
  <?php include $pathf."/prepare_header.php";?>
  <!-- ############################################################################################################### -->
  <?php include $pathf."/prepare_bannermain".$depttype.".php";?>
  <?php //include $pathf."/prepare_navsub.php";?>

  <?php  // echo "<pre>".print_r( $data_newsmain1 ,true)."</pre>";?>


  <?php include $pathf."/home".$depttype."d.php";?>

  
<?php 
  //$menusub1 = $clsdept->LoadMenusubByDeptcode($deptcode,array('ms.menusub_level'=>1)); 
  //$menusub3 = $clsdept->LoadMenusubByDeptcode($deptcode,array('ms.menusub_level'=>3));   
?>
<?php  // echo "<pre>".print_r( $menusub1 ,true)."</pre>";?>
    
  <section style="background: #ffeaf1;" class="box_officecontent">
    <div class="container py-5" >
      <div class="row"> 
        <div class="col-lg-3 col_munusub pl-0 pr-0" style="">
          <?php include $pathf."/prepare_navsub2.php";?>
        </div>
        <div class="col-lg-9">
        <?php   
         if($data_setting['news_auctions']['enable']=="Y" ){  
          $num = $data_setting['news_auctions']['numrow'] ;
          if( $num==0){
            $num = 5 ;
          }
          $datanews1 = $clscont->Load('news',array( 'news_office'=> $deptcode ,'news_type'=>'news_pic' ,'news_active'=>'Y'),' news_datetime DESC ',' 0,'.$num );
          $datanews2 = $clscont->Load('auction',array( 'auction_office'=> $deptcode ,'auction_type'=>'auction_drf' ,'auction_active'=>'Y'),' auction_datetime DESC ',' 0,'.$num );

        ?> 
          <div class=""> 
                <ul id="nav_newshome" class="nav nav-tabs m-auto" role="tablist" style="background: #FFF;padding-top: 20px;padding-bottom: 20px;">
                                  
                 																	
                  <li class="nav-item">									
                      <a class="nav-link newstype active  " data-toggle="tab" href="#news_pic">ข่าวประชาสัมพันธ์</a>								
                  </li>		 
                  <li class="nav-item">										
                    <a class="nav-link newstype    " data-toggle="tab" href="#auction_drf">ข่าวจัดซื้อจัดจ้าง</a>									
                  </li>	
                  <li class=""style="padding-top: 5px;">
                    <a href="newsmass.php" class="btn btn-danger btn-primary btn-sx lang_viewall"> ดูทั้งหมด </a>
                  </li>									
                </ul>
          </div>
          <div class="tab-content  w-100 news_main_content" id="news_main_home">
         
                  <div id="news_pic" class="container tab-pane active pl-0 pr-0 ">
                    <?php 
                    if($datanews1 ) {
                      foreach( $datanews1 as $keyn1 => $valn1 ){
                    ?>
                      <div class="row">											
                        <div class="col-lg-12 mt-2">												
                          <div class="card">													
                            <div class="card-body">														
                              <div class="row">															
                                <div class="col-lg-11 col-sm-11">															
                                  <h5 class="card-title">															
                                  <a href="news.php?news=<?php echo $valn1['id'];?>&deptcode=<?php echo $valn1['deptcode'];?>"> 
                                   <?php echo  mb_substr( $valn1['news_title_th'] , 0,100,'UTF-8') ;?> 
                                 </a>															
                                  </h5>															
                                </div>														
                              </div>														
                              <div class="footer-detail">															
                              <div class="row">																
                                <div class=" col-md-3   col-6 time ">																
                                  <i class="fa fa-calendar" aria-hidden="true"> </i> 																
                                  <span class="ml-0"> <?php echo DateDisplay($valn1['news_datetime'],8);?></span>																
                                </div>
                                <div class=" col-md-3   col-6 view">
                                  <i class="fa fa-eye" aria-hidden="true"> </i><span class="ml-0"><?php echo $valn1['news_views'];?> view</span>
                                </div>
                              </div> 													
                            </div>  														
                            <hr class="lines linehomenews">												
                          </div>												
                          </div>  											
                        </div>										
                      </div> 
                    <?php 
                      }
                    }
                   ?> 
                </div>
               
                
                <div id="auction_drf" class="container pl-0 pr-0 tab-pane"> 
                <?php 
                    if($datanews2  ) {
                      foreach( $datanews2 as $keyn2 => $valn2 ){
                    ?>
                      <div class="row">											
                        <div class="col-lg-12 mt-2">												
                          <div class="card">													
                            <div class="card-body">														
                              <div class="row">															
                                <div class="col-lg-11 col-sm-11">															
                                  <h5 class="card-title">															
                                  <a href="auctionsdet.php?auctions=<?php echo $valn2['id'];?>&deptcode=<?php echo $valn2['deptcode'];?>"> 
                                   <?php echo  mb_substr( $valn2['auction_title_th'] , 0,100,'UTF-8') ;?> 
                                 </a>															
                                  </h5>															
                                </div>														
                              </div>														
                              <div class="footer-detail">															
                              <div class="row">																
                                <div class=" col-md-3   col-6 time ">																
                                  <i class="fa fa-calendar" aria-hidden="true"> </i> 																
                                  <span class="ml-0"> <?php echo DateDisplay($valn2['auction_datetime'],8);?></span>																
                                </div>
                                <div class=" col-md-3   col-6 view">
                                  <i class="fa fa-eye" aria-hidden="true"> </i><span class="ml-0"><?php echo $valn2['auction_views'];?> view</span>
                                </div>
                              </div> 													
                            </div>  														
                            <hr class="lines linehomenews">												
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
          <?php 
          }
          ?>

        </div> <!-- /.9 -->
      </div>
    </div>
    </section>

 


 
  
    <?php include $pathf."/prepare_banners.php";?>

   <!-- ############################################################################################################### -->

    <?php include $pathf."/prepare_footer.php";?>
    <?php include $pathf."/prepare_script.php";?>


    
  </body>
</html>



         
       