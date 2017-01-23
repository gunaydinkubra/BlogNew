<?php
	class categoryController{
		function add(){
			include __DIR__."/../view/categoryAdd.html";
			
		}
		
		function getCategoryList(){
			$model = new categoryModel();
			$result = $model->listCategory();
			echo json_encode($result);
		}
		function save(){
			$category_name = $_POST['category_name'];
			$model = new categoryModel();
			$result = $model->saveCategory($category_name);
			echo json_encode($result);
		}
		function delete(){
			$category_id = $_POST['category_id'];
			$model = new categoryModel();
			$result = $model->deletecategory($category_id);
			echo json_encode($result);			
		}
		function edit(){
			$category_id = $_POST['category_id'];
			$model = new categoryModel();
			$result = $model->editCategory($category_id);
			echo json_encode($result);			
		}
		function update(){
			$category_id = $_POST['category_id'];
			$category_name = $_POST['category_name'];
			$model = new categoryModel();
			$result = $model->updateCategory($category_id,$category_name);
			echo json_encode($result);
		}
	}
?>