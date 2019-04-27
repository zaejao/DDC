

<?php 

$data_footer['about'] =$clscont->LoadOnce('menumain',array('id'=>2));//About
$data_footer['about']['menu'] =$clscont->Load('menumain',array('menumain_id'=>2,'enable'=>'Y','deleted'=>0),'orderby desc','');//About

$data_footer['news'] =$clscont->LoadOnce('menumain',array('id'=>5));//News
$data_footer['news']['menu'] =$clscont->Load('menumain',array('menumain_id'=>5,'enable'=>'Y','deleted'=>0),'orderby desc','');//About

//echo "<pre>".print_r($data_footer,true)."</pre>";

?>
  <section id="footer">
      <div class="container">
        <div class="row name">
          <div class="name col-6 col-sm-6 col-md-3 col-lg-2 mt-5">
            <h5 class="lang_diseasegroup">กลุ่มโรค</h5>
              <nav class="name nav flex-column">
                  <a class="name nav-link p-0 lang_disease" href="disease.php">รายชื่อโรค</a>
                  <a class="name nav-link p-0 lang_diseaseplace"  href="disease.php">โรคกับสถานที่</a>
                  <a class="name nav-link p-0 lang_diseasegroup"  href="disease.php">กลุ่มโรค</a>
                  <a class="name nav-link p-0 lang_mediapublic"  href="#">สื่อเผยแพร่</a>
              </nav>
          </div>

          <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-5 ">
                <h5> <?php echo $data_footer['news']['menumain_name_'.$_SESSION["LANGCODE"]];?></h5>
                <nav class="nav flex-column">
                  <?php 
                  if($data_footer['news']['menu']){
                    foreach (  $data_footer['news']['menu'] as $key => $val1) {
                      ?>
                       <a class="nav-link p-0 " href="<?php echo $val1['menumain_otherlink'];?>"><?php echo $val1['menumain_name_'.$_SESSION["LANGCODE"]];?></a>
                      <?php
                       }
                    } 
                  ?> 
                </nav>
            </div>

            <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-5">
                 <h5> <?php echo $data_footer['about']['menumain_name_'.$_SESSION["LANGCODE"]];?></h5>
                  <nav class="nav flex-column">
                    <?php 
                    if($data_footer['about']['menu']){
                      foreach (  $data_footer['about']['menu'] as $key => $val1) {
                        ?>
                        <a class="nav-link p-0 " href="<?php echo $val1['menumain_otherlink'];?>"><?php echo $val1['menumain_name_'.$_SESSION["LANGCODE"]];?></a>
                        <?php
                        }
                      } 
                    ?> 
                  </nav>
              </div>

              <div class="col-6 col-sm-6 col-md-3 col-lg-2 mt-5">
                  

                  <?php 
                      if($_SESSION['LANGCODE']=="th"){
                     ?>
                     <h5>รับเรื่องร้องเรียน</h5>
                    <nav class="nav flex-column">
                        <a class="nav-link p-0" href="#">สายด่วน 1422</a>
                  </nav>
                     <?php
                      }else{
                       ?>
                       <h5>Receive complaints </h5>
                    <nav class="nav flex-column">
                        <a class="nav-link p-0" href="#">Hot line 1422</a>
                  </nav>
                       <?php
                      }
                      ?>
              </div>                
        </div>
        <hr>
        <div class="row">
          <div class="col">
              <div class="row justify-content-between">
                  <div class="col-sm-12 col-md-6 col-lg-10 ">
                    <h5 class="lang_deptdisease">กรมควบคุมโรค</h5>
                    <span class="add float-left"> 
                      <p> <span class="lang_address">ที่อยู่ </span> 
                      : 
                      <span class="lang_addressdept">  88/21 ถนน ติวานนนท์ ตำบลตลาดขวัญ อำเภอเมือง จังหวัด นนทบุรี 11000 </span> 
                      
                     </p> </span>
                  </div>
                 

                  <div class="col-4 col-sm-12 col-md-6 col-lg-2 b-m-auto">
                    <div class="box-social">
                        <ul class="nav">
                            <li class="nav-item mr-3">
                              <a href="https://www.facebook.com/กรมควบคุมโรค-กระทรวงสาธารณสุข-470988516420706" target="_blank" title="Facebook" alt="Facebook">
                               <img src="<?php $pathf;?>/img/Facebook.png" alt=""> 
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="https://www.youtube.com/channel/UCbewflo59uOdLGFUh71DPiQ" target="_blank"  title="Youtube" alt="Youtube">
                                <img src="<?php $pathf;?>/img/Youtube.png" alt="">
                              </a>
                            </li> 
                          </ul>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div> 
    </section>

    <section id="footer-button">
      <div class="container">
          <div class="row justify-content-center pt-2">
              <div class="col-6 text-left">
                  <p> © <span class="lang_copyright2019"> สงวนลิขสิทธิ์ 2561 </span> :  <span class="lang_deptdisease">กรมควบคุมโรค</span> </p>
              </div>
              <div class="col-6 text-right">
                <a href="#" class="linkpink lang_websitepolicy">นโยบายเว็บไซต์</a>
              </div>
            </div>
      </div> 
    </section>
    
    <a href="javascript:" id="btn_totop"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>