<?php
	class displayModel{
		function getBlog(){
			$db = new db();
			$db->select(array("category_id","blog_id","title","content"));
			$db->from("tbl_blog");
			return $db->fetchAllArray();
		}
		function getCategory(){
			$db = new db();
			$db->select(array("category_name","category_id"));
			$db->from("tbl_category");
			return $db->fetchAllArray();
		}
		function getBlogById($blog_id){
			$db = new db();
			$db->select(array("blog_id","category_id","title","content"));
			$db->from("tbl_blog");
			$db->where("blog_id=?",array($blog_id));
			return $db->fetchOneArray();
		}
		function getBlogByCategoryId($category_id){
			$db = new db();
			$db->select(array("blog_id","title","content"));
			$db->from("tbl_blog");
			$db->where("category_id=?",array($category_id));
			return $db->fetchAllArray();
		}
	}
?>