<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/private_list_design.css" type=text/css rel=stylesheet>
  <script language="javascript">
	function openPopUpWin(recordID){
		window.open("private_content.php?id="+recordID,"","scrollbars=yes, resizable=no, width=717, height=400");
	}
  </script>
 </HEAD>

 <BODY>
 <center>
		<img src="../images/frames/table_title_bkground.png">
  		<table id='list'> 
			<tr id="special_part"> 
				<td align=center></td> 
				<td align=center width=330></td> 
				<td align=center></td> 
				<td align=center></td>			
				<td align=center width=40></td>
			</tr>
<? 
			include("../dbconn/common.php");

			$pageMaxRowNumber = 10;
			$presentPageNumber = $page;
			$totalPageNumber = $totalPage;
			$startIndex = $next;
			$nextRecord_skipPage = 0; // page1=0; page2=10; page3=20 ...

			if((1 < $presentPageNumber) && ($presentPageNumber < $totalPageNumber)){ // MiddlePages
				
				$nextRecord = $next;

				$anotherPageSql = "SELECT private_id, title, registrant, date, readnum  
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

					echo("<tr>");
					if(strlen($title) > 35){
						$short_title = substr($title,0,35);
						echo ("	<td align=center>$recordNumber</td> 
								<td id='title' align=left><a href='#' onclick='openPopUpWin($private_id)'>$short_title...</a></td> 
								<td align=center>$registrant</td> 
								<td align=center>$date</td> 
								<td align=center>$readnum</td> ");
					}
					else{
						echo ("	<td align=center>$recordNumber</td> 
								<td id='title' align=left><a href='#' onclick='openPopUpWin($private_id)'>$title</a></td> 
								<td align=center>$registrant</td> 
								<td align=center>$date</td> 
								<td align=center>$readnum</td> ");
					}

					echo("</tr>");
					$recordNumber--;
					$nextRecord += 1;
				}

			}
			else if(($presentPageNumber == $totalPageNumber) && ($presentPageNumber != 0)){ // LastPage

				$anotherPageSql = "SELECT private_id, title, registrant, date, readnum  
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
									<td id='title' align=left><a href='#' onclick='openPopUpWin($private_id)'>$short_title... $answer</a></td> 
									<td align=center>$registrant</td> 
									<td align=center>$date</td>
									<td align=center>$readnum</td> ");
						}
						else{
							echo ("	<td align=center>$recordNumber</td> 
									<td id='title' align=left><a href='#' onclick='openPopUpWin($private_id)'>$title $answer</a></td> 
									<td align=center>$registrant</td> 
									<td align=center>$date</td>
									<td align=center>$readnum</td> ");
						}
					echo("</tr>");
					$recordNumber--;
				}
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
						<td id='title' align=left><a href='#' onclick='openPopUpWin(<?echo $row['private_id'];?>)'><?echo $short_title?>...<?echo " ".$answer?></a></td> 
<?
					}
					else{
?>
						<td id='title' align=left><a href='#' onclick='openPopUpWin(<?echo $row['private_id']?>)'><?echo $row['title']?><?echo " ".$answer?></a></td>
<?
					}
?>
							<td align=center><?echo $row['registrant'];?></td> 
							<td align=center><?echo $row['date'];?></td> 
							<td align=center><?echo $row['readnum'];?></td> 
						</tr>
<?
						$recordNumber--;
						$nextRecord += 1;
						if(9 < $nextRecord){
							break;
						}
					}
				}
			}
?>
		</table>	
		<table border=0>
			<tr>
<?
				if((1 < $presentPageNumber) && ($presentPageNumber < $totalPageNumber)){ // MiddlePages
					echo("<td align=center id='page_number' width=600>");

						$previousPage = $presentPageNumber - 1;
						$nextRecord_previousPage = $next - $pageMaxRowNumber;
						echo("&nbsp<a href='$PHP_SELF?page=$previousPage&totalPage=$totalPageNumber&next=$nextRecord_previousPage'>◀</a>");

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
						echo("&nbsp<a href='$PHP_SELF?page=$nextPage&totalPage=$totalPageNumber&next=$nextRecord' >▶</a>");

					echo("	</td>");
				}
				else if(($presentPageNumber == $totalPageNumber) && ($presentPageNumber > 1)){ // LastPage
					echo("<td align=center id='page_number' width=600>");

						$previousPage = $presentPageNumber - 1;
						$nextRecord_previousPage = $next - $pageMaxRowNumber;
						echo("<a href='$PHP_SELF?page=$previousPage&totalPage=$totalPageNumber&next=$nextRecord_previousPage'>◀</a>&nbsp");

						for($i=1; $i <= $totalPageNumber; $i++){ // page number

							if($i == $presentPageNumber){
								echo("&nbsp<strong>$i</strong>&nbsp");
							}
							else{
								echo("&nbsp<a href='$PHP_SELF?page=$i&totalPage=$totalPageNumber&next=$nextRecord_skipPage'>$i</a>&nbsp");
							}
							$nextRecord_skipPage = $nextRecord_skipPage + $pageMaxRowNumber;  // page1=0; page2=10; page3=20 ...
						}

					echo("	</td>");
				}
				else{ // FirstPage
					echo("<td align=center id='page_number' width=600>");
					
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
							echo("&nbsp<a href='$PHP_SELF?page=$presentPageNumber&totalPage=$totalPageNumber&next=$nextRecord'>▶</a>");
						}
					echo ("</td>");
				}
?>					
				<td align=center id='write_btn'>
						<a href='private_write.php?login=<?echo $_SESSION['user_id']?>' target='private_content'><img src='img/write_btn_darkgreen.png' /></a>
				</td>
			</tr>
		</table>
 </center>
 </BODY>
</HTML>
