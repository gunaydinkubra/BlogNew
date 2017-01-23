<?php
	class userController{
		function login(){
			include __DIR__."/../view/userLogin.html";
			
		}
		function logout(){
			session_destroy();
		}
		function add(){
			include __DIR__."/../view/userAdd.html";
			
		}
		function check(){
			$email = $_POST['email'];
			$pass= $_POST['pass'];
			$model = new userModel();
			$result = $model->checkUser($email,$pass);
			session::set("user",$result);
			echo json_encode($result);	
		}
		function getUserList(){
			$model = new userModel();
			$result = $model->listUser();
			echo json_encode($result);
		}
		function save(){
			$name = $_POST['name'];
			$surname = $_POST['surname'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$model = new userModel();
			$result = $model->saveUser($name,$surname,$email,$pass);
			echo json_encode($result);
		}
		function delete(){
			$user_id = $_POST['user_id'];
			$model = new userModel();
			$result = $model->deleteUser($user_id);
			echo json_encode($result);			
		}
		function edit(){
			$user_id = $_POST['user_id'];
			$model = new userModel();
			$result = $model->editUser($user_id);
			echo json_encode($result);			
		}
		function update(){
			$user_id = $_POST['user_id'];
			$name = $_POST['name'];
			$surname = $_POST['surname'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$model = new userModel();
			$result = $model->updateUser($user_id,$name,$surname,$email,$pass);
			echo json_encode($result);
		}
	}
?>