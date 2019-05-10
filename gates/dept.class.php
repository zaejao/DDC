<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: text/html; charset=utf-8");

class DeptClass extends DuckClass{ 
	////////////////////////////////////////////////////////////////////////////////////////////
	
	public function LoadOfficeByDeptTypeId($deptid){
		if(isset($deptid)){

		 //LoadOfficeByDeptTypeId
			if($deptid ==1){
				$sql="
				SELECT  d.* , dc.department_address_th , dc.department_address_en ,dc.department_tel_th ,dc.department_tel_en ,dc.department_fax_th ,dc.department_fax_en 
				FROM department d
				INNER JOIN department_contacts dc  ON d.id = dc.department_id
				WHERE 
				d.deleted = 0 
				AND d.enable = 'Y'
				AND dc.deleted = 0 
				AND dc.enable = 'Y'
				AND d.department_type ='$deptid'
				  ORDER BY CONVERT ( d.department_name_th USING TIS620)   ASC  
				 
				"; 
			}else{
				$sql="
				SELECT  d.* , dc.department_address_th , dc.department_address_en ,dc.department_tel_th ,dc.department_tel_en ,dc.department_fax_th ,dc.department_fax_en 
				FROM department d
				INNER JOIN department_contacts dc  ON d.id = dc.department_id
				WHERE 
				d.deleted = 0 
				AND d.enable = 'Y'
				AND dc.deleted = 0 
				AND dc.enable = 'Y'
				AND d.department_type ='$deptid'
				ORDER BY d.orderby DESC 
				"; 
			}
				
				
			
		} else{
			
			$sql="
			SELECT  d.* , dc.department_address_th , dc.department_address_en ,dc.department_tel_th ,dc.department_tel_en ,dc.department_fax_th ,dc.department_fax_en 
			FROM department d
			INNER JOIN department_contacts dc  ON d.id = dc.department_id
			WHERE 
			d.deleted = 0 
			AND d.enable = 'Y'
			AND dc.deleted = 0 
			AND dc.enable = 'Y' 
			ORDER BY d.department_type , d.orderby DESC 
			;
		"; 
		}
		//echo $deptid.$sql;
		$myquery = $this->mysqli->query($sql);
			while($row = $myquery->fetch_assoc() ) {
				$result[] = $row;
			}
			$myquery->free();
		return $result;
	}


	public function LoadDiseaseContentsById($diseaseid){
		$querywhere ="";
		if(isset($diseaseid)){
			$querywhere =  " AND  disease_id = $diseaseid " ; 
		}
		$sql = "
				SELECT DISTINCT(disease_header_id) , dh.disease_header_".$_SESSION["LANGCODE"]."  AS disease_header ,  d_det.detail_".$_SESSION["LANGCODE"]."  AS detail

				FROM `disease_detail`  d_det
				JOIN `disease_header` dh ON (dh.id = d_det.disease_header_id )
				WHERE 
					1=1
					$querywhere
					AND d_det.deleted ='0' 
					AND d_det.enable = 'Y'  
					AND dh.deleted ='0' 
					AND dh.enable = 'Y'
				ORDER BY dh.orderby DESC
		" ;
		// $result['sql'] = $sql;
		$myquery = $this->mysqli->query($sql);
		while($row = $myquery->fetch_assoc() ) {
			$result[] = $row;
		}
		$myquery->free();
		return $result;
	}


	public function LoadMenusubByDeptcode($deptcode,$where=array()){
		if(isset($deptcode)){
			$deptcode = "bamras";
		}
		$qrywhere ="";
		if(!empty($where)){
			foreach((array)$where as $i => $item){
			  $item = mysqli_real_escape_string($this->mysqli,$item);
			  $qrywhere .= " $i = '$item' AND ";
			}
		  }
		
		$sql = "
					SELECT 

					md.id , md.department_codech  , ms.menusub_name_th , ms.menusub_level , ms.menusub_id , ms.menusub_otherlink  , ms.menusub_link , ms.menusub_code
					
					FROM `menusub_department`  md 
					
					LEFT JOIN `menusub` ms ON (md.`menusub_id` = ms.id)
					
					WHERE 
					
					md.`department_codech` = '".$deptcode."' 
					AND md.enable='Y'
					AND md.deleted =0 
					AND ms.enable='Y' 
					AND ms.deleted =0
					AND $qrywhere  1=1 

					ORDER BY  ms.orderby DESC 
					";

		$myquery = $this->mysqli->query($sql);
		while($row = $myquery->fetch_assoc() ) {
			$result[] = $row;
		}
		$myquery->free();
		return $result;
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////

}


?>
