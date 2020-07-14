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
 
 <?php
 
  require_once("../lib/MYDB.php");
  $pdo = db_connect();
 
  if(isset($_REQUEST["mode"]))
     $mode=$_REQUEST["mode"];
  else 
     $mode="";

  if(isset($_REQUEST["search"]))   // search 쿼리스트링 값 할당 체크
    $search=$_REQUEST["search"];
  else 
    $search="";

  if(isset($_REQUEST["find"]))
    $find=$_REQUEST["find"];
  else
    $find="";
 
  if($mode=="search"){
    if(!$search){
  ?>
      <script>
        alert('검색할 단어를 입력해 주세요!');
        history.back();
      </script>
  <?php
     }
   $sql="select * from phptest2.sales where $find like '%$search%' order by num desc";
  } else {
   $sql="select * from phptest2.sales order by num desc";
  }
  try{  
    $stmh = $pdo->query($sql); 
    $count=$stmh->rowCount(); 
  
  ?>
      
  <body>
  <div id="wrap">
    <div id="header">
      <?php include "../lib/top_login2.php"; ?>
    </div>
    <div id="menu">
      <?php include "../lib/top_menu2.php"; ?>
    </div>
<div id ="content_body">
    <div id="content">
    <div id="col2">
        <div id="title"><img src="../img/title_sales.png"></div>
      <form name="board_form" method="post" action="list.php?mode=search">
      <div id="list_search">
        <div id="list_search1">▷ 총 <?= $count ?> 개의 게시물이 있습니다.</div>
        <div id="list_search2"><img src="../img/select_search.gif"></div>
        <div id="list_search3">
        <select name="find">
           <option value='subject'>제목</option>
           <option value='content'>내용</option>
           <option value='nick'>닉네임</option>
           <option value='name'>이름</option>
        </select></div> <!-- end of list_search3 -->
        <div id="list_search4"><input type="text" name="search"></div>
        <div id="list_search5"><input type="image" src="../img/list_search_button.gif"></div>
      </div> <!-- end of list_search -->
      </form>
      <div class="clear"></div>


 
  <?php
    
   } catch (PDOException $Exception) {
     print "오류: ".$Exception->getMessage();
   }  
  ?>
        <div class="img-container">
            <a href="view.php?num=1">
                <img src="../img/sales_poster1.png" width="250" height="400"></a>
                    <h1>유럽 10일 투어 특가</h1>
                    <br>
                    <br>
                    <br>
                    <br>
            <a href="view.php?num=4">
                <img src="../img/sales_poster4.png" width="250"height="400"></a>
                    <h1>태국 5일 투어 특가</h1>
                    <br>
                    <br>
                    <br>
                    <br>
            <a href="view.php?num=4">
                <img src="../img/sales_poster7.png" width="250"height="400"></a>
                    <h1>준비중입니다</h1>
                    <br>
                    <br>
                    <br>
                    <br>        
                                  
        </div>
        <div class="img-container">
            <a href="view.php?num=2">
                <img src="../img/sales_poster2.png" width="250"height="400"></a>
                    <h1>일본 3일 투어 특가</h1>
                    <br>
                    <br>
                    <br>
                    <br>
            <a href="view.php?num=5">
                <img src="../img/sales_poster5.png" width="250"height="400"></a>
                    <h1>터키 9일 투어 특가</h1>
                    <br>
                    <br>
                    <br>
                    <br> 
            <a href="view.php?num=8">
                <img src="../img/sales_poster8.png" width="250"height="400"></a>
                    <h1>준비중입니다</h1>
                    <br>
                    <br>
                    <br>
                    <br>                    
        </div>
        <div class="img-container">
            <a href="view.php?num=3">
                <img src="../img/sales_poster3.png" width="250" height="400"></a>
                    <h1>대만 4일 투어 특가</h1>
                    <br>
                    <br>
                    <br>
                    <br>
        </div>
            
            <a href="view.php?num=6">
                <img src="../img/sales_poster6.png" width="250" height="400"></a>
                    <h1>미국 15일 투어 특가</h1>
                    <br>
                    <br>
                    <br>
                    <br> 
             <a href="view.php?num=9">
                <img src="../img/sales_poster9.png" width="250" height="400"></a>
                    <h1>준비중입니다</h1>
                    <br>
                    <br>
                    <br>
                    <br>                    
       

 <div id="write_button">
   <a href="write_form.php"><img src="../img/write.png"></a>
    <a href="list.php"><img src="../img/list.png"></a>&nbsp;
 </div>
</div>

   

  <?php
   if(isset($_SESSION["userid"]))
   {
       if($_SESSION["userid"]=="admin"){//아이디와 비밀번호가 일치하는 경우

       $_SESSION["userid"]="admin";

       $_SESSION["name"]="관리자";

       $_SESSION["nick"]="관리자";

       $_SESSION["level"]=1;

       header("Location:http://localhost/samjo/index.php");

  exit;
 }
  ?>
  <?php
   }
  ?>
      </div> <!-- end of content -->
     </div><!-- end of col2 -->
    </div> <!-- end of wrap -->
 

  </body>
  </html>
 

 












