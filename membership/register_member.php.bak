<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>
 <BODY>
 </BODY>
</HTML>

<?

	include("../dbconn/common.php");

	$rrn = $rrn1."-".$rrn2;

	if($email_addr != ""){
		$mail = $email_id."@".$email_addr;
	}
	else if($email_addr_select != ""){
		$mail = $email_id."@".$email_addr_select;
	}

	$tel = $phone1."-".$phone2."-".$phone3;
	$cell = $cell1."-".$cell2."-".$cell3;
	
	$class = $class;
	$date = date("Y.m.d-h:i:s A");

	$sql="insert into member";
	$sql.="(name,rrn,id,pw,class,email,tel,cell,addr, date, login_count)";
	$sql.=" values('$name','$rrn','$id','$pw','$class','$mail','$tel','$cell','$addr','$date', 0)";
	$result = mysql_query($sql, $connect);

	if($result)
	{ 		
		echo("<script language=javascript> alert('가입 완료되었습니다.'); 
				location.replace('../index.php');
			  </script>");
	}
	else  
	{
		echo("<script language=javascript>  window.alert('error on inserting');
				location.replace('../membership/join.php');
			  </script>");
		exit;         
	}

	mysql_close();	
?>
