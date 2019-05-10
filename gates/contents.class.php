<?php
header('Access-Control-Allow-Origin: *');
header("Content-type: text/html; charset=utf-8");

class ContentsClass extends DuckClass{
	////////////////////////////////////////////////////////////////////////////////////////////
	public function LoadSetCode($table, $where=array(), $orderby='', $limit=''){
		if(!empty($where)){
			foreach((array)$where as $i => $item){
			$item = mysqli_real_escape_string($this->mysqli,$item);
			$qrywhere .= " $i = '$item' AND ";
			}
		}
		if(!empty($orderby)){
			$orderby = "ORDER BY $orderby";
		}
		if(!empty($limit)){
			$limit = "LIMIT $limit";
		}
			$sql="
					SELECT *
					FROM `$table`
					WHERE
					$qrywhere
					1 = 1
					$orderby
					$limit
		";
			// echo '------------------------------------------------------------'.$sql;
		//$result['sql'] = $sql;

		$myquery = $this->mysqli->query($sql);
		while($row = $myquery->fetch_assoc() ) {
			$result[$row['langcode']] = $row;
		}
		$myquery->free();

		return $result;
	}
	//////////////////////////////////////////////////////////////
	public function LoadMenuExecutive(){
			$sql="
					SELECT *
					FROM boardtype_display


		";
		$myquery = $this->mysqli->query($sql);
		while($row = $myquery->fetch_assoc() ) {
			$result[] = $row;
		}
		$myquery->free();

		return $result;
	}

	public function LoadExecutive(){
		$sql="
				SELECT *
				FROM boardtype_display


		";
		$myquery = $this->mysqli->query($sql);
		while($row = $myquery->fetch_assoc() ) {
			$result[] = $row;
		}
		$myquery->free();

		return $result;
	}

	public function LoadExecutiveName(){
		$sql="
				SELECT *
				FROM board


		";
		$myquery = $this->mysqli->query($sql);
		while($row = $myquery->fetch_assoc() ) {
			$result[] = $row;
		}
		$myquery->free();

		return $result;
	}

	public function LoadExecutivePosition(){
		$sql="
				SELECT *
				FROM boardtype


		";
		$myquery = $this->mysqli->query($sql);
		while($row = $myquery->fetch_assoc() ) {
			$result[] = $row;
		}
		$myquery->free();

		return $result;
	}

	public function LoadExecutivePhone(){
		$sql="
				SELECT *
				FROM board


		";
		$myquery = $this->mysqli->query($sql);
		while($row = $myquery->fetch_assoc() ) {
			$result[] = $row;
		}
		$myquery->free();

		return $result;
	}

	public function LoadExecutiveAll($where = array(),$orderby='', $limit=''){
		$qrywhere="";
		if(!empty($where)){
			
			foreach((array)$where as $i => $item){
			$item = mysqli_real_escape_string($this->mysqli,$item);
			$qrywhere .= " $i = '$item' AND ";
			}
		}
		if(!empty($orderby)){
			$orderby = "ORDER BY $orderby";
		}
		if(!empty($limit)){
			$limit = "LIMIT $limit";
		}
			$sql="	
					SELECT  b.* , bt.boardtype_name_th , bt.boardtype_name_en 
					FROM `board` b 
					LEFT JOIN `boardtype` bt ON bt.id = b.boardtype_id 
					WHERE 
					b.deleted = '0' 
					AND 
					$qrywhere 
					1=1  
					$orderby
					$limit
					;
		"; 
		//echo $sql ;

		$myquery = $this->mysqli->query($sql);
		while($row = $myquery->fetch_assoc() ) {
			$result[] = $row;
		}
		$myquery->free();

		return $result;
	} 
	
	public function LoadExecutiveContact($where = array(),$orderby='', $limit=''){
		$qrywhere="";
		if(!empty($where)){
			
			foreach((array)$where as $i => $item){
			$item = mysqli_real_escape_string($this->mysqli,$item);
			$qrywhere .= " $i = '$item' AND ";
			}
		}
		if(!empty($orderby)){
			$orderby = "ORDER BY $orderby";
		}
		if(!empty($limit)){
			$limit = "LIMIT $limit";
		}
			$sql="	
					SELECT  b.* , bt.boardtype_name_th , bt.boardtype_name_en 
					FROM `board` b 
					LEFT JOIN `boardtype` bt ON bt.id = b.boardtype_id 
					WHERE 
					b.deleted = '0' 
					AND 
					$qrywhere 
					1=1  
					$orderby
					$limit
					;
		"; 
		//echo $sql ;

		$myquery = $this->mysqli->query($sql);
		while($row = $myquery->fetch_assoc() ) {
			$result[] = $row;
		}
		$myquery->free();

		return $result;
	} 

	////////////////////////////////////////////////////////////

	public function LoadOfficeByDeptTypeId($deptid){
		if(isset($deptid)){

		 
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
						;
			"; 
				
			
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
			ORDER BY d.orderby DESC 
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

	public function LoadOffice($where = array() ){
		if(!empty($where)){
			foreach((array)$where as $i => $item){
			$item = mysqli_real_escape_string($this->mysqli,$item);
			$qrywhere .= " `$i` = '$item' AND ";
			}
		}
			$sql="
					SELECT  d.* , dc.department_address_th , dc.department_address_en ,dc.department_tel_th ,dc.department_tel_en ,dc.department_fax_th ,dc.department_fax_en 
					FROM department d
					INNER JOIN department_contacts dc  ON d.id = dc.department_id
					WHERE 
					d.deleted = 0 
					AND d.enable = 'Y'
					AND dc.deleted = 0 
					AND dc.enable = 'Y'
					 AND 
					$qrywhere
					1=1 
					ORDER BY d.orderby DESC 
					;
		";
		//	 echo '------------------------------------------------------------'.$sql;
		//$result['sql'] = $sql;

		$myquery = $this->mysqli->query($sql);
		while($row = $myquery->fetch_assoc() ) {
			$result[] = $row;
		}
		$myquery->free();

		return $result;
	}


	//////////////////////////////////////////////////////////////////////////////////////////// 

	public function LoadHomeNewsAuction($table, $where=array(), $orderby='', $limit=''){
		if(!empty($where)){
			foreach((array)$where as $i => $item){
			  $item = mysqli_real_escape_string($this->mysqli,$item);
			  $qrywhere .= "  $i  = '$item' AND ";
			}
		  }
		  if(!empty($orderby)){
			$orderby = "ORDER BY $orderby";
		  }
		  if(!empty($limit)){
			$limit = "LIMIT $limit";
		  }
			  $sql="
					SELECT $table.* , d.department_name_th ,  d.department_name_en  ,d.department_namemini_th ,  d.department_namemini_en , d.department_type, d.department_style, d.folderpath_name , d.department_dbname 
					FROM `$table`  
					LEFT JOIN `department` d ON ( d.department_code_ch = $table.office ) 
					WHERE
					  $qrywhere
					  1 = 1
					$orderby
					$limit
		  ";
		//  echo $sql ;
		//	  $result['sql'] =$sql;
	 
  
		  $myquery = $this->mysqli->query($sql);
		  while($row = $myquery->fetch_assoc() ) {
			  $result[] = $row;
		  }
		  $myquery->free();
  
		  return $result;
	}

	public function LoadHomeNewsList($table, $where=array(), $orderby='', $limit=''){
		if(!empty($where)){
			foreach((array)$where as $i => $item){
			  $item = mysqli_real_escape_string($this->mysqli,$item);
			  $qrywhere .= "  $i  = '$item' AND ";
			}
		  }
		  if(!empty($orderby)){
			$orderby = "ORDER BY $orderby";
		  }
		  if(!empty($limit)){
			$limit = "LIMIT $limit";
		  }
			  $sql="
					SELECT $table.* , d.department_name_th ,  d.department_name_en  ,d.department_namemini_th ,  d.department_namemini_en , d.department_type, d.department_style, d.folderpath_name , d.department_dbname 
					FROM `$table`  
					LEFT JOIN `department` d ON ( d.department_code_ch = $table.news_office ) 
					WHERE
					  $qrywhere 
					    news.enable = 'Y' 
					  AND 
					  1 = 1
					$orderby
					$limit
		  ";
		 // echo $sql ;
		 //	  $result['sql'] =$sql;
	 
  
		  $myquery = $this->mysqli->query($sql);
		  while($row = $myquery->fetch_assoc() ) {
			  $result[] = $row;
		  }
		  $myquery->free();
  
		  return $result;
	}


	//////////////////////////////////////////////////////////////////////////////////////////// 
	public function LoadAuctionsList($table, $where=array(), $orderby='', $limit=''){
		if(!empty($where)){
			foreach((array)$where as $i => $item){
			  $item = mysqli_real_escape_string($this->mysqli,$item);
			  $qrywhere .= "  $table.$i  = '$item' AND ";
			}
		  }
		  if(!empty($orderby)){
			$orderby = "ORDER BY $orderby";
		  }
		  if(!empty($limit)){
			$limit = "LIMIT $limit";
		  }
			  $sql="
					SELECT $table.* , d.department_name_th ,  d.department_name_en  ,d.department_namemini_th ,  d.department_namemini_en , d.department_type, d.department_style, d.folderpath_name , d.department_dbname ,ac.auctions_category_th , ag.auctions_group_th
					FROM `$table`  
					LEFT JOIN `department` d ON ( d.department_code_ch = $table.department_code_ch ) 
					LEFT JOIN `auctions_category` ac ON ( ac.auctions_category_code = $table.auctions_category_code ) 
					LEFT JOIN `auctions_group` ag ON ( ag.auctions_group_code = $table.auctions_group_code ) 
					WHERE
					  $qrywhere 
					  1 = 1
					$orderby
					$limit
		  ";
		//  echo $sql ;
	 	//  $result['sql'] =$sql;
	 
  
		  $myquery = $this->mysqli->query($sql);
		  while($row = $myquery->fetch_assoc() ) {
			  $result[] = $row;
		  }
		  $myquery->free();
  
		  return $result;
	}

//////////////////////////////////////////////////////////////////////////////////////////// 
public function LoadAuctionsCategoryByType(  $typecode ){
 
		  $sql="
				SELECT ac.*   
				FROM    `auctions_category` ac
				LEFT JOIN  auctions_typecate    atc   ON ( ac.id =  atc.auctions_category_id )  
				LEFT JOIN  auctions_type    at   ON ( at.id =  atc.auctions_type_id )  
				
				WHERE
				  
				  
				  atc.auctions_type_id
				  AND  at.auctions_type_code = '$typecode'
				  AND ac.deleted = 0 
				  AND ac.enable = 'Y'  
				  ORDER BY  CONVERT (   auctions_category_th  USING tis620 ) ASC 
			 
	  ";
	//  echo $sql ;
	 //  $result['sql'] =$sql;
 

	  $myquery = $this->mysqli->query($sql);
	  while($row = $myquery->fetch_assoc() ) {
		  $result[] = $row;
	  }
	  $myquery->free();

	  return $result;
	}
	

}


?>
