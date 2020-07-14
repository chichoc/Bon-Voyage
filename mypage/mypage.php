<?php
   session_start();
 ?>
<!DOCTYPE HTML>
 <html>
 <head>
 <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="../css/common.css">
 <link rel="stylesheet" type="text/css" href="../css/cal_test.css">
 <link rel="stylesheet" type="text/css" href="../css/todolist.css">
 </head>
<body>
  <div id="wrap">
    <div id="header">
      <?php include "../lib/top_login2.php"; ?>
    </div>
    <div id="menu">
      <?php include "../lib/top_menu2.php"; ?><br><br>
    </div>
  <div id ="content_body">
  <div id="content">
    
     <div id="col2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="view_content">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="../member/updateForm.php?id=<?=$_SESSION["userid"]?>"><img src="../img/button_modify.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <a href="../mypage/mypage_cal.php"><img src="../img/button_cal.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <a href="../mypage/mypage_todo.php"><img src="../img/button_todo.png"></a>
          <a href="../mypage/mypage_mylist.php"><img src="../img/button_mylist.png"></a>
      </div>
 <div class="clear"></div>
     </div> 
  </div> 
 </div>

 </body>
 </html>


