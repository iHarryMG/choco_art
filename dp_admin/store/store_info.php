<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/store_info_design.css" type=text/css rel=stylesheet>
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
	#content table{
		margin: 10px auto 20px 20px;
		width: 700px;
		border: 1px solid gray;
		border-collapse: collapse;
	}
	#content table input{
		border: 1px solid gray;
	}
	#content table td{
		border: 1px solid gray;
		color: #3a260d;
		font-size: 12px;
	}
	#content table td#table_titles{
		background-color: #9bbb58;
		color: #3a260d;
		font-size: 14px;
	}
	#content input#btn_register{
		margin-left: 350px;
		border: 1px solid gray;
		width: 50px;
	}
  </style>
  <script language="javascript">
	function check_inputs(){
		var form = document.admin_form;

		if(!form.freedeliver_min_buyfee.value){
			alert("무료배송 최소구매액을 입력하세요!");	
			form.freedeliver_min_buyfee.focus();
			return;
		}
		else if(!form.deliver_fee.value){
			alert("배송비를 입력하세요!");	
			form.deliver_fee.focus();
			return;
		}
		else if(!form.admin_pass.value){
			alert("관리자 비밀번호를 입력하세요!");	
			form.admin_pass.focus();
			return;
		}

		form.submit();
	}
  </script>
 </HEAD>
 <BODY>
 <?
		include("../../dbconn/common.php");

		$order_sql = "select * from order_fee";
		$order_result = mysql_query($order_sql, $connect);
		$order_record = mysql_fetch_array($order_result);

		$ad_sql = "select pw from admin";
		$ad_result = mysql_query($ad_sql, $connect);
		$ad_record = mysql_fetch_array($ad_result);

		mysql_close($connect);
 ?>
	<form name="admin_form" action="save_store_info.php?num=<?echo $order_record['num']?>" method="POST">
	<div id="header">
		상점 정보 관리
	</div>
	<div id="content">
		<table cellpadding=5>
			<tr>
				<td colspan=2 align="center" id="table_titles">배송비</td>
			</tr>
			<tr>
				<td>무료 배송최소 구매액</td>
				<td><input type="text" name="freedeliver_min_buyfee" size="20" maxlength="10" value="<?echo $order_record['freedeliver_min_buyfee']?>">원 * 무료배송이 가능한 주문총액</td>
			</tr>
			<tr>
				<td>배송비</td>
				<td><input type="text" name="deliver_fee" size="20" maxlength="10" value="<?echo $order_record['deliver_fee']?>">원 * 무료배송이 아닐경우의 배송비</td>
			</tr>
			<tr>
				<td colspan=2 align="center" id="table_titles">관리자 정보</td>
			</tr>
			<tr>
				<td>비밀번호</td>
				<td><input type="text" name="admin_pass" size="20" maxlength="10" value="<?echo $ad_record['pw']?>"></td>
			</tr>
		</table>
		<input type="button" onclick="javascript:check_inputs()" id="btn_register" value="등록" style="cursor:hand">
	</div>
	</form>
 </BODY>
</HTML>

