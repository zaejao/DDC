<style>
.modal.left .modal-dialog,
	.modal.right .modal-dialog {
		position: fixed;
		margin: auto;
		width: 320px;
		height: 100%;
		-webkit-transform: translate3d(0%, 0, 0);
		    -ms-transform: translate3d(0%, 0, 0);
		     -o-transform: translate3d(0%, 0, 0);
		        transform: translate3d(0%, 0, 0);
	}

	.modal.left .modal-content,
	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}
	
	.modal.left .modal-body,
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}

/*Left*/
	.modal.left.fade .modal-dialog{
		left: -320px;
		-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, left 0.3s ease-out;
		        transition: opacity 0.3s linear, left 0.3s ease-out;
	}
	
	.modal.left.fade.in .modal-dialog{
		left: 0;
	}
        
/*Right*/
	.modal.right .modal-dialog {
		right: -320px;
		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
		        transition: opacity 0.3s linear, right 0.3s ease-out;
	}
	
	.modal.right .modal-dialog {
		right: 0;
	}

/* ----- MODAL STYLE ----- */
	.modal-content {
		border-radius: 0;
		border: none;
	}

	.modal-header {
		border-bottom-color: #EEEEEE;
		background-color: #FAFAFA;
	}

</style> 
<header>
 <!-- menu1 -->
 <?php 
 $langcode=$_SESSION['LANGCODE'];
  $clsdept = new DeptClass();

  
 $langsite['DEPTDISEASE'] = $clsdept->LoadOnce('setting_lang',array('langcode'=>'DEPTDISEASE','enable'=>'Y'));
 $langsite['DISEASE'] = $clsdept->LoadOnce('setting_lang',array('langcode'=>'DISEASE','enable'=>'Y'));
?>
 <nav class="navbar navbar-expand-sm navbar-light bg-menutop ">
             <!--  -->
                <a id="logo-site" class="navbar-brand" href="/index.php" title="<?php echo $langsite['DEPTDISEASE']['setting_lang_'.$_SESSION['LANGCODE']];?>" alt="<?php echo $langsite['setting_lang_'.$_SESSION['LANGCODE']];?>" >
                  
                  <div class="site-logo" > 
                   
                  </div>
                </a>
             <!--  -->
           
            
               
                 <div id="Menu-right" class="navbar-nav">
                   <ul class="nav"> 
                      <li class="nav-item nav-item-font">
                          <span class="text lang_text">ขนาด</span>
                          <span data-font="font-decrease" class="decrease "> <i class="fa fa-minus" ></i></span>
                          <span data-font="font-default" class="default lang_fonta">ก</span>
                          <span data-font="font-increase" class="increase ">  <i class="fa fa-plus" ></i> </span>
                        </li>

                        <li class="nav-item nav-item-bg">
                            <button data-bg="bg-dark" class="btn btn_bg btn-dark " type="button">c</button>
                            <button data-bg="bg-normal" class="btn btn_bg btn-normal  " type="button">c</button>
                            <button data-bg="bg-dark-yellow" class="btn btn_bg btn-dark-yellow  " type="button">c</button>
                        </li>


                        <li class="nav-item nav-item-lang">
                              <div class="lang">
                                <a href="" class="flag flag-en" ><img src="/img/icons/flag-en.png" alt="EN" title="EN"></a> 
                                <a href="" class="flag flag-th" ><img src="/img/icons/flag-th.png" alt="TH" title="TH"></a> 
                           </div>
                       </li>

                            <li class="nav-item nav-item-call">
                                <a href="tel:1422"> <span class="fa"> <img src="<?php $pathf;?>/img/call.svg" alt="Hotline 1422"> </span> <span>1422</span></a>
                            </li>
                    </ul>
                 </div> <!-- id="Menu-right" class="navbar-nav" -->
            
             </nav>
             <!-- /menu1 -->
       
       
           <!-- menu2 -->
           <nav class="navbar navbar-expand-lg navbar-light navbar-main ">
                 <div id="Menu-right2" class="navbar-nav nav-link">
                     <ul>
 <!--
                        <li class="nav_disease">
                        <div class="disease-name-dropdown dropdown">
                            <a class="dropdown-toggle bg-white-custom" href="#" data-toggle="dropdown" aria-expanded="false">
                              รายชื่อโรค
                              <span class="arrow"><span class="arrow-down"></span></span>
                            </a>
                            <div class="dropdown-menu bg-white-custom" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(686px, 87px, 0px);" >
                              <div class="container">
                                <div class="alphabet clearfix One">
                                 
                                                  <a class="font_disease" id="dis" href="#1">1</a>
                                                  <a class="font_disease" id="dis" href="#2">2</a>
                                                  <a class="font_disease" id="dis" href="#3">3</a>
                                                  <a class="font_disease" id="dis" href="#4">4</a>
                                                  <a class="font_disease" id="dis" href="#5">5</a>
                                                  <a class="font_disease" id="dis" href="#6">6</a>
                                                  <a class="font_disease" id="dis" href="#7">7</a>
                                                  <a class="font_disease" id="dis" href="#8">8</a>
                                                  <a class="font_disease" id="dis" href="#9">9</a>
                                                  <a class="font_disease" id="dis" href="#10">10</a>
                                                  <a class="font_disease" id="dis" href="#11">11</a>
                                                  <a class="font_disease" id="dis" href="#12">12</a>        
                                                  <a class="font_disease" id="dis" href="#1">1</a>
                                                  <a class="font_disease" id="dis" href="#2">2</a>
                                                  <a class="font_disease" id="dis" href="#3">3</a>
                                                  <a class="font_disease" id="dis" href="#4">4</a>
                                                  <a class="font_disease" id="dis" href="#5">5</a>
                                                  <a class="font_disease" id="dis" href="#6">6</a>
                                                  <a class="font_disease" id="dis" href="#7">7</a>
                                                  <a class="font_disease" id="dis" href="#8">8</a>
                                                  <a class="font_disease" id="dis" href="#9">9</a>
                                                  <a class="font_disease" id="dis" href="#10">10</a>
                                                  <a class="font_disease" id="dis" href="#11">11</a>
                                                  <a class="font_disease" id="dis" href="#12">12</a>                          
     
                                </div>
                              </div>
                            </div>
                          </div>

                        </li>
                -->
                <li class="nav_disease_1">
                  <button class="btn btn-disease dropdown-toggle" type="button" data-toggle="dropdown">
                  <?php echo $langsite['DISEASE']['setting_lang_'.$_SESSION['LANGCODE']];?>
                  <span class="caret"></span>
                </button>
                  <ul class="dropdown-menu">
                    <?php
                    foreach ($thaichar as $alphabet_th) {
                      $where_th['enable'] ="Y";
                      $where_th['deleted'] =0 ;
                      $wherelike_th['disease_name_th'] = $alphabet_th ;
                      $data_charth = $clsdept->LoadLikeTitle('disease',$where_th, $wherelike_th,'',''); 
                      
                      if($data_charth) { 
                      ?> 
                      <li><a href="disease.php?e=th&char=<?php echo $alphabet_th;?>"> <?php echo  $alphabet_th;?> </a></li>
                    <?php
                        }  
                      }
                    ?>
                    <div></div>
                    
                    <?php 
                      foreach(range('A','Z') as $alphabet_en) {  
                        //LoadLikeTitle($table, $where=array(), $wherelike=array(), $orderby='', $limit='') 
                        $where_en['enable'] ="Y";
                        $where_en['deleted'] =0 ;
                        $wherelike_en['disease_name_en'] = $alphabet_en ;
                        $data_charen = $clsdept->LoadLikeTitle('disease',$where_en, $wherelike_en,'',''); 
                        
                        if($data_charen) { 
                      ?>
                       <li><a href="disease.php?e=en&char=<?php echo $alphabet_en;?>"> <?php echo  $alphabet_en;?> </a></li> 
                      <?php 
                        } 
                      }
                    ?> 
               
                  </ul>
                </li>
              


                    <!-- <li class="nav_complain" > <a class="nav-item nav-link active" href="#"> รับเรื่องร้องเรียน   <span class="sr-only">(current)</span></a> </li>
                     -->

                     <li class="nav_complain" > <a href="" class="lang_complain"> รับเรื่องร้องเรียน </a>  <span class="sr-only">(current)</span> </li>
                   
                     
                     <li  class="nav_line"> <a class="nav-item">| </a> </li>
                     <li  class="nav_sitemap">  <a href="" class="lang_sitemap"> ผังเว็บไซต์ </a>  </li>
                     <li  class="nav_search"> <a class="nav-item nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a> </li>
                     <li  class="nav_linktog"> <a class="nav-item nav-link nav_linktog " data-toggle="modal" data-target="#myModal2"><i class="fa fa-bars" aria-hidden="true"></i></a></li>

                     

                   </ul>
               </div>
             </nav>
                      
            <!-- ############################################################### --> 
            <!-- /menu2 -->
            <div class="modal right " id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
              <div class="modal-dialog" role="document">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel2"> </h4>
                  </div>

                  <div class="modal-body">
                    

                  </div>

                </div><!-- modal-content -->
              </div><!-- modal-dialog -->
            </div><!-- modal -->
            <!-- menu -->
            <!-- ############################################################### --> 

         
           <nav class="navbar navbar-expand-lg navbar-light navbar_main_1 ">
             <!-- <a class="navbar-brand " href="#">Navbar</a> -->

             <button id="bbh" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
             </button>

             <div class="collapse navbar-collapse clearfix" id="navbarNavAltMarkup">
                
               <div id="Menu-right3" class="navbar-nav">
            
                   <ul class="nav nav-main" id="ul_menumain">          
                           <li class="nav-item disease-name-dropdown">
                            <a class="nav-link dropdown-toggle lang_disease" data-toggle="dropdown" href="#"> DISEASE</a>
                            <div class="dropdown-menu">
                              <ul class="container">
                                <?php
                                foreach ($thaichar as $alphabet_th) {
                                  $where_th['enable'] ="Y";
                                  $where_th['deleted'] =0 ;
                                  $wherelike_th['disease_name_th'] = $alphabet_th ;
                                  $data_charth = $clsdept->LoadLikeTitle('disease',$where_th, $wherelike_th,'',''); 
                                  
                                  if($data_charth) { 
                                  ?> 
                                     <li><a href="disease.php?e=th&char=<?php echo $alphabet_th;?>"> <?php echo  $alphabet_th;?> </a></li>
                  
                                <?php
                                    }  
                                  }
                                ?>
                                <div></div>
                                
                                <?php 
                                  foreach(range('A','Z') as $alphabet_en) {  
                                    $where_en['enable'] ="Y";
                                    $where_en['deleted'] =0 ;
                                    $wherelike_en['disease_name_en'] = $alphabet_en ;
                                    $data_charen = $clsdept->LoadLikeTitle('disease',$where_en, $wherelike_en,'',''); 
                                    
                                    if($data_charen) { 
                                  ?>
                                    <li><a href="disease.php?e=th&char=<?php echo $alphabet_en;?>"> <?php echo  $alphabet_en;?> </a></li>
                   
                                  <?php 
                                    } 
                                  }
                                ?> 
                         
                              </ul>
                            </div>
                          </li>  


                  </ul>
       
       
               </div>
             </div>
           </nav>
          
           <!-- /menu -->
           <!-- <img src="..." class="img-fluid" alt="Responsive image"> --> 
</header>