<?php 
  $menusub1 = $clsdept->Load('menusub',array('department_code_ch'=>$deptcode , 'menusub_level'=>1 , 'enable'=>'Y') ,' orderby DESC',''); 
  //$menusub3 = $clsdept->LoadMenusubByDeptcode($deptcode,array('ms.menusub_level'=>3));   
?>
<nav id="sidebar"  > 
            <div class="searchbox" style="">
                  <div class="form-group has-search">
                      <span class="fa fa-search form-control-feedback"></span>
                      <input type="text" class="form-control" placeholder="ค้นหาภายในสำนักงาน">
                  </div>
            </div>
            <ul class="list-unstyled components">

            <?php
              if($menusub1){  
                foreach( $menusub1  as $key1 => $val1){
                 // $menusub2 = $clsdept->LoadMenusubByDeptcode($deptcode,array('ms.menusub_level'=>2,'ms.menusub_id'=>$val1['id'] ));
                  $menusub2 = $clsdept->Load('menusub',array('department_code_ch'=>$deptcode , 'menusub_level'=>2 ,'menusub_id'=>$val1['id'] , 'enable'=>'Y') ,' orderby DESC',''); 

                  $active="";
                  $dd="";
                  $ddt="";
                   $dds="";
                  if($menucode1 == $val1['menusub_code']){
                      $active = "active";
                      $dd="collapse";
                      $ddt="dropdown-toggle";
                      $dds="show ";
                  }
                  
                  if($menusub2){
                      
            ?>
          
                  <li class="<?php echo  $active;?>"> 
                    <a href="#m<?php echo $val1['id'] ;?>" data-toggle="collapse"  class="dropdown-toggle <?php echo  $dd;?>"> <?php echo $val1['menusub_name_th'] ;?> </a>
                    <ul class="list-unstyled collapse <?php echo  $dds;?>" id="m<?php echo $val1['id'] ;?>" style="">
                    <?php  
                      foreach( $menusub2  as $key2 => $val2){
                         $menusub3 = $clsdept->Load('menusub',array('department_code_ch'=>$deptcode , 'menusub_level'=>3 ,'menusub_id'=>$val2['id'] , 'enable'=>'Y') ,' orderby DESC',''); 
                        //  $menusub3 = $clsdept->LoadMenusubByDeptcode($deptcode,array('ms.menusub_level'=>3,'ms.menusub_id'=>$val2['id'] ));
                          $active2 ='';
                          if( $navsub == $val2['menusub_code']){
                            $active2 = "active";
                          }

                          if( $menusub3){
                          ?>
                          <li class="<?php echo  $active2;?>">
                            <a href="#m<?php echo $val2['id'] ;?>" data-toggle="collapse"  class="dropdown-toggle"> <?php echo $val2['menusub_name_th'] ;?> </a>
                              <ul class="list-unstyled collapse" id="m<?php echo $val2['id'] ;?>" style="">
                              <?php
                                foreach( $menusub3  as $key3 => $val3){
                                  
                                   
                              ?>
                                <li> <a class="" href="<?php echo $val3['menusub_otherlink'] ;?>">  <?php echo $val3['menusub_name_'.$_SESSION['LANGCODE']] ;?>  </a> </li> 
                              <?php 
                                } 
                              ?>
                              </ul>
                            </ul>
                           </li>
                        <?php 
                          }else{
                        ?>
                         <a class="<?php echo  $active2;?>" href="<?php echo $val2['menusub_otherlink'] ;?>">  <?php echo $val2['menusub_name_'.$_SESSION['LANGCODE']] ;?>  </a>
                        <?php
                          }
                        }
                        ?>
                    </ul>
                </li>

            <?php  
                  }else{
            ?>
                    <li class="<?php echo  $active;?>">
                      <a href="<?php echo $val1['menusub_otherlink'] ;?>">   <?php echo $val1['menusub_name_th'] ;?></a> 
                    </li>
            <?php
                  } 
                }//foreach1
              }//menu1
            ?>
            
                
            </ul> 
        </nav>