<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <style type="text/css">
	body{
		background-image: url("../images/background_images/searchid_background.jpg");
	}
	table{
		margin-top: 100px;
		font-size: 12px;
		color: #d5a738;
		font-weight: bold;
	}
	table input{
		border: 1px solid gray;
		background-color: white;
	}
	table td#btns input{
		margin-top: 10px;
		background-color: lightgray;
	}
  </style>
  <script language="javascript">
	function search_id(){
		var form = document.mem_form;

		if(!form.user_name.value){
			alert("이름을 입력하세요!");
			form.user_name.focus();
			return;
		}
		if(!form.user_rrn1.value){
			alert("주민등록번호를 입력하세요!");		
			form.user_rrn1.focus();
			return;
		}
		if(!form.user_rrn2.value){
			alert("주민등록번호를 입력하세요!");		
			form.user_rrn2.focus();
			return;
		}

		form.submit();
	}
  </script>
 </HEAD>
 <BODY>
 <?
		$name = $_REQUEST['user_name'];
		$rrn1 = $_REQUEST['user_rrn1'];
		$rrn2 = $_REQUEST['user_rrn2'];
		$rrn = $rrn1."-".$rrn2;
		$flag = $_REQUEST['flag'];

		include("../dbconn/common.php");
		$sql=" select id from member where name='$name' and rrn='$rrn'";
		$result = mysql_query($sql, $connect);
		$record = mysql_num_rows($result);
		
		if($record > 0){
			$flag = "gotrecord";
			$id = mysql_fetch_array($result);
 ?>
  <center>
	<table>
		<tr>
			<td align="center"><?echo $name?>님의 아이디는</br><strong><?echo $id['id']?></strong> 입니다.</td>
		</tr>
		<tr>
			<td align="center" id="btns">
				<input id="btns" type="button" onclick="javascript:window.close()" value="확인">
			</td>
		</tr>
	</table>
 <?
		}
		else if($flag == "norecord"){
?>
			<script language="javascript">
				alert("등록된 회원이 아닙니다.\n입력하신 정보를 다시 확인하세요!");
				history.go(-1);
			</script>
<?
		}
		else{
 ?>
  <form name="mem_form" action="<?echo $_PHPSELF?>" method="POST">
  <input type="hidden" name="flag" value="norecord">
  <center>
	<table>
		<tr>
			<td align="right">이름</td>
			<td><input type="text" name="user_name" size="18" maxlength="20"></td>
		</tr>
		<tr>
			<td align="right">주민번호</td>
			<td><input type="text" name="user_rrn1" size="5" maxlength="6">-<input type="text" name="user_rrn2" size="7" maxlength="7"></td>
		</tr>
		<tr>
			<td align="center" colspan="2" id="btns">
				<input type="button" onclick="javascript:search_id()" value="확인">
				<input type="button" onclick="javascript:window.close()" value="취소">
			</td>
		</tr>
	</table>
  </form>
<?
		}
?>
 </BODY>
</HTML>
