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
	$region =  $_POST['region'];
	$title =  $_POST['title'];
	$url =  $_POST['url'];


	$sql = "select * from businesspartner where num='$number'";
	$result = mysql_query($sql, $connect);
	$rows = mysql_num_rows($result);

	if($rows > 0){
		$sql = "update businesspartner ";
		$sql .="set region='$region', title='$title', url='$url' ";
		$sql .="where num='$number'";
	}
	else{
		$sql = "insert into businesspartner ";
		$sql = $sql."(region, title, url)";
		$sql = $sql."values ('$region', '$title', '$url')";
	}
	mysql_query($sql, $connect);
	mysql_close($connect);

	echo("<script>
			alert('등록되었습니다.');
			window.location.href='businesspartner_list.php';
		  </script>");

?>
