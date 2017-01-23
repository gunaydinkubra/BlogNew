<?php
	session_start();
	include __DIR__.'/../core/db.php';
	include __DIR__.'/../core/session.php';
	
	$controller = $_GET['controller'];
	$action = $_GET['action'];
	$controller_name = $controller."Controller";
	$whoCanPass = array("login","logout","check","displayBlog","displayCategory","displayBlogById","displayBlogByCategoryId","save");
	if( in_array( $action, $whoCanPass )){
		include 'controller/'.$controller.'Controller.php';
		include 'model/'.$controller.'Model.php';
		$Controller = new $controller_name();
		$Controller->$action();
		return false;
	}
	$result = session::checkLogin();
	if( $result == 0 ){
		echo "Kullanıcı Yok";
		return false;
	}
	include 'controller/'.$controller.'Controller.php';
	include 'model/'.$controller.'Model.php';
	$Controller = new $controller_name();
	$Controller->$action();
	
?>