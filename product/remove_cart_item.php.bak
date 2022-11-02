<?
		session_start();
		include("../dbconn/common.php");

		$cart_id = $id;
		$sql = "delete from shop_cart ";
		$sql .= "where cart_id='$cart_id'";
		mysql_query($sql, $connect);
		mysql_close($connect);

		$user_id = $_SESSION['user_id'];
		echo("<script>
				window.location.href='shopping_cart.php?id=$user_id';
			  </script>");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>
 <BODY>
 </BODY>
</HTML>