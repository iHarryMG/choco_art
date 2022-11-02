<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <style type="text/css">
	body{
		background-image: url("../images/background_images/changepw_background.jpg");
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
	function change_mem_pw(){
		var form = document.mem_form;

		if(form.new_pw.value != form.new_pw_re.value){
			alert("비밀번호가 일치하지 않습니다.\n 다시 입력하세요!");
			form.new_pw.focus();
			return;
		}

		form.submit();
	}
  </script>
 </HEAD>
 <BODY>
 <?
		$u_id = $_REQUEST['u_id'];
 ?>
  <form name="mem_form" action="change_mem_pw.php?id=<?echo $u_id?>" method="POST">
  <center>
	<table>
		<tr>
			<td align="right">새비밀번호</td>
			<td><input type="password" name="new_pw" size="18" maxlength="20"></td>
		</tr>
		<tr>
			<td align="right">비밀번호 확인</td>
			<td><input type="password" name="new_pw_re" size="18" maxlength="20"></td>
		</tr>
		<tr>
			<td id="btns" align="center" colspan="2">
				<input type="button" onclick="javascript:change_mem_pw()" value="변경">
				<input type="button" onclick="javascript:window.close()" value="취소">
			</td>
		</tr>
	</table>
  </form>
 </BODY>
</HTML>
