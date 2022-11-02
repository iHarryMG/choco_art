<?
	session_start();	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>
 <BODY>
 </BODY>
</HTML>

<?
	include("../dbconn/common.php");
	include("./order_code_creater.php");

	$order_user_id = $_SESSION['user_id'];
	$order_total_pay = $_POST['totalbillinfo'];
	$total_deliverfee = $_POST['totaldeliverfee'];
	$order_payment_type = $_POST['payment_method'];

	$user_name = $_POST['name'];
	$user_id = $_SESSION['user_id'];
	$user_email = $_POST['email'];
	$user_tel = $_POST['phone'];
	$user_cell = $_POST['cell'];
	$user_addr = $_POST['addr'];

	$deliver_name = $_POST['deliver_name'];
	$deliver_email = $_POST['deliver_email'];
	$deliver_tel = $_POST['deliver_phone'];
	$deliver_cell = $_POST['deliver_cell'];
	$deliver_addr = $_POST['deliver_addr'];

	$order_code = get_order_code($order_user_id);

			$sql = "SELECT order_code 
						FROM temp_order_info where order_user_id='$order_user_id'";
			$result = mysql_query($sql, $connect);
			$recordnum = mysql_num_rows($result);

			if($recordnum > 0){
				$result_order_code = mysql_fetch_array($result);
				$or_code = $result_order_code['order_code'];

				$delSql = "delete from temp_order_info
							where order_user_id='$order_user_id'";
				mysql_query($delSql, $connect);
				$delSql = "delete from temp_ordered_product
							where order_code='$or_code'";
				mysql_query($delSql, $connect);
			}

	$sql="insert into temp_order_info";
	$sql.="(order_code, order_user_id, order_total_pay, order_payment_type, user_name, user_email, user_tel, user_cell, user_addr, deliver_name, deliver_email, deliver_tel, deliver_cell, deliver_addr, deliver_cost, order_date, order_status)";
	$sql.=" values('$order_code', '$order_user_id', '$order_total_pay', '$order_payment_type', '$user_name', '$user_email', '$user_tel', '$user_cell', '$user_addr', '$deliver_name', '$deliver_email', '$deliver_tel', '$deliver_cell', '$deliver_addr', '$total_deliverfee', NOW(), 'temp')";
	$result1 = mysql_query($sql, $connect);

	$sql="";
	$sql = "SELECT product_code, product_quantity
				FROM shop_cart	where user_id='$order_user_id'";
	$result = mysql_query($sql, $connect);
	$records = mysql_num_rows($result); 

	while($value = mysql_fetch_array($result)){
		$product_code = $value['product_code'];
		$order_quantity = $value['product_quantity'];

		$sql="";
		$sql="insert into temp_ordered_product";
		$sql.="(order_code, product_code, order_quantity, order_date)";
		$sql.=" values('$order_code', '$product_code', '$order_quantity', NOW())";
		$result2 = mysql_query($sql, $connect);
	}


	mysql_close($connect);	

	if($result1 && $result2)
	{ 		
		echo("<script>  
				window.location.href='../kcp/pages/chk_plugin.html';
			  </script>");
	}
	else  
	{
		echo("<script>  
				alert('error on saving.');
				history.go(-1);
			  </script>");
	}
?>
