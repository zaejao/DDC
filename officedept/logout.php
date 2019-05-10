<?php 
	 
	session_start();
	/*
	unset ( $_SESSION['ses_userid'] );
	unset ( $_SESSION['ses_username'] );
	unset ( $_SESSION['ses_status'] );
	*/
	session_destroy();
	

?>

<script>
	window.location = "login.html";
</script>