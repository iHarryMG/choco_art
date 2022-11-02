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
	$registrant =  $_POST['registrant'];
	$title =  $_POST['title'];
	$content =  $_POST['content'];
	$event_date =  $_POST['event_date'];
	$date = date("Y.m.d");

	$sql = "select * from event where event_id='$id'";
	$result = mysql_query($sql, $connect);
	$rows = mysql_num_rows($result);

	if($rows > 0){
		$sql = "update event ";
		$sql .="set registrant='$registrant', title='$title', content='$content', event_date='$event_date', date='$date' ";
		$sql .="where event_id='$id'";
	}
	else{
		$sql = "insert into event ";
		$sql = $sql."(registrant, title, content, event_date, date, readnum)";
		$sql = $sql."values ('$registrant', '$title', '$content', '$event_date', '$date', 0)";
	}

	mysql_query($sql, $connect);
	mysql_close($connect);

	echo("<script>
			alert('등록되었습니다.');
			window.location.href='exhibition_list.php';
		  </script>");

?>
