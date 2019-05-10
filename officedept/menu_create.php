<?php
  include "prepare_htmlhead.php";
	include "../duck.conf.php";

  $menucode = "MENU" ;
  $menucode1 = "MENU_CREATE" ;

  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clsoffice = new OfficeClass();
 
	$deptcode = $_SESSION['deptcode'];
 
	 
	$menusub1 = $clsoffice->Load('menusub',array('deleted'=>0 , 'menusub_level'=>1 ,'department_code_ch'=>$deptcode ),' orderby DESC ','');  
	 
?>
  <?php include "prepare_navtop.php";?>
  <?php include "prepare_navside.php";?>
  <div class="app-content content">
    <div class="content-wrapper">
		<?php include "prepare_navcont.php";?>
	 
		<?php  //echo "<pre>".print_r($data1,true)."</pre>" ;?>
			<div class="content-detached">
				<div class="content-body">

					<section class="row">
					<div class="col-12">
						<div class="card">
					
						<div class="card-content collpase show">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-10 mx-auto" >
												
						<form class="form form-horizontal">
							<div class="form-body">
								
								<h4 class="form-section"><i class="ft-clipboard"></i> เพิ่มเมนู </h4>


								<input id="id_dm" type="hidden" value="<?php echo $dataid;?>"> 

								<div class="form-group row">
									<label class="col-md-3 label-control" for="menusub_id"> ระดับเมนู  <span class="danger">*</span></label>
									<div class="col-md-6">
											<select class="form-control select2" id="menusub_id" name="menusub_id" >
												<option value="0" data-level="0"> 0 เมนูใหม่ </option>
											<?php  
												if ($menusub1) {
													foreach ($menusub1 as $key_m1 => $val_m1) {
													
												?>
													<option value="<?php echo $val_m1['id'];?>" data-level="<?php echo $val_m1['menusub_level'];?>" <?php if($data1['menusub_id']==$val_m1['id']){ echo "selected";}?> >  <?php echo ($key_m1+1).". ". $val_m1['menusub_name_th'];?></option>
													
													<?php 
													$menusub2 = $clsoffice->Load('menusub',array('deleted'=>0 , 'menusub_level'=>2 , 'menusub_id'=>$val_m1['id'],'department_code_ch'=>$deptcode ),' orderby DESC ',''); 
													 
													if($menusub2){
														foreach ($menusub2 as $key_m2 => $val_m2) {
													?>
														<option value="<?php echo $val_m2['id'];?>" data-level="<?php echo $val_m2['menusub_level'];?>" <?php if($data1['menusub_id']==$val_m2['id']){ echo "selected";}?> >  <?php echo "&nbsp;&nbsp;".($key_m1+1).".".($key_m2+1)." ". $val_m2['menusub_name_th'];?></option>
														<?php 
														$menusub3 = $clsoffice->Load('menusub',array('deleted'=>0 , 'menusub_level'=>3 , 'menusub_id'=>$val_m2['id'],'department_code_ch'=>$deptcode ),' orderby DESC ','');  
														if($menusub3){
															foreach ($menusub3 as $key_m3 => $val_m3) {
														?>
															<option value="<?php echo $val_m3['id'];?>" data-level="<?php echo $val_m3['menusub_level'];?>" <?php if($data1['menusub_id']==$val_m3['id']){ echo "selected";}?> >  <?php echo "&nbsp;&nbsp;&nbsp;".($key_m1+1).".".($key_m2+1).".".($key_m3+1)." ". $val_m3['menusub_name_th'];?></option>
															<?php 
																$menusub4 = $clsoffice->Load('menusub',array('deleted'=>0 , 'menusub_level'=>4 , 'menusub_id'=>$val_m3['id'],'department_code_ch'=>$deptcode ),' orderby DESC ','');  
																if($menusub4){
																	foreach ($menusub4 as $key_m4 => $val_m4) {
																?>
																	<option value="<?php echo $val_m4['id'];?>" data-level="<?php echo $val_m4['menusub_level'];?>" <?php if($data1['menusub_id']==$val_m4['id']){ echo "selected";}?> >  <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;".($key_m1+1).".".($key_m2+1).".".($key_m3+1).".".($key_m4+1)." ". $val_m4['menusub_name_th'];?></option>
																
																<?php		
																	}
																}  
																?>
														<?php		
															}
														}  
														?>
													<?php		
														}
													}  
													?>
												<?php 
													}
												}  
												?>
											</select>
									</div>
								</div>  


								<div class="form-group row">
									<label class="col-md-3 label-control" for="menusub_name_th">ชื่อเมนูภาษาไทย <?php echo  $pathfllang['th'];?> <span class="danger">*</span></label> 
									<div class="col-md-9">
										<input id="menusub_name_th" type="text" class="form-control" name="disease_name_th" value="<?php echo $data1['menusub_name_th'] ?>" placeholder="ชื่อเมนูภาษาไทย">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 label-control" for="menusub_name_en"> ชื่อเมนูภาษาอังกฤษ <?php echo  $pathfllang['en'];?><span class="danger">*</span></label>
									<div class="col-md-9">
										<input id="menusub_name_en" type="text" class="form-control" name="menusub_name_en" value="<?php echo $data1['menusub_name_en'] ?>" placeholder="ชื่อเมนูภาษาอังกฤษ">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 label-control" for="menusub_level">ระดับของเมนู  <span class="danger">*</span></label> 
									<div class="col-md-2">
										<input id="menusub_level" type="number" class="form-control" name="menusub_level" value="<?php echo $data1['menusub_level'] ?>" placeholder="ระดับของเมนู"   disabled/>
									</div>
								</div>
							  
								<div class="form-group row"> 
										<label class="col-md-3 label-control" for="menusub_linktype"> ประเภทลิงก์  <span class="danger">* </span></label> 
										<div class="col-md-9">
											<div class="row skin skin-square-orange ml-2">
												<div class="form-check form-check-inline mr-5">
													<input class="form-check-input mr-1" type="radio" name="menusub_linktype" id="menusub_linktype1" value="1" >
													<label class="form-check-label ml-1" for="menusub_linktype1">1 ลิงก์ภายนอก</label>
												</div>
												<div class="form-check form-check-inline mr-5">
													<input class="form-check-input mr-1" type="radio" name="menusub_linktype" id="menusub_linktype2" value="2" >
													<label class="form-check-label ml-1" for="menusub_linktype2">2 ลิงก์ภายใน</label>
												</div>
												<div class="form-check form-check-inline mr-5">
													<input class="form-check-input mr-1" type="radio" name="menusub_linktype" id="menusub_linktype3" value="3" checked> 
													<label class="form-check-label ml-1" for="menusub_linktype3">3 #</label>
												</div>
											</div>
										</div> 
									</div>

								<div class="form-group row">
									<label class="col-md-3 label-control" for="menusub_otherlink"> ลิงก์  </label> 
									<div class="col-md-9">
										<input id="menusub_otherlink" type="text" class="form-control" name="menusub_otherlink" value="" placeholder="เช่น http://www.google.co.th">
									</div>
								</div>

								<div class="form-group row"> 
									<label class="col-md-3 label-control" for="orderby"> ลำดับการแสดงผล <span class="danger">* <br><small> * การเรียงลำดับแสดงผลจากค่ามากไปน้อย </small> </span></label> 
									<div class="col-md-2">
										<input id="orderby" type="number" class="form-control" name="orderby" value="100" placeholder="">
									</div>
								</div>
								
								 

									<div class="form-group row"> 
										<label class="col-md-3 label-control" for=""> การแสดงผล <span class="danger">* </span></label> 
										<div class="col-md-6">
											<div class="row skin skin-square-orange ml-2">
												<div class="form-check form-check-inline mr-5">
													<input class="form-check-input mr-1" type="radio" name="enable" id="t1" value="Y" checked>
													<label class="form-check-label ml-1" for="t1">เปิดใช้งาน</label>
												</div>
												<div class="form-check form-check-inline mr-5">
													<input class="form-check-input mr-1" type="radio" name="enable" id="t2" value="N" < >
													<label class="form-check-label ml-1" for="t2">ไม่เปิดใช้งาน</label>
												</div>
											</div>
										</div> 
									</div>

									<input id="department_code_ch" type="hidden" class="form-control" name="department_code_ch" value="<?php echo $_SESSION['deptcode']; ?>" >
								
								<div class="form-group row">  
									<div class="col-md-6">
										<input type="hidden" class="form-control" id="create_by" name="create_by" value="dept" >
									</div>
									<div class="col-md-6">
										<input type="hidden" class="form-control" id="create_date" name="create_date" value="<?php echo GetToday(''); ?>" >
									</div>
								</div>
								
						 
							</div> 
						</form>
											
												
															

                      </div>
                    </div>
                    <hr>
                      <div class="text-center my-1">
                        <a href="menu.php" class="btn btn-warning"> <i class="ft-arrow-left"></i> กลับ</a> 
												<button  class="btn btn-info" onclick="office.CheckFormMenu();" ><i class="la la-check-square-o"></i> บันทึก  </button>
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
            <div class="modal-center  m-auto">
              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
              <button type="button" class="btn btn-outline-info"  onclick="office.CreateMenuSub();" >ยืนยัน</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ./modal_confirm -->
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <?php include "prepare_script.php";?>
	<?php include "prepare_footer.php";?>
	<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/selects/select2.min.css"> 
	<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/editors/summernote.css">

  
	<script >
	$(document).ready(function () {
		$("#menusub_level").val(1);
		$("#menusub_id").change(function() {
			//alert( $( this ).val() );
			 $("#menusub_level").val();
			 var level =   $(this).find(':selected').attr('data-level') ;
			 var menulevel  = parseInt(level)+1 ;
			 $("#menusub_level").val(menulevel);
			 
			 //alert( $(this).find(':selected').attr('data-level')) ;
		});
	});
	</script>
