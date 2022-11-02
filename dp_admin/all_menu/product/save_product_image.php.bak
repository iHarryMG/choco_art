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

		if($_FILES['list']["error"] == 0){

			$imagename = $_FILES['list']["name"];

			move_uploaded_file($_FILES['list']["tmp_name"],
			"../../../uploaded_images/product/".$imagename );
		  
			$sql = "insert into product_image(code, type, image)
			values('$code', 'list', '$imagename')";

			$result=mysql_query($sql, $connect);
			
			if(!$result)
			{ 
				echo("<script language=javascript>  
						window.alert('리스트이미지를 등록하지 못 했습니다.');
						history.go(-1);
					  </script>");
				exit;         
			}
		}

		$count = 0;
		for($i=1; $i <= 5; $i++){
			if($_FILES['image'.$i.'']["name"] == ""){
				break;
			}
			$count++;
		}

		for($i=1; $i <= $count; $i++){
			if($_FILES['image'.$i.'']["error"] == 0){

				$imagename = $_FILES['image'.$i.'']["name"];

				move_uploaded_file($_FILES['image'.$i.'']["tmp_name"],
				"../../../uploaded_images/product/".$imagename );
			  
				$sql = "insert into product_image (code, type, image)
				values('$code', 'zoom', '$imagename')";

				$result=mysql_query($sql, $connect);
				
				if(!$result)
				{ 
					echo("<script language=javascript>  
							window.alert('확대이미지를 올리지 못 했습니다.');
							history.go(-1);
						  </script>");
					exit;         
				}
			}
			else{
				  echo("<script language=javascript>  
								window.alert('확대이미지를 선택하셔야 합니다.');
								history.go(-1);
						</script>");
				  exit;  			
			}
		}

		mysql_close();

	echo("<script>
			alert('등록되었습니다.');
			window.location.href='$win.php';
		  </script>");
?>
