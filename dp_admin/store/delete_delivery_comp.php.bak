<?
		include("../../dbconn/common.php");

		$num = $_REQUEST['num'];
		$sql = "delete from delivery_comp ";
		$sql .= "where num='$num'";
		mysql_query($sql, $connect);
		mysql_close($connect);
		echo("<script>
						window.location.href='delivery_comp.php';
					</script>");
?>