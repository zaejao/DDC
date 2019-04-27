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

  $clsdept = new DeptClass();
  $clscont = new ContentsClass();



  $data_slidemain = $clscont->Load('news_old',array('NW_menu' => 'mbanner','NW_active'=>'1','NW_home'=>'1' ),' NW_date DESC ','');
 // $data_slidemain = $clscont->Load('news_mapping',array('main' => 1, 'menu' => 'mbanner','home'=>'1' ,'enable_th'=>'Y' ),' datetime DESC ','');
  $data_newsmain = $clscont->Load('news_mapping',array('main' => 1 ,'home'=>'1' ,'enable_th'=>'Y' ),' datetime DESC ','');

  
 
  
  
  $data_setting['slide_head1'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'slide_head1' , 'department_code_ch'=>"DEPT" ));
  $data_setting['slide_head2'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'slide_head2' , 'department_code_ch'=>"DEPT" ));
  $data_setting['news_auctions'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'news_auctions' , 'department_code_ch'=>"DEPT" ));
  $data_setting['system_similar'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'system_similar' , 'department_code_ch'=>"DEPT" ));
  $data_setting['bannerlink'] = $clscont->LoadOnce('setting_home',array( 'sectionname'=>'bannerlink' , 'department_code_ch'=>"DEPT" ));



?>



 
<body>
  <?php include "prepare_header.php";?>
  <!-- ############################################################################################################### -->

    <?php if($data_setting['slide_head1']['enable']=="Y" ){ ?>
     
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
  <?php } ?>


  
   
  <?php 
    if($data_setting['news_auctions']['enable']=="Y" ){ 
  ?> 
    <section id="news-content" class="my-5 ">
      <div class="container pb-4">
        <?php 
          if($data_setting['news_auctions']['sectionname_'.$_SESSION['LANGCODE']]) {
        ?>
        <div class="row">
          <div class="col-md-auto mt-4 mb-4 ">
            <div class="box-title text-left topic_text   "> 
              <?php echo $data_setting['news_auctions']['sectionname_'.$_SESSION['LANGCODE']];?>
            </div>
          </div>
        </div>
          <?php } ?>

        <div class="row pt-4">
          <div class="col-12">
            <div class="row"> 
              <ul id="nav_newshome" class="nav nav-tabs m-auto" role="tablist">
              </ul>
              <div class="tab-content  w-100 news_main_content" id="news_main_home">
              </div> 
            </div> 
          </div>
        </div> 
     </div><!-- /.container -->
    </section><!-- /.news-content -->
    <?php } ?>



  <?php 
    if($data_setting['system_similar']['enable']=="Y" ){ 
  ?>  
    <section id="system">
      <div class="container">
         
              <div class="row justify-content-md-center">
                <div class="col-md-auto ">
                  <div class="box-title text-center ">
                    <?php echo $valb1['bannertypename_'.$_SESSION['LANGCODE']];?>
                    <?php echo $data_setting['system_similar']['sectionname_'.$_SESSION['LANGCODE']];?>
                  </div>
                </div>
              </div>

              <div class="row my-5">
            <?php 

                $datasetting2 =$clscont->Load('setting_banner',array('deleted'=>0,'enable'=>'Y'),'ORDERBY DESC','');
                if($datasetting2){
                  foreach( $datasetting2 as $keyb2 => $valb2){
                    ?>
                     
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-3">
                          <a href="<?php echo $valb2['pathlink'];?>"  alt="<?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?>"  title="<?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?>" target="_blank">
                            <div class="box-system">
                              <div class="box-img">
                                <img src="<?php echo $path['bannerlink'].$valb2['pathpic'];?>" alt="<?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?>"  title="<?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?>">
                              </div> 
                              <p class=""> <?php echo $valb2['bannername_'.$_SESSION['LANGCODE']];?> </p>
                            </div> 
                          </a>
                        </div>
                    <?php
                  }
                }
            
        ?>
          </div>
      </div><!-- /.container -->
    </section> <!-- /.system -->

  <?php } ?>


  <?php 
    if($data_setting['bannerlink']['enable']=="Y" ){ 
      $data_bannerlink = $clscont->Load('banners',array('enable'=>'Y','deleted'=>0 ,'department_code_ch'=>"DEPT" ),' orderby DESC ','');

  ?> 
    <section id="bannerlink">
      <div class="container mb-5">
        
        <div class="row">
          <div class="col-md-auto mt-2 mb-4 ">
            <div class="box-title text-left topic_text   "> 
              <?php echo $data_setting['bannerlink']['sectionname_'.$_SESSION['LANGCODE']];?>
            </div>
          </div>
        </div>
        

       
        <div class="row mt-3 ">
          <?php 
            for ($i=0;$i<=10;$i++){ 
          ?>
          <div class="   mt-3 mx-3 box_bannerlink" >
            <a href="<?php echo $valb2['pathlink'];?>">
             
                <div class="box-img text-center align-middle">
                  <img src="<?php echo $path['bannerlink'];?>logo_ministry.png"  class="img_bannerlink" alt="">
                </div> 
            
            </a>
          </div>
          <?php 
           }
          ?>
        </div> 
        

        <!--
        <?php 
        if( $data_bannerlink){
        ?>
        <div class="row">
            <div id="slider-1" class="carousel carousel-by-item slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <?php 
                      foreach ( $data_bannerlink as $key_bl => $val_bl){ 
                        $active = "";
                        if($key_bl==0){
                          $active = "active";
                        }
                    ?>
                    <div class="carousel-item <?php echo $active ;?>">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-4 box_bannerlink1">
                          <div class="mx-2 box_bannerlink" >
                            <a href="<?php echo $val_bl['pathlink'];?>" target="_blank" title="<?php echo $val_bl['bannername_'.$_SESSION['LANGCODE']];?>" alt="<?php echo $val_bl['bannername_'.$_SESSION['LANGCODE']];?>">
                             <img class="d-block img-fluid img_bannerlink" src="<?php echo $path['bannerlink'].$val_bl['pathpic'];?>" alt="<?php echo $val_bl['bannername_'.$_SESSION['LANGCODE']];?>" >
                            </a>
                          </div>
                        </div>
                    </div>
                     <?php 
                      }
                      ?> 
                </div>
                <a class="carousel-control-prev" href="#slider-1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#slider-1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div> 
        <?php } ?>
                    -->

      </div> 
    </section> <!-- /.bannerlink -->
    <?php } ?>



 
   
    <!-- ############################################################################################################### -->
    <style type="text/css" id="slider-css"></style>
    <?php include "prepare_footer.php";?>
    <?php include "prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
 
      $( document ).ready(function() {
      //  contents.LoadSlideImageHome();
        contents.LoadSettingHomeNewsAuction();


       

      }); 

     

    </script>  
  </body>
</html>


<script>
function GetUnique(e) {
    var l = [],
        s = temp_c = [],
        t = ["col-md-1", "col-md-2", "col-md-3", "col-md-4", "col-md-6", "col-md-12", "col-sm-1", "col-sm-2", "col-sm-3", "col-sm-4", "col-sm-6", "col-sm-12", "col-lg-1", "col-lg-2", "col-lg-3", "col-lg-4", "col-lg-6", "col-lg-12", "col-xs-1", "col-xs-2", "col-xs-3", "col-xs-4", "col-xs-6", "col-xs-12", "col-xl-1", "col-xl-2", "col-xl-3", "col-xl-4", "col-xl-6", "col-xl-12"];
    $(e).each(function() {
        for (var l = $(e + " > div").attr("class").split(/\s+/), t = 0; t < l.length; t++) s.push(l[t])
    });
    for (var c = 0; c < s.length; c++) temp_c = s[c].split("-"), 2 == temp_c.length && (temp_c.push(""), temp_c[2] = temp_c[1], temp_c[1] = "xs", s[c] = temp_c.join("-")), -1 == $.inArray(s[c], l) && $.inArray(s[c], t) && l.push(s[c]);
    return l
}

function setcss(e, l, s) {
    for (var t = ["", "", "", "", "", ""], c = d = f = g = 0, r = [1200, 992, 768, 567, 0], o = [], a = 0; a < e.length; a++) {
        var i = e[a].split("-");
        if (3 == i.length) {
            switch (i[1]) {
                case "xl":
                    d = 0;
                    break;
                case "lg":
                    d = 1;
                    break;
                case "md":
                    d = 2;
                    break;
                case "sm":
                    d = 3;
                    break;
                case "xs":
                    d = 4
            }
            t[d] = i[2]
        }
    }
    for (var n = 0; n < t.length; n++)
        if ("" !== t[n]) {
            if (0 === c && (c = 12 / t[n]), f = 12 / t[n], g = 100 / f, a = s + " > .carousel-item.active.carousel-item-right," + s + " > .carousel-item.carousel-item-next {-webkit-transform: translate3d(" + g + "%, 0, 0);transform: translate3d(" + g + ", 0, 0);left: 0;}" + s + " > .carousel-item.active.carousel-item-left," + s + " > .carousel-item.carousel-item-prev {-webkit-transform: translate3d(-" + g + "%, 0, 0);transform: translate3d(-" + g + "%, 0, 0);left: 0;}" + s + " > .carousel-item.carousel-item-left, " + s + " > .carousel-item.carousel-item-prev.carousel-item-right, " + s + " > .carousel-item.active {-webkit-transform: translate3d(0, 0, 0);transform: translate3d(0, 0, 0);left: 0;}", f > 1) {
                for (k = 0; k < f - 1; k++) o.push(l + " .cloneditem-" + k);
                o.length && (a = a + o.join(",") + "{display: block;}"), o = []
            }
            0 !== r[n] && (a = "@media all and (min-width: " + r[n] + "px) and (transform-3d), all and (min-width:" + r[n] + "px) and (-webkit-transform-3d) {" + a + "}"), $("#slider-css").prepend(a)
        } $(l).each(function() {
        for (var e = $(this), l = 0; l < c - 1; l++)(e = e.next()).length || (e = $(this).siblings(":first")), e.children(":first-child").clone().addClass("cloneditem-" + l).appendTo($(this))
    })
}

//Use Different Slider IDs for multiple slider
$(document).ready(function() {
    var item = '#slider-1 .carousel-item';
    var item_inner = "#slider-1 .carousel-inner";
    classes = GetUnique(item);
    setcss(classes, item, item_inner);


    var item_1 = '#slider-2 .carousel-item';
    var item_inner_1 = "#slider-2 .carousel-inner";
    classes = GetUnique(item_1);
    setcss(classes, item_1, item_inner_1);
});
</script>

<style>
    @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    /*================================================*/
    @import url('https://fonts.googleapis.com/css?family=Roboto');
    .carousel-item > div {
      float: left;
    }
    .carousel-by-item [class*="cloneditem-"] {
      display: none;
    }
    .carousel-inner{
      height:  150px;
    }
    </style>