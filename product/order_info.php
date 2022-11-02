<?
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/order_info_design.css" type="text/css" rel="stylesheet">
   <script language="javascript">	
		function login(val){
			window.open("../membership/login.php?win="+val,"login_win", " scrollbars=no, resizable=no, width=400, height=200 ");
		}

		function check_inputs(){
			var form = document.mem_form;

			if(!form.name.value){
				alert("이름을 입력하세요!");
				form.name.focus();
				return;
			}
			if(!form.email.value){
				alert("이메일을 입력하세요!");
				form.email.focus();
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

			if(!form.deliver_name.value){
				alert("이름을 입력하세요!");
				form.deliver_name.focus();
				return;
			}
			if(!form.deliver_email.value){
				alert("이메일을 입력하세요!");
				form.deliver_email.focus();
				return;
			}
			if(!form.deliver_phone.value){
				alert("전화번호를 입력하세요!");
				form.deliver_phone.focus();
				return;
			}
			if(!form.deliver_cell.value){
				alert("휴대폰번호를 입력하세요!");
				form.deliver_cell.focus();
				return;
			}
			if(!form.deliver_addr.value){
				alert("주소를 입력하세요!");
				form.deliver_addr.focus();
				return;
			}

			form.target ="_hiddenFrame";
			form.submit();
		}

		function makesameinfo(isChecked){
			if(isChecked){
				var form = document.mem_form;
				form.deliver_name.value = form.name.value;
				form.deliver_email.value = form.email.value;
				form.deliver_phone.value = form.phone.value;
				form.deliver_cell.value = form.cell.value;
				form.deliver_addr.value = form.addr.value;
			}
		}
  </script>
 </HEAD>
 <?
	$user_id = $_SESSION['user_id'];

	if($user_id != $id){
		echo("<script>
					alert('권한이 없습니다.');
					history.go(-1);				
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
		<img id="title_background" src="../images/title_background/chocos16.jpg">
		<img id="title" src="../images/title_background/orderinformation.png">
		<img id="title2" src="../images/title_background/join3.png">

		<form name="mem_form" action="save_temp_orderinfo.php" method="POST">
			<h3 id="orderer_info">1. 주문자 정보 확인</h3>
			<table>
				<tr>
					<td id="titles">이름</td>
					<td><input type="text" name="name" id="name" value="<?echo $field['name']?>"></td>			
				</tr>
				<tr>
					<td id="titles">이메일</td>
					<td><input type="text" name="email" id="email" value="<?echo $field['email']?>"></td>			
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
					<td><input type="text" name="addr" id="addr" size="70" maxlength="254" value="<?echo $field['addr']?>"></td>			
				</tr>
			</table>
			<h3 id="deliver_info">2. 배송지 확인</h3>
			<table>
				<tr>
					<td id="titles">이름</td>
					<td><input type="text" name="deliver_name"> &nbsp <input type="checkbox" id="sameinfo" name="sameinfo" onClick="makesameinfo(this.checked)"> - 주문자 정보와 동일</td>			
				</tr>
				<tr>
					<td id="titles">이메일</td>
					<td><input type="text" name="deliver_email"></td>			
				</tr>
				<tr>
					<td id="titles">전화번호</td>
					<td><input type="text" name="deliver_phone" maxlength="13"></td>			
				</tr>
				<tr>
					<td id="titles">휴대폰번호</td>
					<td><input type="text" name="deliver_cell" maxlength="13"></td>			
				</tr>
				<tr>
					<td id="titles">주소</td>
					<td><input type="text" name="deliver_addr" size="70" maxlength="254"></td>			
				</tr>
			</table>
			<h3 id="deliver_info">3. 결제 확인</h3>
			<table cellpadding=5>
				<tr>
					<td id="titles" rowspan=4>결제금액</td>
<?
				$total_items_num = $_POST['total_items_num'];
				$total_deliverfee =  $_POST['total_deliverfee'];

				$total_bill =  $_POST['total_bill'];
				$total_price =  $_POST['total_price'];
?>
					<input type="hidden" name="totalbillinfo" value="<?echo $total_bill?>">
					<input type="hidden" name="totaldeliverfee" value="<?echo $total_deliverfee?>">

					<td>주문상품 총갯수: <?echo $total_items_num?></td>
				</tr>
				<tr>
					<td>주문상품 금액합계: <?echo $total_price?></td>
				</tr>
				<tr>
					<td>배송비합계: <?echo $total_deliverfee?></td>
				</tr>
				<tr>
					<td id="totalbill">총 합계금액: <?echo $total_bill?></td>
				</tr>
			</table>
			<h3 id="deliver_info">4. 결제수단 선택</h3>
			<table cellpadding=5>
				<tr>
					<td id="titles">결제수단:</td>
					<td>
						   &nbsp <input type="radio" name="payment_method" value="신용카드" checked> 신용카드
						   &nbsp <input type="radio" name="payment_method" value="가상계좌입금"> 무통장 입금
					</td>
				</tr>
			</table>
<?
			 $sql=" select delivery_policy, return_policy from terms_policy";
			 $result = mysql_query($sql, $connect);
			 $field= mysql_fetch_array($result)
?>
			<h3 id="deliver_info">배송안내</h3>
			<table cellpadding=5 id="agreements">
				<tr>
					<td><textarea cols=70 rows=7><?echo $field['delivery_policy']?></textarea></td>
				</tr>
			</table>
			<h3 id="deliver_info">교환 및 반품정보</h3>
			<table cellpadding=5 id="agreements">
				<tr>
					<td><textarea cols=70 rows=10><?echo $field['return_policy']?></textarea></td>
				</tr>
			</table>

			<div class="btns">
				<a href="javascript:history.go(-1)"><img src="../images/buttons/btn_goback.png" border=0></a>
				<a href="javascript:check_inputs()"><img src="../images/buttons/btn_order.png" border=0></a>
			</div>
		</form>
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

	</div>
	<div id="sidemenu">
		<div class="submenu_top">
			<img src="../images/background_images/submenu_top.png">
		</div>		
		<div class="sidelogo">
			<img src="../images/sidemenu_logo.png">
		</div>

	</div><!--#sidemenu end-->
	
<iframe id="_hiddenFrame" name="_hiddenFrame" style="display:none;width:0px;height:0px;" align=center border="0"></iframe>
<?
	mysql_close($connect);
?>
 </BODY>
</HTML>

