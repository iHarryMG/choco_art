<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/freeboard_content_design.css" type=text/css rel=stylesheet>
  <script language="javascript">
	function check_inputs(){
		var form = document.mem_form;

		if(form.comment.value == ""){
			alert("코멘트를 입력하세요!");
			form.comment.focus();
			return;
		}
		form.submit();
	}
  </script>
 </HEAD>
 <BODY>
 <form name="mem_form" action='save_freeboard_comment.php?id=<?echo $_REQUEST['id'];?>' method='POST'>
	<center>
	<div>
	<TABLE>
		<?
			include("../dbconn/common.php");
			$add_read_num_sql = "update freeboard set readnum = readnum+1 where freeboard_id=$id";
            mysql_query($add_read_num_sql, $connect);  

			$sql = "SELECT registrant, title, content, date FROM freeboard where freeboard_id=$id";
			$result = mysql_query($sql, $connect);
			$row=mysql_fetch_array($result);
			$content = nl2br($row['content']);

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
						<td width=60 align=center id='title'><strong>내용</strong></td><td id='content' colspan=3><textarea cols=70 rows=5 readonly='readonly'>$content</textarea></td>
					</tr>
					<tr>
						<td width=60 align=center id='title'><strong>코멘트</strong></td><td colspan=3><input name='comment' type='text' size=75 maxlength=254/>&nbsp<input type='button' value='&nbsp&nbsp저장&nbsp&nbsp' onclick='javascript:check_inputs()'/></td>
					</tr>
					<tr>
						<td align=center id='comment_title'>번호</td>
						<td align=center id='comment_title'>작성자</td>
						<td align=center id='comment_title'>코멘트</td>
						<td align=center id='comment_title'>날짜</td>
					</tr>					
					
					");
			
			$imagesql = "SELECT freeboard_id, registrant, content, date FROM freeboard_comment where freeboard_id=$id order by num desc";
			$comment_result = mysql_query($imagesql, $connect);
			$count = mysql_num_rows($comment_result);

			while($comment_row=mysql_fetch_array($comment_result)){
			echo("	
					<tr>
						<td align=center><strong>$count</strong></td>
						<td align=center>$comment_row[registrant]</td>
						<td width=300 align=center>$comment_row[content]</td>
						<td align=center>$comment_row[date]</td>
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
