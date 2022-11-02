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
	<div class="content">
			<table cellpadding=5>
				<tr>
					<td colspan=2 align=center id="table_titles">학력</td>
					<td colspan=2 align=center id="table_titles">관리</td>
				</tr>
			  <?
				include "../../../dbconn/common.php";

				$sql="select * from companyhistory order by num desc";
				$result=mysql_query($sql,$connect);
				$fields=mysql_num_fields($result);
				while($row=mysql_fetch_row($result)){
					echo("<tr >");
					echo("<td id='left' width=100px>$row[1]</td>");
					echo("<td id='right' width=600px> $row[2] </td>");
					echo("<td id='btn'><a href='$PHP_SELF?num=$row[0]'>수정</a></td>");
					echo("<td id='btn'><a href='delete_history.php?num=$row[0]'>삭제</a></td>");
					echo("</tr>");
				}
			  ?>
			</table>	
<?
			$record = "";
			$par_num = $_REQUEST['num'];
			$sql = "SELECT * FROM companyhistory where num='$par_num'";
			$result = mysql_query($sql, $connect);
			$record = mysql_fetch_array($result);  	
?>
			<form name="admin_form" action="save_history.php?num=<?echo $_REQUEST['num']?>" method="POST">
				<div id="table_register">
					<table cellpadding=5>
						<tr>
							<td id="table_titles">날짜: </td>
							<td colspan=2><input name="date" type="text" size=21 maxlength=21 value="<?echo $record['date']?>"></td>
						</tr>
						<tr>
							<td id="table_titles">내용: </td>
							<td><input name="content" type="text" size=100 value="<?echo $record['content']?>"></td>
							<td align=center><input id="btn_register" type="button" value="등록" onclick="javascript:check_inputs()" style='cursor:hand'></td>
						</tr>
					</table>
				</div>
			</form>

	</div>
	</br>
</BODY>
</HTML>