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
	table td#title{
		text-align: center;
		background-color: #9bbb58;
		color: 3a260d;
		font-size: 13px;
	}
	table td#label{
		background-color: #d8e4be;
		text-align: center;
		font-size: 12px;
		width: 100px;
	}
	div#content table{
		text-align: center;
		margin-top: 10px;
		width: 850px;
		border: 1px solid gray;
		border-collapse: collapse;
		font-size: 14px;
	}
	div#content table td, input{
		border: 1px solid gray;
	}
	div#btns{
		margin-left: 400px;
	}
	div#btns input{
		width: 50px;
		border: 1px solid gray;
	}
	table input{
		border: 1px solid gray;
	}
  </style>
  <script language="javascript">

	function check_inputs(){
		var form = document.admin_form;

		if(!form.deliver_name.value){
			alert("이름을 입력하세요!");
			form.deliver_name.focus();
			return;
		}
		else if(!form.deliver_email.value){
			alert("이메일을 입력하세요!");
			form.deliver_email.focus();
			return;
		}
		else if(!form.deliver_tel.value){
			alert("전화번호를 입력하세요!");
			form.deliver_tel.focus();
			return;
		}
		else if(!form.deliver_cell.value){
			alert("휴대폰번호를 입력하세요!");
			form.deliver_cell.focus();
			return;
		}
		else if(!form.deliver_addr.value){
			alert("주소를 입력하세요!");
			form.deliver_addr.focus();
			return;
		}
		form.submit();
	}
  </script>
 </HEAD>
 <BODY>
 <?
		include("../../dbconn/common.php");

		$win = $win;

			$sql = "SELECT * 
						FROM shop_order 
						where order_code='$code'";
			$result = mysql_query($sql, $connect);
			$records = mysql_fetch_array($result);

			$order_code = $code;
			$order_payment_type = $records['order_payment_type'];
			$user_name = $records['user_name'];
			$order_user_id = $records['order_user_id'];
			$order_date = $records['order_date'];
			$order_paid_date = $records['order_paid_date'];

			$order_total_pay = $records['order_total_pay'];
			$deliver_cost = $records['deliver_cost'];
			$order_paid_amount = $records['order_paid_amount'];

			$user_name =$records['user_name'];
			$user_email = $records['user_email'];
			$user_tel = $records['user_tel'];
			$user_cell = $records['user_cell'];
			
			$deliver_name = $records['deliver_name'];
			$deliver_email = $records['deliver_email'];
			$deliver_tel = $records['deliver_tel'];
			$deliver_cell = $records['deliver_cell'];
			$deliver_addr = $records['deliver_addr'];
			$order_status = $records['order_status'];
 ?>
 <form name="admin_form" action="edit_order_info.php?win=<?echo $win?>&code=<?echo $order_code?>" method="POST">
	<div id="content">
		<table cellpadding=5>
			<tr>
				<td id="title">주문코드</td>
				<td id="title">결제방식</td>
				<td id="title">구매자(아이디)</td>
				<td id="title">접수일</td>
				<td id="title">결제완료일시</td>
				<td id="title">주문상태</td>
			</tr>
			<tr>
				<td><?echo $order_code?></td>
				<td><?echo $order_payment_type?></td>
				<td><?echo $user_name?>(<?echo $order_user_id?>)</td>
				<td><?echo $order_date?></td>
				<td><?echo $order_paid_date?></td>
				<td><select name="status">
<?
						$_1 = "";
						$_2 = "";
						$_3 = "";
						$_4 = "";
						$_5 = "";
						$_6 = "";
						$_7 = "";

						if("주문접수" == $order_status){
							$_1 = "selected";
						}
						else if("결제완료" == $order_status){
							$_2 = "selected";
						}
						else if("상품준비" == $order_status){
							$_3 = "selected";
						}
						else if("배송시작" == $order_status){
							$_4 = "selected";
						}
						else if("배송완료" == $order_status){
							$_5 = "selected";
						}
						else if("취소요청" == $order_status){
							$_6 = "selected";
						}
						else if("취소완료" == $order_status){
							$_7 = "selected";
						}
?>
					<option value="주문접수" <?echo $_1?>>주문접수</option>
					<option value="결제완료" <?echo $_2?>>결제완료</option>
					<option value="상품준비" <?echo $_3?>>상품준비</option>
					<option value="배송시작" <?echo $_4?>>배송시작</option>
					<option value="배송완료" <?echo $_5?>>배송완료</option>
					<option value="취소요청" <?echo $_6?>>취소요청</option>
					<option value="취소완료" <?echo $_7?>>취소완료</option>
				</td>
			</tr>
		</table>
		</br>

		<table cellpadding=5>
			<tr>
				<td id="title">상품명</td>
				<td id="title">가격</td>
				<td id="title">수량</td>
				<td id="title">합계</td>				
			</tr>
<?
		$sql = "";  
		$sql = "SELECT product_code, order_quantity	from shop_ordered_product
					where order_code='$order_code'";
		$order_result = mysql_query($sql, $connect);

		while($order_records = mysql_fetch_array($order_result)){
			$sql = "";  
			$sql = "SELECT name, price from product 
						where code='$order_records[product_code]'";
			$item_result = mysql_query($sql, $connect);
			$item_records = mysql_fetch_array($item_result);
?>
			<tr>
				<td><?echo $item_records['name']?></td>
				<td><?echo $item_records['price']?></td>
				<td><?echo $order_records['order_quantity']?></td>
				<td><?echo ($item_records['price'] * $order_records['order_quantity'])?></td>				
			</tr>
<?
		}
?>
		</table>
		</br>

		<table cellpadding=5>
			<tr>
				<td colspan=6 id="title">결제내용</td>
			</tr>
			<tr>
				<td id="label">총 상품금액</td>
				<td><?echo $order_total_pay?></td>
				<td id="label">배송비</td>
				<td><?echo $deliver_cost?></td>
				<td id="label">실제 결제금액</td>
				<td><?echo $order_paid_amount?></td>
			</tr>
		</table>
		</br>
		<table cellpadding=5>
			<tr>
				<td colspan=4 id="title">주문자 정보</td>
			</tr>
			<tr>
				<td id="label">주문자 성명/ID</td>
				<td><?echo $user_name?>/<?echo $order_user_id?></td>
				<td id="label">이메일</td>
				<td><?echo $user_email?></td>
			</tr>
			<tr>
				<td id="label">전화번호</td>
				<td><?echo $user_tel?></td>
				<td id="label">휴대폰번호</td>
				<td><?echo $user_cell?></td>
			</tr>
		</table>
		</br>
		<table cellpadding=5>
			<tr>
				<td colspan=4 id="title">배송지 정보</td>
			</tr>
			<tr>
				<td id="label">이름</td>
				<td><input type="text" name="deliver_name" size="50" value="<?echo $deliver_name?>"></td>
				<td id="label">이메일 </td>
				<td colspan=3><input type="text" name="deliver_email" size="50" value="<?echo $deliver_email?>"></td>
			</tr>
			<tr>
				<td id="label">전화번호</td>
				<td><input type="text" name="deliver_tel" size="50" value="<?echo $deliver_tel?>"></td>
				<td id="label">휴대폰번호</td>
				<td><input type="text" name="deliver_cell" size="50" value="<?echo $deliver_cell?>"></td>
			</tr>
			<tr>
				<td id="label">주소</td>
				<td colspan=3><input type="text" name="deliver_addr" size="120" value="<?echo $deliver_addr?>"></td>
			</tr>
		</table>
	</div>
	<div id="btns">
		<input type='button' onclick='javascript:check_inputs()' value='등록' style='cursor:hand'>
		<input type="button" onclick="javascript:history.go(-1)" value="목록" style="cursor:hand">
	</div>
  </form>
  <?
  		mysql_close($connect);
  ?>
 </BODY>
</HTML>
