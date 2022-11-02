<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/notice_list_design.css" type=text/css rel=stylesheet>
  <style type="text/css">
	body{
		margin: 0px;
		background-image: url("../../images/admin_images/content_background.jpg");
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
	div.content{
		margin-top: 20px;
	}
	div.content a{
		text-decoration: none;
		color: #3a260d;
	}
	div.content a:hover{
		text-decoration: underline;
		color: #3a260d;
	}
	div.content table{
		width: 750px;
		border: 1px solid gray;
		border-collapse: collapse;
		margin-bottom: 20px;
	}
	div.content table input, textarea{
		border: 1px solid gray;
	}
	div.content table td{
		border: 1px solid gray;
		color: #3a260d;
		font-size: 12px;
	}
	div.content table td#table_titles, div.content table td#table_num{
		background-color: #9bbb58;
		color: #3a260d;
		font-size: 14px;
	}
	input#btn_register{
		width: 50px;
		margin-right: 20px;
	}
  </style>
  <script language="javascript">
	function check_inputs(){
		var form = document.admin_form;

		if(!form.registrant.value){
			alert("작성자를 입력하세요!");
			form.registrant.focus();
			return;
		}
		else if(!form.content.value){
			alert("내용을 입력하세요!");
			form.content.focus();
			return;
		}
		else if(!form.title.value){
			alert("제목을 입력하세요!");
			form.title.focus();
			return;
		}
		form.submit();
	}
  </script>
 </HEAD>

 <BODY>
	<div class="content">
  		<table cellpadding=5> 
			<tr id="special_part"> 
				<td align=center id="table_titles">번호</td> 
				<td align=center id="table_titles" width="300px">제목</td> 
				<td align=center id="table_titles">작성자</td> 
				<td align=center id="table_titles">행사날짜</td> 
				<td align=center id="table_titles">등록일</td>			
				<td align=center id="table_titles">조회수</td>
				<td align=center colspan=3 id="table_titles">관리</td>
			</tr>
<? 
			include("../../../dbconn/common.php");

			$pageMaxRowNumber = 10;
			$presentPageNumber = $page;
			$totalPageNumber = $totalPage;
			$startIndex = $next;
			$nextRecord_skipPage = 0; // page1=0; page2=10; page3=20 ...

			if((1 < $presentPageNumber) && ($presentPageNumber < $totalPageNumber)){ // MiddlePages
				
				$nextRecord = $next;

				$anotherPageSql = "SELECT event_id, title, registrant, event_date, date, readnum  
								FROM event ORDER BY event_id desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < ($next + $pageMaxRowNumber); $i++){ // records
					$event_id = mysql_result($anotherPageResult, $i, 0);
					$title = mysql_result($anotherPageResult, $i, 1);
					$registrant = mysql_result($anotherPageResult, $i, 2);
					$event_date = mysql_result($anotherPageResult, $i, 3);
					$date = mysql_result($anotherPageResult, $i, 4);
					$readnum = mysql_result($anotherPageResult, $i, 5);

					echo("<tr>");
					if(strlen($title) > 35){
						$short_title = substr($title,0,35);
						echo ("	<td align=center>$recordNumber</td> 
								<td id='title'><a href='$PHP_SELF?id=$event_id'>$short_title...</a></td> 
								<td align=center>$registrant</td> 
								<td align=center>$event_date</td> 
								<td align=center>$date</td>
								<td align=center>$readnum</td> ");
						echo("<td id='btn'><a href='insert_image.php?id=$event_id'>사진</a></td>");
						echo("<td id='btn'><a href='$PHP_SELF?id=$event_id'>수정</a></td>");
						echo("<td id='btn'><a href='delete_exhibition_list.php?id=$event_id'>삭제</a></td>");
					}
					else{
						echo ("	<td align=center>$recordNumber</td> 
								<td id='title'><a href='$PHP_SELF?id=$event_id'>$title</a></td> 
								<td align=center>$registrant</td>
								<td align=center>$event_date</td>								
								<td align=center>$date</td> 
								<td align=center>$readnum</td> ");
						echo("<td id='btn'><a href='insert_image.php?id=$event_id'>사진</a></td>");
						echo("<td id='btn'><a href='$PHP_SELF?id=$event_id'>수정</a></td>");
						echo("<td id='btn'><a href='delete_exhibition_list.php?id=$event_id'>삭제</a></td>");
					}

					echo("</tr>");
					$recordNumber--;
					$nextRecord += 1;
				}
				echo("<tr>
						<td colspan=9 align=center id='page_number'>");

					$previousPage = $presentPageNumber - 1;
					$nextRecord_previousPage = $next - $pageMaxRowNumber;
					echo("&nbsp<a href='$PHP_SELF?page=$previousPage&totalPage=$totalPageNumber&next=$nextRecord_previousPage'>[이전]</a>");

					for($i=1; $i <= $totalPageNumber; $i++){ // page number

						if($i == $presentPageNumber){
							echo("&nbsp<strong>$i</strong>&nbsp");
						}
						else{
							echo("&nbsp<a href='$PHP_SELF?page=$i&totalPage=$totalPageNumber&next=$nextRecord_skipPage'>[$i]</a>&nbsp");
						}
						$nextRecord_skipPage = $nextRecord_skipPage + $pageMaxRowNumber;  // page1=0; page2=10; page3=20 ...
					}
					$nextPage = $presentPageNumber + 1;
					echo("&nbsp<a href='$PHP_SELF?page=$nextPage&totalPage=$totalPageNumber&next=$nextRecord' >[다음]</a>");

				echo("	</td>
					  </tr>");
			}
			else if(($presentPageNumber == $totalPageNumber) && ($presentPageNumber != 0)){ // LastPage

				$anotherPageSql = "SELECT event_id, title, registrant, date, readnum, event_date
									FROM event ORDER BY event_id desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < $anotherPageRecords; $i++){ // records
					$event_id = mysql_result($anotherPageResult, $i, 0);
					$title = mysql_result($anotherPageResult, $i, 1);
					$registrant = mysql_result($anotherPageResult, $i, 2);
					$date = mysql_result($anotherPageResult, $i, 3);
					$readnum = mysql_result($anotherPageResult, $i, 4);
					$event_date = mysql_result($anotherPageResult, $i, 5);

					echo("<tr>");
						if(strlen($title) > 35){
							$short_title = substr($title,0,35);
							echo ("	<td align=center>$recordNumber</td> 
									<td id='title'><a href='$PHP_SELF?id=$event_id'>$short_title...</a></td> 
									<td align=center>$registrant</td> 
									<td align=center>$event_date</td>
									<td align=center>$date</td>
									<td align=center>$readnum</td> ");
						echo("<td id='btn'><a href='insert_image.php?id=$event_id'>사진</a></td>");
						echo("<td id='btn'><a href='$PHP_SELF?id=$event_id'>수정</a></td>");
						echo("<td id='btn'><a href='delete_exhibition_list.php?id=$event_id'>삭제</a></td>");
						}
						else{
							echo ("	<td align=center>$recordNumber</td> 
									<td id='title'><a href='$PHP_SELF?id=$event_id'>$title</a></td> 
									<td align=center>$registrant</td>
									<td align=center>$event_date</td>
									<td align=center>$date</td>
									<td align=center>$readnum</td> ");
						echo("<td id='btn'><a href='insert_image.php?id=$event_id'>사진</a></td>");
						echo("<td id='btn'><a href='$PHP_SELF?id=$event_id'>수정</a></td>");
						echo("<td id='btn'><a href='delete_exhibition_list.php?id=$event_id'>삭제</a></td>");
						}
					echo("</tr>");
					$recordNumber--;
				}
				echo("<tr>
						<td colspan=9 align=center id='page_number'>");

					$previousPage = $presentPageNumber - 1;
					$nextRecord_previousPage = $next - $pageMaxRowNumber;
					echo("<a href='$PHP_SELF?page=$previousPage&totalPage=$totalPageNumber&next=$nextRecord_previousPage'>[이전]</a>&nbsp");

					for($i=1; $i <= $totalPageNumber; $i++){ // page number

						if($i == $presentPageNumber){
							echo("&nbsp<strong>$i</strong>&nbsp");
						}
						else{
							echo("&nbsp<a href='$PHP_SELF?page=$i&totalPage=$totalPageNumber&next=$nextRecord_skipPage'>[$i]</a>&nbsp");
						}
						$nextRecord_skipPage = $nextRecord_skipPage + $pageMaxRowNumber;  // page1=0; page2=10; page3=20 ...
					}

				echo("	</td>
					  </tr>");
			}
			else{ // FirstPage
				$nextRecord = 0;
				$sql = "SELECT * FROM event ORDER BY event_id desc";
				$result = mysql_query($sql, $connect);
				$records = mysql_num_rows($result); 
				
				if($records < 1){
					echo("<tr><td colspan=9 align=center id='norecords'>등록된 내용 없습니다.</td></tr>");
				}
				else{
					$presentPageNumber = 1;
					$totalPageNumber = ceil($records / $pageMaxRowNumber);

					$firstPageSql = "SELECT * FROM event ORDER BY event_id desc";
					$firstPageResult = mysql_query($firstPageSql, $connect);
					$firstPageRecords = mysql_num_rows($firstPageResult);  
					
					$recordNumber = $records; // 행 번호
					
					for($i=0 ; $i < $firstPageRecords; $i++){ // records

						$row=mysql_fetch_array($firstPageResult);
?>
						<tr> 
							<td align=center><?echo $recordNumber?></td> 
<?
					if(strlen($row[title]) > 35){
						$short_title = substr($row['title'],0,35);
?>
						<td id='title'><a href='<?echo $PHP_SELF?>?id=<?echo $row['event_id']?>'><?echo $short_title?>...</a></td> 
<?
					}
					else{
?>
						<td id='title'><a href='<?echo $PHP_SELF?>?id=<?echo $row['event_id']?>'><?echo $row['title']?></a></td>
<?
					}
?>
							<td align=center><?echo $row['registrant'];?></td> 
							<td align=center><?echo $row['event_date']?></td>
							<td align=center><?echo $row['date'];?></td> 
							<td align=center><?echo $row['readnum'];?></td>
							
							<td id='btn'><a href='insert_image.php?id=<?echo $row['event_id']?>'>사진</a></td>
							<td id='btn'><a href='<?echo $PHP_SELF?>?id=<?echo $row['event_id']?>'>수정</a></td>
							<td id='btn'><a href='delete_exhibition_list.php?id=<?echo $row['event_id']?>'>삭제</a></td>
						</tr>
<?						
						$recordNumber--;
						$nextRecord += 1;
						if(9 < $nextRecord){
							break;
						}
					}

					echo("<tr>
							<td colspan=9 align=center id='page_number' >");
					
						for($i=1; $i <= $totalPageNumber; $i++){ // page number
							if($i == $presentPageNumber){
								echo("&nbsp<strong>$i</strong>&nbsp");
							}
							else{
								echo("&nbsp<a href='$PHP_SELF?page=$i&totalPage=$totalPageNumber&next=$nextRecord_skipPage'>[$i]</a>&nbsp");
							}
							$nextRecord_skipPage = $nextRecord_skipPage + $pageMaxRowNumber;  // page1=0; page2=10; page3=20 ...
						}

						if($totalPageNumber > 1){
							++$presentPageNumber;
							echo("&nbsp<a href='$PHP_SELF?page=$presentPageNumber&totalPage=$totalPageNumber&next=$nextRecord'>[다음]</a>");
						}
					echo("	</td>
						  </tr>");
				}
			}
?>
		</table>
<?
			$record = "";
			$par_id = $_REQUEST['id'];
			$sql = "SELECT * FROM event where event_id='$par_id'";
			$result = mysql_query($sql, $connect);
			$record = mysql_fetch_array($result);  	
			mysql_close($connect);
?>
			<form name="admin_form" action="save_exhibition_list.php?id=<?echo $par_id?>" method="POST">
				<div id="table_register">
					<table cellpadding=5>
						<tr>
							<td align=center id="table_titles">작성자</td>
							<td align=center><input name="registrant" type="text" size=35 maxlength=25 value="<?echo $record['registrant']?>"></td>
							<td align=center id="table_titles">행사날짜</td>
							<td align=center><input name="event_date" type="text" size=35 maxlength=25 value="<?echo $record['event_date']?>"></td>
						</tr>
						<tr>
							<td align=center id="table_titles">제목</td>
							<td align=center colspan=3><input name="title" type="text" size=99 maxlength=200 value="<?echo $record['title']?>"></td>
						</tr>
						<tr>
							<td align=center id="table_titles">내용</td>
							<td align=center colspan=3><textarea name="content" cols=75 rows=10><?echo $record['content']?></textarea></td>
						</tr>
						<tr>
							<td align=center colspan=4><input id="btn_register" type="button" value="등록" onclick="javascript:check_inputs()" style="cursor:hand"></td>
						</tr>
					</table>
				</div>
			</form>
	</div>
			</br>
 </BODY>
</HTML>
