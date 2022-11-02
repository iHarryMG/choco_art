<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>
 <BODY>
	 <table>
		<?
					if($_FILES['image']["error"] == 0){


						if ($_FILES['image']["size"] < 1000000)
						{
							$image = $_FILES['image']["name"];

							move_uploaded_file($_FILES['image']["tmp_name"],
							"../../../uploaded_images/recipe/".$image );
						  
							include("../../../dbconn/common.php");

							$sql = "update recipe set image='$image' where id='$id'";

							$result=mysql_query($sql, $connect);
							mysql_close();

							if($result)
							{ 
								echo("<script language=javascript>  
										window.alert('등록되었습니다.');
										window.location.href='recipe_content.php';
									  </script>");
							}
							else  
							{
								echo("<script language=javascript>  
										window.alert('Couldn't save image file.');
										history.go(-1);
									  </script>");
							}
						}
						else
						{
								echo("<script language=javascript>  
										window.alert('이미지 파일 크기가 10,000kb 보다 큽니다.');
										history.go(-1);
									  </script>");
						}
					}
		?>
	</table>
	<a href="recipe_content.php">Go back to list</a>
	</center>
 </BODY>
</HTML>
