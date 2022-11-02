<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
  <META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <style type="text/css">
	body{
		background-color: #fffef5;
	}
	div#content{
		margin-top: 150px;
	}
	a img{
		border: 0px;
		margin-top: 0px;
	}
	table{
		font-size: 14px;
		width: 200px;
		font-family: "MV Boli";
	}
	table input{
		border: 1px solid gray;
	}
  </style>
  <script language="javascript">
	function check_login(){
		var form = document.admin_form;

		if(!form.id.value){
			alert("아이디를 입력하세요!");
			form.id.focus();
			return;
		}
		else if(!form.pw.value){
			alert("비밀번호를 입력하세요!");
			form.pw.focus();
			return;
		}

		form.submit();
	}
  </script>
 </HEAD>
 <BODY onload="javascript:document.admin_form.id.focus()">
	<form name="admin_form" action="main/check_login.php" method="POST">

	<div id="content" align="center">
		<table id="login_table">
			<tr>
				<td colspan=3 align="center"><img src="../images/admin_images/logo.gif"></td>
			</tr>
			<tr>
				<td>AdminID:</td>
				<td><input type="text" name="id" size="19" maxlength="20"></td>
				<td  rowspan=2 >
						<a href="javascript:check_login()" id="btn_login"><img src="../images/buttons/adminlogin_btn.jpg"></a>
				</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td colspan=1><input type="password" name="pw" size="20" maxlength="20"></td>
			</tr>
		</table>
	</div>
	</form>
 </BODY>
</HTML>
