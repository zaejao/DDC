<?php
  include "prepare_htmlhead.php";
	include "../duck.conf.php";
  $menucode = "BANNER" ;
  $menucode1 = "BANNERSYSTEM" ;

  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clsoffice = new OfficeClass();
	$banners = $clsoffice->Load('bannerssystem',array('deleted'=>0 ,'department_code_ch'=>$_SESSION['deptcode']),'  orderby DESC  ','');
	 
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
							<a href="javascript:" onclick="$('#create_modal').modal('show');"  class="btn btn-info btn-sm"><i class="ft-plus white"></i> เพิ่ม<?php echo $menuname;?> </a>
							<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
							<div class="heading-elements">
							</div>
					  </div>
					</div>
					<div class="card-content">
					  <div class="card-body"> 
							<div class="table-responsive">
								<table id="tbdata1" class="table table-white-space  table-middle table-hover">
									<thead class="bg_custom">
										<tr>
											<th class="text-center"> ลำดับ </th>
											<th> รูปภาพ </th>
											<th> ชื่อแบนเนอร์ </th> 
											<th> เรียงลำดับ </th>
											<th> แสดงผล </th>  
											<th class="text-center"> จัดการข้อมูล </th>
										</tr>
									</thead>
									<tbody>
									<?php 
										if($banners){  
											foreach($banners as $key1 => $val1 ) { 
											
									?>
										<tr >
											<td  class="text-center"> <?php echo $key1+1 ;?> </td>
											<td> <img src="<?php echo $path['bannerlink'].$val1['pathpic']; ?>" style="height: 58px;border: 1px solid #d0d0d0;"> <?php //echo $val1['pathpic']; ?> </td>
											<td> <?php echo $val1['bannername_th']; ?>
												<br><?php echo $val1['bannername_en']; ?>  
												<br> <a href="<?php echo $val1['pathlink']; ?> " target="_blank"><?php echo $val1['pathlink']; ?> </a>
											</td>
											<td> <?php echo $val1['orderby']; ?> </td>
											<td>  
												<fieldset>
													<input type="checkbox" class="switchBootstrap" id="enable<?php echo $val1['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $val1['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('bannerssystem','<?php echo $val1['id']?>','enable');"  />
												</fieldset>
											</td> 
											<td class="text-center"> 
												<a href="javascript:office.CallModalEditBannersSystem('<?php echo $val1['id']; ?>');" class="btn btn-icon btn-sm btn-warning" > <i class="fa fa-edit"></i>  แก้ไข </a> 
												<a href="javascript:contents.callModalDelete('bannerssystem','<?php echo $val1['id'];?>','ป้ายแบนเนอร์','bannersystem.php');" class=" btn btn-icon btn-sm btn-danger"><i class="fa fa-trash"></i> ลบ </a>
												 
											</td> 
										</tr >
									<?php 
											}
										}
									?>
									
									</tbody>
								</table>
								<span class="text-danger"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> </span>
								<form id="form_set" method="post" action="">
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



	<!-- ////////////////////////////////////////////////////////////////////////////-->
	<!-- ////////////////////////////////Create//////////////////////////////////////////////// -->
	 <div class="modal fade text-left" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
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
							
							<div class="form-group">
								<label for=""> รูปภาพ  <span class="danger">* รูปภาพควรมีขนาด กว้าง260px*ยาว80px</span>  </label>
									<div id="box_pathpic">  
									</div>
									<div class="img_center">
											<img class="" style="width:260px;height:80px;" id="picture_disp1"  src="" id="picture_disp1" >
									</div>
									<br>
									<fieldset class="form-group">
											<div class="custom-file">
											<input type="file" class="form-control" id="pathpic1" name="pathpic1" accept="image/*" onchange="duck.DisplayImage(event,'pathpic1','','picture_disp1')"> 
											</div>
									</fieldset>
							</div>

							<br>
							<div class="form-group">
								<label for=""> ชื่อแบนเนอร์ภาษาไทย <?php echo  $pathfllang['th'];?> <span class="danger">*</span></label>
								<input type="text" class="form-control" name="bannername_th1" id="bannername_th1" value="" placeholder="ชื่อแบนเนอร์ภาษาไทย">
							</div>
							<div class="form-group">
								<label for=""> ชื่อแบนเนอร์ภาษาอังกฤษ <?php echo  $pathfllang['en'];?>  <span class="danger">*</span></label>
								<input type="text" class="form-control" name="bannername_en1" id="bannername_en1" value="" placeholder="ชื่อแบนเนอร์ภาษาอังกฤษ">
							</div> 
							<div class="form-group">
								<label for=""> ลิงก์  <span class="danger">*</span> </label>
								<input type="text" class="form-control" name="pathlink1" id="pathlink1" value="" placeholder="ลิงก์">
							</div> 

							<input type="hidden" class="form-control" name="department_code_ch1" id="department_code_ch1" value="<?php echo $_SESSION['deptcode'];?>" >
							
							<div class="row ">
								<div class="form-group col-md-5  ">
									<label for="">การเรียงลำดับ</label>
									<input type="number" class="form-control" name="orderby1" id="orderby1" value="100">
								</div>
							</div>
							<span class="text-danger hide"> <small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> <br><br> </span>
							<div class="form-group ">
								<div class="controls">
									<label for="eventRegInput1 text-center"> การแสดงผล </label>
									<div class="row   ">
										<div class=" col-sm-12">
											<div class="d-inline-block custom-control custom-radio mr-1">
												<input type="radio" class="enable_edit" name="enable_edit1" id="enable_edit_Y1" value="Y"  checked >
												<label for="enable_edit_Y">  เปิดใช้งาน</label>
											</div>
											<div class="d-inline-block custom-control custom-radio mr-1">
												<input type="radio" class="enable_edit"  name="enable_edit1" id="enable_edit_N1"   value="N">
												<label for="enable_edit_N"> ไม่เปิดใช้งาน</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>  <!-- Formbody -->
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
					<button type="button" class="btn btn-info" onclick="office.CreateBannersSystem();">
						<i class="la la-check-square-o"></i> บันทึก
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
				<form class="form ">
					<div class="form-body">
					
					<div class="form-group">
						<label for=""> รูปภาพ  <span class="danger">* รูปภาพควรมีขนาด  กว้าง260px*ยาว80px</span>  </label>
							<div id="box_pathpic">  
							</div>
							<div class="img_center">
									<img class="" style="width:260px;height:80px;" id="picture_disp"  src="" id="picture_disp" onerror="this.onerror=null;this.src='../uploads/bannerslink/logo_ministry.png';" >
							</div>
							<br>
							<fieldset class="form-group">
									<div class="custom-file"> 
									 <input type="file" class="form-control" id="pathpic" name="pathpic" accept="image/*" onchange="duck.DisplayImage(event,'pathpic','','picture_disp')"> 
									</div>
							</fieldset>
					</div>

					<br>
					<div class="form-group">
							<input type="hidden" name="" id="id_dm" value=""> 
						<label for=""> ชื่อแบนเนอร์ภาษาไทย <?php echo  $pathfllang['th'];?> <span class="danger">*</span></label>
						<input type="text" class="form-control" name="bannername_th" id="bannername_th" value="" placeholder="ชื่อแบนเนอร์ภาษาไทย">
					</div>
					<div class="form-group">
						<label for=""> ชื่อแบนเนอร์ภาษาอังกฤษ <?php echo  $pathfllang['en'];?>  <span class="danger">*</span></label>
						<input type="text" class="form-control" name="bannername_en" id="bannername_en" value="" placeholder="ชื่อแบนเนอร์ภาษาอังกฤษ">
					</div> 
					<div class="form-group">
						<label for=""> ลิงก์  <span class="danger">*</span> </label>
						<input type="text" class="form-control" name="pathlink" id="pathlink" value="" placeholder="ลิงก์">
					</div> 

					<input type="hidden" class="form-control" name="department_code_ch" id="department_code_ch" value="<?php echo $_SESSION['deptcode'];?>" >
					
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
			 </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
					<button type="button" class="btn btn-info" onclick="office.EditBannersSystem();">
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
