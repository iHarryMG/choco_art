<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/businesspartner_design.css" type="text/css" rel="stylesheet">
  <style type="text/css">
	body{
		margin: 0px;
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
			if(!form.region.value){
				alert("지역을 입력하세요!");
				form.region.focus();
				return;
			}
			else if(!form.title.value){
				alert("제목을 입력하세요!");
				form.title.focus();
				return;
			}
			else if(!form.url.value){
				alert("URL를 입력하세요!");
				form.url.focus();
				return;
			}
			form.submit();
		}
	</script>
 </HEAD>
 <BODY>	
	<div class="content">
			<table cellpadding=5>
			<tr>
				<td align=center id="table_titles" width="100px">지역</td>
				<td align=center id="table_titles" width="300px">제목</td>
				<td align=center id="table_titles" width="250px">URL</td>
				<td align=center id="table_titles" colspan=3>관리</td>
			</tr>
			  <?
				include "../../../dbconn/common.php";

				$region_sql="select DISTINCT region from businesspartner";
				$region_result=mysql_query($region_sql,$connect);				
				$region_row = mysql_num_rows($region_result);

				while($region_records = mysql_fetch_array($region_result)){
					$sql = "select * from businesspartner where region='$region_records[region]' order by num asc";
					$result = mysql_query($sql,$connect);

					while($row = mysql_fetch_row($result)){
						echo("<tr>");
						echo("<td width=100px align=center>$row[1]</td>");
						echo("<td> $row[2] </td>");
						echo("<td> $row[3] </td>");
						echo("<td><a href='insert_image_businesspartner.php?num=$row[0]'>사진</a></td>");
						echo("<td><a href='$PHP_SELF?num=$row[0]'>수정</a></td>");
						echo("<td><a href='delete_businesspartner.php?num=$row[0]'>삭제</a></td>");
						echo("</tr>");
					}
				}
			  ?>
			</table>	
<?
			$record = "";
			$par_num = $_REQUEST['num'];
			$sql = "SELECT * FROM businesspartner where num='$par_num'";
			$result = mysql_query($sql, $connect);
			$record = mysql_fetch_array($result);  	
?>
			<form name="admin_form" action="save_businesspartner.php?num=<?echo $_REQUEST['num']?>" method="POST">
				<div id="table_register">
					<table cellpadding=5>
						<tr>
							<td align=center id="table_titles">지역</td>
							<td align=center id="table_titles">제목</td>
							<td align=center id="table_titles" colspan=2>URL</td>
						</tr>
						<tr>
							<td align=center><input name="region" type="text" size=20 maxlength=10 value="<?echo $record['region']?>"></td>
							<td align=center><input name="title" type="text" size=30 maxlength=40 value="<?echo $record['title']?>"></td>
							<td align=center><input name="url" type="text" size=30 maxlength=40 value="<?echo $record['url']?>"></td>
							<td align=center><input id="btn_register" type="button" value="등록" onclick="javascript:check_inputs()" style="cursor:hand"></td>
						</tr>
					</table>
				</div>
			</form>

	</div>
	</br>
</BODY>
</HTML>
