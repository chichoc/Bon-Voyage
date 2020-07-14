 <?php
  $id = $_REQUEST["id"];
  $pass = $_REQUEST["pass"];
  $name = $_REQUEST["name"];
  $nick = $_REQUEST["nick"];
  $address = $_REQUEST["address"];
  $hp1 = $_REQUEST["hp1"];
  $hp2 = $_REQUEST["hp2"];
  $hp3 = $_REQUEST["hp3"];
  $email1 = $_REQUEST["email1"];
  $email2 = $_REQUEST["email2"];
  $hp = $hp1."-".$hp2."-".$hp3;
  $email = $email1."@".$email2;
  $regist_day=date("Y-m-d H:i:s");    
  
  require_once("../lib/MYDB.php");  
  $pdo = db_connect(); 
 try{
    $pdo->beginTransaction();   
    $sql = " update phptest2.member set pass=?, name=?, nick=?, address=?, hp=?, email=?, regist_day=? where id = ?"; 
    $stmh = $pdo->prepare($sql);  
    $stmh->bindValue(1, $pass, PDO::PARAM_STR);   
    $stmh->bindValue(2, $name, PDO::PARAM_STR);
    $stmh->bindValue(3, $nick, PDO::PARAM_STR);
    $stmh->bindValue(4, $address, PDO::PARAM_STR);
    $stmh->bindValue(5, $hp, PDO::PARAM_STR);
    $stmh->bindValue(6, $email, PDO::PARAM_STR);
    $stmh->bindValue(7, $regist_day, PDO::PARAM_STR);
    $stmh->bindValue(8, $id, PDO::PARAM_STR); 

    $stmh->execute();
    $pdo->commit(); 
    
   header("Location:http://localhost/samjo/index.php");
  } catch (PDOException $Exception) {
         $pdo->rollBack();
       print "오류: ".$Exception->getMessage();
  }
 ?>

