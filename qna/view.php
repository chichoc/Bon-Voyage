 <?php
 session_start(); 
   
 $file_dir = 'C:\xampp\htdocs\samjo\data\\'; 
  
 $num=$_REQUEST["num"];
   
 require_once("../lib/MYDB.php");
 $pdo = db_connect();
 
 try{
     $sql = "select * from phptest2.qna where num=?";
     $stmh = $pdo->prepare($sql);  
     $stmh->bindValue(1, $num, PDO::PARAM_STR);      
     $stmh->execute();            
    
     $row = $stmh->fetch(PDO::FETCH_ASSOC);
 	
     $item_num     = $row["num"];
     $item_id      = $row["id"];
    $item_name    = $row["name"];
     $item_nick    = $row["nick"];
     $item_hit     = $row["hit"];
 
 
     $item_date    = $row["regist_day"];
     $item_date    = substr($item_date,0,10);
     $item_subject = str_replace(" ", "&nbsp;", $row["subject"]);
     $item_content = $row["content"];
     $is_html      = $row["is_html"];
      
     if ($is_html!="y"){
	$item_content = str_replace(" ", "&nbsp;", $item_content);
     	$item_content = str_replace("\n", "<br>", $item_content);
     }	
 
     $new_hit = $item_hit + 1;
     try{
       $pdo->beginTransaction(); 
       $sql = "update phptest2.qna set hit=? where num=?";   // 조회수 증가
       $stmh = $pdo->prepare($sql);  
       $stmh->bindValue(1, $new_hit, PDO::PARAM_STR);      
       $stmh->bindValue(2, $num, PDO::PARAM_STR);           
       $stmh->execute();
       $pdo->commit(); 
       } catch (PDOException $Exception) {
         $pdo->rollBack();
       print "오류: ".$Exception->getMessage();
      }
 ?>
<!DOCTYPE HTML>
 <html>
 <head> 
 <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="../css/common.css">
 <link rel="stylesheet" type="text/css" href="../css/board4.css">
 <script>
   function del(href) 
    {
      if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
           document.location.href = href;
        }
    }
 </script>
 </head>
 <body>
 <div id="wrap">
  <div id="header"><?php include "../lib/top_login2.php"; ?></div> 
  <div id="menu"><?php include "../lib/top_menu2.php"; ?></div> 
  <div id="content">
     <div id="col2">
 <div id="title"><img src="../img/title_qna.png"></div>
        <div id="view_comment"> &nbsp;</div>
        <div id="view_title">
   <div id="view_title1"><?= $item_subject ?></div>
          <div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?> | <?= $item_date ?> </div> 
 </div>
        <div id="view_content">
   
 
         <?= $item_content ?>
        </div>
         <div id="view_button">
	  <a href="list.php"><img src="../img/list.png"></a>&nbsp;
 <?php
 if(isset($_SESSION["userid"])) {
 if($_SESSION["userid"]==$item_id || $_SESSION["userid"]=="admin"){
 ?>
  <a href="write_form.php?mode=modify&num=<?=$num?>"><img src="../img/modify.png"></a>&nbsp;
 <a href="javascript:del('delete.php?num=<?=$num?>')"><img src="../img/delete.png"></a>&nbsp;
 <?php   }
 ?>
 <a href="write_form.php"><img src="../img/write.png"></a>
 
     <?php
     }
 } catch (PDOException $Exception) {
      print "오류: ".$Exception->getMessage();
 }
  ?> 
 </div>
 <div class="clear"></div>
     </div> 
  </div> 
 </div>
 </body>
 </html>