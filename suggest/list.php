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
   $sql="select * from phptest2.suggest where $find like '%$search%' order by num desc";
  } else {
   $sql="select * from phptest2.suggest order by num desc";
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
        <div id="title"><img src="../img/title_suggest.png"></div>
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
 
 <div class ="latest_box ">
<link rel="stylesheet" type="text/css" href="../css/column.css">


   
  
   
   <script>
   filterSelection("all") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 1; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1); 
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
   </script>
    <link rel="stylesheet" type="text/css" href="../css/guide_list.css">
    
   
<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> 모두보기 </button>
  <button class="btn" onclick="filterSelection('nature')"> 촬영지 </button>
  <button class="btn" onclick="filterSelection('cars')"> 식도락 </button>
  <button class="btn" onclick="filterSelection('people')"> 레저/취미 </button>
</div>

<!-- Portfolio Gallery Grid -->
<div class="row">
  <div class="column nature">
    <div class="content">
        <a href="view.php?num=2">
            <img src="../img/suggest_abouttime_uk.jpg" alt="test" width=250 height="400"></a>
      <h4>Mountains</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
   <div class="column nature">
    <div class="content">
        <a href="view.php?num=11">
            <img src="../img/suggest_abouttime_uk.jpg" alt="test" width=250 height="400"></a>
      <h4>[영국]</h4>
      <p>About time 촬영지</p>
    </div>
        <div class="content">
        <a href="view.php?num=14">
            <img src="../img/suggest_beforesunset_paris.jpg" alt="test" width=250 height="400"></a>
      <h4>[프랑스]</h4>
      <p>Before sunset 촬영지</p>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
        <a href="view.php?num=12">
            <img src="../img/suggest_lalaland_usa.jpg" alt="test1" width=250 height="400"></a>
      <h4>[미국]</h4>
      <p>Lalaland 촬영지</p>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
        <a href="view.php?num=13">
      <img src="../img/suggest_callmebyyourname_italy.jpg" alt="Nature" width=250 height="400">
      <h4>[이탈리아]</h4>
      <p>Call me by your name 촬영지</p>
    </div>
  </div>
   <div class="column nature">
    <div class="content">
        <a href="view.php?num=15">
            <img src="../img/suggest_taiwan.jpg" alt="test" width=250 height="400"></a>
      <h4>[대만]</h4>
      <p>그시절 우리가 좋아했던 소녀 촬영지</p>
    </div>
  </div>  
    <div class="column nature">
    <div class="content">
        <a href="view.php?num=16">
            <img src="../img/suggest_once_island.jpg" alt="test" width=250 height="400"></a>
      <h4>[아일랜드]</h4>
      <p>Once 촬영지</p>
    </div>
  </div>
    

  <div class="column cars">
    <div class="content">
        <a href="view.php?num=21">
      <img src="../img/suggest_thai.png" alt="Car" width=250 height="400">
      <h4>미식타이 맛기행</h4>
                    <br>
                    <br>
                    <br>
    </div>
          <div class="content">
              <a href="view.php?num=0">
      <img src="../img/suggest_mexico.png" alt="Car" width=250 height="400">
      <h4>멕시코 미식투어</h4>
       <br>
                    <br>
                    <br>
    </div>
  </div>
  <div class="column cars">
    <div class="content">
        <a href="view.php?num=0">
      <img src="../img/suggest_france.png" alt="Car" width=250 height="400">
      <h4>프랑스 와이너리 투어</h4>
       <br>
                    <br>
                    <br>
    </div>
      <div class="content">
          <a href="view.php?num=0">
      <img src="../img/suggest_hongkong.png" alt="Car" width=250 height="400">
      <h4>홍콩 미식투어</h4>
       <br>
                    <br>
                    <br>
    </div>
  </div>
  <div class="column cars">
    <div class="content">
        <a href="view.php?num=23">
      <img src="../img/suggest_japan.png" alt="Car" width=250 height="400">
      <h4>일본 미식투어</h4>
       <br>
                    <br>
                    <br>
    </div>
          <div class="content">
      <img src="../img/suggest_india.jpg" alt="Car" width=250 height="400">
      <h4>인도 미식투어</h4>
       <br>
                    <br>
                    <br>
    </div>
  </div>

  <div class="column people">
    <div class="content">
        <a href="view.php?num=31">
      <img src="../img/suggest_cebu.png" alt="People" width=250 height="400">
      <h4>[스쿠버다이빙]세부</h4>
       <br>
                    <br>
                    <br>
    </div>
  </div>
  <div class="column people">
    <div class="content">
        <a href="view.php?num=0">
      <img src="../img/suggest_thailand.png" alt="People" width=250 height="400">
      <h4>[골프]태국</h4>
      <br>
                    <br>
                    <br>
    </div>
  </div>
  <div class="column people">
    <div class="content">
        <a href="view.php?num=0">
      <img src="../img/suggest_italy.png" alt="People" width=250 height="400">
      <h4>[쇼핑]이탈리아</h4>
       <br>
                    <br>
                    <br>
    </div>
  </div>
<!-- END GRID -->
</div>
   <div id="write_button">
    <a href="list.php"><img src="../img/list.png"></a>&nbsp;
  <?php
   if(isset($_SESSION["userid"]))
   {
  ?>
   <a href="write_form.php"><img src="../img/write.png"></a>
  <?php
   }
  ?>
      </div>
     </div>
    </div> <!-- end of col2 -->
   </div> <!-- end of content -->
  </div> <!-- end of wrap -->
    </div>

  </body>
  </html>
