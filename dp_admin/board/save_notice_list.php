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

	$id = $id;
	$registrant =  $_POST['registrant'];
	$title =  $_POST['title'];
	$content =  $_POST['content'];
	$date = date("Y.m.d");

	$sql = "select * from notice where notice_id='$id'";
	$result = mysql_query($sql, $connect);
	$rows = mysql_num_rows($result);

	if($rows > 0){
		$sql = "update notice ";
		$sql .="set registrant='$registrant', title='$title', content='$content', date='$date' ";
		$sql .="where notice_id='$id'";
	}
	else{
		$sql = "insert into notice ";
		$sql = $sql."(registrant, title, content, date)";
		$sql = $sql."values ('$registrant', '$title', '$content', '$date')";
	}
	mysql_query($sql, $connect);
	mysql_close($connect);

	echo("<script>
			alert('등록되었습니다.');
			window.location.href='notice_list.php';
		  </script>");

?>
