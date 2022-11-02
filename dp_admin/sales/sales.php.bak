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
		margin-top: 50px;
	}
	div.content table{
		width: 750px;
		border-collapse: collapse;
	}
	div.content table td{
		border: 1px solid gray;
	}
	div.content table td#table_titles{
		background-color: #9bbb58;
	}
  </style>

 </HEAD>
 <BODY>
	<div id="header">
		매출
	</div> 
	<div class="content">
<?
		include("../../dbconn/common.php");

		$dateSql = "SELECT DISTINCT order_date
						FROM shop_ordered_product order by order_date asc";
		$dateResult = mysql_query($dateSql, $connect);
		$dateRows = mysql_num_rows($dateResult);

		$firstDate = mysql_result($dateResult, 0, 0);
		$lastDate = mysql_result($dateResult, $dateRows-1, 0);

		echo "검색 결과 : ".$firstDate." ~ ".$lastDate."까지의 검색결과입니다</br></br>";
?>
  		<table cellpadding=5> 
			<tr> 
				<td align=center id="table_titles">날짜</td> 
				<td align=center id="table_titles">판매수량</td> 
				<td align=center id="table_titles">결제금액(총액)</td> 
			</tr>
<? 
				$sql = "SELECT DISTINCT order_date
								FROM shop_ordered_product order by order_date asc";
				$result = mysql_query($sql, $connect);
				$rows = mysql_num_rows($result);

				$uniqueDates = ""; // real variable
				$order_total_qty = array();			 // real variable
				$order_total_pay = array();			 // real variable				

				$count = 0;
				while($uniqueDates = mysql_fetch_array($result)){
					$dateonly = $uniqueDates['order_date'];


					$sql = "SELECT order_total_pay
								FROM shop_order 
								where order_date like '$dateonly%'";
					$sqlResult = mysql_query($sql, $connect);
					$order_total_pay[$count] = 0;
					while($record = mysql_fetch_array($sqlResult)){
						$order_total_pay[$count] += $record['order_total_pay'];
					}


					$order_total_qty[$count] = 0;
					$sql = "SELECT order_quantity
								FROM shop_ordered_product
								where order_date='$dateonly'";
					$sqlResult = mysql_query($sql, $connect);
					while($record = mysql_fetch_array($sqlResult)){
						$order_total_qty[$count] += $record['order_quantity'];
					}

					++$count;
				}
				
				for($i = 0; $i < $rows; $i++){
						$uniqueDates = mysql_result($result, $i, 0);
					    echo("<tr>");
							echo ("
								   <td align=center>$uniqueDates</td>
								   <td align=center>$order_total_qty[$i]</td>
								   <td align=center>$order_total_pay[$i]</td>
								   ");
						echo("</tr>");
				}				

				mysql_close($connect);
?>
		</table>
	</div>
 </BODY>
</HTML>