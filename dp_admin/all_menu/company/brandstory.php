<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/brandstory_design.css" type="text/css" rel="stylesheet">
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
		margin: 50px auto 20px 20px;
	}
	div.content table{
		border: 1px solid gray;
		border-collapse: collapse;
		margin-bottom: 20px;
	}
	div.content table input,textarea{
		border: 1px solid gray;
	}
	div.content table td{
		border: 1px solid gray;
		color: #3a260d;
		font-size: 12px;
	}
	table td#table_titles{
		background-color: #9bbb58;
		color: #3a260d;
		font-size: 14px;
		width: 150px;
	}
	input#btn_register{
		margin-bottom: 20px;
		margin-left: 300px;
		border: 1px solid gray;
		width: 50px;
	}
  </style>
	<script language="javascript">
		function check_inputs(){
			var form = document.admin_form;
			form.submit();
		}
	</script>
 </HEAD>
 <BODY>	
	<div id="header">
		Brand Story
	</div>
	<div class="content">
 <?
		 include("../../../dbconn/common.php");
		 $sql=" select * from brandstory";
		 $result = mysql_query($sql, $connect);
		 $contents= mysql_fetch_array($result)
 ?>
		<form name="admin_form" action="save_brandstory.php?num=<?echo $contents['num']?>" method="POST">
		<table>
			<tr>
				<td id="table_titles" align="center">브랜드 이야기</td>
				<td><textarea name="story" cols=60 rows=15>
				<?
					echo $contents['content'];
				?>
				  </textarea></td>
			</tr>
 <?
		mysql_close($connect);
 ?>
		</table>
		<input id="btn_register" type="button" onclick="javascript:check_inputs()" value="등록" style="cursor:hand">
		</form>
	</div>
</BODY>
</HTML>