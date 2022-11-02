<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>
 <BODY>
 </BODY>
</HTML>
<?
	 include("../dbconn/common.php");
	 $sql=" select name, id, pw, class, login_count from member where id='$id'";
	 $result = mysql_query($sql, $connect);
	 $record = mysql_num_rows($result);
	 $values = mysql_fetch_array($result);

	 if(!$record){
		mysql_close($connect);
		echo("<script>
				alert('아이디를 다시 확인하세요!');
				history.go(-1);
		      </script>");
	 }
	 else{
		if($pw != $values['pw']){
			mysql_close($connect);
			echo("<script>
					alert('비밀번호를 다시 확인하세요!');
					history.go(-1);
				  </script>");
		}
		else{
			if($values['class'] == "탈퇴"){
				mysql_close($connect);
				echo("<script>
						alert('탈퇴된 회원입니다!');
						history.go(-1);
					  </script>");			
			}
			else{
				$user_name = $values['name'];
				$user_id = $values['id'];
				$user_pw = $values['pw'];

				$login_count = $values['login_count'];
				$login_count = $login_count+1;
				$login_date = date("Y.m.d-h:i:s A");

				$sql = "update member set login_date='$login_date', login_count='$login_count' where id='$id'";
				mysql_query($sql, $connect);
				mysql_close($connect);

				
				$_SESSION['user_name'] = $user_name;
				$_SESSION['user_id'] = $user_id;
				$_SESSION['user_pw'] = $user_pw;
				
				echo("<script>
						function refreshParent() {
							window.opener.location.href = '../".$_REQUEST['win'].".php';
							if (window.opener.progressWindow){
								window.opener.progressWindow.close();
							}
							window.close();
						}
						alert('성공적으로 로그인하셨습니다.');
						refreshParent();					
					  </script>");			
			}
		}
	 }
?>
