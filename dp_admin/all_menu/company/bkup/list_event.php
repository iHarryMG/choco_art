<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>"JejuChocoArt 관리자 페이지"</TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
 </HEAD>
 <BODY>
 <center>
	<h3>게시판</h3> 
	<table  border=1 cellspacing=0 width=900> 
		<tr> 
			<td align=center>번호</td> 
			<td align=center>제목</td> 
			<td align=center>등록자</td> 
			<td align=center>행사날짜</td> 
			<td align=center>등록일</td>
			<td align=center colspan=3>편집</td>			
		</tr>
		<? 
		include("../../dbconn/common.php");

		$sql = "SELECT * FROM event ORDER BY event_id desc";
		$result = mysql_query($sql, $connect);
		$records = mysql_num_rows($result);  
		$count = $records;

		for($i=0 ; $i < $records; $i++){

			$row=mysql_fetch_array($result);
			echo "<tr> 
					<td align=center>$count</td> 
					<td align=center><a href='content_event.php?id=$row[event_id]'>$row[title]</a></td> 
					<td align=center>$row[registrant]</td> 
					<td align=center>$row[event_date]</td> 
					<td align=center>$row[date]</td> 
					<td><a href='insert_image.php?id=$row[event_id]'>사진추가</a></td>
					<td><a href='edit_event.php?id=$row[event_id]'>수정</a></td>
					<td><a href='delete_event.php?id=$row[event_id]'>삭제</a></td>
				  </tr> ";
			$count--;
		}
		?>
		<tr>
			<td colspan=5></td>
			<td colspan=3 align=center><a href="insert_event.php">이벤트 등록</a></td>
		</tr>
	</table>
 </center>
 </BODY>
</HTML>
