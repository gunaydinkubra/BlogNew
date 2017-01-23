<?php
	class categoryModel{
		function listCategory(){
			$db = new db();
			$db->select(array("category_id","category_name"));
			$db->from("tbl_category");
			return $db->fetchAllArray();
			
		}
		function saveCategory($category_name){
			$db = new db();
			$db->insert(array("category_name"=>$category_name),"tbl_category");
			return $db->query();
		}
		function deleteCategory($category_id){
			$db = new db();
			$db->delete();
			$db->from("tbl_category");
			$db->where("category_id=?",array($category_id));
			return $db->query();
		}
		function editCategory($category_id){
			$db = new db();
			$db->select();
			$db->from("tbl_category");
			$db->where("category_id=?",array($category_id));
			return $db->fetchOneArray();
		}
		function updateCategory($category_id,$category_name){
			$db = new db();
			$db->update(array("category_id"=>$category_id, "category_name"=>$category_name),"tbl_category");
			$db->where("category_id=?",array($category_id));
			return $db->query();
		}
	}
?>