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
		include("../../../dbconn/common.php");

		$num = $_REQUEST['num'];
		$sql = "delete from companyhistory ";
		$sql .= "where num='$num'";
		mysql_query($sql, $connect);
		mysql_close($connect);

		echo("<script>
				alert('삭제되었습니다.');
				window.location.href='history.php';
			  </script>");

?>
