<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <style type="text/css">
	body{
		margin: 0px;
	}
	img{
		border: 1px solid gray;
		margin: 25px;
		font-size: 12px;
		color: #3a260d;
	}
	div#btns_register input{
		width: 50px;
		border: 1px solid gray;
	}
	div#btns_register{
		margin-left: 400px;
	}
  </style>
 </HEAD>
 <BODY>
<?
			include("../../../dbconn/common.php");
			$imagesql = "SELECT image FROM recipe where id='$id'";
			$imageresult = mysql_query($imagesql, $connect);

			$imagerow = mysql_fetch_array($imageresult);
?>
	<center>
		<img src="../../../uploaded_images/recipe/<?echo $imagerow['image']?>">
	</center>
	<div id="btns_register">
		<input type="button" onclick="javascript:window.close()" value="닫기" style='cursor:hand'>
	</div>
 </BODY>
</HTML>
