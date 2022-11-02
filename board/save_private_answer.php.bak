<?

include("../dbconn/common.php");

$date = date("Y.m.d");

$sql = "insert into qa_answer";
$sql = $sql."(qa_id, registrant, content, date)";
$sql = $sql."values ('$id', '$registrant', '$answer', '$date')";
mysql_query($sql, $connect);

mysql_close($connect);

echo("<script>
			window.location.href='qa_content.php?id=$id';
		</script>");

?>