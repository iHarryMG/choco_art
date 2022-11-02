<?
	session_start();

	$ad_name = $_SESSION['admin_name'];
	$ad_id = $_SESSION['admin_id'];
	$par_id = $_REQUEST['id'];

	if($ad_id != $par_id){
		Header("Location: ../index.php");
	}
	else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/admin_main_design.css" type=text/css rel=stylesheet>
	<frameset rows="140px, *" border=0>
		<frame src="header_menu.php" scrolling="no" noresize name="header_menu">
		<frameset cols="300px, *" border=0>
			<frame src="../store/menu_store.php" scrolling="no" noresize name="left_menu">
			<frame src="../store/store_info.php" name="content">
		</frameset>
	</frameset>
 </HEAD>
 <BODY>
 </BODY>
</HTML>
<?
	} // end of ELSE	
?>
