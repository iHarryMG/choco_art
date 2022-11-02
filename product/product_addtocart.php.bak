<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>
<?
	if(!$_SESSION['user_id']){
		echo("<script>
				alert('로그인하셔야 합니다.');
				history.go(-1);
			  </script>");	
	}

	include("../dbconn/common.php");

	$product_code = $code;
	$user_id =  $_SESSION['user_id'];

	$sql = "select product_quantity from shop_cart where product_code='$product_code' and user_id='$user_id'";
	$result = mysql_query($sql, $connect);
	$rows = mysql_num_rows($result);

	if($rows > 0){
		$value = mysql_fetch_array($result);
		$product_quantity = $value['product_quantity'];
		$product_quantity += 1;
		$sql = "UPDATE shop_cart 
		        SET product_quantity='$product_quantity'
				WHERE user_id = '$user_id' AND product_code = '$product_code'";
	}
	else{
		$sql = "INSERT INTO shop_cart (user_id, product_code, product_quantity, date)
				VALUES ('$user_id', '$product_code', 1, NOW())";
	}

	$save_result = mysql_query($sql, $connect);
	mysql_close($connect);
	
	if($save_result){
		echo("<script>
				alert('장바구니에 추가되었습니다.');
				window.location.href='shopping.php';
			  </script>");
	}
	else{
		echo("<script>
				window.location.href='shopping.php';
			  </script>");
	}
?>
 <BODY>
 </BODY>
</HTML>
