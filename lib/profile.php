<style>
img {
    width: 100px;
    height:100px;
    border-radius: 50px; /* 이미지 반크기만큼 반경을 잡기*/
}

.chip {
    display: inline-block;
    padding: 0 25px;
    height: 30px;
    font-size: 16px;
    line-height: 30px;
    border-radius: 25px;
    background-color: #f1f1f1;
}

.chip img {
    float: left;
    margin: 0 10px 0 -25px;
    height: 30px;
    width: 30px;
    border-radius: 50%;
}
.closebtn {
    padding-left: 10px;
    color: #888;
    font-weight: bold;
    float: right;
    font-size: 20px;
    cursor: pointer;
}

.closebtn:hover {
    color: #000;
}
 </style>
<div class="chip">
  <img src="./img/logo.png" alt="Person" width="96" height="96">
  <?= $_SESSION["nick"] ?> (level:<?= $_SESSION["level"] ?>)
  <span class="closebtn" onclick="this.parentElement.style.display='none'">&times;</span>
</div>