<?php
  include "prepare_htmlhead.php";

  $menucode = "DISEASE" ;
  $menucode1 = "DISEASETYPE" ;

  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clscont = new ContentsClass();
	$detail = $clscont->Load('disease_header',array('deleted'=>'0'),' orderby desc ','');

?>
  <?php include "prepare_navtop.php";?>
  <?php include "prepare_navside.php";?>
  <div class="app-content content">
    <div class="content-wrapper">
		<?php include "prepare_navcont.php";?>
	
		<?php // echo "<pre>".print_r($detail,true)."</pre>" ;?>
		<div class="content-detached">
			<div class="content-body">

				<section class="row">
				<div class="col-12">
				  <div class="card">
						<div class="card-head">
							<div class="card-header"> 
								<a href="javascript:" onclick="$('#create_modal').modal('show');" class="create-modal  btn btn-icon btn-sm btn-info" >  
									<i class="ft-plus white"></i> เพิ่ม <?php echo $menuname;?> </a> 
							</div>
					  </div>
			
						<div class="card-content">
							<div class="card-body"> 
								<div class="table-responsive">
									<table id="tbdata1" class="table table-white-space  table-middle table-hover">
										<thead class="bg_custom">
											<tr>
												<th  class="text-center"> ลำดับ </th>
												<th> ข้อมูลภาษาไทย </th>
												<th> ข้อมูลภาษาอังกฤษ </th> 
												<th class="text-center"> การเรียงลำดับ </th>
												<th class="text-center"> แสดงผล </th>
												<th class="text-center"> จัดการข้อมูล </th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if($detail){  
												foreach($detail as $key1 => $val1 ) { 
										?>
											<tr >
												<td  class="text-center"> <?php echo $key1+1 ;?> </td> 
												<td> <?php echo $val1['disease_header_th']; ?> </td>
												<td> <?php echo $val1['disease_header_en']; ?> </td> 
												<td class="text-center"> <?php echo $val1['orderby']; ?> </td> 
												<td class="text-center">  
													<fieldset>
														<input type="checkbox" class="switchBootstrap" id="enable<?php echo $val1['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val1['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('disease_header','<?php echo $val1['id']?>','enable');"  />
													</fieldset>
												</td>
												<td class="text-center"> 
													<a href="javascript:office.CallModalEditDiseaseHeader('<?php echo $val1['id']; ?>');" class="edit-modal  btn btn-icon btn-sm btn-warning" data-id="<?php echo $val1['id']; ?>" >
														<i class="fa fa-edit"></i>  แก้ไข  
													</a> 
													<a href="javascript:contents.callModalDelete('disease_header','<?php echo $val1['id'];?>','<?php echo $val1['disease_header_th']; ?>','disease_header.php');" class=" btn btn-icon btn-sm btn-danger"><i class="fa fa-trash"></i> ลบ </a>
												
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

	<!-- /////////////////////////////////////////////////////////////////////////////////////-->
	<!-- ////////////////////////////////Create//////////////////////////////////////////////// -->
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
					<div class="form-body">

					<input type="hidden" class="form-control" name="create_by" id="create_by" value="<?php echo $_SESSION['deptcode'];?>"  >
					<input type="hidden" class="form-control" name="create_date" id="create_date" value="<?php echo GetToday('');?>" >  
				
					<div class="form-group"> 
						<label for="">ชื่อภาษาไทย</label>
						<input type="text" class="form-control" name="disease_header_th_1" id="disease_header_th_1" value="" placeholder="ชื่อภาษาไทย">
					</div>
					<div class="form-group">
						<label for=""> ชื่อภาษาอังกฤษ </label>
						<input type="text" class="form-control" name="disease_header_en_1" id="disease_header_en_1" value="" placeholder="ชื่อภาษาอังกฤษ">
					</div> 
				
					<div class="row ">
						<div class="form-group col-md-5  ">
							<label for="">การเรียงลำดับ</label>
							<input type="number" class="form-control" name="orderby_1" id="orderby_1" value="100">
						</div>
					</div>
					<span class="text-danger hide"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> <br><br> </span>
					<div class="form-group ">
						<div class="controls">
							<label for="eventRegInput1 text-center"> การแสดงผล </label>
							<div class="row   ">
								<div class=" col-sm-12">
									<div class="d-inline-block custom-control custom-radio mr-1">
										<input type="radio" class="enable_1" name="enable_1" id="enable_1_Y" value="Y"  checked >
										<label for="enable_1_Y">  เปิดใช้งาน</label>
									</div>
									<div class="d-inline-block custom-control custom-radio mr-1">
										<input type="radio" class="enable_1"  name="enable_1" id="enable_1_N"   value="N">
										<label for="enable_1_N"> ไม่เปิดใช้งาน</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>  <!-- Formbody -->
				</div>
				<div class="modal-footer m-auto">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
					<button type="button" class="btn btn-info" onclick="office.CreateDiseaseHeader();">
						<i class="la la-check-square-o"></i> บันทึกการแก้ไข
					</button>
				</div>
			</div>
		</div>
	</div>
	<!-- ////////////////////////////////END EDIT//////////////////////////////////////////////// -->
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
							<input type="hidden" name="" id="id_dm" value=""> 
							<input type="hidden" class="form-control" name="update_by" id="update_by" value="<?php echo $_SESSION['deptcode'];?>"  >
							<input type="hidden" class="form-control" name="update_date" id="update_date" value="<?php echo GetToday('');?>" >  
						<label for="">ชื่อภาษาไทย</label>
						<input type="text" class="form-control" name="disease_header_th" id="disease_header_th" value="" placeholder="ชื่อภาษาไทย">
					</div>
					<div class="form-group">
						<label for=""> ชื่อภาษาอังกฤษ </label>
						<input type="text" class="form-control" name="disease_header_en" id="disease_header_en" value="" placeholder="ชื่อภาษาอังกฤษ">
					</div> 
				
					<div class="row ">
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
				<div class="modal-footer  m-auto">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
					<button type="button" class="btn btn-info" onclick="office.EditDiseaseHeader();">
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
