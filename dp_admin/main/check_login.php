<?
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>
 <BODY>
 </BODY>
</HTML>
<?
	 include("../../dbconn/common.php");
	 $sql=" select name, id, pw from admin where id='$id'";
	 $result = mysql_query($sql, $connect);
	 $record = mysql_num_rows($result);
	 $values = mysql_fetch_array($result);

	 if(!$record){
		echo("<script>
				alert('아이디를 다시 확인하세요!');
				history.go(-1);
		      </script>");
	 }
	 else{
		if($pw != $values['pw']){
			echo("<script>
					alert('비밀번호를 다시 확인하세요!');
					history.go(-1);
				  </script>");
		}
		else{
			$admin_name = $values['name'];
			$admin_id = $values['id'];
			$admin_pw = $values['pw'];

			$_SESSION['admin_name'] = $admin_name;
			$_SESSION['admin_id'] = $admin_id;
			$_SESSION['admin_pw'] = $admin_pw;

			echo("<script>
						window.location.href='admin_main.php?id=$admin_id';
					</script>");
		}
	 }
?>
