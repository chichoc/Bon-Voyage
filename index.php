 <?php
 session_start();    
 ?>
 <!DOCTYPE html>
 <html>
 <head> 
 <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="./css/common.css">
 <title>Bon voyage</title>
 </head>

 <body>
 <div id="wrap">
    <div id="header">
   <?php include "./lib/top_login1.php"; ?>
    </div> <!-- end of header --> 
    <div id="menu">
   <?php include "./lib/top_menu1.php"; ?>
 </div> <!-- end of menu --> 

<div id="content_body">
   <div id="content"> 
       <img src="./img/big.gif" ><br>
    <img src="./img/step1.jpg">
    <img src="./img/step2.jpg">
     <img src="./img/step3.jpg">

 </div>
 </div>
 </div>

 <?php include "./lib/button.php"; ?>
     <div class ="footer">
          <li><a>대표자: (대표)이경원 권나연 김유진 박지윤 한세린</a></li>
          <li><a>주소 : 서울 성북구 정릉로 77</a></li>
          <li><a>TEL : 010-8753-6152 <연중무휴></li>
          <li><a>사업자 등록 번호 : 000-00-00000</a></li>
          <li><a>은행 계좌 : 우리은행 1002-251-059024</a></li>
          <div>
          <p>Copyright (C) 2018.3조 All rights reserved.</p>
          </div>
     </div>
 </body>
 </html>
