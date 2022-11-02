<? ob_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>

 <BODY>
  <?
	if(!$registrant || !$title)
	{   echo("<script>
				window.alert('insert 대표관리자명, 제목을!')
				history.go(-1)
			  </script>
	"); exit;
	}

	include("../../../dbconn/common.php");

	$regiterdate = date("Y.m.d");

	$sql = "insert into event(registrant, title, content, event_date, date, readnum)
	values('$registrant','$title','$content', '$event_date','$regiterdate', 0)";

	$result=mysql_query($sql, $connect);
	mysql_close();

	if($result)
	{ 
		echo("<script>
			window.location.href='list_event.php'
		</script>");
	}
	else  
	{
		echo("<script language=javascript>  window.alert('error on inserting');
				history.go(-1);
			  </script>");
		exit;         
	}
	?>
</BODY>
</HTML>
<? ob_flush(); ?> 