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
		$count = 0;
		for($i=1; $i <= 5; $i++){
			if($_FILES['image'.$i.'']["name"] == ""){
				break;
			}
			$count++;
		}

		for($i=1; $i <= $count; $i++ ){
			if($_FILES['image'.$i.'']["error"] == 0){

				if ($_FILES['image'.$i.'']["size"] < 1000000)
				{
					$imagename = $_FILES['image'.$i.'']["name"];

					move_uploaded_file($_FILES['image'.$i.'']["tmp_name"],
					"../../../uploaded_images/events/".$imagename );
				  
					include("../../../dbconn/common.php");

					$sql = "insert into event_image(event_id, image, comment)
					values('$id', '$imagename','".$_POST['comment'.$i.'']."')";

					$result=mysql_query($sql, $connect);
					mysql_close();

					if(!$result)
					{ 
						echo("<script language=javascript>  
								window.alert('사진을 올리지 못 했습니다.');
								history.go(-1);
							  </script>"); 
					}
				}
				else
				{
				  echo("<script language=javascript>  
								window.alert('사진 사이즈가 너무 큽니다.');
								history.go(-1);
						</script>");
				}
			}
			else{
				  echo("<script language=javascript>  
								window.alert('사진을 선택하셔야 합니다.');
								history.go(-1);
						</script>");			
			}
			echo("<script>  
					window.alert('사진이 등록되었습니다.');
					window.location.href='exhibition_list.php';
				  </script>"); 
		}
?>
