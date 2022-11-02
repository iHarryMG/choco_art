<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<HEAD>
	<TITLE>"JejuChocoArt-in-PremiumChocolate"</TITLE>
	<META http-equiv="X-UA-Compatible" content="IE=edge" />
	<META http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <style type="text/css">
	body{
		margin: 0px;
		background-image: url("../../images/admin_images/content_background.jpg");
		background-repeat: repeat-x;
		background-attachment: fixed;
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
		width: 700px;
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
		margin-left: 250px;
	}
	div#btns input{
		width: 50px;
		border: 1px solid gray;
	}
  </style>
  <script language="javascript">
	function check_inputs(){
		var form = document.admin_form;
		if(!form.name.value){
			alert("이름을 입력하세요!");
			form.name.focus();
			return;
		}
		else if(!form.pw.value){
			alert("비밀번호를 입력하세요!");
			form.pw.focus();
			return;
		}
		else if(!form.rrn.value){
			alert("주민번호를 입력하세요!");
			form.rrn.focus();
			return;
		}
		else if(!form.email.value){
			alert("이메일을 입력하세요!");
			form.email.focus();
			return;
		}
		else if(!form.cell.value){
			alert("휴대폰번호를 입력하세요!");
			form.cell.focus();
			return;
		}
		form.submit();
	}
  </script>
 </HEAD>
 <BODY>
 <?
		include("../../dbconn/common.php");
		$sql = "SELECT * FROM member where num='$num'";
		$result = mysql_query($sql, $connect);
		$records = mysql_fetch_array($result);

		$id = $records['id'];
		$name = $records['name'];
		$pw = $records['pw'];
		$class =$records['class'];
		$rrn = $records['rrn'];
		$email = $records['email'];
		$tel = $records['tel'];
		$cell = $records['cell'];
		$comment = $records['comment'];
		$address = $records['addr'];
		$date = $records['date'];
		$edit_date = $records['edit_date'];
		$login_date = $records['login_date'];
		$login_count = $records['login_count'];
		$leave_date = $records['leave_date'];

		mysql_close($connect);
 ?>
 <form name="admin_form" action="left_save_member_list.php?num=<?echo $num?>" method="POST">
  	<div id="header">
		탈퇴 회원 관리
	</div> 
	<div id="content">
		<table cellpadding=5>
			<tr>
				<td id="table_titles">아이디</td>
				<td><strong><?echo $id?></strong></td>
				<td id="table_titles">이름</td>
				<td><input type="text" name="name" value="<?echo $name?>"></td>
			</tr>
			<tr>
				<td id="table_titles">비밀번호</td>
				<td><input type="text" name="pw" value="<?echo $pw?>"></td>
				<td id="table_titles">등급</td>
				<td><select name="class">
<?
						$_1 = "";
						$_2 = "";
						$_3 = "";
						if("일반" == $class){
							$_1 = "selected";
						}
						else if("직원" == $class){
							$_2 = "selected";
						}
						else if("탈퇴" == $class){
							$_3 = "selected";
						}						
?>
					<option value="일반" <?echo $_1?>>일반</option>
					<option value="직원" <?echo $_2?>>직원</option>
					<option value="탈퇴" <?echo $_3?>>탈퇴</option>
				</td>

			</tr>
			<tr>
				<td id="table_titles">주민번호</td>
				<td><input type="text" name="rrn" value="<?echo $rrn?>"></td>
				<td id="table_titles">이메일</td>
				<td><input type="text" name="email" value="<?echo $email?>"></td>
			</tr>
			<tr>
				<td id="table_titles">전화번호</td>
				<td><input type="text" name="tel" value="<?echo $tel?>"></td>
				<td id="table_titles">휴대폰</td>
				<td><input type="text" name="cell" value="<?echo $cell?>"></td>
			</tr>
			<tr>
				<td id="table_titles">특이사항</td>
				<td colspan=3><textarea cols=60 rows=5 name="comment"><?echo $comment?></textarea></td>
			</tr>
			<tr>
				<td id="table_titles">주소</td>
				<td colspan=3><?echo $address?></td>
			</tr>
			<tr>
				<td id="table_titles">등록일시</td>
				<td><?echo $date?></td>
				<td id="table_titles">수정일시</td>
				<td><?echo $edit_date?></td>
			</tr>
			<tr>
				<td id="table_titles">최종로그인</td>
				<td><?echo $login_date?></td>
				<td id="table_titles">로그인횟수</td>
				<td><?echo $login_count?></td>
			</tr>
			<tr>
				<td id="table_titles">회원탈퇴일</td>
				<td><?echo $leave_date?></td>
			</tr>
		</table>
	</div>
	<div id="btns">
		<input type="button" onclick="javascript:check_inputs()" value="등록" style="cursor:hand">
		<input type="button" onclick="javascript:window.location.href='left_member_list.php'" value="목록" style="cursor:hand">
	</div>
</form>
 </BODY>
</HTML>
