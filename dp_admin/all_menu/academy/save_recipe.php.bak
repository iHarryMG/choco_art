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
	$title =  $_POST['title'];
	$content =  $_POST['content'];


	$sql = "select * from recipe where id='$id'";
	$result = mysql_query($sql, $connect);
	$rows = mysql_num_rows($result);

	if($rows > 0){
		$sql = "update recipe ";
		$sql .="set title='$title', content='$content' ";
		$sql .="where id='$id'";
	}
	else{
		$sql = "insert into recipe ";
		$sql = $sql."(title, content)";
		$sql = $sql."values ('$title', '$content')";
	}
	mysql_query($sql, $connect);
	mysql_close($connect);

	echo("<script>
			alert('등록되었습니다.');
			window.location.href='recipe_content.php';
		  </script>");

?>
