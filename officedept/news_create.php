<?php
  include "prepare_htmlhead.php";
	include "../duck.conf.php";
  $menucode = "NEWS" ;
  $menucode1 = "NEWSEDIT" ;

  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clsoffice = new OfficeClass();

	 
	$dataid = $_POST['data_id']; 
	 
	$news_type = $clsoffice->Load('news_type',array('deleted'=>0 , 'displaymode'=>1 ),' orderby DESC','' ); 
	$disease = $clsoffice->Load('disease',array('deleted'=>0 ),'  CONVERT( disease_name_th USING tis620 ) ASC   ','');
?>
  <?php include "prepare_navtop.php";?>
  <?php include "prepare_navside.php";?>
  <div class="app-content content">
    <div class="content-wrapper">
		<?php include "prepare_navcont.php";?>
	
		<?php  //echo "<pre>".print_r($disease_header,true)."</pre>" ;?>
		<?php // echo "<pre>".print_r($news_type,true)."</pre>" ;?>
			<div class="content-detached">
				<div class="content-body">

					<section class="row">
					<div class="col-12">
						<div class="card">
						<div class="card-head">
							<div class="card-header"> 
								<h4 class="card-title" id="from-actions-top-bottom-right"> เพิ่ม<?php echo $menuname;?></h4>
							</div>
						</div>
						<div class="card-content collpase show">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-11 mx-auto" >
												
												<form class="form form-horizontal">
													<div class="form-body">
														
														<h4 class="form-section"><i class="ft-clipboard"></i> เพิ่ม<?php echo $menuname;?> </h4> 
														
							 
														<input type="hidden" id="news_office" name="news_office" value="<?php echo $_SESSION['deptcode'];?>"> 
														<input type="hidden" id="news_type_txt" name="news_type_txt" value="<?php echo $news['news_type'];?>"> 

														<div class="form-group row">
															<label class="col-md-3 label-control" for="news_type">ประเภทข่าว <span class="danger">*</span></label>
															<div class="col-md-6">
																	<select class="form-control select2" id="news_type" name="news_type" >
																	<?php 
																		if ($news_type) {
																			foreach ($news_type as $key_d => $val_d) {
																		?>
																			<option value="<?php echo $val_d['news_type_code'];?>" <?php if($val_d['news_type_code']==$news['news_type']){ echo "selected";}?> >  <?php echo $val_d['news_type_th'];?></option>
																		<?php 
																			}
																		} 
																		?>
																	</select>
															</div>
														</div> 


													
														<div class="form-group row">
															<label class="col-md-3 label-control" for="news_title_th">หัวข้อข่าว <?php echo  $pathfllang['th'];?> <span class="danger">*</span></label> 
															<div class="col-md-9">
																<input id="news_title_th" type="text" class="form-control" name="news_title_th" value="<?php echo $news['news_title_th'] ?>" placeholder="">
															</div>
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="news_desc_th"> 
																รายละเอียดข่าว 
															</label> 
															<div class="col-md-9">
																<div class="summernote" id="news_desc_th" > 
																	<?php echo htmlspecialchars_decode($news['news_desc_th']);?>
																	<?php //echo ContentDisplay($news['news_desc_th']);?>
																</div>
															</div>
														</div>  


														<div class="form-group row">
															<label class="col-md-3 label-control" for="">โรคที่เกี่ยวข้อง   </label>
															<div class="col-md-6">
																		<div class="row "> 
																		<?php 
																			foreach($disease as $keyd1 => $vald1){  
																			?>
																			<div class="col-md-6 col-sm-12">
																				<fieldset>
																					 
																						<input name="disease[]" type="checkbox" class="d<?php echo $vald1['id']?>">  <?php echo $vald1['disease_name_th']?> 
																		 
																			 
																				<fieldset>
																			</div>
																		<?php } ?>
																		</div>

																<!--
																		<div class="row   icheck_minimal skin"> 
																			<?php 
																			foreach($disease as $keyd1 => $vald1){  
																			?>
																			<div class="col-md-6 col-sm-12">
																				<fieldset>
																					<div class="icheckbox_minimal">
																						<input name="disease[]" type="checkbox" class="d<?php echo $vald1['id']?>">  
																					</div>
																					<label for="d<?php echo $vald1['id']?>" class="">  <?php echo $vald1['disease_name_th']?> </label>
																				<fieldset>
																			</div>
																		<?php } ?>

																		</div> -->

															</div>
														</div>


														<div class="form-group row">
															<label class="col-md-3 label-control" for="">รูปภาพประกอบข่าว  </label>
															<div class="col-md-4">
																<div class="img_center">
																		<img class="disease_pic"  id="picture_disp"  src="<?php echo $path['news'].$news['news_cover']?>"   id="picture_disp" onerror="this.onerror=null;this.src='<?php echo $path['news'].'logo_df.jpg';?>';" >
																</div>
																<br>
																<fieldset class="form-group">
																			<div class="custom-file">
																					<input type="file" class="form-control" id="news_cover" name="news_cover" accept="image/*" onchange="duck.DisplayImage(event,'news_cover','','picture_disp')"> 
																			</div>
																	</fieldset>
															</div>
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="">เอกสารแนบ  </label>
															<div class="col-md-4"> 
																<fieldset class="form-group">
																		<?php
																			if($news['news_file']){ 
																				?>
																				<a href="<?php echo $path['files'].$news['news_file'];?>" target="_blank" class="btn btn-info" > <i class="fa fa-download"></i> ดาวน์โหลดเอกสาร </a>
																				<?php  
																			}
																			?>
																			<div class="custom-file">
																					<input type="file" class="form-control" id="news_file" name="news_file"  accept=".csv,application/pdf,application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"  > 
																			</div>
																	</fieldset>
															</div>
														</div> 

														<!-- <div class="form-group row">
															<label class="col-md-3 label-control" for="news_datetime">วันที่ข่าว  </label>
															<div class="col-md-6"> 
																<fieldset class="form-group">
																		
																			<div class="custom-file"> 
																			</div>
																	</fieldset>
															</div>
														</div>  -->


														<div class="form-group row">
															<label class="col-md-3 label-control" for="news_datetime">วันที่ข่าว  </label>
															<div class="col-md-4">

															<div class="input-group datep">
																<input type="text" class="form-control pickadate-translations" placeholder="" id="news_datetime" name="news_datetime"   data-value="<?php echo GetToday(''); ?>" />
																<div class="input-group-append">
																	<span class="input-group-text">
																		<span class="la la-calendar-o"></span>
																	</span>
																	</div>
																</div>
															</div> 
													</div>


														<div class="form-group row">
															<label class="col-md-3 label-control" for="news_main">แสดงหน้าแรกของสำนักงาน  </label>
															<div class="col-md-6"> 
																<div class="row skin skin-square-orange ml-2">
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1" type="radio" name="news_main" id="news_main1" value="1"  >
																	<label class="form-check-label ml-1" for="news_main1">ใช่</label>
																	</div>
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1" type="radio" name="news_main" id="news_main2" value="0" checked >
																	<label class="form-check-label ml-1" for="news_main2">ไม่ใช่</label>
																	</div>
																</div>
															</div>
														</div> 

														<div class="form-group row">
															<label class="col-md-3 label-control" for="news_home">แสดงหน้าแรกของกรม  </label>
															<div class="col-md-6"> 
																<div class="row skin skin-square-orange ml-2">
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1" type="radio" name="news_home" id="news_home1" value="1"  >
																	<label class="form-check-label ml-1" for="news_home1">ใช่</label>
																	</div>
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1" type="radio" name="news_home" id="news_home2" value="0" checked  >
																	<label class="form-check-label ml-1" for="news_home2">ไม่ใช่</label>
																	</div>
																</div>
															</div>
														</div> 

														<div class="form-group row">
															<label class="col-md-3 label-control" for="news_timeline">กำหนดช่วงเวลาเผยแพร่  </label>
															<div class="col-md-6"> 
																<div class="row skin skin-square-orange ml-2">
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1 news_timeline" type="radio" name="news_timeline" id="news_timeline1" value="1" <?php  if($news['news_timeline']=='1'){echo "checked";} ?>>
																	<label class="form-check-label ml-1" for="news_timeline1">ใช้งาน</label>
																	</div>
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1 news_timeline" type="radio" name="news_timeline" id="news_timeline2" value="0" <?php  if($news['news_timeline']=='0'){echo "checked";} ?>>
																	<label class="form-check-label ml-1" for="news_timeline2">ไม่ใช้งาน</label>
																	</div>
																</div>
															</div>
														</div> 

														<div class="form-group row news_time  hide">
															<label class="col-md-3 label-control" for="news_starttime">วันที่เริ่มเผยแพร่ข่าว  </label>
															<div class="col-md-4">

															<div class="input-group datep">
																<input type="text" class="form-control pickadate-translations" placeholder="" id="news_starttime"  name="news_starttime"  data-value="<?php echo GetToday('');?>" />
																<div class="input-group-append">
																	<span class="input-group-text">
																		<span class="la la-calendar-o"></span>
																	</span>
																	</div>
																</div>
															</div> 
													</div>

													<div class="form-group row news_time hide">
															<label class="col-md-3 label-control" for="news_endtime">วันที่สิ้นสุดเผยแพร่ข่าว  </label>
															<div class="col-md-4"> 
															<div class="input-group datep">
																<input type="text" class="form-control pickadate-translations" placeholder="" id="news_endtime"  name="news_endtime"  data-value="<?php echo GetToday('');?>" />
																<div class="input-group-append">
																	<span class="input-group-text">
																		<span class="la la-calendar-o"></span>
																	</span>
																	</div>
																</div>
															</div> 
													</div>

														 

														<div class="form-group row">
															<label class="col-md-3 label-control" for="news_file">เผยแพร่  </label>
															<div class="col-md-6"> 
																<div class="row skin skin-square-orange ml-2">
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1" type="radio" name="enable" id="t1" value="Y" checked>
																	<label class="form-check-label ml-1" for="t1">เปิดใช้งาน</label>
																	</div>
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1" type="radio" name="enable" id="t2" value="N"  >
																	<label class="form-check-label ml-1" for="t2">ไม่เปิดใช้งาน</label>
																	</div>
																</div>
															</div>
														</div> 
 
													</div> 
												</form>  

                      </div>
                    </div>
                    <hr>
                      <div class="text-center my-1">
                        <a href="news.php" class="btn btn-warning"> <i class="ft-arrow-left"></i> กลับ</a>
											 
												<button  class="btn btn-info" onclick="office.CheckFormNews();" ><i class="la la-check-square-o"></i> บันทึก  </button>
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
            <div class="modal-center">
              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
              <button type="button" class="btn btn-outline-info"  onclick="office.CreateNews('<?php echo $dataid;?>');" >ยืนยัน</button>
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
  <script src="../app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
	
 


	<script type="text/javascript">
   
  </script> 
	<script >
	$(document).ready(function () {
		changeNewTime();
			$('input[type=radio][name=news_timeline]').on('ifChecked', function(event){
				changeNewTime();
			}); 
		});
	function changeNewTime(){
		if($('input[type=radio][name=news_timeline]:checked').val()==1) {
				$(".news_time").removeClass('hide');
			}else{
				$(".news_time").addClass('hide');
			}
	}

   
	</script>
