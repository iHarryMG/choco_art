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

	$id = $id;
	$number = $num;
	$date =  $_POST['date'];
	$content =  $_POST['content'];


	$sql = "select * from $id where num='$number'";
	$result = mysql_query($sql, $connect);
	$rows = mysql_num_rows($result);

	if($rows > 0){
		$sql = "update $id ";
		$sql .="set date='$date', content='$content' ";
		$sql .="where num='$number'";
	}
	else{
		$sql = "insert into $id ";
		$sql = $sql."(date, content)";
		$sql = $sql."values ('$date', '$content')";
	}
	mysql_query($sql, $connect);
	mysql_close($connect);

	echo("<script>
			alert('등록되었습니다.');
			window.location.href='profile_content.php';
		  </script>");

?>
