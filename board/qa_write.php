<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/qa_write_design.css" type=text/css rel=stylesheet>
  <script language="javascript">
	  function goback(){
		history.go(-1)
	  }
  </script>
 </HEAD>
 <?
if(($login == "") || ($_SESSION['user_id'] != $login)){
		echo("<script>alert('로그인 하셔야 합니다.'); 
				history.go(-1);
			</script>");		
	}
?>
 <BODY>
 <form action="save_qa.php" method="POST">
	 <center>
		 <div>
			 <table id="content_table" cellpadding=5>
				<tr>
					<td id="row" align=center>제목</td><td><input type='text' name='title' size=78></td>
				</tr>
				<tr>
					<td id="row" align=center>질문</td><td><textarea type='text' name='question' cols=60 rows=15></textarea></td>
				</tr>
			 </table>
		 </div>
	</center>	
		 <div id="buttons">
			<table>
				<tr>
					<td>
						<input type='submit' value='저장'>
						<input type='button' value='취소' onclick="goback()">
					</td>
				</tr>
			</table>
		 </div>

 </BODY>
</HTML>
