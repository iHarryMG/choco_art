<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/qa_content_design.css" type=text/css rel=stylesheet>
 </HEAD>
 <BODY>
 <form action='save_qa_answer.php?id=<?echo $_REQUEST['id'];?>' method='POST'>
	<center>
	<div>
	<TABLE>
		<?
			include("../dbconn/common.php");
			$add_read_num_sql = "update qa set readnum = readnum+1 where qa_id=$id";
            mysql_query($add_read_num_sql, $connect);  

			$sql = "SELECT registrant, title, question, date FROM qa where qa_id=$id";
			$result = mysql_query($sql, $connect);
			$row=mysql_fetch_array($result);
			$question = nl2br($row['question']);

			echo("	<tr>
						<td width=60 align=center id='title'><strong>제목</strong></td><td colspan=3 align=left>$row[title]</td>
					</tr>
					<tr>
						<td width=60 align=center id='title'><strong>작성자</strong></td><td colspan=3 align=left>$row[registrant]</td>
					</tr>
					<tr>
						<td width=60 align=center id='title'><strong>등록일</strong></td><td colspan=3 align=left>$row[date]</td>
					</tr>
					<tr>
						<td width=60 align=center id='title'><strong>질문</strong></td><td id='question' colspan=3><textarea cols=70 rows=5 readonly='readonly'>$question</textarea></td>
					</tr>
					<tr>
						<td align=center id='title' colspan=4><strong>답변</strong></td>
					</tr>
					<tr>
						<td align=center id='comment_title'>번호</td>
						<td align=center id='comment_title'>작성자</td>
						<td align=center id='comment_title'>코멘트</td>
						<td align=center id='comment_title'>날짜</td>
					</tr>						
					
					");
			
			$answersql = "SELECT qa_id, registrant, answer, date FROM qa_answer where qa_id=$id order by num desc";
			$answer_result = mysql_query($answersql, $connect);
			$count = mysql_num_rows($answer_result);

			while($answer_row=mysql_fetch_array($answer_result)){
			echo("	<tr>
						<td align=center><strong>$count</strong></td>
						<td align=center>$answer_row[registrant]</td>
						<td width=300 align=center>$answer_row[answer]</td>
						<td align=center>$answer_row[date]</td>
					</tr>
				");
				--$count;
			}
		?>
	</TABLE>
	</div>
	</center>
	<div id="close_btn">
		<input type="button" onclick="javascript:window.close()" value="닫기" style='cursor:hand'>
	</div>
 </BODY>
</HTML>
