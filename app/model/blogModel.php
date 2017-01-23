<?php
	class blogModel{
		function listBlog(){
			$db = new db();
			$db->select(array("blog_id","title","content","operation_date","category_id","tags","likes","dislikes"));
			$db->from("tbl_blog");
			return $db->fetchAllArray();
			
		}
		function saveBlog($title,$content,$category_id,$tags){
			$db = new db();
			$db->insert(array("title"=>$title,"content"=>$content,"category_id"=>$category_id, "tags"=>$tags),"tbl_blog");
			return $db->query();
		}
		function deleteBlog($blog_id){
			$db = new db();
			$db->delete();
			$db->from("tbl_blog");
			$db->where("blog_id=?",array($blog_id));
			return $db->query();
		}
		function editBlog($blog_id){
			$db = new db();
			$db->select();
			$db->from("tbl_blog");
			$db->where("blog_id=?",array($blog_id));
			return $db->fetchOneArray();
		}
		function updateBlog($blog_id,$title,$content,$category_id,$tags){
			$db = new db();
			$db->update(array("title"=>$title,"content"=>$content,"category_id"=>$category_id, "tags"=>$tags),"tbl_blog");
			$db->where("blog_id=?",array($blog_id));
			return $db->query();
		}
	}
?>