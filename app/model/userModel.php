<?php
	class userModel{
		function checkUser($email,$pass){
			$db = new db();
			$db->select();
			$db->from("tbl_user");
			$db->where("email=? and pass=?",array($email,$pass));
			return $db->fetchOneArray();
			
		}
		function listUser(){
			$db = new db();
			$db->select(array("user_id","name","surname","email","pass"));
			$db->from("tbl_user");
			return $db->fetchAllArray();
		}
		function saveUser($name,$surname,$email,$pass){
			$db = new db();
			$db->insert(array("name"=>$name,"surname"=>$surname,"email"=>$email, "pass"=>$pass),"tbl_user");
			return $db->query();
		}
		function deleteUser($user_id){
			$db = new db();
			$db->delete();
			$db->from("tbl_user");
			$db->where("user_id=?",array($user_id));
			return $db->query();
		}
		function editUser($user_id){
			$db = new db();
			$db->select();
			$db->from("tbl_user");
			$db->where("user_id=?",array($user_id));
			return $db->fetchOneArray();
		}
		function updateUser($user_id,$name,$surname,$email,$pass){
			$db = new db();
			$db->update(array("name"=>$name,"surname"=>$surname,"email"=>$email, "pass"=>$pass),"tbl_user");
			$db->where("user_id=?",array($user_id));
			return $db->query();
		}
	}
?>