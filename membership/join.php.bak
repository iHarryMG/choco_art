<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/join_design.css" type="text/css" rel="stylesheet">
  <script language="javascript">
		function join(){
		window.open("../membership/join.php","join_win", " scrollbars=yes, resizable=no, width=700, height=500 ");
		}

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
					<li><a href="../membership/logout.php?win=board/freeboard">로그아웃</a></li>
					<li>|</li>
					<li><a href="../membership/mem_info_change.php">회원정보수정</a></li>
				</ul>
<?
			}
			else{
?>					
			<ul>
				<li><a href="javascript:login('board/freeboard')">로그인</a></li>
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
	<div class="content">
		<img id="title_background" src="../images/title_background/pinkrose.jpg">
		<img id="title" src="../images/title_background/join1.png">
		<img id="title2" src="../images/title_background/join2.png">
 <?
		 include("../dbconn/common.php");
		 $sql=" select service_terms, privacy_policy from terms_policy";
		 $result = mysql_query($sql, $connect);
		 $contents= mysql_fetch_array($result)
 ?>
		<form name="agree_form" action="mem_info.php" method="POST">

				  <h3>※ 이용약관</h3>
				  <textarea name="terms" cols=75 rows=15 readonly="readonly">
				<?
					echo $contents['service_terms'];
				?>
				  </textarea></br>
				 <h3>※ 개인정보 보호정책</h3>
				  <textarea name="policy" cols=75 rows=15 readonly="readonly">
				<?
					echo $contents['privacy_policy'];
				?>
				  </textarea></br>
	
			<div class="agree_btns">
				  <input type="radio" name="agree" value=1 >약관에 동의
				  <input type="radio" name="agree" value=2 checked >동의 하지 않음</br>
			</div>
			<div class="btns">
				  <input type="submit" value="확인" style="cursor:hand">
				  <input type="button" onclick="javascript:history.go(-1)" value="취소" style="cursor:hand">
			</div>
 <?
		mysql_close($connect);
 ?>
		  </form>
	</div>
	<div id="sidemenu">
		<div class="submenu_top">
			<img src="../images/background_images/submenu_top.png">
		</div>		
		<div class="sidelogo">
			<img src="../images/sidemenu_logo.png">
		</div>
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

