<?
session_start();
include("../dbconn/common.php");

$date = date("Y.m.d");

$registrant_id = $_SESSION['user_id'];
$registrant = $_SESSION['user_name'];

$sql = "insert into private";
$sql = $sql."(registrant_id, registrant, title, question, date)";
$sql = $sql."values ('$registrant_id', '$registrant', '$title', '$question', '$date')";
mysql_query($sql, $connect);

mysql_close($connect);

echo("<script>
			window.location.href='private_list.php';
		</script>");

?>