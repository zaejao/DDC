<?php
	include "connect.php";
	include "func.php";

	////////////////////////////////////////////////////////////

	//$position 	 =  $_POST['position'];

	$username 	 =  $_POST['username'];

	//$password 	 =  ($_POST['password']);
	$password 	 =  md5($_POST['password']);

		$sql="
				SELECT m.*  , d.department_name_th 
				FROM `members` m  
				LEFT JOIN `department` d ON (d.department_code_ch = m.department_code_ch)
				WHERE
						m.username = '".$username. "'
				AND m.password = '".$password."'
				AND m.deleted = '0'
				AND m.enable = 'Y'
			";
	//	$result['sql'] = $sql ;
	//	echo $sql ; 

		$myquery = mysqli_query($conn, $sql);
		$numr = mysqli_num_rows($myquery);
		while($row = mysqli_fetch_assoc($myquery) ) {
			$result[] = $row;
		}

		$result['found'] = $numr;


		if($numr>0){
			$result['position'] = '1'; 
			$result['status'] = 'FOUND';
			$result['userlevel'] = $result[0]['userlevel'];
			$data_json	=  json_encode($result);
		}
		////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////


	if( $numr > 0){
		session_start();
		//$result[0]['id']

		$_SESSION['userid'] = $result[0]['id'];
		$_SESSION['userinfo'] = $result[0]['firstname']." ".$result[0]['lastname'] ;
		$_SESSION['deptcode'] = $result[0]['department_code_ch'];
		$_SESSION['deptname'] = $result[0]['department_name_th'];
		$_SESSION['usertype'] = $result[0]['userlevel']; // 1=SuperAdmin 2=Admin
		if($result[0]['userlevel']==1){
			$_SESSION['usertypename'] = "ผู้ดูแลระบบระดับกรม";
			$_SESSION['userlevel'] = "SuperAdmin";
			$_SESSION['usersupid'] = $result[0]['id'];
		}else{
			$_SESSION['usertypename'] = "ผู้ดูแลระบบระดับสำนัก";
			$_SESSION['userlevel'] = "Admin";
			$_SESSION['useradmid'] = $result[0]['id'];
		} 
		
	}else{

	}

	echo  $data_json;


?>
