<?
	session_start();
	$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/shopping_design.css" type=text/css rel=stylesheet>
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
    
	function search_idpw(){
		window.open("../membership/search_id_pw.php","search_win", " scrollbars=no, resizable=no, width=400, height=200 ");
	}

	function product_info(code,num){
		window.open("product_info.php?code="+code+"&num="+num,"", " scrollbars=auto, resizable=no, width=450, height=750 ");
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
		<img id="title" src="../images/title_background/shopping.png">
		<h5>HOME > PRODUCT > Shopping</h5>

  		<table> 
			<tr id="tab_menu">
<?
				if($lt == "compound"){
					$pstyle = "style='color:#9bbb58'";
				}
				if($lt == "pure"){
					$cstyle = "style='color:#9bbb58'";
				}
				if($lt == ""){
					$cstyle = "style='color:#9bbb58'";
					$lt = "pure";
				}
?>
				<td></td><td align='right' colspan=3><a href="shopping.php?lt=pure" <?echo $pstyle?>>*Pure Chocolate&nbsp</a>&nbsp<a href="shopping.php?lt=compound" <?echo $cstyle?>> *Compound Chocolate</a></td>
			</tr>
			<tr>
				<td id=space height=40 colspan=3></td>
			</tr>	
<? 
			include("../dbconn/common.php");

			$pageMaxRowNumber = 10;
			$presentPageNumber = $page;
			$totalPageNumber = $totalPage;
			$startIndex = $next;
			$nextRecord_skipPage = 0; // page1=0; page2=10; page3=20 ...

			if((1 < $presentPageNumber) && ($presentPageNumber < $totalPageNumber)){ // MiddlePages
				
				$nextRecord = $next;

				$anotherPageSql = "SELECT code, name, price,description FROM product where category='$lt' and state='onsale' ORDER BY num asc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < ($next + $pageMaxRowNumber); $i++){ // records
						$code = mysql_result($anotherPageResult, $i, 0);
						$name = mysql_result($anotherPageResult, $i, 1);
						$price = mysql_result($anotherPageResult, $i, 2);
						$description = mysql_result($anotherPageResult, $i, 3);

						$imageSql = "SELECT image FROM product_image where code='$code' and type='list'";
						$imageResult = mysql_query($imageSql, $connect);
						$imageRecord =  mysql_fetch_array($imageResult);
						$image = $imageRecord['image'];

						$imageNumSql = "SELECT num FROM product_image where code='$code' and type='zoom'";
						$imageNumResult = mysql_query($imageNumSql, $connect);
						$imageNumRecord =  mysql_fetch_array($imageNumResult);
						$imageNum = $imageNumRecord['num'];

						echo("	
								<tr>
									<td align=center rowspan=3 id='product_img'><a href=javascript:product_info('$code','$imageNum')><img src='../uploaded_images/product/$image' width='200' height='150' border=0></a></td>
								    <td align=center colspan=3 id='product_name'>$name</td>
								 </tr>
								 <tr>
								    <td align=center colspan=3 id='product_description'>$description</td>
								 </tr>
								 <tr>
								    <td align=center id='product_price'>판매가격: <strong>$price 원</strong></td>
									<td id='product_buy' align=center><a href='product_sell.php?code=$code'><img src='../images/buttons/btn_buy.png' border=0></a><a href='product_sell.php?code=$code'></td>
									<td id='product_addcart' align=center><a href='product_addtocart.php?code=$code'><img src='../images/buttons/btn_addcart.png' border=0></a></td>
								 </tr>
								 <tr>
								    <td id=space height=40 colspan=3></td>
								 </tr>								 
							");
					$recordNumber--;
					$nextRecord += 1;
				}
				echo("<tr>
						<td colspan=10 align=center id='page_number'>");

					$previousPage = $presentPageNumber - 1;
					$nextRecord_previousPage = $next - $pageMaxRowNumber;
					echo("&nbsp<a href='$PHP_SELF?page=$previousPage&totalPage=$totalPageNumber&next=$nextRecord_previousPage'>[이전]</a>");

					for($i=1; $i <= $totalPageNumber; $i++){ // page number

						if($i == $presentPageNumber){
							echo("&nbsp<strong>$i</strong>&nbsp");
						}
						else{
							echo("&nbsp<a href='$PHP_SELF?page=$i&totalPage=$totalPageNumber&next=$nextRecord_skipPage'>[$i]</a>&nbsp");
						}
						$nextRecord_skipPage = $nextRecord_skipPage + $pageMaxRowNumber;  // page1=0; page2=10; page3=20 ...
					}
					$nextPage = $presentPageNumber + 1;
					echo("&nbsp<a href='$PHP_SELF?page=$nextPage&totalPage=$totalPageNumber&next=$nextRecord' >[다음]</a>");

				echo("	</td>
					  </tr>");
			}
			else if(($presentPageNumber == $totalPageNumber) && ($presentPageNumber != 0)){ // LastPage

				$anotherPageSql = "SELECT code, name, price,description FROM product where category='$lt' and state='onsale' ORDER BY num asc";
				$anotherPageResult = mysql_query($anotherPageSql, $connect);
				$anotherPageRecords = mysql_num_rows($anotherPageResult);
				
				$recordNumber = $anotherPageRecords - $next; // 행 번호
				
				for($i=$startIndex ; $i < $anotherPageRecords; $i++){ // records
						$code = mysql_result($anotherPageResult, $i, 0);
						$name = mysql_result($anotherPageResult, $i, 1);
						$price = mysql_result($anotherPageResult, $i, 2);
						$description = mysql_result($anotherPageResult, $i, 3);

						$imageSql = "SELECT image FROM product_image where code='$code' and type='list'";
						$imageResult = mysql_query($imageSql, $connect);
						$imageRecord =  mysql_fetch_array($imageResult);
						$image = $imageRecord['image'];

						$imageNumSql = "SELECT num FROM product_image where code='$code' and type='zoom'";
						$imageNumResult = mysql_query($imageNumSql, $connect);
						$imageNumRecord =  mysql_fetch_array($imageNumResult);
						$imageNum = $imageNumRecord['num'];

						echo("	
								<tr>
									<td align=center rowspan=3 id='product_img'><a href=javascript:product_info('$code','$imageNum')><img src='../uploaded_images/product/$image' width='200' height='150' border=0></a></td>
								    <td align=center colspan=3 id='product_name'>$name</td>
								 </tr>
								 <tr>
								    <td align=center colspan=3 id='product_description'>$description</td>
								 </tr>
								 <tr>
								    <td align=center id='product_price'>판매가격: <strong>$price 원</strong></td>
									<td id='product_buy' align=center><a href='product_sell.php?code=$code'><img src='../images/buttons/btn_buy.png' border=0></a><a href='product_sell.php?code=$code'></td>
									<td id='product_addcart' align=center><a href='product_addtocart.php?code=$code'><img src='../images/buttons/btn_addcart.png' border=0></a></td>
								 </tr>
								 <tr>
								    <td id=space height=40 colspan=3></td>
								 </tr>								 
							");
					$recordNumber--;
				}

				echo("<tr>
						<td colspan=10 align=center id='page_number'>");

					$previousPage = $presentPageNumber - 1;
					$nextRecord_previousPage = $next - $pageMaxRowNumber;
					echo("<a href='$PHP_SELF?page=$previousPage&totalPage=$totalPageNumber&next=$nextRecord_previousPage'>[이전]</a>&nbsp");

					for($i=1; $i <= $totalPageNumber; $i++){ // page number

						if($i == $presentPageNumber){
							echo("&nbsp<strong>$i</strong>&nbsp");
						}
						else{
							echo("&nbsp<a href='$PHP_SELF?page=$i&totalPage=$totalPageNumber&next=$nextRecord_skipPage'>[$i]</a>&nbsp");
						}
						$nextRecord_skipPage = $nextRecord_skipPage + $pageMaxRowNumber;  // page1=0; page2=10; page3=20 ...
					}

				echo("	</td>
					  </tr>");
			}
			else{ // FirstPage
				$nextRecord = 0;
				$sql = "SELECT * FROM product where category='$lt' and state='onsale' ORDER BY num desc";
				$result = mysql_query($sql, $connect);
				$records = mysql_num_rows($result); 
				
				if($records < 1){
					echo("<tr><td align=center id='norecords' height='200'>등록된 내용 없습니다.</td></tr>");
				}
				else{
					$presentPageNumber = 1;
					$totalPageNumber = ceil($records / $pageMaxRowNumber);
										
					$firstPageSql = "SELECT code, name, price,description FROM product where category='$lt' and state='onsale' ORDER BY num asc";
					$firstPageResult = mysql_query($firstPageSql, $connect);
					$firstPageRecords = mysql_num_rows($firstPageResult);  
					
					$recordNumber = $records; // 행 번호
					
					for($i=$startIndex ; $i < $firstPageRecords; $i++){ // records
						$code = mysql_result($firstPageResult, $i, 0);
						$name = mysql_result($firstPageResult, $i, 1);
						$price = mysql_result($firstPageResult, $i, 2);
						$description = mysql_result($firstPageResult, $i, 3);

						$imageSql = "SELECT image FROM product_image where code='$code' and type='list'";
						$imageResult = mysql_query($imageSql, $connect);
						$imageRecord =  mysql_fetch_array($imageResult);
						$image = $imageRecord['image'];

						$imageNumSql = "SELECT num FROM product_image where code='$code' and type='zoom'";
						$imageNumResult = mysql_query($imageNumSql, $connect);
						$imageNumRecord =  mysql_fetch_array($imageNumResult);
						$imageNum = $imageNumRecord['num'];

						echo("	
								<tr>
									<td align=center rowspan=3 id='product_img'><a href=javascript:product_info('$code','$imageNum')><img src='../uploaded_images/product/$image' width='200' height='150' border=0></a></td>
								    <td align=center colspan=3 id='product_name'>$name</td>
								 </tr>
								 <tr>
								    <td align=center colspan=3 id='product_description'>$description</td>
								 </tr>
								 <tr>
								    <td align=center id='product_price'>판매가격: <strong>$price 원</strong></td>
									
									<td id='product_buy' align=center><a href='shopping_cart.php?id=$user_id' onclick=javascript:window.location.href='product_addtocart.php?code=$code'><img src='../images/buttons/btn_buy.png' border=0></a></td>
									
									<td id='product_addcart' align=center><a href='product_addtocart.php?code=$code'><img src='../images/buttons/btn_addcart.png' border=0></a></td>
								 </tr>
								 <tr>
								    <td id=space height=40 colspan=3></td>
								 </tr>								 
							");
						
						$recordNumber--;
						$nextRecord += 1;
						if(9 < $nextRecord){
							break;
						}
					} // end of for

					echo("<tr>
							<td colspan=3 align=center id='page_number' >");
					
						for($i=1; $i <= $totalPageNumber; $i++){ // page number
							if($i == $presentPageNumber){
								echo("&nbsp<strong>$i</strong>&nbsp");
							}
							else{
								echo("&nbsp<a href='$PHP_SELF?page=$i&totalPage=$totalPageNumber&next=$nextRecord_skipPage'>[$i]</a>&nbsp");
							}
							$nextRecord_skipPage = $nextRecord_skipPage + $pageMaxRowNumber;  // page1=0; page2=10; page3=20 ...
						}

						if($totalPageNumber > 1){
							++$presentPageNumber;
							echo("&nbsp<a href='$PHP_SELF?page=$presentPageNumber&totalPage=$totalPageNumber&next=$nextRecord'>[다음]</a>");
						}
					echo("	</td>
						  </tr>");
				}
			}
?>
		</table>
	</div>
<?
	if($_SESSION['user_id']){
		$user_id = $_SESSION['user_id'];
		$sql = "select product_code, product_quantity, image
				from shop_cart cart, product_image img
				where cart.user_id = '$user_id' and img.code = product_code and img.type = 'list' order by cart.cart_id asc";
		$result = mysql_query($sql, $connect);
		$rows = mysql_num_rows($result);
?>
		<div id='shopping_cart'>
			<center>
			<table>
				<tr>
					<td align=center colspan=2 id="title">장바구니</td>
				<tr>
			<?	if($rows > 0){
					for($i = 0; $i < $rows; $i++){ 
						$quatity = mysql_result($result, $i, 1);
						$image = mysql_result($result, $i, 2); 
						?>
						<tr>
							<td><img src='../uploaded_images/product/<?echo $image?>' width='40' height='40' border=0></td>
							<td align=left>x <?echo $quatity?></td>
						</tr>
				<?		if($i == 2){
							break;
						}
					} // end of FOR 
				}
				else{ ?>
						<tr>
							<td id="no_items" align=center>상품없음</td>
						</tr>							
			  <? } ?>
						<tr>
							<td id="totalitem" align=center colspan=2>총상품: <?
								$sql = "select product_quantity from shop_cart
								where user_id = '$user_id'";
								$result = mysql_query($sql, $connect);
								$totalitems = 0;
								while($rows = mysql_fetch_array($result)){
									$totalitems += $rows['product_quantity'];
								}
								echo $totalitems?>개</td>
						</tr>	
			</table>
				<input id="gotocart" type="button" onclick="javascript:window.location.href='shopping_cart.php?id=<?echo $user_id?>'" value="장바구니보기" style="cursor:hand">
			</center>
		</div>
<?
	} // end of IF
?>
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
<?
	mysql_close($connect);
?>
 </BODY>
</HTML>
