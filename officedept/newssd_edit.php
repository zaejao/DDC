<?php
  include "prepare_htmlhead.php";
	include "../duck.conf.php";
  $menucode = "SLIDE" ;
  $menucode1 = 	"SLIDE1";

  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clsoffice = new OfficeClass();

	 
	$dataid = $_POST['data_id']; 
	$news= $clsoffice->LoadOnce('news',array('id'=>	$dataid  ) ); 
//	$news_type = $clsoffice->Load('news_type',array('deleted'=>0 ),' orderby DESC','' );  
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
								<h4 class="card-title" id="from-actions-top-bottom-right">แก้ไข<?php echo $menuname;?></h4>
							</div>
						</div>
						<div class="card-content collpase show">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-11 mx-auto" >
												
												<form class="form form-horizontal">
													<div class="form-body">
														
														<h4 class="form-section"><i class="ft-clipboard"></i> แก้ไขข่าวสาร </h4> 
														
														<input type="hidden" id="newsid" name="newsid" value="<?php echo $dataid;?>"> 
														<input type="hidden" id="news_office" name="news_office" value="<?php echo $news['news_office'];?>"> 
														<input type="hidden" id="news_type_txt" name="news_type_txt" value="<?php echo $news['news_type'];?>"> 

											 

														<input id="news_menu" type="hidden" class="form-control" name="news_menu" value="<?php echo $news['news_menu'] ?>" value="">
														
														<div class="form-group row">
															<label class="col-md-3 label-control" for="news_title_th">หัวข้อข่าว <?php echo  $pathfllang['th'];?> <span class="danger">*</span></label> 
															<div class="col-md-9">
																<input id="news_title_th" type="text" class="form-control" name="news_title_th" value="<?php echo $news['news_title_th'] ?>" placeholder="">
															</div>
														</div>

														<div class="form-group row">
															<label class="col-md-3 label-control" for="news_youtube">Link URL </label> 
															<div class="col-md-9">
																<input id="news_youtube" type="text" class="form-control" name="news_youtube" value="<?php echo $news['news_youtube'] ?>" placeholder="">
															</div>
														</div>

													 
  

														<div class="form-group row">
															<label class="col-md-3 label-control" for="">รูปภาพประกอบข่าว  </label>
															<div class="col-md-4">
																<div class="img_center">
																		<img class="disease_pic"  id="picture_disp"  src="<?php echo $path['news'].$news['news_cover']?>" style="height:400px;width:660px;"   id="picture_disp" onerror="this.onerror=null;this.src='<?php echo $path['news'].'logo_df.jpg';?>';" >
																</div>
																<br>
																<span class="danger"> Recommend : Max Size 6 MB, File Support: (.jpg, .png 1500x 905px)</span> 
																<fieldset class="form-group">
																			<div class="custom-file">
																					<input type="file" class="form-control" id="news_cover" name="news_cover" accept="image/*" onchange="duck.DisplayImage(event,'news_cover','','picture_disp')"> 
																			</div>
																	</fieldset>
															</div>
														</div>

													  

														<div class="form-group row">
															<label class="col-md-3 label-control" for="news_datetime">วันที่ข่าว  </label>
															<div class="col-md-4">

															<div class="input-group datep">
																<input type="text" class="form-control pickadate-translations" placeholder="" id="news_datetime" name="news_datetime"   data-value="<?php echo $news['news_datetime'] ?>" />
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
																	<input class="form-check-input mr-1" type="radio" name="news_main" id="news_main1" value="1" <?php  if($news['news_main']=='1'){echo "checked";} ?>>
																	<label class="form-check-label ml-1" for="news_main1">ใช่</label>
																	</div>
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1" type="radio" name="news_main" id="news_main2" value="0" <?php  if($news['news_main']=='0'){echo "checked";} ?>>
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
																	<input class="form-check-input mr-1" type="radio" name="news_home" id="news_home1" value="1" <?php  if($news['news_home']=='1'){echo "checked";} ?>>
																	<label class="form-check-label ml-1" for="news_home1">ใช่</label>
																	</div>
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1" type="radio" name="news_home" id="news_home2" value="0" <?php  if($news['news_home']=='0'){echo "checked";} ?>>
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

														<div class="form-group row news_time hide">
															<label class="col-md-3 label-control" for="news_starttime">วันที่เริ่มเผยแพร่ข่าว  </label>
															<div class="col-md-4">

															<div class="input-group datep">
																<input type="text" class="form-control pickadate-translations" placeholder="" id="news_starttime"  name="news_starttime"  data-value="<?php echo $news['news_starttime'] ?>" />
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
																<input type="text" class="form-control pickadate-translations" placeholder="" id="news_endtime"  name="news_endtime"  data-value="<?php echo $news['news_endtime'] ?>" />
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
																	<input class="form-check-input mr-1" type="radio" name="enable" id="t1" value="Y" <?php  if($news['enable']=='Y'){echo "checked";} ?>>
																	<label class="form-check-label ml-1" for="t1">เปิดใช้งาน</label>
																	</div>
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1" type="radio" name="enable" id="t2" value="N" <?php  if($news['enable']=='N'){echo "checked";} ?>>
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
											 
												<button  class="btn btn-info" onclick="office.CheckFormNewsSD();" ><i class="la la-check-square-o"></i> บันทึก  </button>
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
              <button type="button" class="btn btn-outline-info"  onclick="office.EditNewsSD('<?php echo $dataid;?>');" >ยืนยัน</button>
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
