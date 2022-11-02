<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>
 <BODY>
 </BODY>
</HTML>

<?
		include("../../dbconn/common.php");

		$window = $win;
		$order_code = $code;

		$order_status = $_POST['status'];
		$deliver_name = $_POST['deliver_name'];
		$deliver_email = $_POST['deliver_email'];
		$deliver_tel = $_POST['deliver_tel'];
		$deliver_cell = $_POST['deliver_cell'];
		$deliver_addr = $_POST['deliver_addr'];


		$sql = "update shop_order
					set order_status='$order_status', 
						deliver_name='$deliver_name',
						deliver_email='$deliver_email',
						deliver_tel='$deliver_tel',
						deliver_cell='$deliver_cell',
						deliver_addr='$deliver_addr'
					where order_code='$order_code'";
		$result = mysql_query($sql, $connect);
		
		if($result)
		{ 		
			echo("<script language=javascript> alert('등록되었습니다.'); 
					window.location.href='order_list.php';
				  </script>");
		}
		else  
		{
			echo("<script language=javascript>  window.alert('error on inserting');
					history.go(-1);
				  </script>");
		}

		mysql_close();	
?>
