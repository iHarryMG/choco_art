<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <style type="text/css">
	body{
		margin: 0px;
	}
	div.content{
		margin-top: 45px;
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
		width: 700px;
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
	div.content table td#table_titles{
		background-color: #9bbb58;
		color: #3a260d;
		font-size: 14px;
	}
	input#btn_register{
		width: 50px;
		margin-left: 350px;
		border: 1px solid gray;
	}
  </style>
  <script language="javascript">
	function check_inputs(){
		var form = document.admin_form;
		
		if((!form.q_registrant.value) || (!form.q_title.value) || (!form.question.value)){
			alert("질문을 선택하지 않았습니다.");
			return;
		}
		else if(!form.registrant.value){
			alert("작성자를 입력하세요!");
			form.registrant.focus();
			return;
		}
		else if(!form.answer.value){
			alert("내용을 입력하세요!");
			form.answer.focus();
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
				<td align=center id="table_titles">제목</td> 
				<td align=center id="table_titles">작성자(ID)</td> 
				<td align=center id="table_titles">등록일</td>
				<td align=center id="table_titles">조회수</td>
				<td align=center colspan=2 id="table_titles">관리</td>
			</tr>
<? 
			include("../../dbconn/common.php");

			$pageMaxRowNumber = 10;
			$presentPageNumber = $page;
			$totalPageNumber = $totalPage;
			$startIndex = $next;
			$nextRecord_skipPage = 0; // page1=0; page2=10; page3=20 ...

			if((1 < $presentPageNumber) && ($presentPageNumber < $totalPageNumber)){ // MiddlePages
				
				$nextRecord = $next;

				$anotherPageSql = "SELECT private_id, title, registrant, date, readnum, registrant_id
									FROM private ORDER BY private_id desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < ($next + $pageMaxRowNumber); $i++){ // records
					$private_id = mysql_result($anotherPageResult, $i, 0);
					$title = mysql_result($anotherPageResult, $i, 1);
					$registrant = mysql_result($anotherPageResult, $i, 2);
					$date = mysql_result($anotherPageResult, $i, 3);
					$readnum = mysql_result($anotherPageResult, $i, 4);
					$registrant_id = mysql_result($anotherPageResult, $i, 5);

					$answer_sql = "SELECT * FROM private_answer where private_id='".$private_id."'";
					$answer_result = mysql_query($answer_sql, $connect);
					$answer_records = mysql_num_rows($answer_result);  
					$answer = "";
					if($answer_records > 0){
						$answer = "[<strong>답변완료</strong>]";
					}

					echo("<tr>");
					if(strlen($title) > 35){
						$short_title = substr($title,0,35);
						echo ("	<td align=center>$recordNumber</td> 
								<td id='title'><a href='$PHP_SELF?id=$private_id'>$short_title... $answer</a></td> 
								<td align=center>$registrant($registrant_id)</td> 
								<td align=center>$date</td>
								<td align=center>$readnum</td> ");
						echo("<td id='btn'><a href='$PHP_SELF?id=$private_id'>수정</a></td>");
						echo("<td id='btn'><a href='delete_private_list.php?id=$private_id'>삭제</a></td>");
					}
					else{
						echo ("	<td align=center>$recordNumber</td> 
								<td id='title'><a href='$PHP_SELF?id=$private_id'>$title $answer</a></td> 
								<td align=center>$registrant($registrant_id)</td>  
								<td align=center>$date</td> 
								<td align=center>$readnum</td> ");
						echo("<td id='btn'><a href='$PHP_SELF?id=$private_id'>수정</a></td>");
						echo("<td id='btn'><a href='delete_private_list.php?id=$private_id'>삭제</a></td>");
					}

					echo("</tr>");
					$recordNumber--;
					$nextRecord += 1;
				}
				echo("<tr>
						<td colspan=8 align=center id='page_number'>");

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

				$anotherPageSql = "SELECT private_id, title, registrant, date, readnum, registrant_id
									FROM private ORDER BY private_id desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < $anotherPageRecords; $i++){ // records
					$private_id = mysql_result($anotherPageResult, $i, 0);
					$title = mysql_result($anotherPageResult, $i, 1);
					$registrant = mysql_result($anotherPageResult, $i, 2);
					$date = mysql_result($anotherPageResult, $i, 3);
					$readnum = mysql_result($anotherPageResult, $i, 4);
					$registrant_id = mysql_result($anotherPageResult, $i, 5);

					$answer_sql = "SELECT * FROM private_answer where private_id='".$private_id."'";
					$answer_result = mysql_query($answer_sql, $connect);
					$answer_records = mysql_num_rows($answer_result);  
					$answer = "";
					if($answer_records > 0){
						$answer = "[<strong>답변완료</strong>]";
					}

					echo("<tr>");
						if(strlen($title) > 35){
							$short_title = substr($title,0,35);
							echo ("	<td align=center>$recordNumber</td> 
									<td id='title'><a href='$PHP_SELF?id=$private_id'>$short_title... $answer</a></td> 
									<td align=center>$registrant($registrant_id)</td> 
									<td align=center>$date</td>
									<td align=center>$readnum</td> ");
						echo("<td id='btn'><a href='$PHP_SELF?id=$private_id'>수정</a></td>");
						echo("<td id='btn'><a href='delete_private_list.php?id=$private_id'>삭제</a></td>");
						}
						else{
							echo ("	<td align=center>$recordNumber</td> 
									<td id='title'><a href='$PHP_SELF?id=$private_id'>$title $answer</a></td> 
									<td align=center>$registrant($registrant_id)</td>  
									<td align=center>$date</td>
									<td align=center>$readnum</td> ");
						echo("<td id='btn'><a href='$PHP_SELF?id=$private_id'>수정</a></td>");
						echo("<td id='btn'><a href='delete_private_list.php?id=$private_id'>삭제</a></td>");
						}
					echo("</tr>");
					$recordNumber--;
				}
				echo("<tr>
						<td colspan=8 align=center id='page_number'>");

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
				$sql = "SELECT * FROM private ORDER BY private_id desc";
				$result = mysql_query($sql, $connect);
				$records = mysql_num_rows($result); 
				
				if($records < 1){
					echo("<tr><td colspan=6 align=center id='norecords'>등록된 내용 없습니다.</td></tr>");
				}
				else{
					$presentPageNumber = 1;
					$totalPageNumber = ceil($records / $pageMaxRowNumber);

					$firstPageSql = "SELECT * FROM private ORDER BY private_id desc";
					$firstPageResult = mysql_query($firstPageSql, $connect);
					$firstPageRecords = mysql_num_rows($firstPageResult);  
					
					$recordNumber = $records; // 행 번호
					
					for($i=0 ; $i < $firstPageRecords; $i++){ // records

						$row=mysql_fetch_array($firstPageResult);
?>
						<tr> 
							<td align=center><?echo $recordNumber?></td> 
<?
					$answer_sql = "SELECT * FROM private_answer where private_id='".$row['private_id']."'";
					$answer_result = mysql_query($answer_sql, $connect);
					$answer_records = mysql_num_rows($answer_result);  
					$answer = "";
					if($answer_records > 0){
						$answer = "[<strong>답변완료</strong>]";
					}

					if(strlen($row[title]) > 35){
						$short_title = substr($row['title'],0,35);
?>
						<td id='title'><a href='<?echo $PHP_SELF?>?id=<?echo $row['private_id']?>'><?echo $short_title?>...<?echo " ".$answer?></a></td> 
<?
					}
					else{
?>
						<td id='title'><a href='<?echo $PHP_SELF?>?id=<?echo $row['private_id']?>'><?echo $row['title']?><?echo " ".$answer?></a></td>
<?
					}
?>
							<td align=center><?echo $row['registrant']?>(<?echo $row['registrant_id']?>)</td> 
							<td align=center><?echo $row['date']?></td> 
							<td align=center><?echo $row['readnum']?></td> 
							<td id='btn'><a href='<?echo $PHP_SELF?>?id=<?echo $row['private_id']?>'>수정</a></td>
							<td id='btn'><a href='delete_private_list.php?id=<?echo $row['private_id']?>'>삭제</a></td>
						</tr>
<?						
						$recordNumber--;
						$nextRecord += 1;
						if(9 < $nextRecord){
							break;
						}
					}
					echo("<tr>
							<td colspan=7 align=center id='page_number' >");
					
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
<!-------------------------------------- Question Table ------------------------------------------------->
<?
			$record = "";
			$par_id = $_REQUEST['id'];
			$sql = "SELECT * FROM private where private_id='$par_id'";
			$result = mysql_query($sql, $connect);
			$record = mysql_fetch_array($result);  	
?>
			<form name="admin_form" action="save_private_list.php?id=<?echo $par_id?>" method="POST">
				<div id="table_question">
					<table cellpadding=5>
						<tr>
							<td align=center id="table_titles" width="100px">작성자(ID)</td>
							<td align=center><input readonly="readonly" name="q_registrant" type="text" size=25 maxlength=25 value="<?echo $record['registrant']?>(<?echo $record['registrant_id']?>)"></td>
							<td align=center id="table_titles" width="100px">제목</td>
							<td align=center><input readonly="readonly" name="q_title" type="text" size=50 maxlength=200 value="<?echo $record['title']?>"></td>
						</tr>
						<tr>
							<td align=center id="table_titles">질문</td>
							<td align=center colspan=3><textarea readonly="readonly" name="question" cols=75 rows=10><?echo $record['question']?></textarea></td>
						</tr>
					</table>
				</div>
<!------------------------------------------ Question Answer---------------------------------------------->
<?
			$record = "";
			$sql = "SELECT * FROM private_answer where private_id='$par_id'";
			$result = mysql_query($sql, $connect);
			$record = mysql_fetch_array($result);  	
			mysql_close($connect);
?>
				<div id="table_register">
					<table cellpadding=5>
						<tr>
							<td align=center id="table_titles" width="100px">작성자</td>
							<td align=left><input name="registrant" type="text" size=25 maxlength=25 value="<?echo $record['registrant']?>"></td>
						</tr>
						<tr>
							<td align=center id="table_titles">답변</td>
							<td align=center><textarea name="answer" cols=75 rows=10><?echo $record['answer']?></textarea></td>
						</tr>
					</table>
				</div>
				<input id="btn_register" type="button" value="등록" onclick="javascript:check_inputs()" style="cursor:hand">
			</form>
	</div>
	</br>
 </BODY>
</HTML>
