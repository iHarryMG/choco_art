<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="./main/design/maindesign.css" type=text/css rel=stylesheet>
  <script language="javascript">
	function login(val){
		window.open("../chocoart/membership/login.php?win="+val,"login_win", " scrollbars=no, resizable=no, width=400, height=200 ");
	}
    
	function search_idpw(){
		window.open("../chocoart/membership/search_id_pw.php","search_win", " scrollbars=no, resizable=no, width=400, height=200 ");
	}
  </script>
 </HEAD>
 <BODY>
	<div id="bodywrap">
				
		 <div class="main">				
				<div id="backgroundslideshow">
					<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="1280" height="800" id="chocoart_mainpage_backgroundslideshow" align="middle">
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="movie" value="./main/design/chocoart_mainpage_backgroundslideshow.swf" />
					<param name="quality" value="high" />
					<param name="wmode" value="transparent" />
					<param name="bgcolor" value="#000000" />
					<embed src="./main/design/chocoart_mainpage_backgroundslideshow.swf" quality="high" wmode="transparent" bgcolor="#000000" width="1280" height="800" name="chocoart_mainpage_backgroundslideshow" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
					</object>
				</div>
				<div id="headermenu">
<?
					if($_SESSION['user_id']){
?>
						<ul>
							<li><a href="../chocoart/membership/mem_info_change.php">회원정보수정</a></li>
							<li>|</li>
							<li><a href="../chocoart/membership/logout.php?win=index">로그아웃</a></li>
						</ul>
<?
}
					else{
?>					
					<ul>
						<li><a href="javascript:search_idpw()">ID/PW 찾기</a></li>
						<li>|</li>
						<li><a href="../chocoart/membership/join.php">회원가입</a></li>
						<li>|</li>
						<li><a href="javascript:login('index')">로그인</a></li>
					</ul>
<?
					}	
?>
				</div>
				<div id="logoscript">
					<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="450" height="250" id="chocoart_mainpage_logo_handwriting" align="middle">
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="movie" value="./main/design/chocoart_mainpage_logo_handwriting.swf" />
					<param name="quality" value="high" />
					<param name="wmode" value="transparent" />
					<param name="bgcolor" value="#000000" />
					<embed src="./main/design/chocoart_mainpage_logo_handwriting.swf" quality="high" wmode="transparent" bgcolor="#000000" width="450" height="250" name="chocoart_mainpage_logo_handwriting" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
					</object>
				</div>
<?
				include("../chocoart/dbconn/common.php");
				$sql = "SELECT notice_id, title FROM notice ORDER BY notice_id desc";
				$result = mysql_query($sql, $connect);
				$records = mysql_num_rows($result); 

				if($records <= 4){
					$limit = $records;
				}
				else{
					$limit = 4;
				}
?>
				<div id="eventsnotice">
<?
				if($records > 0){
?>
					<h3>Notice</h3>
<?
				}	
?>
					<ul>
<?
					$count = 1;
					while($values=mysql_fetch_array($result)){
?>						
						<li><a href="../chocoart/board/notice.php" target="_self"><strong><?echo $values['title'];?></strong></a></li>
<?					
						$count++;
						if($count > 4){
							break;
						}
					}
?>
					</ul>
				</div>
				<div id="jejuscript">
					<img src="./images/OnlyInJejuIsland.png">
				</div>
				<div id="footermenu">
					<ul>
						<li><a href="./company/businesspartner.php">Business Partner</a></li>
						<li>|</li>
						<li><a href="http://www.chu.ac.kr/department/DPDM01/">Chocolate School</a></li>
						<li>|</li>
						<li><a href="./product/shopping.php">Chocolate Store</a></li>
						<li>|</li>
						<li><a href="./store/jeju.php">Store Location</a></li>
					</ul>
				</div>
				<div id="disclaimer">
					<img src="./images/disclaimer.png">
				</div>
				<div id="jejuslideshow">
					<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="300" height="100" id="chocoart_mainpage_jejuslideshow2" align="middle">
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="movie" value="./main/design/chocoart_mainpage_jejuslideshow2.swf" />
					<param name="quality" value="high" />
					<param name="wmode" value="transparent" />
					<param name="bgcolor" value="#ffffff" />
					<embed src="./main/design/chocoart_mainpage_jejuslideshow2.swf" quality="high" wmode="transparent" bgcolor="#ffffff" width="300" height="100" name="chocoart_mainpage_jejuslideshow2" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
					</object>
				</div>
		 </div>	
		 <div class="menu">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="200" height="800" id="chocoart_mainpage_menu" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="./main/design/chocoart_mainpage_menu.swf" />
			<param name="quality" value="high" />
			<param name="wmode" value="transparent" />
			<param name="bgcolor" value="#000000" />
			<embed src="./main/design/chocoart_mainpage_menu.swf" quality="high" wmode="transparent" bgcolor="#000000" width="200" height="800" name="chocoart_mainpage_menu" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			</object>
		 </div>
	</div>
 </BODY>
</HTML>
