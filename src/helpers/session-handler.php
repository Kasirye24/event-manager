<?php 
	session_start();

	function isLoggedIn() {
		if (isset($_SESSION['user_id']) || isset($_SESSION['username']) || isset($_SESSION['email'])) {
			return true;
		}else {
			header("location:/admin");
			exit();
		}
	}