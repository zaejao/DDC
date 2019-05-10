
	<div class="form-group row">
			<label class="col-md-3 label-control" for="annualyear"> ปีงบประมาณ   <span class="danger">*</span></label> 
			<div class="col-md-2">
				<input id="annualyear" type="text" class="form-control" name="annualyear" value="<?php echo $dataset['annualyear'] ?>" placeholder=""> 
			</div>
		</div> 


	<div class="form-group row ">	
			<label class="col-md-3 label-control" for="docrecieve_startdate">วันที่เริ่มรับเอกสาร  </label>
			<div class="col-md-4">

			<div class="input-group datep">
				<input type="text" class="form-control pickadate-translations" placeholder="" id="docrecieve_startdate"  name="docrecieve_startdate"  data-value="<?php echo $dataset['docrecieve_startdate'] ?>" />
				<div class="input-group-append">
					<span class="input-group-text">
						<span class="la la-calendar-o"></span>
					</span>
					</div>
				</div>
			</div> 
	</div>

	<div class="form-group row    ">
			<label class="col-md-3 label-control" for="docrecieve_enddate">	วันที่สิ้นสุดรับเอกสาร  </label>
			<div class="col-md-4"> 
			<div class="input-group datep">
				<input type="text" class="form-control pickadate-translations" placeholder="" id="docrecieve_enddate"  name="docrecieve_enddate"  data-value="<?php echo $dataset['docrecieve_enddate'] ?>" />
				<div class="input-group-append">
					<span class="input-group-text">
						<span class="la la-calendar-o"></span>
					</span>
					</div>
				</div>
			</div> 
	</div>


	<div class="form-group row">
			<label class="col-md-3 label-control" for="financial_amount"> วงเงินที่จะซื้อหรือจ้าง   <span class="danger">*</span></label> 
			<div class="col-md-2">
				<input id="financial_amount" type="text" class="form-control text-right" name="financial_amount" value="<?php echo $dataset['financial_amount'] ?>" placeholder=""> 
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-3 label-control" for="secretlevel"> ขั้นความลับ   <span class="danger">*</span></label> 
			<div class="col-md-2">
					<select class="form-control select2" id="secretlevel" name="secretlevel" >
						<option value="0" <?php if($val_c['secretlevel']=="0"){ echo "selected";}?>   >  - </option>
					  <option value="1" <?php if($val_c['secretlevel']=="1"){ echo "selected";}?>   >  1 </option>
						</select>
			</div>
		</div>
 
		<div class="form-group row">
			<label class="col-md-3 label-control" for="docnumpage"> จำนวนหน้า   <span class="danger">*</span></label> 
			<div class="col-md-2">
				<input id="docnumpage" type="number" class="form-control" name="docnumpage" value="<?php echo $dataset['docnumpage'] ?>" placeholder=""> 
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-3 label-control" for="doc_yearprint"> ปีที่พิมพ์ประกาศ   <span class="danger">*</span></label> 
			<div class="col-md-2">
				<input id="doc_yearprint" type="text" class="form-control" name="doc_yearprint" value="<?php echo $dataset['doc_yearprint'] ?>" placeholder=""> 
			</div>
		</div>

		<div class="form-group row">
			<label class="col-md-3 label-control" for="doc_address"> ที่ตั้งของเอกสาร   <span class="danger">*</span></label> 
			<div class="col-md-4">
				<input id="doc_address" type="text" class="form-control" name="doc_address" value="<?php echo $dataset['doc_address'] ?>" placeholder=""> 
			</div>
		</div>


		<div class="form-group row">
			<label class="col-md-3 label-control" for="auctions_financialtype_id"> ประเภทเงิน   <span class="danger">*</span></label> 
			<div class="col-md-2">
					<select class="form-control select2" id="auctions_financialtype_id" name="auctions_financialtype_id" >
					<?php 
							if ($auctions_financialtype) {
								foreach ($auctions_financialtype as $key_c => $val_c) {
							?>
								<option value="<?php echo $val_c['id'];?>" <?php if($val_c['id']==$dataset['auctions_financialtype_id']){ echo "selected";}?>   >  <?php echo $val_c['typename'];?></option>
							<?php 
								}
							} 
							?>
						</select>
			</div>
		</div>

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
		

		

		<div class="form-group row">
			<label class="col-md-3 label-control" for="contract_number"> เลขที่สัญญา   <span class="danger">*</span></label> 
			<div class="col-md-4">
				<input id="contract_number" type="text" class="form-control" name="contract_number" value="<?php echo $dataset['contract_number'] ?>" placeholder=""> 
			</div>
		</div>

		<div class="form-group row ">	
			<label class="col-md-3 label-control" for="contract_date">วันที่ทำสัญญา  </label>
			<div class="col-md-4">

			<div class="input-group datep">
				<input type="text" class="form-control pickadate-translations" placeholder="" id="contract_date"  name="contract_date"  data-value="<?php echo $dataset['contract_date'] ?>" />
				<div class="input-group-append">
					<span class="input-group-text">
						<span class="la la-calendar-o"></span>
					</span>
					</div>
				</div>
			</div> 
	</div>
	 
	
		<div class="form-group row ">
		<label class="col-md-3 label-control" for="desc_th"> 
			รายละเอียด 
		</label>  
		<div class="col-md-6">
			<textarea class="form-control" id="desc_th" row="5" col="5"> <?php echo htmlspecialchars_decode($dataset['desc_th']);?> </textarea> 
		</div>
	</div>   
	
	<div class="form-group row ">
		<label class="col-md-3 label-control" for="remark"> 
			หมายเหตุ 
		</label>  
		<div class="col-md-6">
			<textarea  class="form-control" id="remark" > <?php echo htmlspecialchars_decode($dataset['remark']);?> </textarea> 
		</div>
	</div> 