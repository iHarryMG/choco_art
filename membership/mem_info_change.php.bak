<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/mem_info_change_design.css" type="text/css" rel="stylesheet">
  <style type="text/css">
	  body{
		background-image: url("../images/background_images/background.jpg");
		background-repeat: repeat-y;
	  }
  </style>
   <script language="javascript">
			
		function login(val){
			window.open("../membership/login.php?win="+val,"login_win", " scrollbars=no, resizable=no, width=400, height=200 ");
		}

		function insertEmail() {
			var addr, addr_select;			
			addr = document.getElementById("email_addr");
			addr_select = document.getElementById("email_addr_select");
			email = document.getElementById("email");
				
			if (addr_select.value == 'write') {
				addr.disabled = false;
			} else {
				addr.disabled = true;
				addr.value = addr_select.value;
			}
		}

		function check_id(){
		    var id = document.getElementById("id");
			window.open("check_id.php?id="+id.value, "", "scrollbar=yes, resizable=no, width=300, height=200");
		}

		function check_inputs(){
			var form = document.mem_form;

			if(!form.name.value){
				alert("이름을 입력하세요!");
				form.name.focus();
				return;
			}
			if(!form.rrn.value){
				alert("주민등록번호를 입력하세요!");
				form.rrn.focus();
				return;
			}
			if(!form.id.value){
				alert("아이디를 입력하세요!");
				form.id.focus();
				return;
			}
			if(document.getElementById('id').value.length < 6){
				alert("아이디를 6자리 이상으로 입력하세요!");
				document.getElementById('id').focus();
				return;
			}
			if(!form.pw.value){
				alert("비밀번호를 입력하세요!");
				form.pw.focus();
				return;
			}
			if(form.pw.value.length < 6){
				alert("비밀번호를 6자리 이상으로 입력하세요!");
				form.pw.focus();
				return;
			}
			if(!form.pw_re.value){
				alert("비밀번호를 재입력하세요!");
				form.pw_re.focus();
				return;
			}
			if(form.pw.value != form.pw_re.value){
				alert("입력하신 비밀번호가 일치하지 않습니다.\n\n다시 입력해주세요!");
				form.pw.focus();
				return;
			}
			if(!form.email_id.value){
				alert("이메일 아이디를 입력하세요!");
				form.email_id.focus();
				return;
			}
			if(!form.phone.value){
				alert("전화번호를 입력하세요!");
				form.phone.focus();
				return;
			}
			if(!form.cell.value){
				alert("휴대폰번호를 입력하세요!");
				form.cell.focus();
				return;
			}
			if(!form.addr.value){
				alert("주소를 입력하세요!");
				form.addr.focus();
				return;
			}			
			form.submit();
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
					<li><a href="../membership/logout.php?win=index">로그아웃</a></li>
					<li>|</li>
					<li><a href="../membership/mem_info_change.php">회원정보수정</a></li>
				</ul>
<?
			}
			else{
?>					
			<ul>
				<li><a href="javascript:login('index')">로그인</a></li>
				<li>|</li>
				<li><a href="../membership/join.php">회원가입</a></li>
				<li>|</li>
				<li><a href="#">ID/PW 찾기</a></li>
			</ul>
<?
			}	
?>
		</div>
	</div><!--.header end-->
 <?
		 include("../dbconn/common.php");
		 $sql=" select * from member where id='$user_id'";
		 $result = mysql_query($sql, $connect);
		 $field= mysql_fetch_array($result)
 ?>
	<div class="content">
		<img id="title_background" src="../images/title_background/pinkrose.jpg">
		<img id="title" src="../images/title_background/chagememberinfo.png">
		<img id="title2" src="../images/title_background/join3.png">
		<h3>※ 회원 정보 수정</h3>
		<form name="mem_form" action="change_info.php" method="POST">
			<table>
				<tr>
					<td id="titles">이름</td>
					<td><input readonly="readonly" type="text" name="name" id="name" value="<?echo $field['name']?>"></td>			
				</tr>
				<tr>
					<td id="titles">주민등록번호</td>
					<td><input readonly="readonly" type="text" name="rrn" id="rrn" value="<?echo $field['rrn']?>"></td>			
				</tr>
				<tr>
					<td id="titles">아이디</td>
					<td><input readonly="readonly" type="text" name="id" id="id" value="<?echo $field['id']?>"></td>			
				</tr>
				<tr>
					<td id="titles">비밀번호</td>
					<td><input type="password" name="pw" id="pw" value="<?echo $field['pw']?>"> &nbsp 비밀번호는 6자리 이상으로 입력하세요.</td>			
				</tr>
				<tr>
					<td id="titles">비밀번호확인</td>
					<td><input type="password" name="pw_re" id="pw_re" value="<?echo $field['pw']?>"> &nbsp 비밀번호를 다시 한 번 입력해 주세요.</td>			
				</tr>
				<tr>
					<td id="titles">이메일</td>
					<td><input name="email_id" id="email_id" type="text" value="<?echo $field['email']?>">
					</td>			
				</tr>
				<tr>
					<td id="titles">전화번호</td>
					<td><input type="text" name="phone" id="phone2" maxlength="13" value="<?echo $field['tel']?>"></td>			
				</tr>
				<tr>
					<td id="titles">휴대폰번호</td>
					<td><input type="text" name="cell" id="cell2" maxlength="13" value="<?echo $field['cell']?>"></td>			
				</tr>
				<tr>
					<td id="titles">주소</td>
					<td><input type="text" name="addr" id="addr" size="70" maxlength="250" value="<?echo $field['addr']?>"></td>			
				</tr>
			</table>
			<div class="btns">
				<input type="button" onclick="javascript:check_inputs()" value="확인" style="cursor:hand">
				<input type="button" onclick="javascript:history.go(-1)" value="취소" style="cursor:hand">
			</div>
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
<?
	$user_id = $_SESSION['user_id'];

	if(!$user_id){
		echo("<script>
					alert('권한이 없습니다.');
					history.go(-1);				
				</script>");
	}
?>
