<?php
  include "prepare_htmlhead.php";
	include "../duck.conf.php";
  $menucode = "LAWCATE" ;
  $menucode1 = "LAWCATE" ;

  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clsoffice = new OfficeClass();
	$lawcate = $clsoffice->Load('law_category',array('deleted'=>0  ),'  orderby DESC  ','');
	 
?>
  <?php include "prepare_navtop.php";?>
  <?php include "prepare_navside.php";?>
  <div class="app-content content">
    <div class="content-wrapper">
		<?php include "prepare_navcont.php";?>
	
		<?php // echo "<pre>".print_r($disease,true)."</pre>" ;?>
		<div class="content-detached">
			<div class="content-body">

				<section class="row">
				<div class="col-12">
				  <div class="card">
					<div class="card-head">
					  <div class="card-header"> 
							<a href="javascript:" onclick="$('#create_modal').modal('show');"  class="btn btn-info btn-sm"><i class="ft-plus white"></i> เพิ่ม<?php echo $menuname;?>หลัก </a>
							<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
							<div class="heading-elements">
							</div>
					  </div>
					</div>
					<div class="card-content">
					  <div class="card-body"> 
							<div class="table-responsive">
								<table id="tbdata1" class="table  table-xs  table-middle table-hover">
									<thead class="bg_custom">
										<tr>
											<th class="text-left" style="width: 130px;"> ลำดับ </th>
											<th class="text-center" > ID </th>
											 <th> หัวข้อกฏหมาย  </th>  
											<th> เรียงลำดับ </th>
											<th> แสดงผล </th>  
											<th class="text-center"> จัดการข้อมูล </th>
										</tr>
									</thead>
									<tbody>
									<?php 
										if($lawcate){  
											foreach($lawcate as $key1 => $val1 ) {   
 
									?>
										<tr class="group">
											<td  class="text-left"> 
											<a href="javascript:office.CallModalLawHeader('','CREATE','<?php echo $val1['id']; ?>');"    class="btn btn-info btn-icon btn-xs btn-round"><i class="ft-plus white"></i>   </a>	
											<?php echo $key1+1 ;?> 	
												 
											</td>
											<td> <?php echo $val1['id']; ?>  	</td>
											 <td> <?php echo $val1['category_th']; ?>  	</td>
											 
											<td> <?php echo $val1['orderby']; ?> </td>
											<td>  
												<fieldset>
													<input type="checkbox" class="switchBootstrap" id="enable<?php echo $val1['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val1['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('law_category','<?php echo $val1['id']?>','enable');"  />
												</fieldset>
											</td> 
											<td class="text-center"> 
												<a href="javascript:office.CallModalEditLawCate('<?php echo $val1['id']; ?>');" class="btn btn-icon btn-sm btn-warning" > <i class="fa fa-edit"></i>  แก้ไข </a> 
												<a href="javascript:contents.callModalDelete('law_category','<?php echo $val1['id'];?>','หัวข้อกฏหมาย','lawcate.php');" class=" btn btn-icon btn-sm btn-danger"><i class="fa fa-trash"></i> ลบ </a>
												 
											</td> 
										</tr >
										<?php 
											$lawhd = $clsoffice->Load('law_header',array( 'law_category_id'=> $val1['id'] ,'deleted'=>0) ,' orderby DESC','' );
											if($lawhd){
												foreach($lawhd as $key2 => $val2 ) {   
													?>
														<tr>
																<td  class="text-left">  &nbsp; &nbsp;
																	<a href="javascript:office.CallModalLawDetail('','CREATE','<?php echo $val2['id'];?>');"    class="btn btn-info btn-icon btn-xs  btn-round"><i class="ft-plus white"></i> </a>  <?php echo ($key1)+1 ;?>.<?php echo ($key2+1) ;?>  
																   
																</td>
																<td>    	</td>
																<td> <?php echo $val2['law_header_name']; ?>  	</td>
															 
																<td> <?php echo $val2['orderby']; ?> </td>
																<td>  
																	<fieldset>
																		<input type="checkbox" class="switchery"  data-size="xs"  id="enable<?php echo $val2['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val2['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('law_category','<?php echo $val2['id']?>','enable');"  />
																	</fieldset>
																</td> 
																<td class="text-center">  
																	<a href="javascript:office.CallModalLawHeader('<?php echo $val2['id']; ?>','EDIT','<?php echo $val1['id']; ?>');" class="btn btn-icon btn-xs btn-warning" > <i class="fa fa-edit"></i>   </a> 
																	<a href="javascript:contents.callModalDelete('law_header','<?php echo $val2['id'];?>','หัวข้อกฏหมาย','lawcate.php');" class=" btn btn-icon btn-xs btn-danger"><i class="fa fa-trash"></i>  </a>
																	
																</td> 
															</tr >

															<?php 
																$lawdet = $clsoffice->Load('law_detail',array( 'law_header_id'=> $val2['id'] ,'deleted'=>0 ) ,' orderby DESC','' );
																if($lawdet){
																	foreach($lawdet as $key3 => $val3 ) {   
																		?>
																			<tr>
																					<td  class="text-left">  </td>
																					<td>    	</td>
																					<td>  
																						<?php echo "(".($key3+1).")" ;?>
																						<a href="<?php echo $path['uploads'].$val3['lawfiles'];?>" target="_blank"> <?php echo $val3['lawname']; ?> </a> 	</td>
																		 
																					<td> <?php echo $val3['orderby']; ?> </td>
																					<td>  
																						<fieldset>
																							<input type="checkbox" class="switchery"  data-size="xs"  id="enable<?php echo $val3['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val3['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('law_detail','<?php echo $val2['id']?>','enable');"  />
																						</fieldset>
																					</td> 
																					<td class="text-center"> 
																						<a href="javascript:office.CallModalLawDetail('<?php echo $val3['id']; ?>','<?php echo $val2['id']; ?>');" class="btn btn-icon btn-xs btn-warning" > <i class="fa fa-edit"></i>   </a> 
																						<a href="javascript:contents.callModalDelete('law_detail','<?php echo $val3['id'];?>','ข้อกฏหมาย','lawcate.php');" class=" btn btn-icon btn-xs btn-danger"><i class="fa fa-trash"></i>  </a>
																						
																					</td> 
																				</tr >
																		<?php 
																	}
																}
																?>
													<?php 
												}
											}
								 
											}
										}
									?>
									
									</tbody>
								</table>
								<span class="text-danger"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> </span>
								<form id="form_set" method="post" action="lawcate_detail.php">
									<input type="hidden" id="data_id" name="data_id" value="">
									<input type="hidden" id="action" name="action" value=""> <!-- EDIT  CREATE  VIEW -->
								</form>
							</div>
					  </div>
					</div>
				  </div>
				</div>
			  </section>
			</div>
		  </div>
	</div>
  </div>


	<input type="hidden" class="form-control" id="create_by" name="create_by" value="<?php echo $_SESSION['deptcode'];?>" >
	<input type="hidden" class="form-control" id="create_date" name="create_date" value="<?php echo GetToday(''); ?>" >
	<input type="hidden" class="form-control" id="update_by" name="update_by" value="<?php echo $_SESSION['deptcode'];?>" >
	<input type="hidden" class="form-control" id="update_date" name="update_date" value="<?php echo GetToday(''); ?>" >
			
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- ////////////////////////////////////////////////////////////////////////////-->

	<!-- //////////////////////////////////////////  Modal-LawHeader  //////////////////////////////////////////////// -->
	<div class="modal fade text-left" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2" style="display: none;" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h3 class="modal-title text-white" id="modal2"><i class="la la-check-square-o"></i> แก้ไขหัวข้อย่อยข้อกฎหมาย </h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
				<form class="form ">
					<div class="form-body"> 
		 
					<div class="form-group">
							<input type="hidden" name="" id="law_header_id" value=""> 
						<label for=""> หัวข้อข้อมูลกฎหมาย  <span class="danger">*</span></label>
						<select class="form-control" name="law_category_id" id="law_category_id">
							<?php 
							if($lawcate){
								foreach( $lawcate as $key_e2 => $val_e2){
									?>
										<option value="<?php echo $val_e2['id'];?>"> <?php echo $val_e2['category_th'];?> </option>
									<?php
								}
							}
							?>
						
						</select>
						<!-- <input type="text" class="form-control" name="law_category_id" id="law_category_id" value="" placeholder=""> -->
					</div>
					<div class="form-group">
						<label for="">  หัวข้อย่อยข้อกฎหมาย <span class="danger">*</span></label>
						<input type="text" class="form-control" name="law_header_name" id="law_header_name" value="" placeholder="">
					</div>  

			 

					<div class="row hide">
						<div class="form-group col-md-12  ">
							<label for="">หมายเหตุ</label>
							<textarea name="remark" id="remark"  class="form-control" rows="4"></textarea> 
						</div>
					</div>
					
					<div class="row ">
						<div class="form-group col-md-5  ">
							<label for="">การเรียงลำดับ</label>
							<input type="number" class="form-control" name="orderby" id="orderby" value="100">
						</div>
					</div>
					<span class="text-danger hide"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> <br><br> </span>
				 

					<div class="row ">
						<div class="form-group col-md-12  ">
						<label class=" label-control" for=""> การแสดงผล <span class="danger">* </span></label> 
						<div class="row skin skin-square-orange ml-2">
									<div class="form-check form-check-inline mr-5">
										<input class="form-check-input mr-1" type="radio" name="enable2" id="enable2_Y" value="Y" checked >
										<label class="form-check-label ml-1" for="enable2_Y">เปิดใช้งาน</label>
									</div>
									<div class="form-check form-check-inline mr-5">
										<input class="form-check-input mr-1" type="radio" name="enable2" id="enable2_N" value="N"   >
										<label class="form-check-label ml-1" for="enable2_N">ไม่เปิดใช้งาน</label>
									</div>
								</div>
						</div>
					</div>

		 

				</div>  <!-- Formbody -->
			 </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
					<div id="button_modal2">  

					</div>
				 
				</div>
			</div>
		</div>
	</div>
	<!-- ////////////////////////////////////////  END Modal-LawHeader //////////////////////////////////////////////// -->

	<!-- //////////////////////////////////////////  Modal-Detail  //////////////////////////////////////////////// -->
		<div class="modal fade text-left" id="modal3" tabindex="-1" role="dialog" aria-labelledby="modal3" style="display: none;" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h3 class="modal-title text-white" id="modal3"><i class="la la-check-square-o"></i> แก้ไขข้อมูลกฎหมาย </h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
				<form class="form ">
					<div class="form-body"> 
		 
							<div class="form-group">
									<input type="hidden" name="" id="law_detail_id" value=""> 
								<label for=""> หัวข้อข้อมูลกฎหมาย  <span class="danger">*</span></label>
								<select class="form-control" name="law_header_id3" id="law_header_id3">
									<?php  
									if($lawcate){
										foreach( $lawcate as $key_e2 => $val_e2){
											$lawheader = $clsoffice->Load('law_header',array('deleted'=>0 ,'law_category_id' =>$val_e2['id'] ),'  orderby DESC  ','');
											?>
											<optgroup label="<?php echo $val_e2['category_th'];?>">
											<?php 
												if($lawheader){
													foreach( $lawheader as $key_e3 => $val_e3){ 
												?>
												<option value="<?php echo $val_e3['id'];?>" > <?php echo $val_e3['law_header_name'];?> </option>
												<?php
														}
													}
												?> 
											</optgroup>
											<?php
										}
									}
									?> 
								</select> 
							</div>

							
							 
							<div class="form-group">
								<label for="">  ข้อกฎหมาย <span class="danger">*</span></label>
								<input type="text" class="form-control" name="lawname" id="lawname" value="" placeholder="">
							</div>  

							<div class="form-group">
								<label for="">  เอกสาร <span class="danger">*</span></label>
								<div class="boxfile"> 
								
								</div>
								<input type="file" class="form-control" name="lawfiles" id="lawfiles" value="" placeholder="">
							</div> 

					

							<div class="row hide">
								<div class="form-group col-md-12  ">
									<label for="">หมายเหตุ</label>
									<textarea name="remark" id="remark"  class="form-control" rows="4"></textarea> 
								</div>
							</div>
							
							<div class="row ">
								<div class="form-group col-md-5  ">
									<label for="">การเรียงลำดับ</label>
									<input type="number" class="form-control" name="orderby" id="orderby" value="100">
								</div>
							</div>
							<span class="text-danger hide"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> <br><br> </span>
						

							<div class="row ">
								<div class="form-group col-md-12  ">
								<label class=" label-control" for=""> การแสดงผล <span class="danger">* </span></label> 
								<div class="row skin skin-square-orange ml-2">
											<div class="form-check form-check-inline mr-5">
												<input class="form-check-input mr-1" type="radio" name="enable3" id="enable3_Y" value="Y" checked >
												<label class="form-check-label ml-1" for="enable3_Y">เปิดใช้งาน</label>
											</div>
											<div class="form-check form-check-inline mr-5">
												<input class="form-check-input mr-1" type="radio" name="enable3" id="enable3_N" value="N"   >
												<label class="form-check-label ml-1" for="enable3_N">ไม่เปิดใช้งาน</label>
											</div>
										</div>
								</div>
							</div>

		 

					</div>  <!-- Formbody -->
			 	</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
					<div id="button_modal3">  

					</div>
				 
				</div>
			</div>
		</div>
	</div>
	<!-- ////////////////////////////////////////  END Modal-Detail //////////////////////////////////////////////// -->



	 <!-- //////////////////////////////// CREATE //////////////////////////////////////////////// -->
	<div class="modal fade text-left" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h3 class="modal-title text-white" id="myModalLabel1"><i class="la la-check-square-o"></i> เพิ่ม<?php echo $menuname;?></h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
				<form class="form ">
					<div class="form-body"> 

					<br>
					<div class="form-group"> 
						<label for="">  หัวข้อกฎหมายภาษาไทย <?php echo  $pathfllang['th'];?> <span class="danger">*</span></label>
						<input type="text" class="form-control" name="category_th1" id="category_th1" value="" placeholder="">
					</div>
					<div class="form-group">
						<label for=""> หัวข้อกฎหมายภาษาอังกฤษ <?php echo  $pathfllang['en'];?>  <span class="danger">*</span></label>
						<input type="text" class="form-control" name="category_en1" id="category_en1" value="" placeholder="">
					</div> 
		 
					<div class="row hide">
						<div class="form-group col-md-12  ">
							<label for="">หมายเหตุ</label>
							<textarea name="remark1" id="remark1"  class="form-control" rows="4"></textarea> 
						</div>
					</div> 
 
					
					<div class="row ">
						<div class="form-group col-md-5  ">
							<label for="">การเรียงลำดับ</label>
							<input type="number" class="form-control" name="orderby1" id="orderby1" value="100">
						</div>
					</div>
					<span class="text-danger hide"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> <br><br> </span>
			  
					<div class="row ">
						<div class="form-group col-md-12  ">
						<label class=" label-control" for=""> การแสดงผล <span class="danger">* </span></label> 
							<div class="row skin skin-square-orange ml-2">
										<div class="form-check form-check-inline mr-5">
											<input class="form-check-input mr-1" type="radio" name="enable1" id="enable1_Y" value="Y" >
											<label class="form-check-label ml-1" for="enable1_Y">เปิดใช้งาน</label>
										</div>
										<div class="form-check form-check-inline mr-5">
											<input class="form-check-input mr-1" type="radio" name="enable1" id="enable1_N" value="N"   >
											<label class="form-check-label ml-1" for="enable1_N">ไม่เปิดใช้งาน</label>
										</div>
							</div>
						</div>
					</div>


					
				</div>  <!-- Formbody -->
			 </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
					<button type="button" class="btn btn-info" onclick="office.CreateLawCate();">
						<i class="la la-check-square-o"></i> บันทึก 
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- ////////////////////////////////Edit//////////////////////////////////////////////// -->
	<div class="modal fade text-left" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h3 class="modal-title text-white" id="myModalLabel1"><i class="la la-check-square-o"></i> แก้ไข<?php echo $menuname;?></h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
				<form class="form ">
					<div class="form-body">
					
				 

					<br>
					<div class="form-group">
							<input type="hidden" name="" id="id_dm" value=""> 
						<label for=""> หัวข้อกฎหมายภาษาไทย <?php echo  $pathfllang['th'];?> <span class="danger">*</span></label>
						<input type="text" class="form-control" name="category_th" id="category_th" value="" placeholder="">
					</div>
					<div class="form-group">
						<label for=""> หัวข้อกฎหมายภาษาอังกฤษ <?php echo  $pathfllang['en'];?>  <span class="danger">*</span></label>
						<input type="text" class="form-control" name="category_en" id="category_en" value="" placeholder="">
					</div> 
				 
					<div class="row hide">
						<div class="form-group col-md-12  ">
							<label for="">หมายเหตุ</label>
							<textarea name="remark" id="remark1"  class="form-control" rows="4"></textarea> 
						</div>
					</div>  
					
					<div class="row ">
						<div class="form-group col-md-5  ">
							<label for="">การเรียงลำดับ</label>
							<input type="number" class="form-control" name="orderby" id="orderby" value="100">
						</div>
					</div>
					<span class="text-danger hide"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> <br><br> </span>
 
					<div class="row ">
						<div class="form-group col-md-12  ">
						<label class=" label-control" for=""> การแสดงผล <span class="danger">* </span></label> 
							<div class="row skin skin-square-orange ml-2">
										<div class="form-check form-check-inline mr-5">
											<input class="form-check-input mr-1" type="radio" name="enable_edit" id="enable_edit_Y" value="Y" >
											<label class="form-check-label ml-1" for="enable_edit_Y">เปิดใช้งาน</label>
										</div>
										<div class="form-check form-check-inline mr-5">
											<input class="form-check-input mr-1" type="radio" name="enable_edit" id="enable_edit_N" value="N"   >
											<label class="form-check-label ml-1" for="enable_edit_N">ไม่เปิดใช้งาน</label>
										</div>
							</div>
						</div>
					</div>

				</div>  <!-- Formbody -->
			 </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
					<button type="button" class="btn btn-info" onclick="office.EditLawCate();">
						<i class="la la-check-square-o"></i> บันทึกการแก้ไข
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- ////////////////////////////////END EDIT//////////////////////////////////////////////// -->
		
	<!-- ////////////////////////////////////////////////////////////////////////////-->
   <!-- modal_confirm -->
	 <div class="modal fade text-left" id="modal_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true" >
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info white text-center">
            <h4 class="modal-title modal-center white" ><i class="la la-save"></i> ยืนยันการบันทึกข้อมูล</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
          <br>
            <p> ต้องการยืนยันการบันทึกข้อมูล </p>
          </div>
          <div class="modal-footer ">
            <div class="modal-center">
              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
              <button type="button" class="btn btn-outline-info"  onclick="office.EditLawCate();" >ยืนยัน</button>
            </div>
          </div>
        </div>
      </div>
    </div>
		<!-- ./modal_confirm -->
		<!-- modal_confirm -->
		<div class="modal fade text-left" id="modal_confirmcreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9" aria-hidden="true" >
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info white text-center">
            <h4 class="modal-title modal-center white" ><i class="la la-save"></i> ยืนยันการบันทึกข้อมูล</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
          <br>
            <p> ต้องการยืนยันการบันทึกข้อมูล </p>
          </div>
          <div class="modal-footer ">
            <div class="modal-center">
              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
              <button type="button" class="btn btn-outline-info"  onclick="office.CreateLawCate();" >ยืนยัน</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ./modal_confirm -->
	<!-- ////////////////////////////////////////////////////////////////////////////-->


<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- ////////////////////////////////////////////////////////////////////////////-->


	



  <?php include "prepare_script.php";?>
  <?php include "prepare_footer.php";?>

	<script >
	$(document).ready(function () {
		// $('#tbdata1').DataTable();
		 //localStorage.numperpage = 10;
	});
	</script>
