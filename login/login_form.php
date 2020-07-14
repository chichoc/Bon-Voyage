 <?php
   session_start();
 ?>

<br><br><br><br><br><br><br><br><br>
<link rel="stylesheet" type="text/css" href="../css/member.css">
<form class="login"method="post" action="login_result.php">
    <h1 class="login-title"><a href="../index.php"><img src="../img/login_logo.png"></a></h1>
    <input type="text" name="id" class="id" placeholder="ID" autofocus >
    <input type="password" name="pass" class="pass" placeholder="Password">
    <input type="submit" value="Submit" class="login-button" onclick="document.member_form.submit()">
    <p class="login-lost"><a href="">Forgot Password?</a></p>
  </form>
       
 
 </div> <!-- end of form_login -->
 
 </form>
 </div> <!-- end of col2 -->
 </div> <!-- end of content -->
 </div> <!-- end of wrap -->
 </body>
 </html>



