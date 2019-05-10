<?php
  include "prepare_htmlhead.php";
	include "../duck.conf.php";
  $menucode = "AUCTIONSCATE" ;
  $menucode1 = "AUCTIONSTYPECATE" ;

  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clsoffice = new OfficeClass();
	
	$auctionstype= $clsoffice->Load('auctions_type',array('deleted'=>0  ),'  orderby DESC  ','');
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
			 
					<div class="card-content">
					  <div class="card-body"> 
							<div class="table-responsive">
								<table id="tbdata" class="table table-xs  table-hover">
									<thead class="bg_custom">
										<tr>
											<th class="text-left"> ลำดับ </th>
										 	<th> หมวดหมู่การจัดซื้อจัดจ้าง  </th> 
											<th> เรียงลำดับ </th>
											<th> แสดงผล </th>  
											<th class="text-center"> จัดการข้อมูล </th>
										</tr>
									</thead> 
									<tbody>

									<?php 
										if($auctionstype){  
											foreach($auctionstype as $key1 => $val1 ) {  
									?>
										<tr class="group">
											<td  class="text-left"> <?php echo $key1+1 ;?> </td>
									 		<td> <?php echo $val1['auctions_type_th']; ?>
												<br><?php echo $val1['auctions_type_code']; ?>   
											</td>
											<td> <?php echo $val1['orderby']; ?> </td>
											<td>   
											</td> 
											<td class="text-center">  
											</td> 
										</tr >
									<?php 
									$auctionstypecate = $clsoffice->Load('auctions_typecate',array('deleted'=>0 ,'auctions_type_id'=> $val1['id']),'  orderby DESC  ','');
											//	$auctionscate = $clsoffice->Load('auctions_category',array('deleted'=>0  ),'  orderby DESC  ','');
											?>
											<?php 
										if($auctionstypecate){  
											foreach($auctionstypecate as $key2 => $val2 ) {  
												$auctionscate = $clsoffice->LoadOnce('auctions_category',array( 'id'=> $val2['auctions_category_id'] ) );
									?>
										<tr >
											<td  class="text-left"> &nbsp;&nbsp; <?php echo ($key1+1).".".($key2+1) ;?> </td>
									 		<td> <?php echo $auctionscate['auctions_category_th']; ?>
												<br><?php echo $auctionscate['auctions_category_code']; ?>   
											</td>
											<td> <?php echo $auctionscate['orderby']; ?> </td>
											<td>  
												<fieldset>
													<input type="checkbox" class="switchBootstrap" id="enable<?php echo $auctionscate['id']?>" data-on-text="On"  data-off-text="Off" data-on-color="success"  <?php if( $auctionscate['enable'] == "Y" ){ echo " checked " ; }?>  onchange="office.callSetEnable('auctions_typecate','<?php echo $auctionscate['id']?>','enable');"  />
												</fieldset>
											</td> 
											<td class="text-center"> 
												<a href="javascript:office.CallModalEditAuctionsTypeCate('<?php echo $auctionscate['id']; ?>');" class="btn btn-icon btn-sm btn-warning" > <i class="fa fa-edit"></i>   </a> 
												<a href="javascript:contents.callModalDelete('auctions_typecate','<?php echo $auctionscate['id'];?>','หมวดหมู่การจัดซื้อจัดจ้าง','auctionstypecate.php');" val2=" btn btn-icon btn-sm btn-danger"><i class="fa fa-trash"></i>  </a>
												 
											</td> 
										</tr >
									<?php 
											}
										}
							 


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
						<label for=""> หมวดหมู่การจัดซื้อจัดจ้างภาษาไทย <?php echo  $pathfllang['th'];?> <span class="danger">*</span></label>
						<input type="text" class="form-control" name="auctions_category_th1" id="auctions_category_th1" value="" placeholder="">
					</div>
					<div class="form-group hide" >
						<label for=""> หมวดหมู่การจัดซื้อจัดจ้างภาษาอังกฤษ <?php echo  $pathfllang['en'];?>  <span class="danger">*</span></label>
						<input type="text" class="form-control" name="auctions_category_en1" id="auctions_category_en1" value="" placeholder="">
					</div> 
					<div class="form-group">
						<label for=""> รหัสหมวดหมู่การจัดซื้อจัดจ้าง  <span class="danger">*</span> </label>
						<input type="text" class="form-control" name="auctions_category_code1" id="auctions_category_code1" value="" placeholder="">
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
					<button type="button" class="btn btn-info" onclick="office.CheckFormCreateAuctionsCate();">
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
						<label for=""> หมวดหมู่การจัดซื้อจัดจ้างภาษาไทย <?php echo  $pathfllang['th'];?> <span class="danger">*</span></label>
						<input type="text" class="form-control" name="auctions_category_th" id="auctions_category_th" value="" placeholder="">
					</div>
					<div class="form-group hide">
						<label for=""> หมวดหมู่การจัดซื้อจัดจ้างภาษาอังกฤษ <?php echo  $pathfllang['en'];?>  <span class="danger">*</span></label>
						<input type="text" class="form-control" name="auctions_category_en" id="auctions_category_en" value="" placeholder="">
					</div> 
					<div class="form-group">
						<label for=""> รหัสหมวดหมู่การจัดซื้อจัดจ้าง  <span class="danger">*</span> </label>
						<input type="text" class="form-control" name="auctions_category_code" id="auctions_category_code" value="" placeholder="">
					</div> 

		 
					
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
					<button type="button" class="btn btn-info" onclick="office.CheckFormEditAuctionsCate();">
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
              <button type="button" class="btn btn-outline-info"  onclick="office.EditAuctionsCate();" >ยืนยัน</button>
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
              <button type="button" class="btn btn-outline-info"  onclick="office.CreateAuctionsCate();" >ยืนยัน</button>
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
