<?php
	session_start();
	if(  $_SESSION['userlevel'] == "SuperAdmin"  ){
       
	
	}else{
		?>
		<script>
          //  alert(' <?php echo $_SESSION['usertype'];?> ') ;
          //  alert(` You don't have permission !  `) ;
			window.location = "/index.php";
		</script>
		<?php
	}

?>
