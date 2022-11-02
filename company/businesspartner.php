<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/businesspartner_design.css" type=text/css rel=stylesheet>
   <script language="javascript">
	function login(val){
		window.open("../membership/login.php?win="+val,"login_win", " scrollbars=no, resizable=no, width=400, height=200 ");
	}
    
	function search_idpw(){
		window.open("../membership/search_id_pw.php","search_win", " scrollbars=no, resizable=no, width=400, height=200 ");
	}
  </script>
 </HEAD>
 <BODY>
	<div class="header">
		<div id="headermenu">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="1280" height="200" id="chocoart_headermenu" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="design/chocoart_headermenu.swf" />
			<param name="quality" value="high" />
			<param name="wmode" value="transparent" />
			<param name="bgcolor" value="#ffffff" />
			<embed src="design/chocoart_headermenu.swf" quality="high" wmode="transparent" bgcolor="#ffffff" width="1280" height="200" name="chocoart_headermenu" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			</object>
		</div>
		<div id="loginmenu">
<?
			if($_SESSION['user_id']){
?>
				<ul>
					<li><a href="../membership/logout.php?win=company/businesspartner">로그아웃</a></li>
					<li>|</li>
					<li><a href="../membership/mem_info_change.php">회원정보수정</a></li>
				</ul>
<?
			}
			else{
?>					
			<ul>
				<li><a href="javascript:login('company/businesspartner')">로그인</a></li>
				<li>|</li>
				<li><a href="../membership/join.php">회원가입</a></li>
				<li>|</li>
				<li><a href="javascript:search_idpw()">ID/PW 찾기</a></li>
			</ul>
<?
			}	
?>
		</div>
	</div><!--.header end-->
	<div class="title_script">
		<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="300" height="100" id="chocoart_title_script_slide" align="middle">
		<param name="allowScriptAccess" value="sameDomain" />
		<param name="movie" value="design/chocoart_title_script_slide.swf" />
		<param name="quality" value="high" />
		<param name="wmode" value="transparent" />
		<param name="bgcolor" value="#000000" />
		<embed src="design/chocoart_title_script_slide.swf" quality="high" wmode="transparent" bgcolor="#000000" width="300" height="100" name="chocoart_title_script_slide" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
		</object>		
	</div>
	<div id="urltable">
		<table>
			<tr>
				<td align=center width=330><a href="http://www.iccjeju.co.kr" target="_blank">www.iccjeju.co.kr</a></td>
				<td align=center width=330><a href="http://www.jers.kr" target="_blank">www.jers.kr</a></td>
			</tr>
			<tr>
				<td height=120></td>
				<td height=120></td>
			</tr>
			<tr>
				<td align=center width=330><a href="http://www.jejuloveland.com" target="_blank">www.jejuloveland.com</a></td>
				<td align=center width=330><a href="http://www.hallahosp.co.kr" target="_blank">www.hallahosp.co.kr</a></td>
			</tr>
			<tr>
				<td height=120></td>
				<td height=120></td>
			</tr>
			<tr>
				<td align=center width=330><a href="http://www.halla-c.ac.kr" target="_blank">www.halla-c.ac.kr</a></td>
				<td align=center width=330></td>
			</tr>
			<tr>
				<td height=170></td>
				<td height=170></td>
			</tr>
			<tr>
				<td align=center width=330><a href="http://www.galleria.co.kr" target="_blank">www.galleria.co.kr</a></td>
				<td align=center width=330><a href="http://www.ehyundai.com" target="_blank">www.ehyundai.com</a></td>
			</tr>
			<tr>
				<td height=115></td>
				<td height=115></td>
			</tr>
			<tr>
				<td align=center width=330></td>
				<td align=center width=330><a href="http://www.shinsegae.com" target="_blank">www.shinsegae.com</a></td>
			</tr>
			<tr>
				<td height=118></td>
				<td height=118></td>
			</tr>
			<tr>
				<td align=center width=330><a href="http://www.lotteshopping.com" target="_blank">www.lotteshopping.com</a></td>
				<td align=center width=330></td>
			</tr>
			<tr>
				<td height=160></td>
				<td height=160></td>
			</tr>
			<tr>
				<td align=center width=330><a href="http://www.ehyundai.com" target="_blank">www.ehyundai.com</a></td>
				<td align=center width=330></td>
			</tr>
		</table>
	</div>
	<div class="content">
		<img id="title_background" src="../images/title_background/chocos10.jpg">
		<img id="title" src="../images/title_background/businesspartner.png">
		<h5>HOME > ABOUT US > Business Partner</h5>
		<img id="businesspartner_content" src="../images/menu_images/businesspartner.gif">
	</div>
	<div id="sidemenu">
		<div class="submenu_top">
			<img src="../images/background_images/submenu_top.png">
		</div>		
		<div class="sidelogo">
			<img src="../images/sidemenu_logo.png">
		</div>
		<div class="submenu">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="160" height="200" id="chocoart_sidemenu_aboutus_businesspartner" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="design/chocoart_sidemenu_aboutus_businesspartner.swf" />
			<param name="quality" value="high" />
			<param name="wmode" value="transparent" />
			<param name="bgcolor" value="#663300" />
			<embed src="design/chocoart_sidemenu_aboutus_businesspartner.swf" quality="high" wmode="transparent" bgcolor="#663300" width="160" height="200" name="chocoart_sidemenu_aboutus_businesspartner" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			</object>
		</div><!--.submenu end-->

	</div><!--#sidemenu end-->
	<div id="footermenu" align=center>
		<ul>
			<li><a href="../company/businesspartner.php">Business Partner</a></li>
			<li>|</li>
			<li><a href="http://www.chu.ac.kr/department/DPDM01/" target="_blank">Chocolate School</a></li>
			<li>|</li>
			<li><a href="../product/shopping.php">Chocolate Store</a></li>
			<li>|</li>
			<li><a href="../store/jeju.php">Store Location</a></li>
		</ul>
		<div id="disclaimer">
			<img src="../images/disclaimer2.png">
		</div>
	</div>
 </BODY>
</HTML>
