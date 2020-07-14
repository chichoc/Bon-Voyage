<?php
   session_start();
 ?>
 <!DOCTYPE HTML>
 <html>
 <head>
 <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="../css/common.css">
 <link rel="stylesheet" type="text/css" href="../css/concert.css">
  <link rel="stylesheet" type="text/css" href="../css/column.css">
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
          <a href="../member/updateForm.php?id=<?=$_SESSION["userid"]?>"><img src="../img/button_modify.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <a href="../mypage/mypage_cal.php"><img src="../img/button_cal.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <a href="../mypage/mypage_todo.php"><img src="../img/button_todo.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <a href="../mypage/mypage_mylist.php"><img src="../img/button_mylist.png"></a>
          
          <div id="latest">
               <?php
   function latest_article($table, $loop, $char_limit) 
   {
     require_once("../lib/MYDB.php");
     $pdo = db_connect();

    try{
       $sql="select * from phptest2.$table where id='".$_SESSION["userid"]."' order by num desc limit $loop";
       $stmh = $pdo->query($sql); 
    
      while($row = $stmh->fetch(PDO::FETCH_ASSOC)) 
      {
       $num=$row["num"];
       $len_subject=strlen($row["subject"]);
       $subject=$row["subject"];
 
       if($len_subject>$char_limit)
       {
        $subject=mb_substr($row["subject"], 0, $char_limit, 'utf-8');
        $subject=$subject."...";
       }
         
        $hit=substr($row["hit"], 0, 10);
        $item_num=$row["num"];
        $item_id=$row["id"];
        $item_name=$row["name"];
        $item_nick=$row["nick"];
        $item_hit=substr($row["hit"], 0, 10);
        $item_date=$row["regist_day"];
        $item_date=substr($item_date, 0, 10);
        $hit=substr($row["hit"], 0, 10);
 
       echo(" 
         
        <div class='col1'>
           <a href='../$table/view.php?num=$num'><b>$item_num&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$subject&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$item_name
           </div><div class='col2'>&nbsp;$item_date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$hit</div>
         <div class='clear'></div></b>
       ");
       
       }
    } catch (PDOException $Exception) {
     print "오류: ".$Exception->getMessage();
    } 
   }
 ?>
              
  <div id="latest1">
    <div id="title_latest1"></div>
    <div class="latest_box">
     <?php latest_article("community", 10, 30); ?>
    </div>
    </div>
 
  </div>
      </div>
     </div>
 <div class="clear"></div>
     </div> 
  </div> 


 </body>
 </html>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

