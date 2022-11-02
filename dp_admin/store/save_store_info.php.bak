<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>
 <BODY>
<?

include("../../dbconn/common.php");

$sql = "update order_fee ";
$sql .="set freedeliver_min_buyfee='$freedeliver_min_buyfee', deliver_fee='$deliver_fee' ";
$sql .="where num='$num'";
$result1 = mysql_query($sql, $connect);

$sql = "update admin ";
$sql .="set pw='$admin_pass' ";
$sql .="where id='admin'";
$result2 = mysql_query($sql, $connect);

mysql_close($connect);

if($result1 && $result2){
	echo("<script>
			alert('등록되었습니다.');
			history.go(-1)
		  </script>");
}
else{
	echo("<script>
			alert('등록하지 못 했습니다.');
			history.go(-1)
		  </script>");
}
?>
 </BODY>
</HTML>