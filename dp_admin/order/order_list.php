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
	div.content table#searchtable{
		margin: 20px;
		width: 800px;
		border: 1px solid white;
		border-collapse: collapse;
		margin-bottom: 20px;
	}
	div.content table#searchtable td{
		border: 1px solid white;
		color: #3a260d;
		font-size: 12px;
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
  <script type="text/javascript">
		function goto(){
			var form = document.admin_form;
			window.location.href="order_list.php?status="+form.order_status.value;	
		}
	  
  </script>
 </HEAD>
 <BODY>
	<form name="admin_form" action="<?echo $_PHPSELF?>" method="POST">
	<div class="content">
		<table id="searchtable" border=0>
			<tr>
				<td width=90><select name="order_status">
<?			
						$_0 = "";
						$_1 = "";
						$_2 = "";
						$_3 = "";
						$_4 = "";
						$_5 = "";
						$_6 = "";
						$_7 = "";
			
						if("" == $status){
							$_0 = "selected";
						}
						if("주문접수" == $status){
							$_1 = "selected";
						}
						else if("결제완료" == $status){
							$_2 = "selected";
						}
						else if("상품준비" == $status){
							$_3 = "selected";
						}
						else if("배송시작" == $status){
							$_4 = "selected";
						}
						else if("배송완료" == $status){
							$_5 = "selected";
						}
						else if("취소요청" == $status){
							$_6 = "selected";
						}
						else if("취소완료" == $status){
							$_7 = "selected";
						}
?>
					<option value="" <?echo $_0?>>전체리스트</option>
					<option value="주문접수" <?echo $_1?>>주문접수</option>
					<option value="결제완료" <?echo $_2?>>결제완료</option>
					<option value="상품준비" <?echo $_3?>>상품준비</option>
					<option value="배송시작" <?echo $_4?>>배송시작</option>
					<option value="배송완료" <?echo $_5?>>배송완료</option>
					<option value="취소요청" <?echo $_6?>>취소요청</option>
					<option value="취소완료" <?echo $_7?>>취소완료</option>
					</select>
				</td>
				<td>
					&nbsp<input type="button" onclick="javascript:goto()" value="검색">
				</td>
			</tr>
		</table>
  		<table cellpadding=5> 
			<tr> 
				<td align=center id="table_titles">주문코드</td> 
				<td align=center id="table_titles">주문자(ID)</td> 
				<td align=center id="table_titles">연락처</td> 
				<td align=center id="table_titles">결제금액</td>
				<td align=center id="table_titles">결제방식</td>
				<td align=center id="table_titles">주문일</td>
				<td align=center id="table_titles">배송상태</td>
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

				$anotherPageSql = "SELECT order_code
											,user_name
											,order_user_id
											,user_cell
											,order_total_pay
											,order_payment_type
											,order_date
											,order_status 
											FROM shop_order ORDER BY num desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < ($next + $pageMaxRowNumber); $i++){ // records
						$order_code = mysql_result($anotherPageResult, $i, 0);
						$user_name = mysql_result($anotherPageResult, $i, 1);
						$order_user_id = mysql_result($anotherPageResult, $i, 2);
						$user_cell = mysql_result($anotherPageResult, $i, 3);
						$order_total_pay = mysql_result($anotherPageResult, $i, 4);
						$order_payment_type = mysql_result($anotherPageResult, $i, 5);
						$order_date = mysql_result($anotherPageResult, $i, 6);
						$order_status = mysql_result($anotherPageResult, $i, 7);

						echo("<tr>");
							echo ("<td id='title' align=center><a href='view_order_info.php?win=order_list&id=info&code=$order_code'>$order_code</a></td> 
								   <td align=center>$user_name($order_user_id)</td>
								   <td align=center>$user_cell</td>
								   <td align=center>$order_total_pay</td>
								   <td align=center>$order_payment_type</td>
								   <td align=center>$order_date</td>
								   <td align=center>$order_status</td>
								   ");
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

				$anotherPageSql = "SELECT order_code
											,user_name
											,order_user_id
											,user_cell
											,order_total_pay
											,order_payment_type
											,order_date
											,order_status 
											FROM shop_order ORDER BY num desc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < $anotherPageRecords; $i++){ // records
						$order_code = mysql_result($anotherPageResult, $i, 0);
						$user_name = mysql_result($anotherPageResult, $i, 1);
						$order_user_id = mysql_result($anotherPageResult, $i, 2);
						$user_cell = mysql_result($anotherPageResult, $i, 3);
						$order_total_pay = mysql_result($anotherPageResult, $i, 4);
						$order_payment_type = mysql_result($anotherPageResult, $i, 5);
						$order_date = mysql_result($anotherPageResult, $i, 6);
						$order_status = mysql_result($anotherPageResult, $i, 7);

						echo("<tr>");
							echo ("<td id='title' align=center><a href='view_order_info.php?win=order_list&id=info&code=$order_code'>$order_code</a></td> 
								   <td align=center>$user_name($order_user_id)</td>
								   <td align=center>$user_cell</td>
								   <td align=center>$order_total_pay</td>
								   <td align=center>$order_payment_type</td>
								   <td align=center>$order_date</td>
								   <td align=center>$order_status</td>
								   ");
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
				$sql = "SELECT * FROM shop_order ORDER BY num desc";
				$result = mysql_query($sql, $connect);
				$records = mysql_num_rows($result); 
				
				if($records < 1){
					echo("<tr><td colspan=7 align=center id='norecords'>등록된 내용 없습니다.</td></tr>");
				}
				else{
					$presentPageNumber = 1;
					$totalPageNumber = ceil($records / $pageMaxRowNumber);

					if($status != ""){
						$firstPageSql = "SELECT order_code
											,user_name
											,order_user_id
											,user_cell
											,order_total_pay
											,order_payment_type
											,order_date
											,order_status 
											FROM shop_order where order_status='$status' ORDER BY num desc";
					}
					else{
						$firstPageSql = "SELECT order_code
												,user_name
												,order_user_id
												,user_cell
												,order_total_pay
												,order_payment_type
												,order_date
												,order_status 
												FROM shop_order ORDER BY num desc";
					}
					$firstPageResult = mysql_query($firstPageSql, $connect);
					$firstPageRecords = mysql_num_rows($firstPageResult);  
					
					$recordNumber = $records; // 행 번호
					
					for($i=$startIndex ; $i < $firstPageRecords; $i++){ // records
						$order_code = mysql_result($firstPageResult, $i, 0);
						$user_name = mysql_result($firstPageResult, $i, 1);
						$order_user_id = mysql_result($firstPageResult, $i, 2);
						$user_cell = mysql_result($firstPageResult, $i, 3);
						$order_total_pay = mysql_result($firstPageResult, $i, 4);
						$order_payment_type = mysql_result($firstPageResult, $i, 5);
						$order_date = mysql_result($firstPageResult, $i, 6);
						$order_status = mysql_result($firstPageResult, $i, 7);

						echo("<tr>");
							echo ("<td id='title' align=center><a href='view_order_info.php?win=order_list&id=info&code=$order_code'>$order_code</a></td> 
								   <td align=center>$user_name($order_user_id)</td>
								   <td align=center>$user_cell</td>
								   <td align=center>$order_total_pay</td>
								   <td align=center>$order_payment_type</td>
								   <td align=center>$order_date</td>
								   <td align=center>$order_status</td>
								   ");
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
 </BODY>
</HTML>