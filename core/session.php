<?php
	class session{
		function set($variable,$result){
			$_SESSION[$variable]=$result;
		}
		function get($variable){
			$_SESSION[$variable];
		}
		function checkLogin(){
			if(isset($_SESSION['user'])) return 1;
			else return 0;
		}
		
	}
?>