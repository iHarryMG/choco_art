<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/allmenu_design.css" type=text/css rel=stylesheet>
  <style type="text/css">
	body{
		margin: 0px;
		background-image: url("../../images/admin_images/sidemenu_background.jpg");
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-color: #9bbb58;
	}
	div#menu{
		margin-top: 120px;
		margin-left: 30px;
	}
	div#menu table{
		width: 200px;
	}
	a{
		text-decoration: none;
		color: #3a260d;
		font-weight: bold;
	}
	a:hover{
		color: white;
		font-weight: bold;
	}
	li{
		list-style-image: url("../../images/admin_images/list_style.png");
		margin-right: 5px;
	}
	div#date{
		font-size: 13px;
		font-weight: bold;
		margin-top: 35px;
		margin-left: 32px;
		color: #9bbb58;
		font-family: "Impact";
	}
	div#goto{
		margin-top: 238px;
		margin-left: 32px;
	}
	div#goto img{
		border: 0px;
	}
  </style>
 </HEAD>
 <BODY>
	<div id="menu">
		<table>
			<tr>
				<td><li><a href="sales.php" target="content">매출</a></td>
			</tr>
		</table>
	</div>
	<div id="goto">
		<a href="javascript:parent.location.href='../../index.php'"><img src="../../images/admin_images/goto_userpage_btn.png"></a>
	</div>
	<div id="date">
		<?
			echo "Login Date: ".date("Y년 m월 d일");
		?>
	</div>
 </BODY>
</HTML>
