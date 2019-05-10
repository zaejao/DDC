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

	$dataid = $_POST['data_id'];
	$lawcate = $clsoffice->LoadOnce('law_category',array( 'id'=>$dataid )  );
//	$lawhd = $clsoffice->Load('law_header',array( 'law_category_id'=> $dataid ) ,' orderbr DESC','' );
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
											 <th> หัวข้อกฏหมาย  </th> 
											 <th> รายละเอียด  </th> 
											<th> เรียงลำดับ </th>
											<th> แสดงผล </th>  
											<th class="text-center"> จัดการข้อมูล </th>
										</tr>
									</thead>
									<tbody>
									<?php 
										if($lawhd){  
											foreach($lawhd as $key1 => $val1 ) {   
									?>
										<tr >
											<td  class="text-center"> <?php echo ($key1+1) ;?> </td>
											 <td> <?php echo $val1['law_header_name']; ?>  	</td>
											 <td> 
											 <a href="javascript:contents.SetFrom('EDIT','<?php echo $val1['id']; ?>');" class="text-info" > <i class="fa fa-th-list"></i>  ข้อมูล </a> 
											   </td>
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
										<input type="radio" class="enable1" name="enable1" id="enable1_Y" value="Y"  checked  >
										<label for="enable1_Y">  เปิดใช้งาน</label>
									</div>
									<div class="d-inline-block custom-control custom-radio mr-1">
										<input type="radio" class="enable1"  name="enable1" id="enable1_N"   value="N">
										<label for="enable1_N"> ไม่เปิดใช้งาน</label>
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
					<div class="form-group">
				 
		 
					
					<div class="row ">
						<div class="form-group col-md-5  ">
							<label for="">การเรียงลำดับ</label>
							<input type="number" class="form-control" name="orderby" id="orderby" value="100">
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
	



  <?php include "prepare_script.php";?>
  <?php include "prepare_footer.php";?>

	<script >
	$(document).ready(function () {
		 $('#tbdata1').DataTable();
	});
	</script>
