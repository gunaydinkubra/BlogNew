<!DOCTYPE html>
<html>
<head>
<title>Blog</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="core/core.css">
<script type="text/javascript" src="lib/jquery/jquery.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="col-md-12 h100"></div>
<nav class="navbar navbar-default navbar-fixed-top menu">
  <div class="container ">
	<ul class="nav nav-tabs">
	  <li role="presentation"><a id="userProcesses" href="">Kullanıcı İşlemleri</a></li>
	  <li role="presentation"><a id="blogProcesses" href="">Blog İşlemleri</a></li>
	  <li role="presentation"><a id="categoryProcesses" href="">Kategori İşlemleri</a></li>
	  <li role="presentation"><a id="commentProcesses" href="">Yorum İşlemleri</a></li>
	  <li role="presentation"><a id="logout" href="">Çıkış</a></li>
	</ul>
  </div>
</nav>
	<div class="col-md-2 col-md-offset-10">
		<a class="btn btn-info btn-md" id="display" href="">Blog Sayfası</a>
	</div>
	<div class="" id="htmlContent">
	</div>
	
<div id="modal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div  class="modal-content">
			<div id="modal-content" class="modal-body">
			</div>
		</div>
	</div>
</div>

</div>
<script type="text/javascript" src ="app.js">
</script>
</body>
</html>
