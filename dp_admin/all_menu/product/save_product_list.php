<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>
 <BODY>
 </BODY>
</HTML>
<?
	include("../../../dbconn/common.php");

	$win = $win;
	$count= $_POST['imagecount'];
	$code = $code;
	$category = $_POST['category'];
	$subcategory = $_POST['subcategory'];
	$name = $_POST['name'];
	$brand = $_POST['brand'];
	$maker = $_POST['maker'];
	$price = $_POST['price'];
	$discount_price = $_POST['discount_price'];
	$description = $_POST['description'];
	$state = $_POST['state'];
	$deliver = $_POST['deliver'];
	$date = date("Y.m.d-h:i");

	$sql = "select * from product where code='$code'";
	$result = mysql_query($sql, $connect);
	$rows = mysql_num_rows($result);

	if($rows > 0){
		$sql = "update product set ";
		$sql .="category='$category', subcategory='$subcategory', name='$name', brand='$brand', maker='$maker', price='$price', discount_price='$discount_price', description='$description', state='$state', deliver='$deliver', date='$date' ";
		$sql .="where code='$code'";

//======================   image edit  ====================== begin//
		if($_FILES['list']["error"] == 0){
			$imagename = $_FILES['list']["name"];
			move_uploaded_file($_FILES['list']["tmp_name"],
			"../../../uploaded_images/product/".$imagename );
		  
			$listNum = $_POST['list_image_num'];
			$sql = "update product_image set image='$imagename' where num='$listNum'";
			mysql_query($sql, $connect);
		}

		for($i=1; $i<=$count; $i++){
			if($_FILES['image'.$i.'']["error"] == 0){
				$imagename = $_FILES['image'.$i.'']["name"];
				move_uploaded_file($_FILES['image'.$i.'']["tmp_name"],
				"../../../uploaded_images/product/".$imagename );

				$zoomNum = $_POST["zoom_image".$count."_num"];
				$imageSql = "update product_image set image='$imagename' where num='$zoomNum'";
				mysql_query($imageSql, $connect);			
			}		
		}
//======================   image edit  ====================== end//
	}
	else{
		$code = "P";
		$code.= date("ydmhsi");
		
		$sql = "insert into product ";
		$sql = $sql."(category, subcategory, code, name, brand, maker, price, discount_price, description, state, deliver, date)";
		$sql = $sql."values ('$category', '$subcategory', '$code', '$name', '$brand', '$maker', '$price', '$discount_price', '$description', '$state', '$deliver', '$date')";
	}
	mysql_query($sql, $connect);
	mysql_close($connect);

	echo("<script>
			alert('등록되었습니다.');
			window.location.href='$win.php';
		  </script>");

?>
