    <div id="logo"><a href="../index.php"><img src="../img/logo.png" border="0"></a></div>
	
	<div id="top_login">
<?php
    if(!isset($_SESSION["userid"]))
	{
?>
          <a href="../login/login_form.php">로그인</a> | <a href="../member/insertForm.php">회원가입</a>
<?php
	}
	else
	{
?>
		<?=$_SESSION["nick"]?>님 안녕하세요! (level:<?=$_SESSION["level"]?>) | 
		<a href="../login/logout.php">로그아웃</a> | <a href="../member/updateForm.php?id=<?=$_SESSION["userid"]?>">마이페이지</a>
<?php
	}
?>
	 </div>
