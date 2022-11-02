<?
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  </HEAD>
<?

	include("../dbconn/common.php");

	$id = $_POST['id'];
	$mail = $email_id;
	$tel = $phone;
	$cell = $cell;
	$edit_date = date("Y.m.d-h:i:s A");

	$sql="update member ";
	$sql.="set name='$name',rrn='$rrn',id='$id',pw='$pw',email='$mail',tel='$tel',cell='$cell',addr='$addr', edit_date='$edit_date' ";
	$sql.="where id='$user_id'";
	$result = mysql_query($sql, $connect);
	
	if($result)
	{ 		
		echo("<script language=javascript>
				location.replace('../index.php');
			  </script>");
	}
	else  
	{
		echo("<script language=javascript>  window.alert('error on inserting');
				location.replace('../index.php');
			  </script>");
		exit;         
	}

	mysql_close($connect);
?>
 <BODY>
 </BODY>
</HTML>