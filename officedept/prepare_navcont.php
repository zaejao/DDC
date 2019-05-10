<?php

$menuname = "";
if($menucode=="MENU"){
  $menuname ="เมนูเว็บไซต์" ;
}else if($menucode=="SLIDE"){
  $menuname ="ป้ายประชาสัมพันธ์" ;
}else if($menucode=="SETTINGHOME"){
  $menuname ="ตั้งค่าหน้าแรก" ;
}else if($menucode=="DISEASE"){
	$menuname ="รายชื่อโรค" ;
	if($menucode1=="DISEASETYPE"){
		$menuname ="ประเภทข้อมูลโรค" ;
	}  
}else if($menucode=="BANNER"){
 
	if($menucode1=="BANNERSYSTEM"){
		$menuname ="ป้ายแบนเนอร์ระบบภายใน" ;
	}  
	if($menucode1=="BANNERLINK"){
		$menuname ="ป้ายแบนเนอร์ลิงก์ที่เกี่ยวข้อง" ;
	}  
}else if($menucode=="AUCTIONSCATE"){
  $menuname ="หมวดหมู่การจัดซื้อจัดจ้าง" ;
}else if($menucode=="LAWCATE"){
  $menuname ="หัวข้อข้อมูลกฎหมาย" ;
}

else if($menucode=="NEWS"){
  $menuname ="ข่าวสาร" ;
}
else if($menucode=="PUBLISH"){
  $menuname ="สื่อเผยแพร่" ;
}
else if($menucode=="AUCTIONS"){
  $menuname ="การจัดซื้อจัดจ้าง" ;
}


?>
	<div class="content-header row">
			<div class="content-header-left col-12 mb-2">
				<h3 class="content-header-title"> <?php echo $menuname;?> </h3>
				<div class="row breadcrumbs-top col-12">
					<div class="breadcrumb-wrapper col-10">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="/index.php">Home</a></li>
							<li class="breadcrumb-item active"><a href="#"> <?php echo $menuname;?> </a> </li>
						</ol>
					</div>
				</div>
			</div>
			<div class="content-header-right col-md-6 col-12">
			</div>
    </div>
    