<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
 </HEAD>

 <BODY>
 <?
	echo("<form enctype='multipart/form-data' method='post' action='save_image_businesspartner.php?num=$num'>
			<center>
			<h3>사진 올리기</h3>
			<table cellpadding=5>
				<tr>
					<td><input type='file' name='image' /></td>
				</tr>
			</table>
			  <input type='submit' value='올리기' />
			  <input type='button' onclick='history.go(-1)' value='목록' />
			</center>
		  </form> "); 
  ?>
 </BODY>
</HTML>
