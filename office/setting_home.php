<?php
  include "prepare_htmlhead.php";

  $menucode = "SETTINGHOME" ;
  $menucode1 = "SETTINGHOME" ;

  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clscont = new ContentsClass();
	$menumain1 = $clscont->Load('setting_home',array('department_code_ch'=>$_SESSION['deptcode']),' orderby desc ','');

?>
  <?php include "prepare_navtop.php";?>
  <?php include "prepare_navside.php";?>
  <div class="app-content content">
    <div class="content-wrapper">
		<?php include "prepare_navcont.php";?>
	
		<?php // echo "<pre>".print_r($menumain1,true)."</pre>" ;?>
		<div class="content-detached">
			<div class="content-body">

				<section class="row">
				<div class="col-12">
				  <div class="card">
					<div class="card-head">
					</div>
					<div class="card-content">
					  <div class="card-body"> 
							<div class="table-responsive">
								<table id="tbdata" class="table table-white-space  table-middle table-hover">
									<thead class="bg_custom">
										<tr>
											<th  class="text-center"> ลำดับ </th>
											<th> รหัสส่วนแสดงผล </th>
											<th> ชื่อส่วนแสดงภาษาไทย </th>
											<th> ชื่อส่วนแสดงภาษาอังกฤษ </th>
											<th class="text-center"> จำนวนแสดง </th>
											<th class="text-center"> แสดงผล </th>
											<th class="text-center"> จัดการข้อมูล </th>
										</tr>
									</thead>
									<tbody>
									<?php 
										if($menumain1){  
											foreach($menumain1 as $key1 => $val1 ) { 
									?>
										<tr >
											<td  class="text-center"> <?php echo $key1+1 ;?> </td>
											<td> <?php echo $val1['sectionname']; ?> </td>
											<td> <?php echo $val1['sectionname_th']; ?> </td>
											<td> <?php echo $val1['sectionname_en']; ?> </td>
											<td class="text-center"> 
												<?php  
													if($val1['numrow']!=0){ 
														echo $val1['numrow'];
													}else{
														echo "-";
													} 
												?> 
											</td>
											<td class="text-center"> 
												<?php //echo $val1['enable']; ?> 
												<fieldset>
													<input type="checkbox" class="switchBootstrap" id="enable<?php echo $val1['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val1['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('setting_home','<?php echo $val1['id']?>','enable');"  />
												</fieldset>
											</td>
											<td class="text-center"> 
												<button onclick="office.CallModalEditSettingHome('<?php echo $val1['id']; ?>');" class="edit-modal btn btn-icon btn-sm btn-warning" data-id="<?php echo $val1['id']; ?>" >
												<i class="fa fa-edit"></i>  แก้ไข 
												</button> 
											</td> 
										</tr >
									<?php 
											}
										}
									?>
									
									</tbody>
								</table>
								<span class="text-danger"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> </span>
								<form id="form_set" method="post">
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

	<!-- /////////////////////////////////////////////////////////////////////////////////////-->
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
					<div class="form-body">
					
					<div class="form-group">
						<label for="">รหัสส่วนแสดงผล </label>
						
						<div class="formnone" > 
							<span  id="sectionname" ></span>
						</div>
					 	
					</div>

					<div class="form-group">
							<input type="hidden" name="" id="id_dm" value=""> 
						<label for="">ชื่อส่วนแสดงภาษาไทย</label>
						<input type="text" class="form-control" name="sectionname_th" id="sectionname_th" value="" placeholder="ชื่อส่วนแสดงภาษาไทย">
					</div>
					<div class="form-group">
						<label for="">ชื่อส่วนแสดงภาษาอังกฤษ </label>
						<input type="text" class="form-control" name="sectionname_en" id="sectionname_en" value="" placeholder="ชื่อส่วนแสดงภาษาอังกฤษ">
					</div> 
					<div class="row box_numrow hide">
						<div class="form-group col-md-5  ">
							<label for="">จำนวนที่ต้องการแสดง </label>
							<input type="number" class="form-control" name="numrow" id="numrow" min="1"  >
						</div>
					</div>
					<div class="row hide">
						<div class="form-group col-md-5  ">
							<label for="">การเรียงลำดับ</label>
							<input type="number" class="form-control" name="orderby" id="orderby_edit" value="100">
						</div>
					</div>
					<span class="text-danger hide"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> <br><br> </span>
					<div class="form-group ">
						<div class="controls">
							<label for="eventRegInput1 text-center"> การแสดงผล </label>
							<div class="row   ">
								<div class=" col-sm-12">
									<div class="d-inline-block custom-control custom-radio mr-1">
										<input type="radio" class="enable_edit" name="enable_edit" id="enable_edit_Y" value="Y"   >
										<label for="enable_edit_Y">  เปิดใช้งาน</label>
									</div>
									<div class="d-inline-block custom-control custom-radio mr-1">
										<input type="radio" class="enable_edit"  name="enable_edit" id="enable_edit_N"   value="N">
										<label for="enable_edit_N"> ไม่เปิดใช้งาน</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>  <!-- Formbody -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
					<button type="button" class="btn btn-info" onclick="office.EditSettingHome();">
						<i class="la la-check-square-o"></i> บันทึกการแก้ไข
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- ////////////////////////////////END EDIT//////////////////////////////////////////////// -->
			

  <?php include "prepare_script.php";?> 
  <?php include "prepare_footer.php";?>


	<script >
	$(document).ready(function () {
		 $('#tbdata1').DataTable();
	});
	</script>
