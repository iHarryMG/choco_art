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
	$edit_date = date("Y.m.d-h:i:s A");

	include("../../dbconn/common.php");
	
	$sql="update member set ";

	if($class == "탈퇴"){
		$sql.="name='$name', rrn='$rrn', pw='$pw', class='$class', email='$email',
				tel='$tel', cell='$cell', comment='$comment', edit_date='$edit_date', leave_date='$edit_date' ";
	}
	else{
		$tmp_sql = "select leave_date from member where num='$num'";
		$tmp_result = mysql_query($tmp_sql, $connect);
		$tmp_row = mysql_num_rows($tmp_result);

		if($tmp_row > 0){
			$tmp_record  = mysql_fetch_array($tmp_result);
			$sql.="name='$name', rrn='$rrn', pw='$pw', class='$class', email='$email',
				tel='$tel', cell='$cell', comment='$comment', edit_date='$edit_date', leave_date='' ";
		}
		else{
			$sql.="name='$name', rrn='$rrn', pw='$pw', class='$class', email='$email',
				tel='$tel', cell='$cell', comment='$comment', edit_date='$edit_date' ";
		}
	}

    $sql.="where num='$num'";

	$result = mysql_query($sql, $connect);
	
	if($result)
	{ 		
		echo("<script language=javascript> alert('등록되었습니다.'); 
				window.location.href='member_list.php';
			  </script>");
	}
	else  
	{
		echo("<script language=javascript>  window.alert('error on inserting');
				window.location.href='member_list.php';
			  </script>");
	}

	mysql_close();	
?>
