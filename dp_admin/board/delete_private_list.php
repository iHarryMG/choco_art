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

		$id = $_REQUEST['id'];
		$sql = "delete from private ";
		$sql .= "where private_id='$id'";
		mysql_query($sql, $connect);

		$sql = "delete from private_answer ";
		$sql .= "where private_id='$id'";
		mysql_query($sql, $connect);

		mysql_close($connect);

		echo("<script>
				alert('삭제되었습니다.');
				window.location.href='private_list.php';
			  </script>");

?>