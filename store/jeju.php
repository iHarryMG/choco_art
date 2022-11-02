<?
	session_start();

	include("../dbconn/common.php");
	$sql = "select num from store_image where region='jeju' order by num asc";
	$result = mysql_query($sql, $connect);
	$record = mysql_fetch_array($result);
	$num = $record['num'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/jeju_design.css" type=text/css rel=stylesheet>
  <script language="javascript">
	function login(val){
		window.open("../membership/login.php?win="+val,"login_win", " scrollbars=no, resizable=no, width=400, height=200 ");
	}
    
	function search_idpw(){
		window.open("../membership/search_id_pw.php","search_win", " scrollbars=no, resizable=no, width=400, height=200 ");
	}
  </script>
  <script type="text/javascript" src="http://apis.daum.net/maps/maps3.js?apikey=08e5853ae044a61f44d0d9cde3d3702066674c9b" charset="utf-8"></script> 
	<script type="text/javascript"> 
	function viewstore(num){
		window.open("view_jejustore.php?num="+num,"search_win", " scrollbars=auto, resizable=no, width=450, height=450 ");
	}

	window.onload = function() {
	  var position = new daum.maps.LatLng(33.50077008539569, 126.52968471544804);
	  var map = new daum.maps.Map(document.getElementById('map'), {
		center: position,
		level: 4
	  });
	  var marker = new daum.maps.Marker({
		position: position
	  });
	  marker.setMap(map);
	  var infowindow = new daum.maps.InfoWindow({
		content: '<table id="mapcontent" align=center cellpadding=0>'+
					'<tr><td align=center><a href=javascript:viewstore(<?echo $num?>)><img src="../images/map_logo.jpg" border=0 alt="카페사진보기"></a><td></tr>'+
					'<tr><td align=center id="addr">제주특별자치도 제주시 이도2동 1176-76번지 제주쇼코아르클럽 2층</td></tr>'+
					'<tr><td align=center id="tel">Tel: 064-756-2253</td></tr>'+
				 '</table>',
		position: '33.50077008539569, 126.52968471544804'
	  });
	  infowindow.open(map, marker);
	};

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
					<li><a href="../membership/logout.php?win=store/jeju">로그아웃</a></li>
					<li>|</li>
					<li><a href="../membership/mem_info_change.php">회원정보수정</a></li>
				</ul>
<?
			}
			else{
?>					
			<ul>
				<li><a href="javascript:login('store/jeju')">로그인</a></li>
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

	<div class="mapframe">
		<img src="../images/frames/goldenframe.png">
	</div>
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
	<div class="content">
		<img id="title_background" src="../images/title_background/chocos17.jpg">
		<img id="title" src="../images/title_background/jejuchocoart.png">
		<h5>HOME > STORE > Jeju Chocoart</h5>
		<div id="map" style="width:700px;height:400px;"></div> 		
	</div>
	
	<div id="sidemenu">
		<div class="submenu_top">
			<img src="../images/background_images/submenu_top.png">
		</div>		
		<div class="sidelogo">
			<img src="../images/sidemenu_logo.png">
		</div>
		<div class="submenu">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="160" height="170" id="chocoart_sidemenu_store_jeju" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="design/chocoart_sidemenu_store_jeju.swf" />
			<param name="quality" value="high" />
			<param name="wmode" value="transparent" />
			<param name="bgcolor" value="#000000" />
			<embed src="design/chocoart_sidemenu_store_jeju.swf" quality="high" wmode="transparent" bgcolor="#000000" width="160" height="170" name="chocoart_sidemenu_store_jeju" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
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
