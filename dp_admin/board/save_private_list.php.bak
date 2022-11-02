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
	$answer =  $_POST['answer'];
	$date = date("Y.m.d");

	$sql = "select * from private_answer where private_id='$id'";
	$result = mysql_query($sql, $connect);
	$rows = mysql_num_rows($result);

	if($rows > 0){
		$sql = "update private_answer ";
		$sql .="set registrant='$registrant', answer='$answer', date='$date' ";
		$sql .="where private_id='$id'";
	}
	else{
		$sql = "insert into private_answer ";
		$sql = $sql."(private_id, registrant, answer, date)";
		$sql = $sql."values ('$id', '$registrant', '$answer', '$date')";
	}
	mysql_query($sql, $connect);
	mysql_close($connect);

	echo("<script>
			alert('등록되었습니다.');
			window.location.href='private_list.php';
		  </script>"); 

?>
