<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>
 <BODY>
	 <center>
	 <table border='1' width=600>
		<?
					if($_FILES['image']["error"] == 0){

						echo ("	<tr>
								  <td rowspan=3 align='center'>$i</td>
								  <td>File Name: </td>
								  <td>".$_FILES['image']['name']."</td>
								</tr>
								<tr>
								  <td>File Type: </td>
								  <td>".$_FILES['image']['type']."</td>
								</tr>
								<tr>
								  <td>File Size: </td>
								  <td>".($_FILES['image']['size'] / 1024)."Kb</td>
								</tr>");	
						echo "filesize: ".$_FILES['image']["size"];

						if ($_FILES['image']["size"] < 1000000)
						{
							$imagename = $_FILES['image']["name"];

							move_uploaded_file($_FILES['image']["tmp_name"],
							"../../../uploaded_images/businesspartners/".$imagename );
						  
							include("../../../dbconn/common.php");

							$sql = "update businesspartner set imagename='$imagename' where num='$num'";

							$result=mysql_query($sql, $connect);
							mysql_close();

							if($result)
							{ 
								echo ("Files are successfully uploaded.");
							}
							else  
							{
								echo("<script language=javascript>  
										window.alert('Couldn't save image file.');
										history.go(-1);
									  </script>");
								exit;         
							}
						}
						else
						{
						  echo ("Files must be less than 10,000 kb");
						}
					}
		?>
	</table>
	<a href="businesspartner.php">Go back to list</a>
	</center>
 </BODY>
</HTML>
