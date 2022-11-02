<?
	$id = $_REQUEST['id'];
	$pw = $new_pw_re;

	include("../dbconn/common.php");
	$sql="update member ";
	$sql.="set pw='$pw' ";
	$sql.="where id='$id'";
	mysql_query($sql, $connect);
	mysql_close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script language="javascript">
	alert("비밀번호가 성공적으로 변경되었습니다.");
	window.close();
</script>
</HEAD>
 <BODY>
 </BODY>
</HTML>