<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/login_design.css" type="text/css" rel="stylesheet">
  <script language="javascript">
	function check_input(){
		var form = document.login_form;
		if(!form.id.value){
			alert("아이디를 입력하세요!");
			return;
		}
		if(!form.pw.value){
			alert("비밀번호를 입력하세요!");
			return;
		}
		form.submit();
	}
  </script>
 </HEAD>
 <BODY onload="javascript:document.login_form.id.focus()">
  <center>
  <form name="login_form" action="check_login.php?win=<?echo $_REQUEST['win']?>" method="POST">
	  <div class="content">
		  <table>
			  <tr>
				<td>아이디</td><td><input type="text" name="id" maxlength="20" size=19></td>
			  </tr>
			  <tr>
				<td>비밀번호</td><td><input type="password" name="pw" maxlength="20" size=20></td>
			  </tr>
		  </table>
	  </div>
	  <div class="btn">
		<input type="button" onclick="javascript:check_input()" value="로그인" style="cursor:hand">
	  </div>
  </form>
 </BODY>
</HTML>
