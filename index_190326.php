<?php 
include "duck.conf.php";
include "prepare_html.php"; 
$menucode = "HOME" ;
$menucode1 = "HOMEALL" ;
include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/func.php";

$langcode=$_SESSION['LANGCODE'];

  $clscont = new ContentsClass();
 //$data_subject = $clscont->Load('news_mapping',array('deleted' => '0','deleted'=>'Y'),' forcollegeyear ASC ','');


  $data_slidemain = $clscont->Load('news_old',array('NW_menu' => 'mbanner','NW_active'=>'1','NW_home'=>'1' ),' NW_date DESC ','');

  // NW_cover : 25923137ddaf8cd202df0f33872eef97.jpg

  $data_newsmain = $clscont->Load('news',array('news_main' => 1 ,'news_home'=>'1' ,'news_active'=>'Y' ),' news_datetime DESC ','');


?>



  <?php include "prepare_css.php";?>
<body>
  <?php include "prepare_header.php";?>
  <!-- ############################################################################################################### -->
    
  
    <!-- <img src="..." class="img-fluid" alt="Responsive image"> -->
    <section id="box_slideimg" class="">
      <div class="box-bg-banner">
          <div class="container">
              <!-- Content here -->
              <div class="row">
                  <div id="banner-main" class="col-sm-12 col-md-8 mb-4">
                      <div class="bd-example">
                          <div id="SlideNewsMain" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">

                            <?php 
                              foreach($data_slidemain as $key1 => $val1){
                                  
                                  $flag_active  = "" ; 
                                  if($key1==0){
                                    $flag_active = "active" ; 
                                  }
                                  
                                  $flag_link = "#";
                                  if ( isset($val1['NW_youtube'] )){
                                    $flag_link = $val1['NW_youtube'] ;
                                  }

                              ?>
                                <!-- <li data-target="#SlideNewsMain" data-slide-to="<?php echo $key1;?>" class="<?php echo $flag_active;?>"></li> -->
                              <?php 
                              } 
                              ?> 
                              <li data-target="#SlideNewsMain" data-slide-to="<?php echo $key1;?>" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                              <?php 
                              foreach($data_slidemain as $key1 => $val1){
                                  
                                  $flag_active  = "" ; 
                                  if($key1==0){
                                    $flag_active = "active" ; 
                                  }
                                  
                                  $flag_link = "#";
                                  if ( isset($val1['NW_youtube'] )){
                                    $flag_link = $val1['NW_youtube'] ;
                                  }

                              ?>
                                <div class="carousel-item <?php echo $flag_active;?>">
                                  <a href="<?php echo $flag_link;?>" target="_blank">
                                    <img src="<?php echo $path['news'].$val1['NW_cover'] ; ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                      <h5> <?php echo  $val1['NW_th'] ; ?> </h5> 
                                    </div>
                                  </a>
                                </div>

                              <?php  } ?>
                             <!--
                              <div class="carousel-item">
                                <img src="img/img-03.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5> </h5> 
                                </div>
                              </div>
                              -->
                               
                            </div>
                            <a class="carousel-control-prev" href="#SlideNewsMain" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#SlideNewsMain" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                        </div>
                  </div><!-- /. col-8 -->
                  
                  <div id="banner-secon" class="col-sm-12 col-md-4">
                      <div class="bd-example">
                          <div id="SlideNewsMini" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#SlideNewsMini" data-slide-to="0" class="active"></li>
                              <li data-target="#SlideNewsMini" data-slide-to="1"></li>
                              <li data-target="#SlideNewsMini" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="img/img-02.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5> </h5>
                                  <p> </p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="img/img-02.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5> </h5>
                                  <p> </p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img src="img/img-02.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5> </h5>
                                  <p></p>
                                </div>
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#SlideNewsMini" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#SlideNewsMini" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                        </div>
                      </div><!-- /. col-4 -->
                </div>
          </div>
      </div> <!-- /.box-bg-banner -->
  </section>

  
  <?php 
   //  echo "<pre>".print_r($data_newsmain,true) ."</pre>";

  //  data_newsmain[0]['news_title_th'] 
  //  data_newsmain[0]['news_desc_th']
  //  data_newsmain[0]['news_cover']
  //  data_newsmain[0]['news_views']
  ?>


    <?php //echo $_SESSION['LANGCODE'] ; ?>
    <section id="news" class="">
        <div class="container">
            <!-- Content here -->
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-8"> 
                <div class="row">

                  <div id="news-main" class="col-12">
                    <a href="#">
                      <div class="card">
                        <div class="box-img-main mt-5">                     
                                <a href="news1.php?deptcode=<?php echo $data_newsmain[0]['news_office'];?>&news=<?php echo $data_newsmain[0]['id'] ;?>"> 
                                  <!-- <img src="<?php echo $path['news']. $data_newsmain[0]['news_cover'] ;?>" class="card-img-top"  > -->
                                  <img src="img/drowningday2018-1_(2)_770_530.jpg" class="card-img-top"  >
                                  
                                </a>
                              </div>  
                              <div class="card-body">
                                <h5 class="card-title"> 
                               
                                  <?php echo $data_newsmain[0]['news_title_'.$langcode] ;?>
                                  
                                </h5>
                                <div class="footer-detail ">
                                  <div class="time">
                                      <i class="fa fa-calendar" aria-hidden="true"></i>
                                      <span class="ml-2"><?php echo  DateDisplay($data_newsmain[0]['news_datetime'],8) ;?>  </span>
                                  </div>
                                  <div class="view">
                                      <i class="fa fa-eye" aria-hidden="true">
                                      </i>
                                      <span class="ml-2">
                                           <?php echo $data_newsmain[0]['news_views'] ;?>
                                        <span class="lang_view"> View </span> 
                                      </span>
                                  </div>
                                  <div class="see-more">
                                  <a href="news1.php?deptcode=<?php echo $data_newsmain[0]['news_office'];?>&news=<?php echo $data_newsmain[0]['id'] ;?>"> 
                                
                                      <span class="mr-2 lang_readmore"> อ่านต่อ   </span>
                                      <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                  </a>
                                  </div>
                                </div> <!-- /.footer-detai -->
                                
                               
                              </div>
                              <hr class="line">

                      </div> <!-- /.card -->
                    </a>
                  </div><!-- ./col-12 -->
                </div><!-- /.row -->

                <div class="row"> 
                  
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <a href="#" class="linknone">
                        <div class="card card_new1">
                        
                            <div class="box-img-main mt-2">                      
                              <img src="<?php echo $path['news']. $data_newsmain[1]['news_cover'] ;?>" class="card-img-top"  > 
                            </div> 
                            <div class="card-body">
                              <h5 class="card-title">  <?php echo $data_newsmain[1]['news_title_'.$langcode] ;?> </h5>
                              <p > </p>
                              <div class="footer-detail">
                                <div class="time">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <span class="ml-0">   <?php echo  DateDisplay($data_newsmain[1]['news_datetime'],8) ;?></span>
                                </div>
                                <div class="view">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    <?php echo $data_newsmain[1]['news_views'] ;?>
                                    <span class="lang_view"> View </span> 
                                </div>
                                <div class="see-more">
                                <a href="news1.php?deptcode=<?php echo $data_newsmain[0]['news_office'];?>&news=<?php echo $data_newsmain[0]['id'] ;?>"> 
                                  <span class="mr-0 lang_readmore">  อ่านต่อ  </span>
                                  <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> </a>
                                </div>
                              </div>  
                          </div>   
                        </div><!-- /.card -->      
                      </a>      
                  </div><!-- /.col-4 -->
                               

                  <div class="col-sm-12 col-md-4 col-lg-4">
                      <div class="card card_new1">
                          <div class="box-img-main mt-2">                     
                          <img src="<?php echo $path['news']. $data_newsmain[2]['news_cover'] ;?>" class="card-img-top"  > 
                          </div> <!-- /.box-img-main -->
                                <div class="card-body">
                                  <h5 class="card-title"> <?php echo $data_newsmain[2]['news_title_'.$langcode] ;?> </h5>
                                  <p>   </p>
                                  <div class="footer-detail">
                                    <div class="time">
                                        <i class="fa fa-calendar" aria-hidden="true">
                                        <span class="ml-0">   <?php echo  DateDisplay($data_newsmain[2]['news_datetime'],8) ;?>   </span>
                                        </i>
                                    </div>
                                    <div class="view">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <?php echo $data_newsmain[2]['news_views'] ;?>
                                        <span class="lang_view"> View </span> 
                                    </div>
                                    <div class="see-more">
                                      <a href="#">  <span class="mr-0 lang_readmore">  อ่านต่อ </span> 
                                      <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> </a>
                                    </div>
                                  </div> <!-- /.footer-detai -->
                        </div> <!-- /.card-body -->
                      </div><!-- /.card -->                      
                  </div><!-- /.col-4 -->

                  <div class="col-sm-12 col-md-4 col-lg-4">
                      <div class="card card_new1">
                          <div class="box-img-main mt-2">                     
                          <img src="<?php echo $path['news']. $data_newsmain[5]['news_cover'] ;?>" class="card-img-top"  > 
                          </div> <!-- /.box-img-main -->
                                <div class="card-body">
                                  <h5 class="card-title"><?php echo $data_newsmain[5]['news_title_'.$langcode] ;?> </h5>
                                  <p>  </p>
                                  <div class="footer-detail">
                                    <div class="time">
                                        <i class="fa fa-calendar" aria-hidden="true">  </i>
                                          <span class="ml-0"> <?php echo  DateDisplay($data_newsmain[5]['news_datetime'],8) ;?>   </span>
                                      
                                    </div>
                                    <div class="view">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <?php echo $data_newsmain[2]['news_views'] ;?>
                                        <span class="lang_view"> View </span>
                                    </div>
                                    <div class="see-more">
                                      <a href="#"> <span class="mr-0 lang_readmore">อ่านต่อ</span>
                                      <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> </a>
                                    </div>
                                  </div> <!-- /.footer-detai -->
                        </div> <!-- /.card-body -->
                      </div><!-- /.card -->                      
                  </div><!-- /.col-8 -->
                </div>  
              </div>

              
              <div id="news-img" class="col-sm-12 col-md-12 col-lg-4 mt-5 "><!-- กล่องข้างๆ -->
                <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-12">
                      <div class="box-img">
                      <img src="<?php echo $path['news']. $data_newsmain[9]['news_cover'] ;?>"  class="image" >  
                          <div class="overlay">
                            <div class="text">
                              <h5> <?php echo $data_newsmain[4]['news_title_'.$langcode] ;?> </h5> 
                              <p>26 พฤศจิกายน 2561</p>
                            </div>
                          </div>
                      </div>   <!--/.container -->
                  </div><!-- /.col-12 -->

                  <div class="col-sm-12 col-md-6 col-lg-12 mt-3">
                      <div class="box-img">
                      <img src="img/stethoscope-doctor-medical-blood-pressure-161489.png" alt="Avatar" class="image"> 
                          <div class="overlay">
                            <div class="text">
                                <h5>  <?php echo $data_newsmain[5]['news_title_'.$langcode] ;?> </h5> 
                                <p>26 พฤศจิกายน 2561</p>
                                <!-- <br> -->
                            </div>

                          </div>
                      </div>   <!--/.container -->
                  </div><!-- /.col-12 -->

                </div><!-- /.row col-4 -->
                  
              </div><!-- /.col-4 กล่องข้างๆ-->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.news -->

    <section id="news-content" class="my-5 ">
      <div class="container pb-4">
          <div class="row pt-4">
            <div class="col-12">

                <nav class="navbar navbar-expand-lg navbar-light pl-0 ">
                    <!-- <a class="navbar-brand text-left " href="#">ข่าวเพื่อสื่อมวลชน</a> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon "></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav"> 
                        <li class="nav-item ">
                        <a class="nav-link active text-left" href="">ข่าวเพื่อสื่อมวลชน <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-left" href="#">ข่าวประชาสัมพันธ์</a> 
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-left" href="#">ประกาศจัดซื้อจัดจ้าง</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="#">ประกาศจัดรับสมัครงาน</a>
                        </li>
                      </ul>
                    </div>
                  </nav>
            </div>
          </div>

          <div class="row my-5">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                        เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                      <div class="footer-detail">
                          <div class="time">
                              <i class="fa fa-calendar" aria-hidden="true">
                                <span class="ml-2">Jul / 15 /2018 </span>
                              </i>
                          </div>
                          <div class="name-depart">
                            <span class="mr-2">สำนักสื่อสารความเสี่ยงและพัฒนาพฤติกรรมสุขภาพ</span>                           
                          </div>
                        </div> <!-- /.footer-detai -->
                    </div>
                    <hr class="lines">
                  </div>
            </div>

            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                        เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                      <div class="footer-detail">
                          <div class="time">
                              <i class="fa fa-calendar" aria-hidden="true">
                                <span class="ml-2">Jul / 15 /2018 </span>
                              </i>
                          </div>
                          <div class="name-depart">
                            <span class="mr-2">ศูนย์กฎหมาย</span>                           
                          </div>
                        </div> <!-- /.footer-detai -->
                    </div>
                    <hr class="lines">
                  </div>
            </div>

            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                        เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                      <div class="footer-detail">
                          <div class="time">
                              <i class="fa fa-calendar" aria-hidden="true">
                                <span class="ml-2">Jul / 15 /2018 </span>
                              </i>
                          </div>
                          <div class="name-depart">
                            <span class="mr-2">สำนักงานคณะกรรมการผู้ทรงคุณวุฒิ</span>                           
                          </div>
                        </div> <!-- /.footer-detai -->
                    </div>
                    <hr class="lines">
                  </div>
            </div>
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                        เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                      <div class="footer-detail">
                          <div class="time">
                              <i class="fa fa-calendar" aria-hidden="true">
                                <span class="ml-2">Jul / 15 /2018 </span>
                              </i>
                          </div>
                          <div class="name-depart">
                            <span class="mr-2">ศูนย์กฎหมาย</span>                           
                          </div>
                        </div> <!-- /.footer-detai -->
                    </div>
                    <hr class="lines">
                  </div>
            </div>

            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                        เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                      <div class="footer-detail">
                          <div class="time">
                              <i class="fa fa-calendar" aria-hidden="true">
                                <span class="ml-2">Jul / 15 /2018 </span>
                              </i>
                          </div>
                          <div class="name-depart">
                            <span class="mr-2">สำนักงานคณะกรรมการผู้ทรงคุณวุฒิ</span>                           
                          </div>
                        </div> <!-- /.footer-detai -->
                    </div>
                    <hr class="lines">
                  </div>
            </div>
          </div>

          

          <!-- <div class="row justify-content-md-center">
              <div class="col-auto">
                <button type="button" class="btn btn-danger">ดูทั้งหมด</button>
              </div>
          </div> -->

          <div class="text-center"><button class="btn btn-danger btn-primary btn-sx lang_viewall" type="button"> ดูทั้งหมด</button></div>


     </div><!-- /.container -->
    </section><!-- /.news-content -->



    <div class="col-lg-6">
        <!-- Nav tabs -->
          <div class="row"> 
            <ul id="listColor" class="nav nav-tabs" role="tablist">
               <li  class="nav-item">
                <a  class="nav-link active" data-toggle="tab" href="#news">ข่าวสาร</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#relation">ข่าวประชาสัมพันธ์</a>
             </li>
              <li class="nav-item">
               <a class="nav-link" data-toggle="tab" href="#media">ข่าวเพื่อสื่อมวลชน</a>
            </li>
          </ul>
      
        <!-- Tab panes -->
      <div class="tab-content">

          <div id="news" class="container tab-pane active"><br>


         
            <div class="row">
                <div id="number-l" class="col-lg-2 mt-2">
                        <div id="list-number">1</div>
                </div>

                <div class="col-lg-10 mt-2">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                    เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                    <div class="footer-detail">
                        <div class="time">
                            <i class="fa fa-calendar" aria-hidden="true">
                              <span class="ml-0">Jul/15/2018 </span>
                            </i>
                        </div>
                        <div class="view">
                            <i class="fa fa-eye" aria-hidden="true">
                                <span class="ml-0">15 view</span>
                            </i>
                        </div>

                        <div class="see-more">
                            <span class="mr-2">อ่านต่อ</span>
                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                        </div>
                    </div> <!-- /.footer-detai -->
                </div>

              
              </div>  <!-- close card -->
              </div>
            </div>

            <div  class="row">
                <div  class="col-lg-2 mt-2">
                        <div id="list-number">2</div>
                </div>

                <div class="col-lg-10 mt-2">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">สคร.1 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                    เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                    <div class="footer-detail">
                        <div class="time">
                            <i class="fa fa-calendar" aria-hidden="true">
                              <span class="ml-0">Jul/15/2018 </span>
                            </i>
                        </div>
                        <div class="view">
                            <i class="fa fa-eye" aria-hidden="true">
                                <span class="ml-0">15 view</span>
                            </i>
                        </div>

                        <div class="see-more">
                            <span class="mr-2">อ่านต่อ</span>
                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                        </div>
                    </div> <!-- /.footer-detai -->
                </div>

              
              </div>  <!-- close card -->
              </div>
            </div>




          </div> <!-- close id="news" -->
         

          <div id="relation" class="container tab-pane fade"><br>

            <div  class="row">
                <div  class="col-lg-2 mt-2">
                        <div id="list-number">1</div>
                </div>
          
            <div class="col-lg-10 mt-2">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">สคร.2 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                        เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                        <div class="footer-detail">
                            <div class="time">
                                <i class="fa fa-calendar" aria-hidden="true">
                                  <span class="ml-0">Jul/15/2018 </span>
                                </i>
                            </div>
                            <div class="view">
                                <i class="fa fa-eye" aria-hidden="true">
                                    <span class="ml-0">15 view</span>
                                </i>
                            </div>
    
                            <div class="see-more">
                                <span class="mr-2">อ่านต่อ</span>
                                <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                            </div>
                        </div> <!-- /.footer-detai -->
                    </div>
    
                  
                  </div>  <!-- close card -->
                  </div>
                </div>
          </div>  <!-- close id="relation" -->


          
          <div id="media" class="container tab-pane fade"><br>
            <div  class="row">
                <div  class="col-lg-2 mt-2">
                        <div id="list-number">1</div>
                </div>
          
            <div class="col-lg-10 mt-2">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">สคร3 เชียงใหม่ ประกาศรายชื่อผู้สมัครเข้ารับการเลือกสรร
                        เพื่อจัดจ้างเป็นพนักงานราชาการ ตำแหน่ง นักวิเคราะห์นโยบายและแผน</h5>
                        <div class="footer-detail">
                            <div class="time">
                                <i class="fa fa-calendar" aria-hidden="true">
                                  <span class="ml-0">Jul/15/2018 </span>
                                </i>
                            </div>
                            <div class="view">
                                <i class="fa fa-eye" aria-hidden="true">
                                    <span class="ml-0">15 view</span>
                                </i>
                            </div>
    
                            <div class="see-more">
                                <span class="mr-2">อ่านต่อ</span>
                                <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                            </div>
                        </div> <!-- /.footer-detai -->
                    </div>
    
                  
                  </div>  <!-- close card -->
                  </div>
                </div>
            
          </div> <!-- close id="media" -->
         
      </div> <!-- close class="tab-content" -->
  </div> <!-- close row  -->
  </div>

    <section id="system">
      <div class="container">

        <div class="row justify-content-md-center">
              <div class="col-md-auto ">
                <div class="box-title text-center lang_servicedept">
                  ระบบงานบริการภายในกรมควบคุมโรค
                </div>
              </div>
        </div>

        <div class="row my-5">
          <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
            <a href="http://convoke.ddc.moph.go.th/index.php">
              <div class="box-system">
                <div class="box-img">
                  <img src="img/006-stethoscope-1.svg" alt="">
                </div><!--box-img -->
                <p class="lang_emeeting">E-Meeting </p>
              </div><!-- /.box-system -->
            </a>
          </div>

          <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
              <a href="http://esm.ddc.moph.go.th/">
                <div class="box-system">
                  <div class="box-img">
                    <img src="img/024-house.svg" alt="">
                  </div><!--box-img -->
                  <p class="lang_estimatesm">Estimate SM </p>
                </div><!-- /.box-system -->
              </a>
            </div>

            <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
                <a href="http://ryssurvey.com/saraban/login.php">
                  <div class="box-system">
                    <div class="box-img">
                      <img src="img/026-health-care.svg" alt="">
                    </div><!--box-img -->
                    <p class="lang_sarabun">ระบบสารบรรณกรมฯ </p>
                  </div><!-- /.box-system -->
                </a>
              </div>

              <div class="col-6 col-sm-6 col-md-3 col-lg-3  mt-3">
                  <a href="http://ddccenter.ddc.moph.go.th/infoc/">
                    <div class="box-system">
                      <div class="box-img">
                        <img src="img/030-first-aid-kit.svg" alt="">
                      </div><!--box-img -->
                      <p class="lang_lawnews"> พรบ.ข้อมูลข่าวสาร </p>
                    </div><!-- /.box-system -->
                  </a>
                </div>

        </div>
      </div><!-- /.container -->
    </section> <!-- /.system -->


    <!-- ############################################################################################################### -->

    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
      $( document ).ready(function() {
        contents.LoadSlideImageHome();
  
      });
    </script>  
  </body>
</html>