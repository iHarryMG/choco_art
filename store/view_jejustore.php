<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <style type="text/css">
	body{
		margin: 0px;
		background-color: white;
	}
	table#info{
		margin-top: 20px;
		font-size: 13px;
		border-collapse: collapse;
		color: #5e7e1c;
		font-weight: bold;
	}
	table#info td{
		border-top: 1px solid gray;
		border-bottom: 1px solid gray;
	}
	table#info td#title{
		background-color: #9bbb58;
		color: white;
		font-weight: bold;
		width: 100px;
	}
	img#main_img{
		border: 1px solid #1b3127;
		margin-top: 10px;
		margin: 20px;
		margin-bottom: 10px;
	}
	div#btns_register input{
		width: 50px;
		border: 1px solid gray;
	}
	div#btns_register{
		margin-left: 370px;
	}
	img{
		border: 1px solid #1b3127;	
	}
  </style>
 </HEAD>
 <BODY>
 	<center>
<?
			include("../dbconn/common.php");
			$imagesql = "SELECT image FROM store_image where num='$num' and region='jeju'";
			$imageresult = mysql_query($imagesql, $connect);
			$record = mysql_fetch_array($imageresult);
			$image = $record['image'];
?>		
		<img id="main_img" src="../uploaded_images/store_image/<?echo $image?>" width=400 height=300 border=0>
		<table>
			<tr>
<?
			$imagesql = "SELECT num, image FROM store_image where region='jeju'";
			$imageresult = mysql_query($imagesql, $connect);
			$row = mysql_num_rows($imageresult);

			for($i = 0; $i < $row; $i++){
				$num = mysql_result($imageresult, $i, 0);
				$image = mysql_result($imageresult, $i, 1);
				echo("<td><a href='$PHP_SELF?num=$num'><img src='../uploaded_images/store_image/$image' width=70 height=50 border=0></td>");
			}
?>
			</tr>
		</table>
	</center>
	</br>
	<div id="btns_register">
		<input type="button" onclick="javascript:window.close()" value="닫기" style='cursor:hand'>
	</div>
<?
			mysql_close($connect);
?>
 </BODY>
</HTML>

