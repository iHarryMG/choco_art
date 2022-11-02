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

	$number = $num;
	$date =  $_POST['date'];
	$content =  $_POST['content'];


	$sql = "select * from companyhistory where num='$number'";
	$result = mysql_query($sql, $connect);
	$rows = mysql_num_rows($result);

	if($rows > 0){
		$sql = "update companyhistory ";
		$sql .="set date='$date', content='$content' ";
		$sql .="where num='$number'";
	}
	else{
		$sql = "insert into companyhistory ";
		$sql = $sql."(date, content)";
		$sql = $sql."values ('$date', '$content')";
	}
	mysql_query($sql, $connect);
	mysql_close($connect);

	echo("<script>
			alert('등록되었습니다.');
			window.location.href='history.php';
		  </script>");

?>
