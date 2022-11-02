<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <style type="text/css">
	body{
		margin: 0px;
		background-image: url("../../images/admin_images/content_background.jpg");
		background-repeat: repeat-x;
		background-attachment: fixed;
	}
	#header{
		margin-top: 41px;
		margin-left: 20px;
		margin-bottom: 70px;
		font-size: 18px;
		font-weight: bold;
		color: #3a260d;
		font-family: "HY견고딕";
	}
	table td#table_titles{
		background-color: lightgray;
	}
	div.content table{
		margin: 20px;
		width: 800px;
		border: 1px solid gray;
		border-collapse: collapse;
		margin-bottom: 20px;
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
	div.content a{
		text-decoration: none;
		color: #3a260d;
	}
	div.content a:hover{
		text-decoration: underline;
		color: #3a260d;
	}
  </style>

 </HEAD>
 <BODY>
	<div id="header">
		전체 회원 관리
	</div> 
	<form name="admin_form" action="<?echo $_PHPSELF?>" method="POST">

		<div class="content">
		<table cellpadding=5> 
			<tr> 
				<td align=center id="table_titles">번호</td> 
				<td align=center id="table_titles">이름(ID)</td> 
				<td align=center id="table_titles">회원등급</td> 
				<td align=center id="table_titles">연락처</td>
				<td align=center id="table_titles">가입일시</td>
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

				$anotherPageSql = "SELECT *	FROM member  ORDER BY num desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < ($next + $pageMaxRowNumber); $i++){ // records
					$num = mysql_result($anotherPageResult, $i, 0);					
					$name = mysql_result($anotherPageResult, $i, 1);
					$id = mysql_result($anotherPageResult, $i, 3);
					$class = mysql_result($anotherPageResult, $i, 5);
					$cell = mysql_result($anotherPageResult, $i, 8);
					// end daraa 구매수 oruulj ogoh
					$date = mysql_result($anotherPageResult, $i, 11);

					echo("<tr>");
						echo ("	<td align=center>$recordNumber</td> 
								<td align=center><a href='view_member_info.php?num=$num' target='content'>$name($id)</a></td> 
								<td align=center>$class</td>
								<td align=center>$cell</td>								
								<td align=center>$date</td>

								<td><a href='edit_member_info.php?num=$num'>수정</a></td>
								<td><a href='delete_member.php?num=$num'>삭제</a></td>");
					echo("</tr>");
					$recordNumber--;
					$nextRecord += 1;
				}
				echo("<tr>
						<td colspan=8 align=center>");

					$previousPage = $presentPageNumber - 1;
					$nextRecord_previousPage = $next - $pageMaxRowNumber;
					echo("&nbsp<a href='$PHP_SELF?page=$previousPage&totalPage=$totalPageNumber&next=$nextRecord_previousPage'>[이전]</a>");

					for($i=1; $i <= $totalPageNumber; $i++){ // page number

						if($i == $presentPageNumber){
							echo("&nbsp<strong>$i</strong>&nbsp");
						}
						else{
							echo("&nbsp<a href='$PHP_SELF?page=$i&totalPage=$totalPageNumber&next=$nextRecord_skipPage'>$i</a>&nbsp");
						}
						$nextRecord_skipPage = $nextRecord_skipPage + $pageMaxRowNumber;  // page1=0; page2=10; page3=20 ...
					}
					$nextPage = $presentPageNumber + 1;
					echo("&nbsp<a href='$PHP_SELF?page=$nextPage&totalPage=$totalPageNumber&next=$nextRecord'>[다음]</a>");

				echo("	</td>
					  </tr>");
			}
			else if(($presentPageNumber == $totalPageNumber) && ($presentPageNumber != 0)){ // LastPage

				$anotherPageSql = "SELECT *	FROM member ORDER BY num desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < $anotherPageRecords; $i++){ // records
					$num = mysql_result($anotherPageResult, $i, 0);					
					$name = mysql_result($anotherPageResult, $i, 1);
					$id = mysql_result($anotherPageResult, $i, 3);
					$class = mysql_result($anotherPageResult, $i, 5);
					$cell = mysql_result($anotherPageResult, $i, 8);
					// end daraa 구매수 oruulj ogoh
					$date = mysql_result($anotherPageResult, $i, 11);

					echo("<tr>");
						echo ("	<td align=center>$recordNumber</td> 
								<td align=center><a href='view_member_info.php?num=$num' target='content'>$name($id)</a></td> 
								<td align=center>$class</td>
								<td align=center>$cell</td>								
								<td align=center>$date</td>

								<td><a href='edit_member_info.php?num=$num'>수정</a></td>
								<td><a href='delete_member.php?num=$num'>삭제</a></td>");
					echo("</tr>");
					$recordNumber--;
				}
				echo("<tr>
						<td colspan=8 align=center>");

					$previousPage = $presentPageNumber - 1;
					$nextRecord_previousPage = $next - $pageMaxRowNumber;
					echo("<a href='$PHP_SELF?page=$previousPage&totalPage=$totalPageNumber&next=$nextRecord_previousPage'>[이전]</a>&nbsp");

					for($i=1; $i <= $totalPageNumber; $i++){ // page number

						if($i == $presentPageNumber){
							echo("&nbsp<strong>$i</strong>&nbsp");
						}
						else{
							echo("&nbsp<a href='$PHP_SELF?page=$i&totalPage=$totalPageNumber&next=$nextRecord_skipPage'>$i</a>&nbsp");
						}
						$nextRecord_skipPage = $nextRecord_skipPage + $pageMaxRowNumber;  // page1=0; page2=10; page3=20 ...
					}

				echo("	</td>
					  </tr>");
			}
			else{ // FirstPage

				$nextRecord = 0;
				$sql = "SELECT * FROM member ORDER BY num desc";
				$result = mysql_query($sql, $connect);
				$records = mysql_num_rows($result); 
				
				if($records < 1){
					echo("<tr>
							<td colspan=7 align='center'>등록된 내용 없습니다.</td>
						  </tr>");
				}else{
					$presentPageNumber = 1;
					$totalPageNumber = ceil($records / $pageMaxRowNumber);

					$firstPageSql = "SELECT * FROM member ORDER BY num desc";
					$firstPageResult = mysql_query($firstPageSql, $connect);
					$firstPageRecords = mysql_num_rows($firstPageResult);  
					
					$recordNumber = $records; // 행 번호
					
					for($i=0 ; $i < $firstPageRecords; $i++){ // records

						$row=mysql_fetch_array($firstPageResult);
						echo ("<tr> 
								<td align=center>$recordNumber</td> 
								<td align=center><a href='view_member_info.php?num=$row[num]' target='content'>$row[name]($row[id])</a></td> 
								<td align=center>$row[class]</td> 
								<td align=center>$row[cell]</td> 								
								<td align=center>$row[date]</td>

								<td><a href='edit_member_info.php?num=$row[num]'>수정</a></td>
								<td><a href='delete_member.php?num=$row[num]'>삭제</a></td>
							  </tr> ");
						$recordNumber--;
						$nextRecord += 1;
						if(9 < $nextRecord){
							break;
						}
					}
					echo("<tr>
							<td colspan=8 align=center>");
					
						for($i=1; $i <= $totalPageNumber; $i++){ // page number
							if($i == $presentPageNumber){
								echo("&nbsp<strong>$i</strong>&nbsp");
							}
							else{
								echo("&nbsp<a href='$PHP_SELF?page=$i&totalPage=$totalPageNumber&next=$nextRecord_skipPage'>$i</a>&nbsp");
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
		</div>
		</table>
	</form>

 </BODY>
</HTML>