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
		width: 800px;
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
		border: 1px solid gray;
		width: 50px;
	}
	div#btn_register{
		margin-left: 750px;
	}
  </style>
 </HEAD>

 <BODY>
 <form name="admin_form" method="POST">
	<div class="content">
  		<table cellpadding=5> 
			<tr id="special_part"> 
				<td align=center id="table_titles">번호</td> 
				<td align=center id="table_titles">카테고리</td>
				<td align=center id="table_titles">상품코드</td> 
				<td align=center id="table_titles">이미지</td> 
				<td align=center id="table_titles" width="250px">상품명</td> 
				<td align=center id="table_titles">판매가</td> 
				<td align=center id="table_titles">상태</td>			
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

				$anotherPageSql = "SELECT num, code, name, price, state, category FROM product ORDER BY num desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < ($next + $pageMaxRowNumber); $i++){ // records
					$num = mysql_result($anotherPageResult, $i, 0);
					$code = mysql_result($anotherPageResult, $i, 1);
					$name = mysql_result($anotherPageResult, $i, 2);
					$price = mysql_result($anotherPageResult, $i, 3);
					$state = mysql_result($anotherPageResult, $i, 4);
					$category = mysql_result($anotherPageResult, $i, 5);

					$imageSql = "SELECT image FROM product_image where code='$code' and type='list'";
					$imageResult = mysql_query($imageSql, $connect);
					$imageRecord =  mysql_fetch_array($imageResult);
					$image = $imageRecord['image'];

					echo("<tr>");
							echo ("<td align=center>$recordNumber</td> 
								   <td align=center>$category</td>
								   <td align=center>$code</td> 
								   <td align=center><img src='../../../uploaded_images/product/$image' width='40' height='40' border=0></td>
								   <td id='title'><a href='save_product_form.php?win=product_list&id=info&code=$code'>$name</a></td> 
								   <td align=center>$price</td>
								   <td>");
											$value = '';
											if('onsale' == $state){
												$value = '판매';
											}
											else if('nosale' == $state){
												$value = '판매중지';
											}		
											echo $value;

							echo ("</td>");

							echo ("<td id='btn'><a href='insert_product_image.php?win=product_list&name=$name&code=$code'>사진</a></td>");
							echo ("<td id='btn'><a href='save_product_form.php?win=product_list&id=edit&code=$code'>수정</a></td>");
							echo ("<td id='btn'><a href='delete_product_list.php?win=product_list&code=$code'>삭제</a></td>");							
					echo("</tr>");
					$recordNumber--;
					$nextRecord += 1;
				}
				echo("<tr>
						<td colspan=10 align=center id='page_number'>");

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

				$anotherPageSql = "SELECT num, code, name, price, state, category FROM product ORDER BY num desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < $anotherPageRecords; $i++){ // records
						$num = mysql_result($anotherPageResult, $i, 0);
						$code = mysql_result($anotherPageResult, $i, 1);
						$name = mysql_result($anotherPageResult, $i, 2);
						$price = mysql_result($anotherPageResult, $i, 3);
						$state = mysql_result($anotherPageResult, $i, 4);
						$category = mysql_result($anotherPageResult, $i, 5);

						$imageSql = "SELECT image FROM product_image where code='$code' and type='list'";
						$imageResult = mysql_query($imageSql, $connect);
						$imageRecord =  mysql_fetch_array($imageResult);
						$image = $imageRecord['image'];

						echo("<tr>");
								echo ("<td align=center>$recordNumber</td> 
									   <td align=center>$category</td>
									   <td align=center>$code</td> 
									   <td align=center><img src='../../../uploaded_images/product/$image' width='40' height='40' border=0></td>
									   <td id='title'><a href='save_product_form.php?win=product_list&id=info&code=$code'>$name</a></td> 
									   <td align=center>$price</td>
									   <td>");
											$value = '';
											if('onsale' == $state){
												$value = '판매';
											}
											else if('nosale' == $state){
												$value = '판매중지';
											}		
											echo $value;

							    echo ("</td>");

								echo ("<td id='btn'><a href='insert_product_image.php?win=product_list&name=$name&code=$code'>사진</a></td>");
								echo ("<td id='btn'><a href='save_product_form.php?win=product_list&id=edit&code=$code'>수정</a></td>");
								echo ("<td id='btn'><a href='delete_product_list.php?win=product_list&code=$code'>삭제</a></td>");							
						echo("</tr>");
					$recordNumber--;
				}

				echo("<tr>
						<td colspan=10 align=center id='page_number'>");

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
				$sql = "SELECT * FROM product ORDER BY num desc";
				$result = mysql_query($sql, $connect);
				$records = mysql_num_rows($result); 
				
				if($records < 1){
					echo("<tr><td colspan=7 align=center id='norecords'>등록된 내용 없습니다.</td></tr>");
				}
				else{
					$presentPageNumber = 1;
					$totalPageNumber = ceil($records / $pageMaxRowNumber);

					$firstPageSql = "SELECT num, code, name, price, state, category FROM product ORDER BY num desc";
					$firstPageResult = mysql_query($firstPageSql, $connect);
					$firstPageRecords = mysql_num_rows($firstPageResult);  
					
					$recordNumber = $records; // 행 번호
					
					for($i=$startIndex ; $i < $firstPageRecords; $i++){ // records
						$num = mysql_result($firstPageResult, $i, 0);
						$code = mysql_result($firstPageResult, $i, 1);
						$name = mysql_result($firstPageResult, $i, 2);
						$price = mysql_result($firstPageResult, $i, 3);
						$state = mysql_result($firstPageResult, $i, 4);
						$category = mysql_result($firstPageResult, $i, 5);

						$imageSql = "SELECT image FROM product_image where code='$code' and type='list'";
						$imageResult = mysql_query($imageSql, $connect);
						$imageRecord =  mysql_fetch_array($imageResult);
						$image = $imageRecord['image'];

						echo("<tr>");
							echo ("<td align=center>$recordNumber</td> 
								   <td align=center>$category</td>
								   <td align=center>$code</td> 
								   <td align=center><img src='../../../uploaded_images/product/$image' width='40' height='40' border=0></td>
								   <td id='title'><a href='save_product_form.php?win=product_list&id=info&code=$code'>$name</a></td> 
								   <td align=center>$price</td>
								   <td>");
											$value = '';
											if('onsale' == $state){
												$value = '판매';
											}
											else if('nosale' == $state){
												$value = '판매중지';
											}		
											echo $value;

							echo ("</td>");

							echo ("<td id='btn'><a href='insert_product_image.php?win=product_list&name=$name&code=$code'>사진</a></td>");
							echo ("<td id='btn'><a href='save_product_form.php?win=product_list&id=edit&code=$code'>수정</a></td>");
							echo ("<td id='btn'><a href='delete_product_list.php?win=product_list&code=$code'>삭제</a></td>");							
						echo("</tr>");
						$recordNumber--;
						$nextRecord += 1;
						if(9 < $nextRecord){
							break;
						}
					} // end of for

					echo("<tr>
							<td colspan=10 align=center id='page_number' >");
					
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
	</div>
	</form>
	<div id="btn_register">
		<input id="btn_register" type="button" value="등록" onclick="javascript:window.location.href='save_product_form.php?win=product_list&id=new&code='" style="cursor:hand">
	</div>
 </br>
 </BODY>
</HTML>
