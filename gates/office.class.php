<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: text/html; charset=utf-8");

class OfficeClass extends DuckClass{
	////////////////////////////////////////////////////////////////////////////////////////////
	public function LoadMenuSubByDept($deptcode , $level , $menusub_id ){
		$querywhere = '';
		if(!empty($menusub_id)){
			$querywhere = " AND ms.menusub_id = '$menusub_id' " ;
		}

		$sql ="
			SELECT ms.id , msd.id as menusubd_id ,ms.menusub_name_th , ms.menusub_name_en ,ms.menusub_code , ms.menusub_id , ms.menusub_level , ms.menusub_link , ms.menusub_otherlink , msd.enable 
			FROM `menusub` ms 
			LEFT JOIN `menusub_department` msd ON (msd.menusub_id = ms.id ) 
			WHERE 
			msd.department_codech = '$deptcode' 
			AND msd.deleted = 0 
			AND ms.deleted = 0  
			AND ms.menusub_level = '$level' 
			$querywhere
			ORDER BY msd.orderby DESC , ms.orderby DESC
		" ; 

	//	echo $sql."<br>";
		$myquery = $this->mysqli->query($sql);
		while($row = $myquery->fetch_assoc() ) {
			$result[] = $row;
		}
		$myquery->free();

		return $result;
	}
}


?>
