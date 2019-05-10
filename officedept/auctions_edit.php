<?php
  include "prepare_htmlhead.php";
	include "../duck.conf.php";
  $menucode = "AUCTIONS" ;


  include "../gates/duck.class.php";
	include "../gates/contents.class.php";
	include "../gates/dept.class.php";
	include "../gates/office.class.php";
  include "../gates/func.php";

	$clsoffice = new OfficeClass();

	 
	$dataid = $_POST['data_id']; 
 
	$dataset = $clsoffice->LoadOnce('auctions',array('id'=>	$dataid));
	$auctions_type_code = $clsoffice->LoadOnce('auctions_type',array('auctions_type_code'=>	$dataset['auctions_type_code']));

	$typedet = $clsoffice->Load('auctions_type',array('deleted'=>0 ),' orderby DESC','' ); 
	$catedet = $clsoffice->Load('auctions_category',array('deleted'=>0 ),' orderby DESC','' ); 
	$groupdet = $clsoffice->Load('auctions_group',array('deleted'=>0 ),' orderby DESC','' ); 

	$menucode1 = $dataset['auctions_type_code'] ;
 
	$auctions_financialtype = $clsoffice->Load('auctions_financialtype',array('deleted'=>0 ),' orderby DESC','' ); 
	
												 
?>
  <?php include "prepare_navtop.php";?>
  <?php include "prepare_navside.php";?>
  <div class="app-content content">
    <div class="content-wrapper">
		<?php include "prepare_navcont.php";?>

			<div class="content-detached">
				<div class="content-body">

					<section class="row">
					<div class="col-12">
						<div class="card">
						<!-- <div class="card-head">
							<div class="card-header"> 
								<h4 class="card-title" id="from-actions-top-bottom-right">แก้ไข<?php echo $menuname." || ".$auctions_type_code['auctions_type_th'];?>  </h4>
							</div>
						</div> -->
						<div class="card-content collpase show">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-11 mx-auto" >
												
												<form class="form form-horizontal">
													<div class="form-body">
														
														<h4 class="form-section"><i class="ft-clipboard"></i> แก้ไข<?php echo $menuname ." || ".$auctions_type_code['auctions_type_th'] ." : ". $dataset['auctions_type_code'] ;?>   </h4> 
														

														<br>
														<input type="hidden" id="auctionsid" name="auctionsid" value="<?php echo $dataid;?>"> 
														<input type="hidden" id="department_code_ch" name="department_code_ch" value="<?php echo $dataset['department_code_ch'];?>">   


														<div class="form-group row hidden">
															<label class="col-md-3 label-control" for="auctions_type">ประเภท<?php echo $menuname;?> <span class="danger">*</span></label>
															<div class="col-md-6">
																	<select class="form-control select2" id="auctions_type" name="auctions_type" >
																	<?php 
																		if ($typedet) {
																			foreach ($typedet as $key_d => $val_d) {
																		?>
																			<option value="<?php echo $val_d['auctions_type_code'];?>" <?php if($val_d['auctions_type_code']==$dataset['auctions_type_code']){ echo "selected";}?>  disabled>  <?php echo $val_d['auctions_type_th'];?></option>
																		<?php 
																			}
																		} 
																		?>
																	</select>
															</div>
														</div> 


														<div class="form-group row  ">
															<label class="col-md-3 label-control" for="auctions_category_code">หมวดหมู่วิธีซื้อ/จ้าง <?php echo $menuname;?> <span class="danger">*</span></label>
															<div class="col-md-3">
																	<select class="form-control select2" id="auctions_category_code" name="auctions_category_code" >
																	<option value="" <?php if($val_c['auctions_category_code']==""){ echo "selected";}?>   >  ---- กรุณาเลือกวิธีซื้อ/จ้าง ---- </option>
																
																	<?php 
																		if ($catedet) {
																			foreach ($catedet as $key_c => $val_c) {
																		?>
																			<option value="<?php echo $val_c['auctions_category_code'];?>" <?php if($val_c['auctions_category_code']==$dataset['auctions_category_code']){ echo "selected";}?>   >  <?php echo $val_c['auctions_category_th'];?></option>
																		<?php 
																			}
																		} 
																		?>
																	</select>
															</div>
														</div>  
														
														<div class="form-group row">
															<label class="col-md-3 label-control" for="title_th"> ชื่อเรื่อง <?php echo  $pathfllang['th'];?> <span class="danger">*</span></label> 
															<div class="col-md-9">
																<input id="title_th" type="text" class="form-control" name="title_th" value="<?php echo $dataset['title_th'] ?>" placeholder="">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-md-3 label-control" for="docno"> เลขที่เอกสาร <?php echo  $pathfllang['th'];?> <span class="danger">*</span></label> 
															<div class="col-md-3">
																<input id="docno" type="text" class="form-control" name="docno" value="<?php echo $dataset['docno'] ?>" placeholder="">
															</div>
														</div>

														<div class="form-group row ">
															<label class="col-md-3 label-control" for="auctions_startdate">วันที่ประกาศ  </label>
															<div class="col-md-4">

															<div class="input-group datep">
																<input type="text" class="form-control pickadate-translations" placeholder="" id="auctions_startdate"  name="auctions_startdate"  data-value="<?php echo $dataset['auctions_startdate'] ?>" />
																<div class="input-group-append">
																	<span class="input-group-text">
																		<span class="la la-calendar-o"></span>
																	</span>
																	</div>
																</div>
															</div> 
													</div>

													<div class="form-group row    ">
															<label class="col-md-3 label-control" for="auctions_enddate">วันที่สิ้นสุดประกาศ  </label>
															<div class="col-md-4"> 
															<div class="input-group datep">
																<input type="text" class="form-control pickadate-translations" placeholder="" id="auctions_enddate"  name="auctions_enddate"  data-value="<?php echo $dataset['auctions_enddate'] ?>" />
																<div class="input-group-append">
																	<span class="input-group-text">
																		<span class="la la-calendar-o"></span>
																	</span>
																	</div>
																</div>
															</div> 
													</div>
													

														 <?php 
														 
														 if( $dataset['auctions_type_code'] == "auctions_announ"){ 
																require "auctions_announ.php";
															?>
														
															<?php 
														 }else if( $dataset['auctions_type_code'] == "auctions_draft") { 
															?>
																<div class="form-group row">
																	<label class="col-md-3 label-control" for="auctions_group_code"> ชนิด   <span class="danger">*</span></label> 
																	<div class="col-md-2">
																			<select class="form-control select2" id="auctions_group_code" name="auctions_group_code" >
																			<?php 
																					if ($groupdet) {
																						foreach ($groupdet as $key_c => $val_c) {
																					?>
																						<option value="<?php echo $val_c['id'];?>" <?php if($val_c['id']==$dataset['auctions_group_code']){ echo "selected";}?>   >  <?php echo $val_c['typename'];?></option>
																					<?php 
																						}
																					} 
																					?>
																				</select>
																	</div>
																</div>
		
															<?php 
														 } else if( $dataset['auctions_type_code'] == "auctions_public") { 
														 ?>
															 <div class="form-group row">
																 <label class="col-md-3 label-control" for="price"> ราคากลาง   <span class="danger">*</span></label> 
																 <div class="col-md-2">
																 <div class="col-md-3">
																<input id="docno" type="text" class="form-control" name="price" value="<?php echo $dataset['price'] ?>" placeholder="">
															</div>
																 </div>
															 </div>
	 
														 <?php 
														}
														?>
													 
														 

													
 

													


														<div class="form-group row  ">
															<label class="col-md-3 label-control" for="">เอกสารแนบ  </label>
															<div class="col-md-4"> 
																	 
																		<?php
																			if($val1['file']){
																				echo '<a href="../uploads/files/'.$val1['file'].'" target="_blank" ><i class="la la-file-pdf-o"></i></a>' ;
																		}
																		?>
																	<fieldset class="form-group"> 
																		<div class="custom-file">
																			<input type="file" class="form-control" id="file" name="file"  accept=".csv,application/pdf,application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"  > 
																		</div>  
																	</fieldset>


																	<?php
																			if($val1['file2']){
																				echo '<a href="../uploads/files/'.$val1['file2'].'" target="_blank" ><i class="la la-file-pdf-o"></i></a>' ;
																		}
																		?>
																	<fieldset class="form-group"> 
																		<div class="custom-file">
																			<input type="file" class="form-control" id="file2" name="file2"  accept=".csv,application/pdf,application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"  > 
																		</div>  
																	</fieldset>

																	<?php
																			if($val1['file3']){
																				echo '<a href="../uploads/files/'.$val1['file3'].'" target="_blank" ><i class="la la-file-pdf-o"></i></a>' ;
																		}
																		?>

																	<fieldset class="form-group"> 
																		<div class="custom-file">
																			<input type="file" class="form-control" id="file3" name="file"  accept=".csv,application/pdf,application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"  > 
																		</div>  
																	</fieldset>

																	<?php
																			if($val1['file4']){
																				echo '<a href="../uploads/files/'.$val2['file4'].'" target="_blank" ><i class="la la-file-pdf-o"></i></a>' ;
																		}
																		?>

																	<fieldset class="form-group"> 
																		<div class="custom-file">
																			<input type="file" class="form-control" id="file4" name="file4"  accept=".csv,application/pdf,application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"  > 
																		</div>  
																	</fieldset>

																	<?php
																			if($val1['file5']){
																				echo '<a href="../uploads/files/'.$val1['file5'].'" target="_blank" ><i class="la la-file-pdf-o"></i></a>' ;
																		}
																		?>
																	<fieldset class="form-group"> 
																		<div class="custom-file">
																			<input type="file" class="form-control" id="file5" name="file5"  accept=".csv,application/pdf,application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"  > 
																		</div>  
																	</fieldset>

															</div>
														</div>   

														 

														<div class="form-group row">
															<label class="col-md-3 label-control" for="news_file">เผยแพร่  </label>
															<div class="col-md-6"> 
																<div class="row skin skin-square-orange ml-2">
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1" type="radio" name="enable" id="t1" value="Y" <?php  if($dataset['enable']=='Y'){echo "checked";} ?>>
																	<label class="form-check-label ml-1" for="t1">เปิดใช้งาน</label>
																	</div>
																	<div class="form-check form-check-inline mr-5">
																	<input class="form-check-input mr-1" type="radio" name="enable" id="t2" value="N" <?php  if($dataset['enable']=='N'){echo "checked";} ?>>
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
											 
												<button  class="btn btn-info" onclick="office.CheckFormAuctions();" ><i class="la la-check-square-o"></i> บันทึก  </button>
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
              <button type="button" class="btn btn-outline-info"  onclick="office.EditAuctions('<?php echo $dataid;?>');" >ยืนยัน</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ./modal_confirm -->
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <?php include "prepare_script.php";?>
	<?php include "prepare_footer.php";?>


	 
	<script type="text/javascript">
 $(function() {
	$('.summernote').summernote({
		height: 400 ,
		toolbar: [ 
			['style', ['bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['fontsize', ['fontsize']],
			['color', ['color']], 
			['height', ['height']] ,
			['Insert', ['table','hr','picture','link','video'] ] ,
			['View', ['codeview']] ,
			['para', ['ul', 'ol', 'paragraph']],
		  ],
		callbacks: {
			onImageUpload: function(files) {
				for(var i = 0 ; i < files.length ; i++)
				{
					sendFile(files[i], $(this));
				}
			},
			onPaste: function (e) {
				var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
				e.preventDefault();
				document.execCommand('insertText', false, bufferText);
			}
		}	
	});
});

function sendFile(file, editor) 
{	
	var path_upload = '../uploads/summernote';
	//console.log(path_upload);
	data = new FormData();
	data.append("file", file);
	data.append("path_upload", path_upload);
	$.ajax({
		data: data,
		type: "POST",
		url: "../gates/UploadTempSummernote.php",
		cache: false,
		contentType: false,
		processData: false,
		success: function(url) {
			console.log(url);
			var title_error = "Unknow" ; 
			var message_error  = "Unknow Error";
			var is_error = false;

			switch (url)
			{ 
				case "Upload Error" :
					title_error 			= 	'Failed upload to server';
					message_error 	=	'File upload to server failed , Please try upload again.';
					is_error = true;
				break;
				case "Invalid File" :
					title_error 			= 	'Picture not allow';
					message_error 	=	'Picture extension allow jpg or jpeg only.';
					is_error = true;
				break;
				case "Not Image File" :
					title_error 			= 	'Not image file';
					message_error 	=	'File uploaded is not a image.';
					is_error = true;
				break;
				case "File too big" :
					title_error 			= 	'File too big';
					message_error 	=	'Picture uploaded is too big , Please try another picture.';
					is_error = true;
				break;
				case "Move File Error" :
					title_error 			= 	'Error while move file ';
					message_error 	=	'Server can\'t move upload file , Please try upload again.';
					is_error = true;
					break;					
				default :					
				break;		
			}			
				
			if (is_error)
				alert(title_error + " : " + message_error);
			else
			{ 
				editor.summernote("insertImage",JSON.parse(url));
			}
		}
	}).fail(function(){
		//console.log('Failed to upload file');
		alert('Failed to upload file');
	});
}

	$(document).ready(function () {
		 

		

	 
		// changeNewTime();
		// $('input[type=radio][name=news_timeline]').on('ifChecked', function(event){
		// 	changeNewTime();
		// }); 
	});
	function changeNewTime(){
		if($('input[type=radio][name=news_timeline]:checked').val()==1) {
				$(".news_time").removeClass('hide');
			}else{
				$(".news_time").addClass('hide');
			}
	}
 
	</script>

