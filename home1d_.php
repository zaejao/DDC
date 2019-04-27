
<section>
    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8">

          <div class="row">
            <div id="news-main2" class="col-12">
                <div class="card">
                  <div class="box-img-main mt-5">   
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
                                  if ( isset($val1['news_youtube'] )){
                                    $flag_link = $val1['news_youtube'] ;
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
                                  if ( isset($val1['news_youtube'] )){
                                    $flag_link = $val1['news_youtube'] ;
                                  }

                              ?>
                                <div class="carousel-item <?php echo $flag_active;?>">
                                  <a href="<?php echo $flag_link;?>" target="_blank">
                                    <img src="<?php echo $path['news'].$val1['news_cover'] ; ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                      <h5> <?php //echo  $val1['news_title_th'] ; ?> </h5> 
                                    </div>
                                  </a>
                                </div>

                              <?php  } ?> 
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

<!--                                   
                      <a href="#"> <img src="<?php echo $path['news']. $data_newsmain1[0]['cover'] ;?>" class="card-img-top" alt="..."></a> 
                                     -->
                    </div> 
                </div> 
            </div> 
          </div>
          
    </div>

    <div id="news-img2" class="col-sm-12 col-md-12 col-lg-4 mt-5 "><!-- กล่องข้างๆ -->
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-12">
            <div class="box-img2">
                <a href="news.php?deptcode=<?php echo $deptcode ?>&news=<?php echo $data_newsmain1[0]['id'];?>">  <img src="<?php echo $path['news']. $data_newsmain1[0]['news_cover'] ;?>">   </a> 
            </div>   <!--/.container -->
        </div><!-- /.col-12 -->

        <div class="col-sm-12 col-md-6 col-lg-12 mt-3">
            <div class="box-img2">
                <a href="#"> <img src="<?php echo $path['news']. $data_newsmain1[1]['news_cover'] ;?>">   </a> 
            </div>   <!--/.container -->
        </div><!-- /.col-12 -->
    </div><!-- /.row col-4 -->
    </div><!-- /.col-4 กล่องข้างๆ-->
    
    </div><!-- /.container -->
</section><!-- /.รูปบน -->


<!-- /////////////////////// /.รูป ข้างบน และข้างๆ ////////////////////// -->  
  <section>
      <div class="container"> 
      
        <div class="row mt-3">
            <div id="column-slide" class="col-lg-4">
            <a href="news.php?deptcode=<?php echo $deptcode ?>&news=<?php echo $data_newsmain1[2]['id'];?>">   
         
            <img src="<?php echo $path['news']. $data_newsmain1[2]['news_cover'] ;?>"  style="width:100%">
            
            </a>
              <!-- <img src="<?php $pathf;?>/img/pexels-photo-207381.png" alt="Snow" style="width:100%"> -->
            </div>

            <div id="column-slide" class="col-lg-4">
            <a href="news.php?deptcode=<?php echo $deptcode ?>&news=<?php echo $data_newsmain1[3]['id'];?>">   
         
            <img src="<?php echo $path['news']. $data_newsmain1[3]['news_cover'] ;?>"  style="width:100%"> 
                                </a>
              <!-- <img src="<?php $pathf;?>/img/pexels-photo-207381.png" alt="Forest" style="width:100%"> -->
            </div>
            <div id="column-slide" class="col-lg-4">
            <a href="news.php?deptcode=<?php echo $deptcode ?>&news=<?php echo $data_newsmain1[4]['id'];?>">   
         
            <img src="<?php echo $path['news']. $data_newsmain1[4]['news_cover'] ;?>"  style="width:100%"> 
                                </a>
              <!-- <img src="<?php $pathf;?>/img/pexels-photo-207381.png" alt="Mountains" style="width:100%"> -->
            </div>
          </div>
    </div>
  </section>

 
<!-- ############################################################################################ -->
<section id="system">
      <div class="container mt-4">
        <?php 
          $datasetting =$clscont->Load('setting_bannertype',array('deleted'=>0,'enable'=>'Y'),'ORDERBY DESC','');
        
          if($datasetting){ 

            foreach( $datasetting as $keyb1 => $valb1 ){
            ?>
              <div class="row justify-content-md-center">
                <div class="col-md-auto ">
                  <div class="box-title text-center ">
                    <?php echo $valb1['bannertypename_'.$_SESSION['LANGCODE']];?>
                  </div>
                </div>
              </div>

              <div class="row my-5">
            <?php 

                $datasetting2 =$clscont->Load('setting_banner',array('setting_bannertype_id'=> $valb1['id'],'deleted'=>0,'enable'=>'Y'),'ORDERBY DESC','');
                if($datasetting2){
                  foreach( $datasetting2 as $keyb2 => $valb2){
                    ?>
                     
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
                          <a href="<?php echo $valb2['pathlink'];?>">
                            <div class="box-system">
                              <div class="box-img">
                                <img src="<?php $pathf;?>/<?php echo $valb2['pathpic'];?>" alt="">
                              </div> 
                              <p class="">   <?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?> </p>
                            </div> 
                          </a>
                        </div>
                    <?php
                  }
                }
            }
        ?>
          </div>
       
          <?php } ?>
  
      </div><!-- /.container -->
    </section> <!-- /.system -->
<!-- ############################################################################################ -->


<section>
    <div class="container">
    <div class="row my-5">

        <div  class="col-lg-6">
            <div id="image-left" class="row"> 
              <img src="<?php $pathf;?>/img/pexels-photo-1282308-left.png">
          </div>
       </div> <!-- col-lg-6 -->



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
          </div>  <!-- close id="relation" -->


          
          <div id="media" class="container tab-pane fade"><br>
            <div  class="row">
                <div  class="col-lg-2 mt-2">
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
            
          </div> <!-- close id="media" -->
         
      </div> <!-- close class="tab-content" -->
  </div> <!-- close row  -->
   
        </div> <!-- close col-lg-6 -->
  
    </div> <!-- row my-5-->
    </div> <!-- container-->
</section>
<!-- //////////// -->

<section>
    <div class="container">
        
      <div class="row">
        <div class="col-6">
                <h3>คลังความรู้</h3> 
                
        </div>

        <div  class="col-6">
            <a id="list-viewAll" href="#" >ดูทั้งหมด</a>   
    </div>
  </div>

        <div class="row mb-5">

                <div class="col-sm-12 col-md-12 col-lg-4"> 
                        <div class="card">
                                <div class="box-img-main mt-2">                     
                                      <img src="<?php $pathf;?>/img/pexels-photo-1282308.png" class="card-img-top" alt="...">
                                </div> <!-- /.box-img-main -->
                                      <div class="card-body">
                                        <h5 class="card-title mb-2">หัวข้อข่าวสารต่างๆ </h5>
                                        <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ 
                                            มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์ม </p>
                                        <div class="footer-detail mb-5">
                                          <div class="time">
                                              <i class="fa fa-calendar" aria-hidden="true">
                                                <span class="ml-1">Jul/15/2018 </span>
                                              </i>
                                          </div>
                                          <div class="view">
                                              <i class="fa fa-eye ml-2" aria-hidden="true">
                                                  <span class="ml-1">15 view</span>
                                              </i>
                                          </div>
                                          <div class="see-more">
                                            <span class="mr-1">อ่านต่อ</span>
                                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                          </div>
                                        </div> <!-- /.footer-detai -->
                              </div> <!-- /.card-body -->
                            </div><!-- /.card -->  
                        </div> <!-- close class="col-sm-12 col-md-12 col-lg-4"  -->  

                        <div class="col-sm-12 col-md-12 col-lg-4"> 
                                <div class="card">
                                        <div class="box-img-main mt-2">                     
                                              <img src="<?php $pathf;?>/img/pexels-photo-1282308.png" class="card-img-top" alt="...">
                                        </div> <!-- /.box-img-main -->
                                              <div class="card-body">
                                                <h5 class="card-title mb-2">หัวข้อข่าวสารต่างๆ </h5>
                                                <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ 
                                                    มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์ม </p>
                                                <div class="footer-detail mb-5">
                                                  <div class="time">
                                                      <i class="fa fa-calendar" aria-hidden="true">
                                                        <span class="ml-1">Jul/15/2018 </span>
                                                      </i>
                                                  </div>
                                                  <div class="view">
                                                      <i class="fa fa-eye ml-2" aria-hidden="true">
                                                          <span class="ml-1">15 view</span>
                                                      </i>
                                                  </div>
                                                  <div class="see-more">
                                                    <span class="mr-1">อ่านต่อ</span>
                                                    <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                                  </div>
                                                </div> <!-- /.footer-detai -->
                                      </div> <!-- /.card-body -->
                                    </div><!-- /.card -->  
                                </div> <!-- close class="col-sm-12 col-md-12 col-lg-4"  -->  


                                <div class="col-sm-12 col-md-12 col-lg-4"> 
                                        <div class="card">
                                                <div class="box-img-main mt-2">                     
                                                      <img src="<?php $pathf;?>/img/pexels-photo-1282308.png" class="card-img-top" alt="...">
                                                </div> <!-- /.box-img-main -->
                                                      <div class="card-body">
                                                        <h5 class="card-title mb-2">หัวข้อข่าวสารต่างๆ </h5>
                                                        <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ 
                                                            มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์ม </p>
                                                        <div class="footer-detail mb-5">
                                                          <div class="time">
                                                              <i class="fa fa-calendar" aria-hidden="true">
                                                                <span class="ml-1">Jul/15/2018 </span>
                                                              </i>
                                                          </div>
                                                          <div class="view">
                                                              <i class="fa fa-eye ml-2" aria-hidden="true">
                                                                  <span class="ml-1">15 view</span>
                                                              </i>
                                                          </div>
                                                          <div class="see-more">
                                                            <span class="mr-1">อ่านต่อ</span>
                                                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                                          </div>
                                                        </div> <!-- /.footer-detai -->
                                              </div> <!-- /.card-body -->
                                            </div><!-- /.card -->  
                                        </div> <!-- close class="col-sm-12 col-md-12 col-lg-4"  -->  

                                        
                                <div class="col-sm-12 col-md-12 col-lg-4"> 
                                    <div class="card">
                                            <div class="box-img-main mt-2">                     
                                                  <img src="<?php $pathf;?>/img/pexels-photo-1282308.png" class="card-img-top" alt="...">
                                            </div> <!-- /.box-img-main -->
                                                  <div class="card-body">
                                                    <h5 class="card-title mb-2">หัวข้อข่าวสารต่างๆ </h5>
                                                    <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ 
                                                        มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์ม </p>
                                                    <div class="footer-detail mb-5">
                                                      <div class="time">
                                                          <i class="fa fa-calendar" aria-hidden="true">
                                                            <span class="ml-1">Jul/15/2018 </span>
                                                          </i>
                                                      </div>
                                                      <div class="view">
                                                          <i class="fa fa-eye ml-2" aria-hidden="true">
                                                              <span class="ml-1">15 view</span>
                                                          </i>
                                                      </div>
                                                      <div class="see-more">
                                                        <span class="mr-1">อ่านต่อ</span>
                                                        <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                                      </div>
                                                    </div> <!-- /.footer-detai -->
                                          </div> <!-- /.card-body -->
                                        </div><!-- /.card -->  
                                    </div> <!-- close class="col-sm-12 col-md-12 col-lg-4"  -->  


                                        

                                    <div class="col-sm-12 col-md-12 col-lg-4"> 
                                        <div class="card">
                                                <div class="box-img-main mt-2">                     
                                                      <img src="<?php $pathf;?>/img/pexels-photo-1282308.png" class="card-img-top" alt="...">
                                                </div> <!-- /.box-img-main -->
                                                      <div class="card-body">
                                                        <h5 class="card-title mb-2">หัวข้อข่าวสารต่างๆ </h5>
                                                        <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ 
                                                            มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์ม </p>
                                                        <div class="footer-detail mb-5">
                                                          <div class="time">
                                                              <i class="fa fa-calendar" aria-hidden="true">
                                                                <span class="ml-1">Jul/15/2018 </span>
                                                              </i>
                                                          </div>
                                                          <div class="view">
                                                              <i class="fa fa-eye ml-2" aria-hidden="true">
                                                                  <span class="ml-1">15 view</span>
                                                              </i>
                                                          </div>
                                                          <div class="see-more">
                                                            <span class="mr-1">อ่านต่อ</span>
                                                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                                          </div>
                                                        </div> <!-- /.footer-detai -->
                                              </div> <!-- /.card-body -->
                                            </div><!-- /.card -->  
                                        </div> <!-- close class="col-sm-12 col-md-12 col-lg-4"  -->  


                                        
                                <div class="col-sm-12 col-md-12 col-lg-4"> 
                                    <div class="card">
                                            <div class="box-img-main mt-2">                     
                                                  <img src="<?php $pathf;?>/img/pexels-photo-1282308.png" class="card-img-top" alt="...">
                                            </div> <!-- /.box-img-main -->
                                                  <div class="card-body">
                                                    <h5 class="card-title mb-2">หัวข้อข่าวสารต่างๆ </h5>
                                                    <p>Lorem Ipsum คือ เนื้อหาจำลองแบบเรียบๆ ที่ใช้กันในธุรกิจงานพิมพ์หรืองานเรียงพิมพ์ 
                                                        มันได้กลายมาเป็นเนื้อหาจำลองมาตรฐานของธุรกิจดังกล่าวมาตั้งแต่ศตวรรษที่ 16 เมื่อเครื่องพิมพ์โนเนมเครื่องหนึ่งนำรางตัวพิมพ์ม </p>
                                                    <div class="footer-detail mb-5">
                                                      <div class="time">
                                                          <i class="fa fa-calendar" aria-hidden="true">
                                                            <span class="ml-1">Jul/15/2018 </span>
                                                          </i>
                                                      </div>
                                                      <div class="view">
                                                          <i class="fa fa-eye ml-2" aria-hidden="true">
                                                              <span class="ml-1">15 view</span>
                                                          </i>
                                                      </div>
                                                      <div class="see-more">
                                                        <span class="mr-1">อ่านต่อ</span>
                                                        <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                                      </div>
                                                    </div> <!-- /.footer-detai -->
                                          </div> <!-- /.card-body -->
                                        </div><!-- /.card -->  
                                    </div> <!-- close class="col-sm-12 col-md-12 col-lg-4"  -->  




    
        </div> <!-- close row -->
    </div> <!-- class="container"-->
</section>

