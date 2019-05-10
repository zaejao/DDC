<?php 
include "../duck.conf.php";
include $pathf."/prepare_html.php"; 

include $pathf."/gates/duck.class.php";
include $pathf."/gates/contents.class.php"; 
include $pathf."/gates/dept.class.php"; 
include $pathf."/gates/office.class.php"; 
include $pathf."/gates/func.php";
include "conf.php";

$langcode=$_SESSION['LANGCODE'];
$clsdept = new DeptClass();
$clscont = new ContentsClass();
$clsoffice = new OfficeClass();
//$deptcode = $_GET['deptcode'];
$auctions =$_GET['auctions'];

 
$dataid = $auctions ;


$dataset = $clsoffice->LoadOnce('auctions',array('id'=>	$dataid));
$auctions_type_code = $clsoffice->LoadOnce('auctions_type',array('auctions_type_code'=>	$dataset['auctions_type_code']));

$typedet = $clsoffice->Load('auctions_type',array('deleted'=>0 ),' orderby DESC','' ); 
$catedet = $clsoffice->Load('auctions_category',array('deleted'=>0 ),' orderby DESC','' ); 
$groupdet = $clsoffice->Load('auctions_group',array('deleted'=>0 ),' orderby DESC','' ); 
 
$auctions_financialtype = $clsoffice->Load('auctions_financialtype',array('deleted'=>0 ),' orderby DESC','' ); 

$data_typedet = $clsoffice->LoadOnce('auctions_type',array('auctions_type_code'=>	$dataset['auctions_type_code']));
$data_catedet = $clsoffice->LoadOnce('auctions_category',array('auctions_category_code'=>	$dataset['auctions_category_code']));
$data_groupdet = $clsoffice->LoadOnce('auctions_group',array('auctions_group_code'=>	$dataset['auctions_group_code']));


$menucode = "DEPT" ;
$menucode1 = "AUCTIONS" ;
$navsub =$dataset['auctions_type_code']  ;
 
?> 

  <?php include $pathf."/prepare_css.php";?>
<body>
  <?php include $pathf."/prepare_header.php";?>
  <?php include $pathf."/prepare_bannermain".$depttype.".php";?>
  <?php //include $pathf."/prepare_navsub.php";?>

  <!-- ############################################################################################################### -->
    
  <section style="background: #ffeaf1;" class="box_officecontent">
    <div class="container py-5" >
      <div class="row"> 
        <div class="col-lg-3 col_munusub pl-0 pr-0" style="">
          <?php include $pathf."/prepare_navsub2.php";?>
        </div>
        <div class="col-lg-9 ">
            <section class="bg_custom2">
                  <div class="container">
                          <div class="row">
                                  <div id="content-title" class="col-lg-12 mt-3">
                                  <!-- content-title -->
                                  <h2>  <?php echo $auctions_type_code['auctions_type_th'] ;  ;?> 
                                    </h2>
                              
                                  </div><!-- class="col-lg-12"-->
                          </div> <!-- close row -->

                          <div class="row mb-2">
                            <div  class="col-sm-6 col-md-6 col-lg-6">
                              <div class="box-social">
                                <ul class="nav">
                                  <li class="nav-item mr-3">
                                    <img src="<?php echo $path['img'];?>Facebook.png" alt="">
                                  </li>
                                  <li class="nav-item mr-3">
                                      <img src="<?php echo $path['img'];?>Twitter.png" alt="">
                                  </li>
                                  <li class="nav-item mr-3">
                                          <img src="<?php echo $path['img'];?>Share.png" alt="">
                                      </li>
                                </ul>
                              </div>
                            </div> <!--  class="col-sm-6 col-md-6 col-lg-6"-->


                          
                            <div  class="col-sm-6 col-md-6 col-lg-6">
                              <div class="footer-detail-right">
                                <div class="time">
                                    <i class="fa fa-calendar" aria-hidden="true">
                                      <span class="ml-1   " > <?php echo  DateDisplay($dataset['auctions_startdate'],8) ;?>   </span>
                                    </i>
                                </div>
                                <div class="view">
                                    <i class="fa fa-eye" aria-hidden="true">
                                        <span class="ml-1  "> <?php echo $dataset['views'] ;?>    
                                        <span class="lang_view"> View </span>  </span>
                                    </i>
                                </div>
                              </div> <!--  class="col-sm-6 col-md-6 col-lg-6"-->
                            </div>  <!-- class="row mb-5"-->
													</div>
													


                          <!-- content-detail-->
                          <div class="row">

													<?php // echo "<pre>".print_r($dataset ,1)."</pre>" ;?>
                            <div id="content-detail" class="col-lg-12"> 
                            <div class="form-group row  ">
															<label class="col-md-3 label-control" for="auctions_category_code">หมวดหมู่วิธีซื้อ/จ้าง :  </label>
															<div class="col-md-3">
																 <?php 
																 		if($dataset['auctions_category_code']){
																			echo $data_catedet['auctions_category_th'] ; 
																		 }else{
																		  echo "-" ;
																		 } 
																  ?> 
															</div>
														</div>  
														<?php 
														if( $dataset['auctions_type_code'] == "auctions_draft") { 
															?>
																<div class="form-group row">
																	<label class="col-md-3 label-control" for="auctions_group_code"> ชนิด  : </label> 
																	<div class="col-md-2">
																	<?php 
																	
																	if($dataset['auctions_group_code']){
																		echo $data_groupdet['auctions_group_th'];
																	}else{
																			echo "-" ;
																	} 

																	?>
																		 
																	</div>
																</div>
		
															<?php 
														 } ?>
														 	<?php 
														      if( $dataset['auctions_type_code'] == "auctions_public") { 
														 ?>
															 <div class="form-group row">
																 <label class="col-md-3 label-control" for="price"> ราคากลาง :  </label> 
																 <div class="col-md-2">
																 <div class="col-md-3">
															   <?php echo $dataset['price'] ?> 
															</div>
																 </div>
															 </div>
	 
														 <?php 
														}
														?>

														
														<div class="form-group row">
															<label class="col-md-3 label-control" for="title_th"> ชื่อเรื่อง : </label> 
															<div class="col-md-9">
                                
																	<?php echo $dataset['title_th'] ;
																	?>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-md-3 label-control" for="docno"> เลขที่เอกสาร :</label> 
															<div class="col-md-3">
																<?php 
																if($dataset['docno']){
																	echo $dataset['docno'] ;
																}else{
																		echo "-" ;
																} 

															
																
																?>
															</div>
														</div>

														<div class="form-group row ">
															<label class="col-md-3 label-control" for="auctions_startdate">วันที่ประกาศ : </label>
															<div class="col-md-4">
																 <?php
																 	if($dataset['auctions_startdate'] == "0000-00-00"){
																		echo "-" ;
																	}else{
																		echo  DateDisplay($dataset['auctions_startdate'],8) ;
																	}
															 ?> 
															</div> 
													</div>

													<div class="form-group row    ">
															<label class="col-md-3 label-control" for="auctions_enddate">วันที่สิ้นสุดประกาศ : </label>
															<div class="col-md-4"> 
															<?php 
															
															if($dataset['auctions_enddate'] == "0000-00-00"){
																echo "-" ;
															}else{
																echo  DateDisplay($dataset['auctions_enddate'],8) ;
															}

														 ?> 
														 
															</div> 
													</div>
                                  
                          	

														 <?php 
														 
														 if( $dataset['auctions_type_code'] == "auctions_announ"){ 
															 
															?>
														<div class="form-group row">
																			<label class="col-md-3 label-control" for="annualyear"> ปีงบประมาณ :  </label> 
																			<div class="col-md-2">
																				<?php echo $dataset['annualyear'] ?> 
																			</div>
																		</div> 


																	<div class="form-group row ">	
																			<label class="col-md-3 label-control" for="docrecieve_startdate">วันที่เริ่มรับเอกสาร : </label>
																			<div class="col-md-4"> 
																				<?php  
																				
																				if($dataset['docrecieve_startdate'] == "0000-00-00"){
																					echo "-" ;
																				}else{
																					echo  DateDisplay($dataset['docrecieve_startdate'],8) ;
																				}
																				 ?> 
																			</div> 
																	</div>

																	<div class="form-group row    ">
																			<label class="col-md-3 label-control" for="docrecieve_enddate">	วันที่สิ้นสุดรับเอกสาร  </label>
																			<div class="col-md-4">   
																				<?php 
																				if($dataset['docrecieve_enddate'] == "0000-00-00"){
																					echo "-" ;
																				}else{
																					echo  DateDisplay($dataset['docrecieve_enddate'],8) ;
																				}
																			
																				?> 
																			</div> 
																	</div>


																	<div class="form-group row">
																			<label class="col-md-3 label-control" for="financial_amount"> วงเงินที่จะซื้อหรือจ้าง :  </label> 
																			<div class="col-md-2">
																				<?php echo $dataset['financial_amount'] ?>    
																			</div>
																		</div>

																		<div class="form-group row">
																			<label class="col-md-3 label-control" for="secretlevel"> ขั้นความลับ:   </label> 
																			<div class="col-md-2">
																			<?php echo $val_c['secretlevel'] ; ?>    
																			</div>
																		</div>
																
																		<div class="form-group row">
																			<label class="col-md-3 label-control" for="docnumpage"> จำนวนหน้า  : </label> 
																			<div class="col-md-2">
																			<?php echo $dataset['docnumpage'] ?> 
																			</div>
																		</div>

																		<div class="form-group row">
																			<label class="col-md-3 label-control" for="doc_yearprint"> ปีที่พิมพ์ประกาศ:   </label> 
																			<div class="col-md-2">
																				<?php echo $dataset['doc_yearprint'] ?> 
																			</div>
																		</div>

																		<div class="form-group row">
																			<label class="col-md-3 label-control" for="doc_address"> ที่ตั้งของเอกสาร :  </label> 
																			<div class="col-md-4">
																				<?php echo $dataset['doc_address'] ?> 
																			</div>
																		</div>


																		<div class="form-group row">
																			<label class="col-md-3 label-control" for="auctions_financialtype_id"> ประเภทเงิน :  </label> 
																			<div class="col-md-2">
																					<select class="form-control select2" id="auctions_financialtype_id" name="auctions_financialtype_id" >
																					<?php 
																							if ($auctions_financialtype) {
																								foreach ($auctions_financialtype as $key_c => $val_c) {
																							?>
																								<option value="<?php echo $val_c['id'];?>" <?php if($val_c['id']==$dataset['auctions_financialtype_id']){ echo "selected";}?>   >  <?php echo $val_c['typename'];?></option>
																							<?php 
																								}
																							} 
																							?>
																						</select>
																			</div>
																		</div>

																		<div class="form-group row">
																			<label class="col-md-3 label-control" for="auctions_group_code"> ชนิด :  </label> 
																			<div class="col-md-2">
																					<?php 
																					if($data_groupdet['typename']){
																						echo $dataset['auctions_group_code'] ." " . $data_groupdet['typename'];
																					}else{
																						echo "-" ;
																					}
																					?>
																					
																			</div>
																		</div>
																		

																		

																		<div class="form-group row">
																			<label class="col-md-3 label-control" for="contract_number"> เลขที่สัญญา:   </label> 
																			<div class="col-md-4">
																			
																				<?php 
																					if($dataset['contract_number']){
																						echo $dataset['contract_number'];
																					}else{
																						echo "-" ;
																					}
																					?>
																			</div>
																		</div>

																		<div class="form-group row ">	
																			<label class="col-md-3 label-control" for="contract_date">วันที่ทำสัญญา : </label>
																			<div class="col-md-4">
																			<?php echo $dataset['contract_date'] ?>
																			</div> 
																	</div>
																	
																	<?php 
														 }   ?>
																		<div class="form-group row ">
																		<label class="col-md-3 label-control" for="desc_th"> 
																			รายละเอียด :
																		</label>  
																		<div class="col-md-6">
																			<?php
																			if($dataset['desc_th']){
																				echo htmlspecialchars_decode($dataset['desc_th']);
																			}else{
																				echo "-";
																			}
																			
																			?> 
																		</div>
																	</div>   
																	
																	<div class="form-group row ">
																		<label class="col-md-3 label-control" for="remark"> 
																			หมายเหตุ :
																		</label>  
																		<div class="col-md-6">
																			<?php 
																		 
																			if($dataset['remark']){
																				echo htmlspecialchars_decode($dataset['remark']);
																			}else{
																				echo "-";
																			}
																			
																			?>  
																		</div>
																	</div> 
															

																	<div class="form-group row ">
																		<label class="col-md-3 label-control" for=""> 
																			เอกสาร : 
																		</label>  
																		<div class="col-md-8"> 
																		<?php 
                                  $path['file'] = "../uploads/files/";
                                    if($dataset['file']){
                                      ?>
                                         <a href="<?php echo  $path['file'].$dataset['file']; ?>"   target="_blank" class="linkpink2" target="_blank">     เอกสาร 1  <i class="fa fa-download"></i> </a>
                                      <?php
                                    }
                                    if($dataset['file2']){
                                      ?>
                                          <a href="<?php  echo $path['file'].$dataset['file2']; ?>"  target="_blank" class="linkpink2" target="_blank">     เอกสาร 2  <i class="fa fa-download"></i> </a>
                                      <?php
                                    }
                                    if($dataset['file3']){
                                      ?>
                                        <a href="<?php echo  $path['file'].$dataset['file3']; ?>"  target="_blank" class="linkpink2" target="_blank">     เอกสาร 3  <i class="fa fa-download"></i> </a>
                                      <?php
                                    }
                                    if($dataset['file4']){
                                      ?>
                                         <a href="<?php echo  $path['file'].$dataset['file4']; ?>"  target="_blank" class="linkpink2" target="_blank">     เอกสาร 4  <i class="fa fa-download"></i> </a>
                                      <?php
                                    }
                                    if($dataset['file5']){
                                      ?>
                                         <a href="<?php echo  $path['file'].$dataset['file5']; ?>"  target="_blank"  class="linkpink2" target="_blank">     เอกสาร 5  <i class="fa fa-download"></i> </a>
                                      <?php
                                    }
                                  ?>
																		</div>
																	</div>
                           
                           

                                  
                                  <hr class="line mt-4">
                                  
                              </div>  <!-- close id="content-detail" class="col-lg-12" -->  
                          </div> <!-- close row -->
                  </div> <!-- class="container"-->
                  </section>

        </div> <!-- /.9 -->
      </div>
    </div>
    </section>




   
   <!-- ############################################################################################################### -->
  
  <?php 
   // echo "<pre>".print_r($data_news1,true)."</pre>";
    ?>
     
  
   


   <?php include $pathf."/prepare_footer.php";?>
    <?php include $pathf."/prepare_script.php";?>
    <!-- Optional JavaScript -->
    <script>
      $( document ).ready(function() {
     //   contents.LoadSlideImageHome();
    //    dept.LoadCharOfDisease();
      });
    </script>  
  </body>
</html>