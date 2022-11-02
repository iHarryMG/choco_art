<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <LINK href="design/step1_design.css" type="text/css" rel="stylesheet">
 </HEAD>
 <script language="javascript">
	function replace_id() {
		opener.document.mem_form.id.select();
		opener.document.mem_form.id.value="";
		opener.document.mem_form.id.value = "<?echo $id?>";
		opener.document.mem_form.idcheck.value = "yes";
		self.close();
	}
 </script>
 <BODY>
<?

	if($id == ""){
			echo ("<script>
						alert('아이디를 입력하세요!');
						self.close();
					</script>");
	}
	else{
		include("../dbconn/common.php");
		$sql = "select * from member where id='$id'";
		$result = mysql_query($sql, $connect);
		$row = mysql_num_rows($result);
		mysql_close($connect);

		if($row){
			echo ("<script>
						alert('이미 등록된 아이디 입니다. \\n 다른 아이디를 사용하세요!');
						self.close();
					</script>");
		}
		else{
			echo ("<script>
						alert('사용 가능한 아이디 입니다.');
						replace_id();
						self.close();
					</script>");
		}
	}
?>
</BODY>
</HTML>