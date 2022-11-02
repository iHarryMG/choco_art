<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/recipe_design.css" type="text/css" rel="stylesheet">
  <style type="text/css">
	body{
		margin: 0px;
		background-image: url("../../../images/admin_images/content_background.jpg");
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
	#header{
		margin-top: 41px;
		margin-left: 20px;
		font-size: 18px;
		font-weight: bold;
		color: #3a260d;
		font-family: "HY견고딕";
	}
	div.content{
		margin-top: 25px;
	}
  </style>
	<script language="javascript">
		function check_inputs(){
			var form = document.admin_form;
			if(!form.content.value){
				alert("내용을 입력하세요!");
				form.content.focus();
				return;
			}
			else if(!form.title.value){
				alert("제목을 입력하세요!");
				form.title.focus();
				return;
			}
			form.submit();
		}

		function view_image(id){
			window.open("view_image_recipe.php?id="+id,"", " scrollbars=yes, resizable=no, width=500, height=500 ");
		}
	</script>
 </HEAD>
 <BODY>	
	<div id="header">
		Chocolate Recipe
	</div>
	<div class="content">
		<iframe src="recipe_content.php" width="900px" height="430px;" name="content" scrolling="auto" frameborder=0></iframe>
	</div>
</BODY>
</HTML>