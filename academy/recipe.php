<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<head>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<LINK href="design/recipe_design.css" type=text/css rel=stylesheet>
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
					<li><a href="../membership/logout.php?win=academy/recipe">로그아웃</a></li>
					<li>|</li>
					<li><a href="../membership/mem_info_change.php">회원정보수정</a></li>
				</ul>
<?
			}
			else{
?>					
			<ul>
				<li><a href="javascript:login('academy/recipe')">로그인</a></li>
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
	<div class="content">
		<img id="title_background" src="../images/title_background/chocos5.jpg">
		<img id="title" src="../images/title_background/recipe.png">
		<h5>HOME >ACADEMY > Chocolate Recipe</h5>
		<table cellpadding=30>
<?		
				$present_page_no = $_REQUEST['page'];
				$total_page_no = $_REQUEST['total'];
				$request_page_id = $_REQUEST['page_id'];

				include("../dbconn/common.php");

				$image_path = "../uploaded_images/recipe/";

				if($total_page_no > 1){
					$sql = "SELECT * FROM recipe where id = $request_page_id";
				}
				else{
					$present_page_no = 1;
					$sql = "SELECT * FROM recipe";
				}

				$result = mysql_query($sql, $connect);
				$records = mysql_num_rows($result); 
				
				if($records < 1){
					echo("<tr><td colspan=6 align=center id='norecords'>등록된 내용 없습니다.</td></tr>");
				}
				else{					
					if($total_page_no > 1){
						$records = $total_page_no;
					}
					else{
						$total_page_no = $records;
					}

					$title = mysql_result($result, 0, 1);
					$content = mysql_result($result, 0, 2);
					$image = mysql_result($result, 0, 3);
?>
						<tr><td align=center id='image' rowspan=2><img src='../uploaded_images/recipe/<? echo $image; ?>' width='300' height='300'></td><td align=center id='title'><? echo $title; ?><hr></td></tr>
						<tr><td id='content'><? echo nl2br($content); ?></td></tr>
						<tr>
							<td align=center id='page_number' colspan=2>
<?					
							$sql = "SELECT id FROM recipe";
							$total_page_result = mysql_query($sql, $connect);
							$total_pages = mysql_num_rows($total_page_result); 

							for($i=1; $i <= $total_pages; $i++){ // page number
								$id = mysql_result($total_page_result, $i-1, 0);

								if($i == $present_page_no){
									echo("&nbsp&nbsp<strong>$i</strong>&nbsp&nbsp");
								}
								else{
									echo("&nbsp&nbsp<a href='$PHP_SELF?page=$i&page_id=$id&total=$total_pages'>[$i]</a>&nbsp&nbsp");
								}
							}
				}
?>
							</td>
						</tr>

		</table>
	</div>
	<div id="sidemenu">
		<div class="submenu_top">
			<img src="../images/background_images/submenu_top.png">
		</div>		
		<div class="sidelogo">
			<img src="../images/sidemenu_logo.png">
		</div>
		<div class="submenu">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="160" height="170" id="chocoart_sidemenu_academy_recipe" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="design/chocoart_sidemenu_academy_recipe.swf" />
			<param name="quality" value="high" />
			<param name="wmode" value="transparent" />
			<param name="bgcolor" value="#000000" />
			<embed src="design/chocoart_sidemenu_academy_recipe.swf" quality="high" wmode="transparent" bgcolor="#000000" width="160" height="170" name="chocoart_sidemenu_academy_recipe" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
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
</HTML>
