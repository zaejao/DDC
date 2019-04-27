  
  
  <!--
    <section  >
        <div class="container"> 
            <div class="row">
                    <div class="col-12 mt-4 p-0">
                        <div class="row">
                            <div class="col-6 col-lg-8">
                                <nav class="navbar navbar-expand-lg navbar-light pl-0 mt-3">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon "></span>
                                    </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item <?php if($navsub=='home'){ echo 'active' ;}?>">
                                            <a class="nav-link text-left" href="home1.php">หน้าหลัก <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item <?php if($navsub=='about'){ echo 'active' ;}?>">
                                            <a class="nav-link text-left" href="#">เกี่ยวกับสำนัก</a>
                                        </li>
                                        <li class="nav-item <?php if($navsub=='publish'){ echo 'active' ;}?>">
                                            <a class="nav-link text-left" href="#">สื่อเผยแพร่</a>
                                        </li>
                                        <li class="nav-item <?php if($navsub=='news'){ echo 'active' ;}?>">
                                            <a class="nav-link" href="news1.php">ข่าวสาร</a>
                                        </li>
                                        <li class="nav-item <?php if($navsub=='auction'){ echo 'active' ;}?>">
                                            <a class="nav-link " href="#">ข่าวจัดซื้อจัดจ้าง</a>
                                        </li>
                                    </ul>
                                </div>
                                </nav>
                            </div>
                            <div class="col-6 col-lg-4">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" placeholder="ค้นหาภายในสำนักงาน">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </section>
    -->
<?php 

$menusub1 = $clsdept->LoadMenusubByDeptcode($deptcode,array('ms.menusub_level'=>1)); 
  
$menusub3 = $clsdept->LoadMenusubByDeptcode($deptcode,array('ms.menusub_level'=>3));   
?>
<?php  // echo "<pre>".print_r( $menusub2 ,true)."</pre>";?>
    
<section id="box_navdept">
    <div class="container">  
        <div class="row">
                <div class="col-12 p-0">
                    <div class="row m-auto">
                        <div  class="col-4  col-sm-6 col-lg-8">
                            <nav class="navbar navbar-expand-lg navbar-light pl-0">

                              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                  <span class="navbar-toggler-icon "></span>
                              </button>

                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">

                                    <?php 
                                    if($menusub1){  
                                        foreach( $menusub1  as $key1 => $val1){
                                            $menusub2 = $clsdept->LoadMenusubByDeptcode($deptcode,array('ms.menusub_level'=>2,'ms.menusub_id'=>$val1['id'] ));

                                            

                                            $active="";
                                            if($menucode1 == $val1['menusub_code']){
                                                $active = "active";
                                            }
                                            $dd="";
                                            $ddt="";
                                            if($menusub2){
                                                $dd="dropdown";
                                                $ddt="dropdown-toggle";
                                            ?>
                                                <li class="nav-item dropdown <?php echo $active;?>">
                                                    <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="<?php echo $val1['menusub_otherlink'] ;?>"> <?php echo $val1['menusub_name_'.$_SESSION['LANGCODE']] ;?> </a>
                                                    <div class="dropdown-menu bg-white-custom">
                                                        <ul class="listsub">
                                                        <?php  
                                                            foreach( $menusub2  as $key2 => $val2){
                                                                $menusub3 = $clsdept->LoadMenusubByDeptcode($deptcode,array('ms.menusub_level'=>3,'ms.menusub_id'=>$val2['id'] ));
                                                                if( $menusub3){
                                                                ?>
                                                                 <li class="dropdown">
                                                                    <a class="" href="<?php echo $val2['menusub_otherlink'] ;?>" > <?php echo $val2['menusub_name_'.$_SESSION['LANGCODE']] ;?> 
                                                                    <span class="arrow">
                                                                    <i class="fa fa-chevron-right"></i>
                                                                    </span>
                                                                    </a>
                                                                    <div class="dropdown-menu bg-white-custom">
                                                                    <ul class="listsub listsub2 ">
                                                                        <?php
                                                                            foreach( $menusub3  as $key3 => $val3){
                                                                        ?>
                                                                        <li> <a class="" href="<?php echo $val3['menusub_otherlink'] ;?>">  <?php echo $val3['menusub_name_'.$_SESSION['LANGCODE']] ;?>  </a> </li> 
                                                                         <?php } ?>
                                                                    </ul>
                                                                    </div>
                                                                </li>

                                                                <?php
                                                                }else{
                                                        ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link " href="<?php echo $val2['menusub_otherlink'] ;?>"><?php echo $val2['menusub_name_'.$_SESSION['LANGCODE']] ;?></a>
                                                                </li>
                                                        <?php 
                                                                } // else  $menusub3
                                                            }  // foreach menusub2
                                                        ?>

                                                        </ul>
                                                    </div>
                                                </li> 
                                            <?php 
                                            }else{ 
                                    ?>
                                            <li class="nav-item <?php echo $active;?>">
                                                <a class="nav-link " href="<?php echo $val1['menusub_otherlink'] ;?>"> <?php echo $val1['menusub_name_th'] ;?></a>
                                            </li>
                                    <?php
                                            }// else menusub2
                                        }// foreach menusub1
                                    }// if menusub1
                                    ?>
                                     <!-- 
                                    <li class="nav-item active">
                                        <a class="nav-link text-left" href="#">หน้าหลัก <span class="sr-only">(current)</span></a>
                                    </li>
                                   
                                                                       
                                    <li class="nav-item">
                                        <a class="nav-link " href="#">เกี่ยวกับสำนัก</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#">ข่าวจัดซื้อจัดจ้าง</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#">ข่าวสาร</a>
                                    </li>

                                    <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#"> สื่อเผยแพร่ </a>
                                      <div class="dropdown-menu bg-white-custom">
                                        <ul class="listsub">

                                          <li class="dropdown">
                                            <a class="" href="#" > xx 
                                              <span class="arrow">
                                              <i class="fa fa-chevron-right"></i>
                                              </span>
                                            </a>
                                            <div class="dropdown-menu bg-white-custom">
                                              <ul class="listsub listsub2 ">
                                                 <li>  <a class="" href="#">   ss </a> </li>
                                                 <li>  <a class="" href="#">   ออ </a> </li>
                                              </ul>
                                            </div>
                                          </li>

                                        </ul>
                                      </div>
                                    </li> 
                                     -->
                              
                                </ul>
                            </div>
                            </nav>
                        </div>
                        <div class="col-8 col-sm-6 col-lg-4 boxsearch_mb">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="ค้นหาภายในสำนักงาน">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
  </section>

  <!-- <section id="box_navdept">
    <div class="container">  
        <div class="row">
                <div class="col-12 p-0">
                    <div class="row m-auto">
                        <div  class="col-4  col-sm-6 col-lg-8">
                            <nav class="navbar navbar-expand-lg navbar-light pl-0">

                              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                  <span class="navbar-toggler-icon "></span>
                              </button>

                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link text-left" href="#">หน้าหลัก <span class="sr-only">(current)</span></a>
                                    </li>
                                   
                                    
                                    <li class="nav-item">
                                        <a class="nav-link " href="#">เกี่ยวกับสำนัก</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#">ข่าวจัดซื้อจัดจ้าง</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="#">ข่าวสาร</a>
                                    </li>

                                    <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#"> สื่อเผยแพร่ </a>
                                      <div class="dropdown-menu bg-white-custom">
                                        <ul class="listsub">

                                          <li class="dropdown">
                                            <a class="" href="#" > xx 
                                              <span class="arrow">
                                              <i class="fa fa-chevron-right"></i>
                                              </span>
                                            </a>
                                            <div class="dropdown-menu bg-white-custom">
                                              <ul class="listsub listsub2 ">
                                                 <li>  <a class="" href="#">   ss </a> </li>
                                                 <li>  <a class="" href="#">   ออ </a> </li>
                                              </ul>
                                            </div>
                                          </li>

                                        </ul>
                                      </div>
                                    </li> 
                              
                                </ul>
                            </div>
                            </nav>
                        </div>
                        <div class="col-8 col-sm-6 col-lg-4 boxsearch_mb">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="ค้นหาภายในสำนักงาน">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
  </section> -->

<!--
  
    <section style="background-color: #ffeaf1;">
        <div class="container py-5">
            <div class="row">
                <div class="col3">
                    <div class="box_navside" style="background-color:#FFF;">
                        <div class=" boxsearch_mb">
                            <div class="form-group has-search">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="ค้นหาภายในสำนักงาน">
                            </div>
                        </div>
 
 
                                <ul class="nav flex-column">

                                    <?php 
                                    if($menusub1){  
                                        foreach( $menusub1  as $key1 => $val1){
                                            $menusub2 = $clsdept->LoadMenusubByDeptcode($deptcode,array('ms.menusub_level'=>2,'ms.menusub_id'=>$val1['id'] ));

                                            $active="";
                                            if($menucode1 == $val1['menusub_code']){
                                                $active = "active";
                                            }
                                            $dd="";
                                            $ddt="";
                                            if($menusub2){
                                                $dd="dropdown";
                                                $ddt="dropdown-toggle";
                                            ?>
                                                <li class="nav-item dropdown <?php echo $active;?>">
                                                    <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="<?php echo $val1['menusub_otherlink'] ;?>"> <?php echo $val1['menusub_name_'.$_SESSION['LANGCODE']] ;?> </a>
                                                    <div class="dropdown-menu bg-white-custom">
                                                        <ul class="listsub">
                                                        <?php  
                                                            foreach( $menusub2  as $key2 => $val2){
                                                                $menusub3 = $clsdept->LoadMenusubByDeptcode($deptcode,array('ms.menusub_level'=>3,'ms.menusub_id'=>$val2['id'] ));
                                                                if( $menusub3){
                                                                ?>
                                                                 <li class="dropdown">
                                                                    <a class="" href="<?php echo $val2['menusub_otherlink'] ;?>" > <?php echo $val2['menusub_name_'.$_SESSION['LANGCODE']] ;?> 
                                                                    <span class="arrow">
                                                                    <i class="fa fa-chevron-right"></i>
                                                                    </span>
                                                                    </a>
                                                                    <div class="dropdown-menu bg-white-custom">
                                                                    <ul class="listsub listsub2 ">
                                                                        <?php
                                                                            foreach( $menusub3  as $key3 => $val3){
                                                                        ?>
                                                                        <li> <a class="" href="<?php echo $val3['menusub_otherlink'] ;?>">  <?php echo $val3['menusub_name_'.$_SESSION['LANGCODE']] ;?>  </a> </li> 
                                                                         <?php } ?>
                                                                    </ul>
                                                                    </div>
                                                                </li>

                                                                <?php
                                                                }else{
                                                        ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link " href="<?php echo $val2['menusub_otherlink'] ;?>"><?php echo $val2['menusub_name_'.$_SESSION['LANGCODE']] ;?></a>
                                                                </li>
                                                        <?php 
                                                                } // else  $menusub3
                                                            }  // foreach menusub2
                                                        ?>

                                                        </ul>
                                                    </div>
                                                </li> 
                                            <?php 
                                            }else{ 
                                    ?>
                                            <li class="nav-item <?php echo $active;?>">
                                                <a class="nav-link " href="<?php echo $val1['menusub_otherlink'] ;?>"> <?php echo $val1['menusub_name_th'] ;?></a>
                                            </li>
                                    <?php
                                            }// else menusub2
                                        }// foreach menusub1
                                    }// if menusub1
                                    ?>

                          
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li> 
                        </ul>
                    </div>
                </div>
                
                <div class="col9">

                </div>
            </div>
        </div>  
    </section>

                                -->




  <?php 
  
  $data_slidemainsub = $clscont->Load('news',array( 'news_office'=> $deptcode ,'news_menu'=>'msbanner' ,'news_active'=>'Y'),' news_datetime DESC ','');

?>