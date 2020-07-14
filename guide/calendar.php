<?php include "../lib/calendar.php"; ?>
<?php
    
     $dateComponents = getdate();

     $month = $dateComponents['mon']; 			     
     $year = $dateComponents['year'];

     echo build_calendar($month,$year,$dateArray);

?>
