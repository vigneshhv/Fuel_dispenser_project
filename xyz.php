<?php
include('db.php');
$rfid= 'KA123abc';
 $sql_id = "SELECT ID FROM fuel WHERE RFID_no = '$rfid' ORDER BY Time DESC LIMIT 1";
 $row1=  mysqli_query($conn, $sql_id);
 echo('<br>'.$row1['ID']);
 ?>