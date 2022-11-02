<?
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/shopping_cart_design.css" type=text/css rel=stylesheet>
   <script language="javascript">
	function login(val){
		window.open("../membership/login.php?win="+val,"login_win", " scrollbars=no, resizable=no, width=400, height=200 ");
	}
    
	function search_idpw(){
		window.open("../membership/search_id_pw.php","search_win", " scrollbars=no, resizable=no, width=400, height=200 ");
	}

	function product_info(code,num){
		window.open("product_info.php?code="+code+"&num="+num,"", " scrollbars=auto, resizable=no, width=450, height=750 ");
	}



  </script>
 </HEAD>
 <?
 	if(!$_SESSION['user_id']){
		echo("<script>
				alert('로그인하셔야 합니다.');
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
					<li><a href="../membership/logout.php?win=product/shopping">로그아웃</a></li>
					<li>|</li>
					<li><a href="../membership/mem_info_change.php">회원정보수정</a></li>
				</ul>
<?
			}
			else{
?>					
			<ul>
				<li><a href="javascript:login('product/shopping')">로그인</a></li>
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
		<img id="title_image" src="../images/title_background/chocos16.jpg">
		<img id="title" src="../images/title_background/shoppingcart.png">

  		<table cellpadding=5> 
			<tr>
				<td id="table_titles" align=center height=30 colspan=2>상품명</td>
				<td id="table_titles" align=center height=30 width=100>가격</td>
				<td id="table_titles" align=center height=30 width=100>수량</td>
				<td id="table_titles" align=center height=30 width=100>배송비</td>
				<td id="table_titles" align=center height=30 width=100>주문합계</td>
				<td id="table_titles" align=center height=30 width=50>삭제</td>
			</tr>
<? 
			$records = 0;
			$total_items_num = 0;
			$total_deliverfee = 0;
			$total_bill = 0;
			$total_item_price = 0;

			if($_SESSION['user_id'] == $id){
				include("../dbconn/common.php");

				$sql = "SELECT cart_id, product_code, product_quantity, image, name, price, freedeliver_min_buyfee, deliver_fee 
											FROM shop_cart ca, product_image img, product pro, order_fee
											where ca.user_id='$id' and img.code=product_code 
											      and img.type='list' and pro.code=product_code
											ORDER BY ca.cart_id asc";
				$result = mysql_query($sql, $connect);
				$records = mysql_num_rows($result); 
				if($records < 1){
					echo("<tr><td align=center id='norecords' colspan=7 height=50>장바구니에 담긴 상품이 없습니다. </td></tr>");
				}
				else{					
					$total_price = 0;
					$total_deliverfee = 0;
					$total_payment = 0;

					$minbuyfee = mysql_result($result, 0, 6);
					$deliverfee = mysql_result($result, 0, 7);

					for($i = 0 ; $i < $records; $i++){ // records
						$cart_id = mysql_result($result, $i, 0);
						$code = mysql_result($result, $i, 1);
						$quantity = mysql_result($result, $i, 2);
						$image = mysql_result($result, $i, 3);
						$name = mysql_result($result, $i, 4);
						$price = mysql_result($result, $i, 5);

						$total_qty = $price * $quantity;
						$total_price += $total_qty;
						$deliverfee_foreach_item = $deliverfee * $quantity;
						$total_deliverfee += $deliverfee_foreach_item;
						$total_items_num += $quantity;

						echo("	
								<tr>
									<td align=center><img src='../uploaded_images/product/$image' border=0 width=100 height=80></td>
									<td>$name</br>[$code]</td>									
									<td align=center>$price</td>
									<td align=center>$quantity</td>
									<td align=center>$deliverfee_foreach_item</td>
									<td align=center>$total_qty</td>
									<td align=center><input id='btn_delete' type='button' onclick=javascript:window.location.href='remove_cart_item.php?id=$cart_id' value='삭제' style='cursor:hand'></td>
								 </tr>						 
							");
					} // end of FOR

					if($total_price > 50000){
						$total_deliverfee = 0;
					}
					$total_payment = $total_price + $total_deliverfee;
					$total_bill = $total_payment;
					$total_item_price = $total_price;

					echo("	
							<tr>								
								<td align=right height=50 colspan=7 id='billpart'>총 결제금액:	상품주문금액 <strong>$total_price</strong>원 + 배송비 <strong>$total_deliverfee</strong>원 = 총합계: <strong id='totalpayment'>$total_payment</strong>원 &nbsp</td>
							</tr>						 
						");
				} // end of ELSE
			
			}
			else{
				echo("<script>
						alert('로그인하셔야 합니다.');
						history.go(-1);
					  </script>");	
			}
	
?>
		</table>
		<div id="btns">
			<a href="shopping.php"><img src="../images/buttons/btn_shopcontinue.png" border=0></a>
<?
	if($records > 0){
?>
			<a href="javascript:document.hidden_form.submit()"><img src="../images/buttons/btn_buy2.png" border=0></a>
<?
	}
?>
		</div>

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

	<form name="hidden_form" action="order_info.php?id=<?echo $id?>" method="POST">
		<input type="hidden" name="total_items_num" value="<?echo $total_items_num?>">
		<input type="hidden" name="total_deliverfee" value="<?echo $total_deliverfee?>">
		<input type="hidden" name="total_bill" value="<?echo $total_bill?>">
		<input type="hidden" name="total_price" value="<?echo $total_item_price?>">
	</form>

	<div id="sidemenu">
		<div class="submenu_top">
			<img src="../images/background_images/submenu_top.png">
		</div>		
		<div class="sidelogo">
			<img src="../images/sidemenu_logo.png">
		</div>
		<div class="submenu">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="160" height="170" id="chocoart_sidemenu_product_shopping" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="design/chocoart_sidemenu_product_shopping.swf" />
			<param name="quality" value="high" />
			<param name="wmode" value="transparent" />
			<param name="bgcolor" value="#000000" />
			<embed src="design/chocoart_sidemenu_product_shopping.swf" quality="high" wmode="transparent" bgcolor="#000000" width="160" height="170" name="chocoart_sidemenu_product_shopping" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			</object>
		</div><!--.submenu end-->

	</div><!--#sidemenu end-->
<?
	mysql_close($connect);
?>
 </BODY>
</HTML>
