<?php 
include "../duck.conf.php";
include $pathf."/prepare_html_en.php"; 

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
  $langcode = 'en';
?>
 

  <?php include $pathf."/prepare_css.php";?>

<body>
  <?php //echo $depttype;?>
  <?php include $pathf."/prepare_header_en.php";?>
  <!-- ############################################################################################################### -->
  <?php include $pathf."/prepare_bannermain_en.php";?>
 

  
 
  <section id="box_content">
      <div class="container">
        <div class="row">
          <div class="col-12 mt-4"> 
         
            <div class="row">
              <div class="col-12 mb-4"> 
                <span class="topic_text    "> Contact </span> 
              </div> 
            </div>
 

            <div class="row mt-4 pagecontact">
              <div class="col-md-6 col-sm-12 boxcont1 mb-3">  

                    <div class="row">
                        <div class="col-12 col-sm-3 m-auto text-center">  <img class="imglogo" src="<?php echo $path['others']; ?>logo_web.png"> </div>
                        <div class="col-12 col-sm-9 mt-1  text-center">
                          <div class="text4 "> <span class=""> Department of disease control </span> </div>
                          <div> 
                            <span class=""> Address </span> :  
                            <span class="" >   88/21 Tiwanon Road. Thaladkwan, Muang, Nonthaburee 11000 </span> 
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                         <div class="col-md-12 col-xl-6"> 
                          <div class="row">
                            <div class="col-3 m-auto text-right">
                              <img class="" src="<?php echo $path['others']; ?>tel.jpg">
                            </div> 
                            <div class="col-9 m-auto">
                              <span class=""> Hotline </span>: <b>1422</b>
                              <br>
                              <span class="">Tel </span>: 02-5903000 
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 col-xl-6"> 
                          <div class="row">
                            <div class="col-3 m-auto text-right">
                              <img class="" src="<?php echo $path['others']; ?>fax.jpg">
                            </div> 
                            <div class="col-9 m-auto ">
                              <span class="lang_fax">Fax </span> : 02-5903000  
                            </div>
                          </div> 
                        </div>
                      </div>

                      
              </div>
              <div class="col-md-6 col-sm-12 boxcont2"> 
                <div class="maparea_gp">  
                  <img class="img-fluid img_contact" src="<?php echo $path['others']; ?>map.jpg">   
                </div>  
                <div   class=" maparea_gg hide">  
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3873.7601822101387!2d100.5249533153476!3d13.853428898661454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b5fc50be2fd%3A0xfcbdc03279eb9bdf!2z4LiB4Lij4Lih4LiE4Lin4Lia4LiE4Li44Lih4LmC4Lij4LiEIOC4geC4o-C4sOC4l-C4o-C4p-C4h-C4quC4suC4mOC4suC4o-C4k-C4quC4uOC4gg!5e0!3m2!1sth!2sth!4v1555581022285!5m2!1sth!2sth" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe> 
                </div> 
                <button class="btn btnmap btn_green " >
                  <span class="fa fa-map-o"></span>     <span class=""> Graphic Map  </span>
                </button>  
                <button  class="btn btnmap btn_green btn_greendrf ">
                  <span class="fa fa-location-arrow"></span>  <span class="lang_googlemap">  Google Map </span>
                </button> 
                 
              </div>
              <div class="col-md-6 col-sm-12 boxcont3"> 
                
                <div class="row">
                  <div class="col-6 col-md-3">  <img class="img-fluid" src="<?php echo $path['others']; ?>logo_web.png"> </div>
                  <div class="col-6 col-md-9">
                    <div class="text4"> <span class="">  Department of disease control  </span> </div>
                    <div> 
                    <span class=""> Address </span> :  
                            <span class="" >   88/21 Tiwanon Road. Thaladkwan, Muang, Nonthaburee 11000 </span> 
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12 col-xl-6"> 
                    <div class="row">
                      <div class="col-3 m-auto text-right">
                        <img class="" src="<?php echo $path['others']; ?>tel.jpg">
                      </div> 
                      <div class="col-9 m-auto">
                        <span class=""> Hotline </span>: <b>1422</b>
                        <br>
                        <span class="">Tel </span>: 02-5903000 
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-xl-6"> 
                    <div class="row">
                      <div class="col-3 m-auto text-right">
                        <img class="" src="<?php echo $path['others']; ?>fax.jpg">
                      </div> 
                      <div class="col-9 m-auto ">
                        <span class="">Fax </span> : 02-5903000  
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>  
        


          </div>
        </div>
      </div>
    </section>  <!--/ section#box_content -->


   <!-- ############################################################################################################### -->

    <?php include $pathf."/prepare_footer_en.php";?>
    <?php include $pathf."/prepare_script_en.php";?>
 <script>

      $( document ).ready(function() {
        
        $(".btnmap").click(function() {
            

            if( $( this ).hasClass("btn_greendrf")==true ){
              $('.btnmap').addClass("btn_greendrf");
              $( this ).removeClass("btn_greendrf") ;

              if(   $(".maparea_gg").hasClass('hide')  ==true ){
                $(".maparea_gp").addClass('hide') ; 
                $(".maparea_gg").removeClass('hide') ; 
              }else{
                $(".maparea_gp").removeClass('hide') ; 
                $(".maparea_gg").addClass('hide') ; 
              }
 
            }
        }); 
      });
    </script>  

    
  </body>
</html>



         
       