<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/header_menu_design.css" type=text/css rel=stylesheet>
 <style type="text/css">
    body{
		margin: 0px;
		background-image: url("../../images/admin_images/header_background.jpg");
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-color: #9bbb58;
	}
	div#logo{
		height: "120px";
		width: "200px";
		position: absolute;
	}
	div#logout_menu{
		height: "30px";
		width: "1280px";
		padding-top: 5px;
		padding-left: 450px;
	}
	div#menu{
		height: "90px";
		width: "1280px";
	}
	div#menu ul{
		margin-top: 50px;
		margin-left: 400px;
		font-family: "바탕";
		font-weight: bold;
	}
	div#menu li{
		float: left;
		padding-right: 20px;
		list-style: none
	}
	a{
		text-decoration: none;
		color: #3a260d;
	}
	a:hover{
		color: gray;
	}

 </style>
 </HEAD>
 <BODY>
	<div id="logout_menu">
		<a href="javascript:parent.location.href='admin_main.php?id=admin'">Home</a>&nbsp|&nbsp
		<a href="logout.php?win=index">Logout</a>
	</div>
	<div id="menu">
		<ul>
			<li><a href="../store/menu_store.php" target="left_menu" onclick="parent.content.location.href='../store/store_info.php'">상점</a></li>
			<li>|</i>
			<li><a href="../all_menu/menu/allmenu.php" target="left_menu" onclick="parent.content.location.href='../all_menu/company/brandstory.php'">각종메뉴</a></li>
			<li>|</i>
			<li><a href="../member/menu_member_list.php" target="left_menu" onclick="parent.content.location.href='../member/member_list.php'">회원</a></li>
			<li>|</i>
			<li><a href="../all_menu/product/menu_product.php" target="left_menu" onclick="parent.content.location.href='../all_menu/product/product.php'">상품</a></li>
			<li>|</i>
			<li><a href="../order/menu_order_list.php" target="left_menu" onclick="parent.content.location.href='../order/order.php'">주문</a></li>
			<li>|</i>
			<li><a href="../sales/menu_sales_list.php" target="left_menu" onclick="parent.content.location.href='../sales/sales.php'">매출</a></li>
			<li>|</i>
			<li><a href="../board/menu_board.php" target="left_menu" onclick="parent.content.location.href='../board/notice.php'">커뮤니티</a></li>
		</ul>
	</div>
 </BODY>
</HTML>

