<?
	session_start();

	if(!$_SESSION['user_id']){
		echo("<script>
				alert('로그인 하셔야 합니다.'); 
				history.go(-1);
			</script>");		
	}else{

		include("../dbconn/common.php");

		$registrant = $_SESSION['user_id'];
		$date = date("Y.m.d");
		
		$sql = "insert into freeboard_comment";
		$sql = $sql."(freeboard_id, registrant, content, date)";
		$sql = $sql."values ('$id', '$registrant', '$comment', '$date')";
		mysql_query($sql, $connect);

		mysql_close($connect);

		echo("<script>
			window.location.href='freeboard_content.php?id=$id';
		</script>");
	}
?>