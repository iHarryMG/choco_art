<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/notice_content_design.css" type=text/css rel=stylesheet>
 </HEAD>
 <BODY>
	<center>
	<div>
	<TABLE>
		<?
			include("../dbconn/common.php");
			$add_read_num_sql = "update notice set readnum = readnum+1 where notice_id=$id";
            mysql_query($add_read_num_sql, $connect);  

			$sql = "SELECT registrant, title, content, date FROM notice where notice_id=$id";
			$result = mysql_query($sql, $connect);
			$row=mysql_fetch_array($result);
			$content = nl2br($row[content]);//줄바꿈 문자를 <br>태그로 변환

			echo("	<tr>
						<td width=60 align=center id='title'>작성자</td><td align=left>$row[registrant]</td>
					</tr>
					<tr>
						<td width=60 align=center id='title'>제목</td><td align=left>$row[title]</td>
					</tr>
					<tr>
						<td width=60 align=center id='title'>날짜</td><td align=left>$row[date]</td>
					</tr>
					<tr>
						<td width=60 align=center id='title'>내용</td><td><textarea cols=70 rows=5 readonly='readonly'>$content</textarea></td>
					</tr>");
		?>
	</TABLE>
	</div>
	</center>
	<div id="close_btn">
		<input type="button" onclick="javascript:window.close()" value="닫기" style='cursor:hand'>
	</div>
 </BODY>
</HTML>
