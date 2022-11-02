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
	}
	div.content{
		margin-top: 20px;
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
		width: 600px;
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
 <center>
	<div class="content">
			<table cellpadding=5>
			<tr>
				<td align=center id="table_titles">제목</td>
				<td align=center id="table_titles">내용</td>
				<td align=center id="table_titles" colspan=3>관리</td>
			</tr>
			  <?
				include "../../../dbconn/common.php";

				$sql = "select * from recipe order by id asc";
				$result = mysql_query($sql,$connect);

				while($row = mysql_fetch_row($result)){
					echo("<tr>");
					echo("<td width=100px align=left><a href='javascript:view_image($row[0])'>$row[1]</a></td>");
					$short_content = substr($row[2], 0, 60)."...";
					echo("<td><a href='$PHP_SELF?id=$row[0]'>$short_content</a></td>");
					echo("<td id='btn'><a href='insert_image_recipe.php?id=$row[0]'>사진</a></td>");
					echo("<td id='btn'><a href='$PHP_SELF?id=$row[0]'>수정</a></td>");
					echo("<td id='btn'><a href='delete_recipe.php?id=$row[0]'>삭제</a></td>");
					echo("</tr>");
				}

			  ?>
			</table>
<?
			$record = "";
			$par_id = $_REQUEST['id'];
			$sql = "SELECT * FROM recipe where id='$par_id'";
			$result = mysql_query($sql, $connect);
			$record = mysql_fetch_array($result);  	
?>
			<form name="admin_form" action="save_recipe.php?id=<?echo $_REQUEST['id']?>" method="POST">
				<div id="table_register">
					<table cellpadding=5>
						<tr>
							<td align=center id="table_titles">제목</td>
							<td align=center><input name="title" type="text" size=64 maxlength=100 value="<?echo $record['title']?>"></td>
						</tr>
						<tr>
							<td align=center id="table_titles">내용</td>
							<td align=center><textarea name="content" cols=50 rows=15><?echo $record['content']?></textarea></td>
							<td align=center><input id="btn_register" type="button" value="등록" onclick="javascript:check_inputs()" style='cursor:hand'></td>
						</tr>
					</table>
				</div>
			</form>

	</div>
	</br>
</BODY>
</HTML>
