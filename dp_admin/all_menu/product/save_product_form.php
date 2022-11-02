<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <style type="text/css">
	body{
		margin: 0px;
	}
	#header{
		margin-top: 41px;
		margin-left: 20px;
		margin-bottom: 70px;
		font-size: 18px;
		font-weight: bold;
		color: #3a260d;
		font-family: "HY견고딕";
	}
	div#title{
		margin-top: 20px;
		margin-left: 20px;
	}
	table td#table_titles{
		background-color: lightgray;
		text-align: center;
		font-size: 12px;
		width: 100px;
	}
	div#content table{
		margin: 20px;
		width: 850px;
		border: 1px solid gray;
		border-collapse: collapse;
		margin-bottom: 20px;
		font-size: 14px;
	}
	div#content table td, textarea{
		border: 1px solid gray;
	}
	div#content table td#table_titles{
		background-color: #9bbb58;
		color: #3a260d;
		font-size: 14px;
	}
	div#btns{
		margin-left: 400px;
	}
	div#btns input{
		width: 50px;
		border: 1px solid gray;
	}
	table input{
		border: 1px solid gray;
	}
  </style>
  <script language="javascript">

	function check_inputs(){
		var form = document.admin_form;

		if(!form.name.value){
			alert("상품명을 입력하세요!");
			form.name.focus();
			return;
		}
		else if(!form.maker.value){
			alert("제조원을 입력하세요!");
			form.maker.focus();
			return;
		}
		else if(!form.brand.value){
			alert("브랜드를 입력하세요!");
			form.brand.focus();
			return;
		}
		else if(!form.price.value){
			alert("판매가격을 입력하세요!");
			form.price.focus();
			return;
		}
		else if(!form.discount_price.value){
			alert("할인가격을 입력하세요!");
			form.discount_price.focus();
			return;
		}
		else if(!form.description.value){
			alert("상세설명을 입력하세요!");
			form.description.focus();
			return;
		}
		form.submit();
	}
  </script>
 </HEAD>
 <BODY>
 <?
		include("../../../dbconn/common.php");

		$win = $win;

		if(($id == 'edit') || ($id == 'info')){
			$sql = "SELECT * FROM product where code='$code' ";
			$result = mysql_query($sql, $connect);
			$records = mysql_fetch_array($result);
			
			$code = $records['code'];
			$category = $records['category'];
			$subcategory = $records['subcategory'];
			$name = $records['name'];
			$brand = $records['brand'];
			$maker = $records['maker'];
			$price = $records['price'];
			$discount_price = $records['discount_price'];
			$description = $records['description'];
			$state = $records['state'];
			$deliver = $records['deliver'];
		}

 ?>
 <form name="admin_form" action="save_product_list.php?win=<?echo $win?>&code=<?echo $code?>" method="POST" enctype="multipart/form-data">
	<div id="content">
		<table cellpadding=5>
			<tr>
				<td id="table_titles">상품명</td>
				<td><input type="text" name="name" value="<?echo $name?>" size="40"></td>
				<td id="table_titles">기본카테고리</td>
				<td><select name="category">
<?
						$_1 = "";
						$_2 = "";
						if("original" == $category){
							$_1 = "selected";
						}
						else if("compound" == $category){
							$_2 = "selected";
						}				
?>
					<option value="pure" <?echo $_1?>>pure</option>
					<option value="compound" <?echo $_2?>>compound</option>
				</td>
			</tr>
			<tr>
				<td id="table_titles">원산지</td>
				<td><input type="radio" name="subcategory" value="domestic" checked >국내산
				    <input type="radio" name="subcategory" value="import" >수입산 </td>
				<td id="table_titles">제조원</td>
				<td><input type="text" name="maker" value="<?echo $maker?>"></td>
			</tr>
			<tr>
				<td id="table_titles">브랜드</td>
				<td><input type="text" name="brand" value="<?echo $brand?>"></td>
				<td id="table_titles">배송</td>
				<td><select name="deliver">
<?
						$_1 = "";
						$_2 = "";
						$_3 = "";

						if("cond_free" == $deliver){
							$_1 = "selected";
						}
						else if("free" == $deliver){
							$_2 = "selected";
						}
						else if("onarrival" == $deliver){
							$_3 = "selected";
						}				
?>
					<option value="cond_free" <?echo $_1?>>조건부무료</option>
					<option value="free" <?echo $_2?>>배송비무료</option>
					<option value="onarrival" <?echo $_3?>>배송비착불</option>
				</td>
			</tr>
			<tr>
				<td id="table_titles">판매가격</td>
				<td><input type="text" name="price" value="<?echo $price?>"></td>
				<td id="table_titles">할인가격</td>
				<td><input type="text" name="discount_price" value="<?echo $discount_price?>"></td>
			</tr>
<?
if($id != "new"){

			$listImageSql = "SELECT num, image FROM product_image where code='$code' and type='list'";
			$listImageResult = mysql_query($listImageSql, $connect);
			$listImageRecord =  mysql_fetch_array($listImageResult);
			$listImage = $listImageRecord['image'];

			echo("<tr>
					<td id='table_titles'>리스트</br>이미지</td>
					<td><img src='../../../uploaded_images/product/$listImage' width='100' height='100' border=0></td>");
			if($id == "edit"){
				echo("<td id='table_titles'>변경할</br>이미지</br>선택</td>
					  <td><input type='file' name='list' style='cursor:hand'/></td>");
				$listNum = $listImageRecord['num'];
				echo ("<input type='hidden' name='list_image_num' value='".$listNum."'>"); // 리스트이미지 num
			}
			echo("</tr>");

			$imageSql = "SELECT num, image FROM product_image where code='$code' and type='zoom'";
			$imageResult = mysql_query($imageSql, $connect);
			$count = 0;
			while($imageRecord =  mysql_fetch_array($imageResult)){
				$image = $imageRecord['image'];

				++$count;
				echo("<tr>
						<td id='table_titles'>확대</br>이미지</td>
						<td><img src='../../../uploaded_images/product/$image' width='150' height='150' border=0></td>");
				if($id == "edit"){
					echo("<td id='table_titles'>변경할</br>이미지</br>선택</td>
						  <td><input type='file' name='image".$count."' style='cursor:hand'/></td>");
					$imageNum = $imageRecord['num'];
					echo ("<input type='hidden' name='zoom_image".$count."_num' value='".$imageNum."'>"); // 확대이이미지 num

				}
				echo("</tr>");
			}
			echo ("<input type='hidden' name='imagecount' value='".$count."'>"); // 확대이미지 count number

}
?>
			<tr>
				<td id="table_titles">상세설명</td>
				<td colspan=3><textarea cols=80 rows=5 name="description"><?echo $description?></textarea></td>
			</tr>
			<tr>
				<td id="table_titles">상태</td>
				<td colspan=3><select name="state">
<?
						$_1 = "";
						$_2 = "";
						if("onsale" == $state){
							$_1 = "selected";
						}
						else if("nosale" == $state){
							$_2 = "selected";
						}				
?>
					<option value="onsale" <?echo $_1?>>판매</option>
					<option value="nosale" <?echo $_2?>>판매중지</option>
				</td>
			</tr>		
		</table>
	</div>
	<div id="btns">
<?
						if(($id == 'edit') || ($id == 'new')){
							echo ("<input type='button' onclick='javascript:check_inputs()' value='등록' style='cursor:hand'>");
						}
?>

		<input type="button" onclick="javascript:history.go(-1)" value="목록" style="cursor:hand">
	</div>
  </form>
  <?
  		mysql_close($connect);
  ?>
 </BODY>
</HTML>
