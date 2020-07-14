
<?php
  
  require_once("../lib/MYDB.php");
  $pdo = db_connect();
  ?>

<html>
		<head>
			<script>
					function goLastMonth(month, year){
								if (month == 1) {
									--year;
									month = 13;
								}
                                                                --month
                                                                var monthstring =""+month+"";
                                                                var monthlength =monthstring.length;
                                                                if(monthlength <=1){
                                                                    monthstring = "0"+monthstring;
                                                                }
								document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
					}

					function goNextMonth(month, year){
								if (month == 12) {
									++year;
									month = 0;
								}
                                                                ++month
                                                                var monthstring =""+month+"";
                                                                var monthlength =monthstring.length;
                                                                if(monthlength <=1){
                                                                    monthstring = "0"+monthstring;
                                                                }document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
					}



			</script>
                        <style>
                            .table {
                            margin:10px;
                            padding:0;
                            font-family : 'Jeju Gothic';
                            font-size:20px;
                            font-weight:normal;
                            color:#333333;
                            }
                            .today {
                                background-color:#aed6f3;
                            }
                            .event{
                                background-color:cornflowerblue;
                            }
                        </style>




		</head>

		<body>
				<?php
				if (isset($_GET['day'])){
				$day = $_GET['day'];
				}else{ 
				$day = date("d");
				}
				if (isset($_GET['month'])){
				$month = $_GET['month'];
				}else{
				$month = date("m");	
				}				
				if (isset($_GET['year'])){
				$year = $_GET['year'];
				}else{
				$year = date("Y");	
				}

				// calendar variable //				
				$currentTimeStamp = strtotime("$year-$month-$day");
				$monthName = date("F", $currentTimeStamp);
				$numDays = date("t", $currentTimeStamp);
				$counter = 0;

				
				?>	
                                    
                                <?php
                                   if(isset($_GET['add'])){
                                       
                                       $title = $_POST['title'];
                                       $detail = $_POST['detail'];
                                       
                                       $eventdate = $month."/".$day."/".$year;
                                       
                                       $sqlinsert ="insert into phptest2.eventcalendar (id, name, nick, title,detail,eventDate,dateAdded) values ('".$_SESSION["userid"]."','".$_SESSION["name"]."','".$_SESSION["nick"]."','".$title."','".$detail."','".$eventdate."',now())";
                                       
                                       $resultinsert = $pdo->query($sqlinsert);
                                       if($resultinsert){
                                           echo "일정이 추가되었습니다!";
                                       }else{
                                           echo "일정 추가가 실패하였습니다.";
                                       }
                                          }
                                   ?>

                                       
                    <div class="table">   
				<table border='0'>
					<tr>
						<td><input style='width:100px;' type='button' value='<' name='previousbutton' onclick="goLastMonth(<?php echo $month.",".$year?>)"></td>
						<td colspan='5' align='center'> <?php echo $monthName.", ".$year; ?></td>
						<td><input style='width:100px;' type='button' value='>' name='nextbutton' onclick="goNextMonth(<?php echo $month.",".$year?>)"></td>
						<td></td>						
					</tr>
					<tr>
						<td width='100px' height='50px' align='center'>일</td>
						<td width='100px' height='50px' align='center'>월</td>
						<td width='100px' height='50px' align='center'>화</td>
						<td width='100px' height='50px' align='center'>수</td>
						<td width='100px' height='50px' align='center'>목</td>
						<td width='100px' height='50px' align='center'>금</td>
						<td width='100px' height='50px' align='center'>토</td>
					</tr>
					<?php 
						echo "<tr>";
							for($i = 1; $i < $numDays+1; $i++, $counter++) { 
									$timeStamp = strtotime("$year-$month-$i");
									if ($i == 1) {
										$firstDay = date("w", $timeStamp);
										for ($d = 0; $d < $firstDay; $d++, $counter++) {
												// blank space //
												echo "<td>&nbsp;</td>";
										}	
									}
									if ($counter % 7 == 0){
										echo "</tr><tr>";
									}
                                                                        $monthstring = $month;
                                                                        $monthlength = strlen($monthstring);
                                                                        
                                                                        $daystring =$i;
                                                                        $daylength = strlen($daystring);
                                                                        if($monthlength<=1){
                                                                            $monthstring = "0".$monthstring;
                                                                        }
                                                                        if($daylength <= 1){
                                                                            $daystring ="0".$daystring;
                                                                        }
                                                                        $todaysDate = date("m/d/Y");
                                                                        $dateToCompare = $monthstring.'/'.$daystring.'/'.$year;
									echo "<td align='center'";
                                                                        if ($todaysDate==$dateToCompare){
                                                                            echo "class='today'";
                                                                        }else{
                                                                        $sql="select * from phptest2.eventcalendar order by num desc";
                                                                            $sqlCount="select * from phptest2.eventcalendar where eventDate='".$dateToCompare."'";
                                                                            $stmh = $pdo->query($sqlCount); 
                                                                            $count=$stmh->rowCount(); 
                                                                            if($count>=1){
                                                                                echo "class='event'";
                                                                                
                                                                            }
                                                                            
                                                                        }
                                                                        echo "><a href ='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
							}
						echo "</tr>";
					?>

				</table>
                    <?php
                            if(isset($_GET['v'])){
                            echo "<a href ='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'>일정추가</a>";
                            if(isset($_GET['f'])){
                                include("eventform.php");
                            }
                            $sqlEvent = "select * from phptest2.eventcalendar where id='".$_SESSION["userid"]."' and eventDate='".$month."/".$day."/".$year."'";
//                            $sqlEvent ="select * from phptest2.eventcalendar where eventDate='".$month."/".$day."/".$year."'";
                            $stmh =$pdo->query($sqlEvent);
                            echo "<br>";
                            
                            if(isset($_SESSION['userid'])){
                                while($events=$stmh->fetch(PDO::FETCH_ASSOC)){
                                
                                echo "일정 :".$events['title']."<br><br>";
                                echo "해야할 일 :".$events['detail']."<br><br>";
                            }
                        }
                        }
                    ?>
                    </div>
		</body>

</html>