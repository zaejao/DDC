<style>
 
.btn-icon{
  position: relative;
  display: block;
  vertical-align: top;
  width: 30px;
  height: 20px;
  margin-left: 15px; 
  margin-top: 14px;
    float: right;
}
.btn-icon span{

  height: 3px;
  background: #222222;
  position: absolute;
  left: 0;
  right: 0;
  -webkit-transform-origin: 25px, 1px;
  -ms-transform-origin: 25px, 1px;
  transform-origin: 25px, 1px
}


.btn-icon span:nth-child(1) {
    top: 0;
    -webkit-transition: -webkit-transform 0.33s 0s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: -webkit-transform 0.33s 0s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: transform 0.33s 0s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: transform 0.33s 0s cubic-bezier(0.72, 0.01, 0.28, 0.98), -webkit-transform 0.33s 0s cubic-bezier(0.72, 0.01, 0.28, 0.98)
}

.btn-icon span:nth-child(2) {
    top: 8px;
    -webkit-transition: -webkit-transform 0.21s 0.175s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: -webkit-transform 0.21s 0.175s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: transform 0.21s 0.175s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: transform 0.21s 0.175s cubic-bezier(0.72, 0.01, 0.28, 0.98), -webkit-transform 0.21s 0.175s cubic-bezier(0.72, 0.01, 0.28, 0.98)
}

.btn-icon span:nth-child(3) {
    top: 16px;
    -webkit-transition: -webkit-transform 0.33s 0s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: -webkit-transform 0.33s 0s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: transform 0.33s 0s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: transform 0.33s 0s cubic-bezier(0.72, 0.01, 0.28, 0.98), -webkit-transform 0.33s 0s cubic-bezier(0.72, 0.01, 0.28, 0.98)
}
 
.mm-wrapper_opening .btn-icon span:nth-child(1) ,
.btn-icon[aria-expanded="true"] span:nth-child(1){
    -webkit-transition: -webkit-transform 0.33s 0.45s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: -webkit-transform 0.33s 0.45s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: transform 0.33s 0.45s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: transform 0.33s 0.45s cubic-bezier(0.72, 0.01, 0.28, 0.98), -webkit-transform 0.33s 0.45s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    -webkit-transform: rotate(45deg) translate3d(6px, 6px, 0);
    transform: rotate(45deg) translate3d(6px, 6px, 0)
}

.mm-wrapper_opening .btn-icon span:nth-child(2),
.btn-icon[aria-expanded="true"] span:nth-child(2) {
    -webkit-transition: -webkit-transform 0.21s 0.25s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: -webkit-transform 0.21s 0.25s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: transform 0.21s 0.25s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: transform 0.21s 0.25s cubic-bezier(0.72, 0.01, 0.28, 0.98), -webkit-transform 0.21s 0.25s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    -webkit-transform: scaleX(0) translateZ(0);
    transform: scaleX(0) translateZ(0)
}

.mm-wrapper_opening .btn-icon span:nth-child(3),
.btn-icon[aria-expanded="true"] span:nth-child(3){
    -webkit-transition: -webkit-transform 0.33s 0.45s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: -webkit-transform 0.33s 0.45s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: transform 0.33s 0.45s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    transition: transform 0.33s 0.45s cubic-bezier(0.72, 0.01, 0.28, 0.98), -webkit-transform 0.33s 0.45s cubic-bezier(0.72, 0.01, 0.28, 0.98);
    -webkit-transform: rotate(-45deg) translate3d(5.5px, -5px, 0);
    transform: rotate(-45deg) translate3d(5.5px, -5px, 0)
}


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
.owl-prev {
    /*width: 15px;*/
    height: 100px;
    position: absolute;
    top: 3%;
    margin-left: -20px;
    display: block !important;
    border:0px solid black;
	left: -30px;/*-15px;*/
}

.owl-next {
    /*width: 15px;*/
    height: 100px;
    position: absolute;
    top: 3%;
    right: -25px;
    display: block !important;
    border:0px solid black;
	right: -30px;/*-15px;*/
}
.owl-prev i, .owl-next i {
	/*transform : scale(1,6); */
	color: #e84c93;
	font-size: 35px;
}
.prev-left{
	transform: rotate(180deg);
}
.owl-theme .owl-nav [class*='owl-']:hover,.owl-theme .owl-nav [class*='owl-']:focus{
	background-color: transparent;
	outline: 0;
}
.pad-l-r{
	padding-left: 10px; 
	padding-right:10px;
}
.seemorebtn{
  transform: rotate(-90deg);
  font-size: 35px;
}
.seemorebtn.collapsed {
    transform: rotate(90deg);
}
/*.seemorebtn[aria-expanded="true"]{
  transform: rotate(-90deg);
}*/

.icon-pink{
  color: #e84c93;
}
@media (max-width: 576px) { 
	.owl-prev i, .owl-next i {
		font-size: 22px;
	}
	.owl-next {
		right: -10px;
	}
	.owl-prev {
		left: -10px;
	}
	.pad-l-r{
		padding-left: 20px; 
		padding-right:20px;
	}
}
@media (max-width: 768px) { 
	
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
                          <span class="text ">Font</span>
                          <span data-font="font-decrease" class="decrease "> <i class="fa fa-minus" ></i></span>
                          <span data-font="font-default" class="default lang_fonta">A</span>
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
              
      

                   </ul>
               </div>
             </nav>
                      
      
           <nav class="navbar navbar-expand-lg navbar-light navbar_main_1 ">
             <!-- <a class="navbar-brand " href="#">Navbar</a> -->

             <button id="bbh" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
             </button>

             <div class="collapse navbar-collapse clearfix" id="navbarNavAltMarkup">
                
               <div id="Menu-right3" class="navbar-nav">
            
                   <ul class="nav nav-main" id="ul_menumain">          
                           <li class="nav-item disease-name-dropdown">
                            <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#"> รายชื่อโรค </a>
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