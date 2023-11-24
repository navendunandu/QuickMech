<?php
	include("../Assets/Connection/Connection.php");
  session_start();
  if($_GET['bid']){
    $updQry='update tbl_booking set booking_status='.$_GET['st'].' where booking_id='.$_GET['bid'];
    if(mysql_query($updQry)){
      ?>
      <script>
        alert('Updated')
        window.location='Booking.php';
      </script>
      <?php
    }
  }
    if($_GET['uid']){
      ?>
      <script>
        alert('Updated')
      </script>
      <?php
      $updQry='update tbl_booking set booking_status=5, booking_rate="'.$_GET['price'].'" where booking_id='.$_GET['bid'];
      if(mysql_query($updQry)){
        ?>
        <script>
          alert('Updated')
          window.location='Booking.php';
        </script>
        <?php
      }
  }
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border='1' cellspacing='10' cellpadding='10' align='center'>
      <tr>
        <td>Sl.No</td>
        <td>Vehicle</td>
        <td>Owner</td>
        <td>Owner Contact</td>
        <td>Date</td>
        <td>Time</td>
        <td>Service</td>
        <td>Status</td>
        <td>Action</td>
      </tr>
      <?php
      $selQry='select * from tbl_booking b inner join tbl_servicedetails sd on sd.service_id=b.service_id inner join tbl_vehicle v on v.vehicle_id=sd.vehicle_id inner join tbl_user br on br.user_id=b.user_id where b.branch_id='.$_SESSION['branchid'];
      $res=mysql_query($selQry);
      $i=0;
      while ($row = mysql_fetch_array($res))
      {
        $i++;
        ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['vehicle_name'] ?></td>
        <td><?php echo $row['user_name'] ?></td>
        <td><?php echo $row['user_contact'] ?></td>
        <td><?php echo $row['booking_fordate'] ?></td>
        <td><?php echo $row['booking_fortime'] ?></td>
        <td><?php echo $row['service_title'] ?></td>
        <td><?php
         if($row['booking_status']==0){
          echo "Waiting for Confirmation...";
         } 
         else if($row['booking_status']==1){
          echo "Booking Confirmed...";
         }
         else if($row['booking_status']==2){
          echo "Booking Rejected...";
         }
         else if($row['booking_status']==3){
          echo "Booking Cancelled...";
         }
         else if($row['booking_status']==4){
          echo "Car Recieved!";
         }
         else if($row['booking_status']==5){
          echo "Service Finished!<br> Car is ready for pickup.";
         }
         else if($row['booking_status']>=6){
          echo "Finished!";
         }
         ?></td>
        <td><?php 
        if($row['booking_status']==0){
          ?>
          <a href='Booking.php?bid=<?php echo $row['booking_id'] ?>&st=1' >Accept</a> || <a href='Booking.php?bid=<?php echo $row['booking_id'] ?>&st=2' >Reject</a>
          <?php
        }
        else if($row['booking_status']==1){
          ?>
          <a href='Booking.php?bid=<?php echo $row['booking_id'] ?>&st=4' >Car Recieved</a>
          <?php
        }
        if($row['booking_status']==4){
          ?>
          <a href='Booking.php?bid=<?php echo $row['booking_id'] ?>&st=5' >Service Finished</a>
          <?php
        }
        if($row['booking_status']==10){
          ?>
          <a href='' onclick="finish(<?php echo $row['booking_id'] ?>)" >Service Finished</a>
          <?php
        }
        if($row['booking_status']==5){
          ?>
          <a href='Booking.php?bid=<?php echo $row['booking_id'] ?>&st=6' >Car Picked Up</a>
          <?php
        }
        ?></td>
      </tr>
      <?php
      }
      ?>
    </table>
</body>
<script>
  function finish(bid)
  {
    alert(bid)
    var price = prompt('Please enter additional price', '0');
    window.location='Booking.php?uid=' + bid + '&price=' + price;
  }
</script>
</html>