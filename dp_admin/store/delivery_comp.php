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
		font-size: 18px;
		font-weight: bold;
		color: #3a260d;
		font-family: "HY견고딕";
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
		width: 800px;
		border: 1px solid gray;
		border-collapse: collapse;
		margin-bottom: 20px;
	}
	div.content table input{
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
		margin-right: 20px;
	}
  </style>
  <script language="javascript">
	function check_inputs(){
		var form = document.save_form;

		if(!form.comp_url.value){
			alert("배송업체 URL를 입력하세요!");	
			form.comp_url.focus();
			return;
		}
		else if(!form.comp_name.value){
			alert("배송업체명을 입력하세요!");	
			form.comp_name.focus();
			return;
		}


		form.submit();
	}
  </script>
 </HEAD>
 <BODY>
	<div id="header">
		배송업체 관리
	</div> 
	<form name="admin_form" action="<?echo $_PHPSELF?>" method="POST">
		<div class="content">
		<table cellpadding=5> 
			<tr> 
				<td align=center id="table_titles">번호</td> 
				<td align=center id="table_titles">코드</td> 
				<td align=center id="table_titles">Homepage URL</td> 
				<td align=center id="table_titles">업체명</td> 
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

				$anotherPageSql = "SELECT *	FROM delivery_comp ORDER BY num desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < ($next + $pageMaxRowNumber); $i++){ // records
					$num = mysql_result($anotherPageResult, $i, 0);
					$code = mysql_result($anotherPageResult, $i, 1);
					$url = mysql_result($anotherPageResult, $i, 2);
					$name = mysql_result($anotherPageResult, $i, 3);

					echo("<tr>");
						echo ("	<td align=center>$recordNumber</td> 
								<td align=center>$code</td> 
								<td align=center><a href='$url' target='_blank'>$url</a></td> 
								<td align=center>$name</td> 

								<td><a href='$PHP_SELF?num=$num'>수정</a></td>
								<td><a href='delete_delivery_comp.php?num=$num'>삭제</a></td>");
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

				$anotherPageSql = "SELECT *	FROM delivery_comp ORDER BY num desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < $anotherPageRecords; $i++){ // records
					$num = mysql_result($anotherPageResult, $i, 0);					
					$code = mysql_result($anotherPageResult, $i, 1);
					$url = mysql_result($anotherPageResult, $i, 2);
					$name = mysql_result($anotherPageResult, $i, 3);
					
					echo("<tr>");
						echo ("	<td align=center>$recordNumber</td> 
								<td align=center>$code</td> 
								<td align=center><a href='$url' target='_blank'>$url</a></td> 
								<td align=center>$name</td> 

								<td><a href='$PHP_SELF?num=$num'>수정</a></td>
								<td><a href='delete_delivery_comp.php?num=$num'>삭제</a></td>");
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
				$sql = "SELECT * FROM delivery_comp ORDER BY num desc";
				$result = mysql_query($sql, $connect);
				$records = mysql_num_rows($result); 
				
				if($records < 1){
					echo("<tr>
							<td colspan=5 align='center'>등록된 내용 없습니다.</td>
						  </tr>");
				}else{
					$presentPageNumber = 1;
					$totalPageNumber = ceil($records / $pageMaxRowNumber);

					$firstPageSql = "SELECT * FROM delivery_comp ORDER BY num desc";
					$firstPageResult = mysql_query($firstPageSql, $connect);
					$firstPageRecords = mysql_num_rows($firstPageResult);  
					
					$recordNumber = $records; // 행 번호
					
					for($i=0 ; $i < $firstPageRecords; $i++){ // records

						$row=mysql_fetch_array($firstPageResult);
						echo ("<tr> 
								<td align=center>$recordNumber</td> 
								<td align=center>$row[code]</td> 
								<td align=center><a href='$row[url]' target='_blank'>$row[url]</a></td> 
								<td align=center>$row[name]</td> 

								<td><a href='$PHP_SELF?num=$row[num]'>수정</a></td>
								<td><a href='delete_delivery_comp.php?num=$row[num]'>삭제</a></td>
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
<?
			$record = "";
			$par_num = $_REQUEST['num'];
			$sql = "SELECT * FROM delivery_comp where num='$par_num'";
			$result = mysql_query($sql, $connect);
			$record = mysql_fetch_array($result);  	
			mysql_close($connect);
?>
	<form name="save_form" action="save_delivery_comp.php?id=<?echo $par_num?>" method="POST">
		<div id="table_register">
			<table cellpadding=5>
				<tr>
					<td id="table_titles">배송업체 URL : </td>
					<td colspan=2><input name="comp_url" type="text" size=105 maxlength=200 value="<?echo $record['url']?>"></td>
				</tr>
				<tr>
					<td id="table_titles">배송업체명 : </td>
					<td><input name="comp_name" type="text" size=90 maxlength=20 value="<?echo $record['name']?>"></td>
					<td align=center><input id="btn_register" type="button" value="등록" onclick="javascript:check_inputs()" style="cursor:hand"></td>
				</tr>
			</table>
		</div>
	</form>
 </BODY>
</HTML>