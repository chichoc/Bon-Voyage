 <?php
   session_start();
 ?>
 <!DOCTYPE HTML>
 <html>
 <head>
 <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href="../css/common.css">
 <link rel="stylesheet" type="text/css" href="../css/concert.css">
  <link rel="stylesheet" type="text/css" href="../css/guide.css">
 </head>
  <body>
  <div id="wrap">
    <div id="header">
      <?php include "../lib/top_login2.php"; ?>
    </div>
    <div id="menu">
      <?php include "../lib/top_menu2.php"; ?>
    </div>
  </div>
 <!-- Slideshow container -->
 <link rel="stylesheet" type="text/css" href="../css/img_slide.css">
 <script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}
</script>
<div class="clear"></div>
<div id ="content_body">
<div class="slideshow-container">
  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="../img/square_bangkok3.jpg" style="width:100%" >

  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="../img/square_bangkok2.jpg" style="width:100%">

  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="../img/square_bangkok3.jpg" style="width:100%">

  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<div id ="guide_view">
    <img src="../img/bangkok1.JPG">
    <img src="../img/bangkok2.JPG">
    <img src="../img/bangkok3.JPG">
<title>구글지도사용하기</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDbW4BIrBQeyvuM8D3R8SBgWuwD1sguH2k" ></script>
<style>
#map_ma {width:70%; height:400px; clear:both; border:solid 1px ;}
</style>
</head>
<body>
<div id="map_ma"></div>
<script type="text/javascript">
		$(document).ready(function() {
			var myLatlng = new google.maps.LatLng(35.837143,128.558612); // 위치값 위도 경도
	var Y_point			= 13.760426 ;		// Y 좌표
	var X_point			= 100.535262;		// X 좌표
	var zoomLevel		= 18;				// 지도의 확대 레벨 : 숫자가 클수록 확대정도가 큼
	var markerTitle		= "Bangkok";		// 현재 위치 마커에 마우스를 오버을때 나타나는 정보
	var markerMaxWidth	= 300;				// 마커를 클릭했을때 나타나는 말풍선의 최대 크기

// 말풍선 내용
	var contentString	= '<div>' +
	'<h2>Bangkok</h2>'+
	'<p>Thung Phaya Thai, Ratchathewi, Bangkok</p>' +
	
	'</div>';
	var myLatlng = new google.maps.LatLng(Y_point, X_point);
	var mapOptions = {
						zoom: zoomLevel,
						center: myLatlng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					}
	var map = new google.maps.Map(document.getElementById('map_ma'), mapOptions);
	var marker = new google.maps.Marker({
											position: myLatlng,
											map: map,
											title: markerTitle
	});
	var infowindow = new google.maps.InfoWindow(
												{
													content: contentString,
													maxWizzzdth: markerMaxWidth
												}
			);
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map, marker);
	});
});
</script>
             </div>
</body>
</html>
</div>
 </body>
 </html>