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

$sql = "select code from delivery_comp";
$result = mysql_query($sql, $connect);
$rows = mysql_num_rows($result);



$code = "SC ";
/*
if($rows > 0){
	$last_code = mysql_result($result, $rows-1, 0);
	$num = explode(" ", $last_code);
	$number = (int)$num;
	$code .= (++$number);
}
else{
	$code .= "100";
}*/

	$url =  $_REQUEST['comp_url'];
	$name =  $_REQUEST['comp_name'];
	$number = $_REQUEST['id'];

	$sql = "select * from delivery_comp where num='$number'";
	$result = mysql_query($sql, $connect);
	$rows = mysql_num_rows($result);

	if($rows > 0){
		$sql = "update delivery_comp ";
		$sql .="set url='$url', name='$name' ";
		$sql .="where num='$number'";
	}
	else{
		$sql = "insert into delivery_comp";
		$sql = $sql."(code, url, name)";
		$sql = $sql."values ('$code', '$url', '$name')";
	}
	mysql_query($sql, $connect);
	mysql_close($connect);

echo("<script>
			window.location.href='delivery_comp.php';
		</script>");

?>
