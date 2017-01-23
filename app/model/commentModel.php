<?php
	class commentModel{
		function listComment(){
			$db = new db();
			$db->select(array("comment_id","blog_id","user_id","content","operation_date","likes","dislikes"));
			$db->from("tbl_comment");
			return $db->fetchAllArray();
			
		}
		function saveComment($blog_id,$user_id,$content){
			$db = new db();
			$db->insert(array("blog_id"=>$blog_id,"user_id"=>$user_id,"content"=>$content),"tbl_comment");
			echo $db->sql;
			return $db->query();
		}
		function deleteComment($comment_id){
			$db = new db();
			$db->delete();
			$db->from("tbl_comment");
			$db->where("comment_id=?",array($comment_id));
			return $db->query();
		}
		function editComment($comment_id){
			$db = new db();
			$db->select();
			$db->from("tbl_comment");
			$db->where("comment_id=?",array($comment_id));
			return $db->fetchOneArray();
		}
		function updateComment($comment_id,$content){
			$db = new db();
			$db->update(array("comment_id"=>$comment_id,"content"=>$content),"tbl_comment");
			$db->where("comment_id=?",array($comment_id));
			return $db->query();
		}
	}
?>