<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/exhibition_list_design.css" type=text/css rel=stylesheet>
  <script language="javascript">
	function openPopUpWin(recordID, num){
		window.open("exhibition_content.php?id="+recordID+"&num="+num,"","scrollbars=auto, resizable=no, width=450, height=750");
	}
  </script>
 </HEAD>
 <BODY>
 <center>
		<img src="../images/frames/event_table_title_bkground.png">
  		<table id='list'> 
			<tr id="special_part"> 
				<td align=center width=30></td> 
				<td align=center width=330></td> 
				<td align=center></td> 
				<td align=center></td>			
				<td align=center></td>
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

				$anotherPageSql = "SELECT event_id, title, registrant, event_date, date, readnum  
									FROM event ORDER BY event_id desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호

				$imageSql = "SELECT num FROM event_image ORDER BY num asc";
				$imageResult = mysql_query($imageSql, $connect);
				$imageRecord = mysql_fetch_array($imageResult);
				$imageNum = $imageRecord['num'];
				
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
								<td id='title' align=left><a href='#' onclick='openPopUpWin($event_id, $imageNum)'>$short_title...</a></td> 
								<td align=center>$registrant</td> 
								<td align=center>$event_date</td> 
								<td align=center>$date</td> 
								<td align=center>$readnum</td>");
					}
					else{
						echo ("	<td align=center>$recordNumber</td> 
								<td id='title' align=left><a href='#' onclick='openPopUpWin($event_id, $imageNum)'>$title</a></td> 
								<td align=center>$registrant</td> 
								<td align=center>$event_date</td> 
								<td align=center>$date</td> 
								<td align=center>$readnum</td>");
					}

					echo("</tr>");
					$recordNumber--;
					$nextRecord += 1;
				}
				echo("<tr>
						<td colspan=8 align=center id='page_number'>");

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

				echo("	</td>
					  </tr>");
			}
			else if(($presentPageNumber == $totalPageNumber) && ($presentPageNumber != 0)){ // LastPage

				$anotherPageSql = "SELECT event_id, title, registrant, event_date, date, readnum  
									FROM event ORDER BY event_id desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호

				$imageSql = "SELECT num FROM event_image ORDER BY num asc";
				$imageResult = mysql_query($imageSql, $connect);
				$imageRecord = mysql_fetch_array($imageResult);
				$imageNum = $imageRecord['num'];
					
				for($i=$startIndex ; $i < $anotherPageRecords; $i++){ // records
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
									<td id='title' align=left><a href='#' onclick='openPopUpWin($event_id, $imageNum)'>$short_title...</a></td> 
									<td align=center>$registrant</td> 
									<td align=center>$event_date</td> 
									<td align=center>$date</td>
									<td align=center>$readnum</td> ");
						}
						else{
							echo ("	<td align=center>$recordNumber</td> 
									<td id='title' align=left><a href='#' onclick='openPopUpWin($event_id, $imageNum)'>$title</a></td> 
									<td align=center>$registrant</td> 
									<td align=center>$event_date</td> 
									<td align=center>$date</td>
									<td align=center>$readnum</td> ");
						}
					echo("</tr>");
					$recordNumber--;
				}
				echo("<tr>
						<td colspan=8 align=center id='page_number'>");

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

				echo("	</td>
					  </tr>");
			}
			else{ // FirstPage
				$nextRecord = 0;
				$sql = "SELECT * FROM event ORDER BY event_id desc";
				$result = mysql_query($sql, $connect);
				$records = mysql_num_rows($result); 
				
				if($records < 1){
					echo("<tr><td colspan=6 align=center id='norecords'>등록된 내용 없습니다.</td></tr>");
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

						$imageSql = "SELECT num FROM event_image where event_id='$row[event_id]' ORDER BY num asc";
						$imageResult = mysql_query($imageSql, $connect);
						$imageRecord = mysql_fetch_array($imageResult);
						$imageNum = $imageRecord['num'];

?>
						<tr> 
							<td align=center><?echo $recordNumber?></td> 
<?
					if(strlen($row[title]) > 35){
						$short_title = substr($row['title'],0,35);
?>
						<td id='title' align=left><a href='#' onclick='openPopUpWin("<?echo $row['event_id']?>", "<?echo $imageNum?>")'><?echo $short_title?>...</a></td> 
<?
					}
					else{
?>
						<td id='title' align=left><a href='#' onclick='openPopUpWin("<?echo $row['event_id']?>", "<?echo $imageNum?>")'><?echo $row['title']?></a></td>
<?
					}
?>
							<td align=center><?echo $row['registrant'];?></td> 
							<td align=center><?echo $row['event_date'];?></td> 
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
					echo("<tr>
							<td colspan=6 align=center id='page_number' >");
					
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
					echo("	</td>
						  </tr>");
				}
			}
?>
		</table>
 </center>
 </BODY>
</HTML>
