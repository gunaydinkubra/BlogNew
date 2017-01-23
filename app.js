error();
var getLoginForm = getAjax("user","login");
$("#htmlContent").html(getLoginForm);
$(document).on("submit","#checkForm",function(e){
	e.preventDefault();
	var checkUser = JSON.parse(getAjax("user","check", {email:$("#email").val(),pass:$("#pass").val()}));
		if(checkUser != null ){
			alert("Giriş İşlemi Başarılı");
			var userList = getAjax("user", "getUserList");
			displayList(['ID','İsim','Soyisim','E-Mail','Şifre'],userList,"#htmlContent","user",'user_id');
			$(".menu").show();
		}else{
			alert("Giriş İşlemi Başarısız");
		}
	return false;
});
$(document).on("click","#logout",function(e){
	e.preventDefault();
	var logoutFunc = getAjax("user", "logout");
	if(logoutFunc != null){
		alert("Çıkış İşlemi Yapılıyor..");
		$(".menu").hide();
		var getLoginForm = getAjax("user","login");
		$("#htmlContent").html(getLoginForm);	
	}
	return false;
});
$(document).on("click","#userProcesses",function(e){
	e.preventDefault();
	var userList = getAjax("user", "getUserList");
	displayList(['ID','İsim','Soyisim','E-Mail','Şifre'],userList,"#htmlContent","user",'user_id');
	return false;
});
$(document).on("click","#blogProcesses",function(e){
	e.preventDefault();
	var blogList = getAjax("blog", "getBlogList");
	displayList(['ID','Başlık','İçerik','İşlem Tarihi','Kategori ID','Etiket','Like','Dislike'],blogList,"#htmlContent","blog",'blog_id');
	return false;
});
$(document).on("click","#categoryProcesses",function(e){
	e.preventDefault();
	var categoryList = getAjax("category", "getCategoryList");
	displayList(['ID','Kategori Adı'],categoryList,"#htmlContent","category",'category_id');
	return false;
});
$(document).on("click","#commentProcesses",function(e){
	e.preventDefault();
	var commentList = getAjax("comment", "getCommentList");
	displayList(['Comment ID','Blog ID','User ID','Yorum','İşlem Tarihi','Likes','Dislikes'],commentList,"#htmlContent","comment",'comment_id');
	return false;
});
$(document).on("click",".add",function(){
	var controllerName = $(this).attr("id");
	var getAddForm = getAjax(controllerName,"add");
	$("#modal-content").html(getAddForm);
	categoryList();
	$("#modal").modal("show");
});
$(document).on("submit",".saveForm",function(e){
	e.preventDefault();
	var controllerName = $(this).attr("id");
	var data = $(this).serializeArray();
	for(var i=1;i<data.length;i++){
		if( data[i].value == 0){
		alert("Alanların Tümünü Doldurunuz");
		return false;
		}
	}
	
	var save = getAjax(controllerName, "save", data);
	if( save != false) {
		alert("Kayıt İşlemi Başarılı");
		$("#modal").modal("hide");
	}else{
		alert("Kayıt Başarısız");
	}
	return false;
	
});
$(document).on("click",".delete",function(e){
	e.preventDefault();
	var ID = $(this).attr("id");
	var controllerName = $(this).attr("module");
	var idField = controllerName+"_id";
	var param = {};
	param[idField]=ID;
	var deleteUser = getAjax(controllerName,"delete",param);
	if( deleteUser != 0) {
		alert("Silme İşlemi Başarılı");
	}else{
		alert("Silme İşlemi Başarısız");
	}
	return false;
});
$(document).on("click",".edit",function(e){
	e.preventDefault();
	var ID = $(this).attr("id");
	var controllerName = $(this).attr("module");
	var idField = controllerName+"_id";
	var param = {};
	param[idField]=ID;
	var getAddForm = getAjax(controllerName,"add");
	var getData = JSON.parse(getAjax(controllerName,"edit",param));
	$("#modal-content").html(getAddForm);
	$(".saveForm").attr("class","editForm");
	
	$.each( getData, function(key,value){
		$("#"+key).val(value);
	});
	categoryList(getData['category_id']);
	$("#modal").modal("show");
	return false;
});
$(document).on("submit",".editForm",function(e){
	e.preventDefault();
	var ControllerName = $(this).attr("id");
	var data = $(this).serialize();
	var update = getAjax(ControllerName,"update",data);
	if( update != false) {
		alert("Güncelleme İşlemi Başarılı");
		$("#modal").modal("hide");
	}else{
		alert("Güncelleme Başarısız");
	}
	return false;
	
});
$(document).on("click","#display",function(e){
	e.preventDefault();
	displayBlog("displayBlog");
	displayCategory();
	$(".menu").hide();
	$("#display").hide();
	return false;
});
$(document).on("click",".moreThan",function(e){
	e.preventDefault();
	var ID = $(this).attr("id");
	var blog = JSON.parse(getAjax("display","displayBlogById",{blog_id:ID}));
	var content = '<div id="allContent" class="col-md-10 col-md-offset-1 white h400">';
	content += '</div>';
	$("#htmlContent").html(content);
	var blogCont = '<div class="col-md-8">'+
	'<h3>'+blog['title']+'</h3>'+
	'<p>'+blog['content']+'</p>'+
	'<label class="control-lbl">Yorum Yap</label><br>'+
	'<form class="saveComment" id="'+ID+'">'+
	'<textarea id="content" name="content" rows="5" cols="60"></textarea><br>'+
	'<button class="btn btn-md btn-default">Kaydet</button>'+
	'</form>'+
	'</div>';
	$("#allContent").html(blogCont);
	displayCategory();
	return false;
	
});
$(document).on("submit",".saveComment",function(e){
	var ID = $(this).attr("id");
	e.preventDefault();
	var result = getAjax("comment","save",{content:$("#content").val(),blog_id:ID});
	if(result != false){
		alert("Yorumunuz eklenmiştir.");
		$("#content").val("");
	}
	return false;
	
});
$(document).on("click",".showBlogByCategory",function(e){
	e.preventDefault();
	var ID = $(this).attr("id");
	displayBlog("displayBlogByCategoryId",{category_id:ID});
	displayCategory();
	return false;
	
});
$(document).on("click","#allBlog",function(e){
	e.preventDefault();
	displayBlog("displayBlog");
	displayCategory();
	$(".menu").hide();
	return false;
	
});
function getAjax(controller_name, action_name,Object){
	var operation = $.ajax({
		url:'app/spreader.php?controller='+controller_name+'&action='+action_name+'', 
		dataType:"json",
		type:"POST",
		async:false,
		data:Object,
		success: function(result){
			//console.log(typeof(result));
			return result;
		},
		
	});
	return operation.responseText;
}
function displayList(columnName,data,element,controllerName,IdField){
	data=JSON.parse(data);
	if(Object.keys(data[0]).length != columnName.length){
		alert("Sütün sayıları eşleşmemektedir.");
		return false;
	}
	
		var columnContent = '';
		for(var c=0;c<columnName.length;c++){
			columnContent += '<th>'+columnName[c]+'</th>';
		}
		columnContent += '<th></th>';
		
	var dataContent = '';
	for(var i=0;i<data.length;i++){
		dataContent += '<tr>';
		$.each(data[i], function(key,val){
			dataContent += '<td>'+val+'</td>';
	
		});
		
		dataContent += '<td><button id="'+data[i][IdField]+'" module="'+controllerName+'" class="edit btn btn-default btn-sm">Edit</button></td>';
		dataContent += '<td><button id="'+data[i][IdField]+'" module="'+controllerName+'" class="delete btn btn-default btn-sm">Delete</button></td>';
		dataContent += '</tr>';
				
	}
	
	
	var content = '<div class="table-responsive col-md-8 col-md-offset-2">'+
					'<table class="table table-hover">'+
					'<thead>'+
						'<tr>'+columnContent+''+
						'<th><button id="'+controllerName+'" class="add btn btn-default btn-md">Yeni</button></th>'+
						'</tr>'+
					'<thead>'+
					'<tbody>'+dataContent+'</tbody>'+
					'</table>'+
					'</div>';
	$(element).html(content);
	
}
function error(){
	$(".menu").hide();
	$.ajax({
		url:"app/spreader.php?controller&action",
		dataType:"html",
		type:"POST",
		success:function(data){
			if( data == "Kullanıcı Yok"){
				alert("Kullanıcı Yok");	
			}else{
				$(".menu").show();
				var userList = getAjax("user", "getUserList");
				displayList(['ID','İsim','Soyisim','E-Mail','Şifre'],userList,"#htmlContent","user",'user_id');
			}
		}
	});
}
function categoryList(category_id){
	var getCategory = JSON.parse(getAjax("category","getCategoryList"));
	//console.log(getCategory);
	var selectContent = '<option value="">Kategori Seçiniz</option>';
	for( i=0; i<getCategory.length; i++ ){
		if(category_id == getCategory[i]['category_id'] ){
			selectContent += '<option  selected value="'+getCategory[i]['category_id']+'">'+getCategory[i]['category_name']+'</option>';
		}else{
				selectContent += '<option  value="'+getCategory[i]['category_id']+'">'+getCategory[i]['category_name']+'</option>';
			}
	}
	$("#category_id").html(selectContent);
}
function displayBlog(action_name, data){
	var content = '<div id="allContent" class="col-md-10 col-md-offset-1 white h600">';
	content += '</div>';
	$("#htmlContent").html(content);
	var dataBlog = JSON.parse(getAjax("display",action_name,data));
	var blogContent ='';
	for(var i=0; i<dataBlog.length; i++){
		blogContent += '<h4>'+dataBlog[i]['title']+'</h4>';
		blogContent += '<p class="hiddenn">'+dataBlog[i]['content']+'</p>';
		blogContent += '<a href="" id="'+dataBlog[i]['blog_id']+'" class="moreThan">Daha Fazla</a>';
	}
	var blogCont = '<div class="col-md-8">'+blogContent+'</div>';
	$("#allContent").html(blogCont);
}
function displayCategory(){
	var dataCategory = JSON.parse(getAjax("display","displayCategory"));
	var categoryContent ='<a href="" id="allBlog">Tümü</a><br>';
	for(var i=0; i<dataCategory.length; i++){
		categoryContent += '<a class="showBlogByCategory" id="'+dataCategory[i]['category_id']+'" href="">'+dataCategory[i]['category_name']+'</a><br>';	
	}
	var categoryContent = '<div class="col-md-2"><h3>KATEGORİLER</h3>'+categoryContent+'</div>';
	$("#allContent").append(categoryContent);
}



