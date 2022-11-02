<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/mem_info_design.css" type="text/css" rel="stylesheet">
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

			if(document.getElementById('name').value == ""){
				alert("이름을 입력하세요!");
				document.getElementById('name').focus();
				return;
			}
			if(form.rrn1.value == ""){
				alert("주민번호를 입력하세요!");
				form.rrn1.focus();
				return;
			}
			if(form.rrn2.value == ""){
				alert("주민번호를 입력하세요!");
				form.rrn2.focus();
				return;
			}
			if((form.rrn1.value.length < 6) || (form.rrn2.value.length < 7)){
				alert("잘못된 주민번호 입니다!");
				form.rrn1.focus();
				return;
			}
			if(document.getElementById('id').value == ""){
				alert("아이디를 입력하세요!");
				document.getElementById('id').focus();
				return;
			}
			if(document.getElementById('id').value.length < 6){
				alert("아이디를 6자리 이상으로 입력하세요!");
				document.getElementById('id').focus();
				return;
			}
			if(document.getElementById('pw').value == ""){
				alert("비밀번호를 입력하세요!");
				document.getElementById('pw').focus();
				return;
			}
			if(form.pw.value.length < 6){
				alert("비밀번호를 6자리 이상으로 입력하세요!");
				form.pw.focus();
				return;
			}
			if(document.getElementById('pw_re').value == ""){
				alert("비밀번호를 재입력하세요!");
				document.getElementById('pw_re').focus();
				return;
			}
			if(document.getElementById('pw').value != document.getElementById('pw_re').value){
				alert("입력하신 비밀번호가 일치하지 않습니다.\n\n다시 입력해주세요!");
				document.getElementById('pw').focus();
				return;
			}
			if(document.getElementById('email_id').value == ""){
				alert("이메일 아이디를 입력하세요!");
				document.getElementById('email_id').focus();
				return;
			}			
			if(document.getElementById('email_addr').value == ""){
				alert("이메일주소를 입력하세요!");
				document.getElementById('email_addr').focus();
				return;
			}
			if((document.getElementById('phone2').value == "") && (document.getElementById('phone3').value == "")){
				alert("전화번호를 입력하세요!");
				document.getElementById('phone2').focus();
				return;
			}
			if((document.getElementById('cell2').value == "") && (document.getElementById('cell3').value == "")){
				alert("휴대폰번호를 입력하세요!");
				document.getElementById('cell2').focus();
				return;
			}
			if(document.getElementById('addr').value == ""){
				alert("주소를 입력하세요!");
				document.getElementById('addr').focus();
				return;
			}	
			if(form.idcheck.value == "no"){
				alert("아이디 중복 확인하세요!");
				return;
			}
			form.submit();
		}
  </script>
 </HEAD>
<?
	$agreement = $_POST['agree'];

	if($agreement != 1){
		echo("<script>alert('약관에 동의하셔야 가입하실 수 있습니다.'); 
				location.replace('../membership/join.php');
			</script>");
	}
?>
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
				<li><a href="#">ID/PW 찾기</a></li>
			</ul>
<?
			}	
?>
		</div>
	</div><!--.header end-->
 <?
		 include("../dbconn/common.php");
		 $sql=" select service_terms, privacy_policy from terms_policy";
		 $result = mysql_query($sql, $connect);
		 $contents= mysql_fetch_array($result)
 ?>
	<div class="content">
		<img id="title_background" src="../images/title_background/pinkrose.jpg">
		<img id="title" src="../images/title_background/join1.png">
		<img id="title2" src="../images/title_background/join3.png">
		<h3>※ 개인 정보 입력</h3>		
		<form name="mem_form" action="register_member.php" method="POST">
		<input type="hidden" name="class" value="일반">
			<table>
				<tr>
					<td id="titles">이름</td>
					<td><input type="text" name="name" id="name" ></td>			
				</tr>
				<tr>
					<td id="titles">주민등록번호</td>
					<td><input type="text" name="rrn1" id="rrn1" maxlength=6>-<input type="text" name="rrn2" name="rrn2" maxlength=7></td>			
				</tr>
				<input type="hidden" name="idcheck" value="no">
				<tr>
					<td id="titles">아이디</td>
					<td><input type="text" name="id" id="id">&nbsp<input type="button" name="check_id_btn" onclick="javascript:check_id()" id="check_id_btn" value="아이디 중복확인" style="cursor:hand"> &nbsp 아이디 중복 확인하세요.</td>
				</tr>
				<tr>
					<td id="titles">비밀번호</td>
					<td><input type="password" name="pw" id="pw"> &nbsp 비밀번호는 6자리 이상으로 입력하세요.</td>			
				</tr>
				<tr>
					<td id="titles">비밀번호확인</td>
					<td><input type="password" name="pw_re" id="pw_re"> &nbsp 비밀번호를 다시 한 번 입력해 주세요.</td>			
				</tr>
				<tr>
					<td id="titles">이메일</td>
					<td><input name="email_id" id="email_id" type="text" onblur="insertEmail()"> @ 
						<input name="email_addr" id="email_addr" type="text" disabled> 
						<select name="email_addr_select" id="email_addr_select" onchange="insertEmail()">
							<option selected>-선택하세요-</option>
							<option value="dreamwiz.com" >dreamwiz.com</option>
							<option value="naver.com" >naver.com</option>
							<option value="korea.com" >korea.com</option>
							<option value="nate.com" >nate.com</option>
							<option value="lycos.co.kr" >lycos.co.kr</option>
							<option value="yahoo.co.kr" >yahoo.co.kr</option>
							<option value="netian.com" >netian.com</option>
							<option value="empal.com" >empal.com</option>
							<option value="hanmir.com" >hanmir.com</option>
							<option value="hotmail.com" >hotmail.com</option>
							<option value="chollian.net" >chollian.net</option>
							<option value="write">직접입력</option>
						</select>
					</td>			
				</tr>
				<tr>
					<td id="titles">전화번호</td>
					<td><select name="phone1" id="phone1">
							<option value="02">02</option>
							<option value="032">032</option>
							<option value="033">033</option>
							<option value="041">041</option>
							<option value="042">042</option>
							<option value="043">043</option>
							<option value="051">051</option>
							<option value="052">052</option>
							<option value="053">053</option>
							<option value="054">054</option>
							<option value="055">055</option>
							<option value="061">061</option>
							<option value="062">062</option>
							<option value="063">063</option>
							<option value="064">064</option>
						</select>
						-<input type="text" name="phone2" id="phone2" size="4" maxlength="4">
						-<input type="text" name="phone3" id="phone3" size="4" maxlength="4">
					</td>			
				</tr>
				<tr>
					<td id="titles">휴대폰번호</td>
					<td><select name="cell1" id="cell1">
							<option value="010">010</option>
							<option value="011">011</option>
							<option value="016">016</option>
							<option value="017">017</option>
							<option value="018">018</option>
							<option value="019">019</option>
						</select>
						-<input type="text" name="cell2" id="cell2" size="4" maxlength="4">
						-<input type="text" name="cell3" id="cell3" size="4" maxlength="4">
					</td>			
				</tr>
				<tr>
					<td id="titles">주소</td>
					<td><input type="text" name="addr" id="addr" size="70" maxlength="250"></td>			
				</tr>
			</table>
			<div class="btns">
				<input type="button" onclick="javascript:check_inputs()" value="확인" style="cursor:hand">
				<input type="button" onclick="javascript:window.location.href='../index.php'" value="취소" style="cursor:hand">
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
