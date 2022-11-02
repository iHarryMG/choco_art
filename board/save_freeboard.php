<?
session_start();
include("../dbconn/common.php");

$date = date("Y.m.d");

$registrant = $_SESSION['user_id'];

$sql = "insert into freeboard";
$sql = $sql."(registrant, title, content, date)";
$sql = $sql."values ('$registrant', '$title', '$content', '$date')";
mysql_query($sql, $connect);

mysql_close($connect);

echo("<script>
			window.location.href='freeboard_list.php';
		</script>");

?>