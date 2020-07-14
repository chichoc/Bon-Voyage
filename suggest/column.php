<!DOCTYPE html>
<html>
<head>
<style>
* {
    box-sizing: border-box;
}

.img-container {
    float: left;
    width: 33.33%;
    padding: 5px;
}

.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
</style>
</head>
<body>

<div class="clearfix">
  <div class="img-container">
    <img src="travel13.jpg" alt="Italy" style="width:100%">
  </div>
  <div class="img-container">
    <img src="travel13.jpg" alt="Forest" style="width:100%">
  </div>
  <div class="img-container">
    <img src="travel13.jpg" alt="Mountains" style="width:100%">
  </div>
</div>



</body>
</html>
