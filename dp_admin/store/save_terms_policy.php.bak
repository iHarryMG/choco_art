<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>
<?
		include("../../dbconn/common.php");

		$sql = "update terms_policy ";
		$sql .="set service_terms='$terms', 
				privacy_policy='$policy',
				delivery_policy='$delivery',
				return_policy='$return'";
		$sql .="where num='$num'";
		mysql_query($sql, $connect);
		mysql_close($connect);

		echo("<script>
				alert('등록되었습니다.');
				history.go(-1)
			  </script>");
?>
 <BODY>
 </BODY>
</HTML>