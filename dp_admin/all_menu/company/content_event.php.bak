<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <script language=javascript>
		function cancel(){
				history.go(-1);			
		}
  </script>
 </HEAD>

 <BODY>
	<center>
	<h3>글 내용 보기</h3>
	<TABLE  border=1 cellspacing=0 width=600>
		<?
			include("../../../dbconn/common.php");

			$sql = "SELECT title, event_date, content FROM event where event_id=$id";
			$result = mysql_query($sql, $connect);
			$row=mysql_fetch_array($result);
			$content = nl2br($row[content]);//줄바꿈 문자를 <br>태그로 변환

			echo("	<tr>
						<td>행사제목</td><td>$row[title]</td>
					</tr>
					<tr>
						<td>행사날짜</td><td>$row[event_date]</td>
					</tr>
					<tr>
						<td colspan=2><h3>행사내용</h3>$content</td>
					</tr>");
			
			$imagesql = "SELECT image, comment FROM event_image where event_id=$id";
			$imageresult = mysql_query($imagesql, $connect);

			while($imagerow=mysql_fetch_array($imageresult)){
			echo("	<tr>
						<td><img src='../../../uploaded_images/events/$imagerow[image]'></td>
						<td>$imagerow[comment]</td>
					</tr>
				");
			}
		?>
	</TABLE>
	<input  type='button'  value='목록' onclick='cancel()'><p>
	</center>
 </BODY>
</HTML>
