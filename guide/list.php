<?php
   session_start();
 ?>
 <!DOCTYPE HTML>
 <html>
 <head>
 <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="../css/common.css">
 <link rel="stylesheet" type="text/css" href="../css/concert.css">
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
   $sql="select * from phptest2.guide where $find like '%$search%' order by num desc";
  } else {
   $sql="select * from phptest2.guide order by num desc";
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
    <div id="title"><img src="../img/title_guide.png"></div><br><br>
      <div class="clear"></div>
      <br><br><br><br><br>

 
  <?php
   } catch (PDOException $Exception) {
     print "오류: ".$Exception->getMessage();
   }  
  ?>
      <link rel="stylesheet" type="text/css" href="../css/column.css">
   <div class = "img-container">
       <a href="guam.php">
           <img class="img-circle" src="../img/guide_guam.png" width="200" height="200"></a><br><br>
           <div class="overlay">
            <div class="text">Hello World</div>
            </div>
           <div class="clear"></div><br><br>
       <a href="hongkong.php">
           <img class="img-circle" src="../img/guide_hongkong.png" width="200" height="200"></a>

   </div>
   <div class = "img-container">
       <a href="bangkok.php">
           <img class="img-circle" src="../img/guide_bangkok.png" width="200" height="200"></a>
           <div class="clear"></div><br><br>
        <a href="osaka.php">
            <img class="img-circle" src="../img/guide_osaka.png" width="200" height="200"></a>
   </div>
   <div class = "img-container">
        <a href="paris.php">
            <img class="img-circle" src="../img/guide_paris.png" width="200" height="200"></a>
            <div class="clear"></div><br><br>
           <img class="img-circle" src="../img/guide_commingsoon.png" width="200" height="200">

           

  </div>
 <style>
.overlay {
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color:#E9E9E9;
}

.container:hover .overlay {
  opacity: 2;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
</style>

  <script>
   $('.navbar-nav > li').hover(function(){
      console.log('1');
      var path = '../data';
      var file = $(this).find('a').data('type');
      $(this).find('img').attr('src' , path+file+'_hover.jpg');
   },function(){
      console.log('2');
      var path = '../data';
      var file = $(this).find('a').data('type');
      $(this).find('img').attr('src' , path+file+'.jpg');
   })
</script>

    
  <?php
   if(isset($_SESSION["userid"]))
   {
  ?>      
   <?php
   }
  ?>
     </div>
    </div> <!-- end of col2 -->
   </div> <!-- end of content -->
   
  </div> <!-- end of wrap -->

  </body>
  </html>