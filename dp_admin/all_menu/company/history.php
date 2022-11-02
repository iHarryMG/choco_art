<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/history_design.css" type="text/css" rel="stylesheet">
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
	div.content a{
		text-decoration: none;
		color: #3a260d;
	}
	div.content a:hover{
		text-decoration: underline;
		color: #3a260d;
	}
	div.content table{
		width: 800px;
		border: 1px solid gray;
		border-collapse: collapse;
		margin-bottom: 20px;
	}
	div.content table input{
		border: 1px solid gray;
	}
	div.content table td{
		border: 1px solid gray;
		color: #3a260d;
		font-size: 12px;
	}
	div.content table td#table_titles{
		background-color: #9bbb58;
		color: #3a260d;
		font-size: 14px;
	}
	input#btn_register{
		width: 50px;
		margin-right: 20px;
	}
  </style>
	<script language="javascript">
		function check_inputs(){
			var form = document.admin_form;
			if(!form.date.value){
				alert("날짜를 입력하세요!");
				form.date.focus();
				return;
			}
			else if(!form.content.value){
				alert("내용을 입력하세요!");
				form.content.focus();
				return;
			}
			form.submit();
		}
	</script>
 </HEAD>
 <BODY>	
	<div id="header">
		History
	</div>
	<div class="content">
		<iframe src="history_list.php" width="900px" height="430px;" name="content" scrolling="auto" frameborder=0></iframe>
	</div>
	</br>
</BODY>
</HTML>