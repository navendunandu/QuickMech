<?php
	include("../Assets/Connection/Connection.php");
  session_start();
  ob_start();
  include('Head.php');
  if($_GET['bid']){
    $updQry='update tbl_booking set booking_status=3 where booking_id='.$_GET['bid'];
    if(mysql_query($updQry)){
      ?>
      <script>
        alert('Booking Cancelled')
        window.location='MyBooking.php';
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
        <td>Showroom</td>
        <td>Showroom Address</td>
        <td>Showroom Contact</td>
        <td>Date</td>
        <td>Time</td>
        <td>Service</td>
        <td>Cost</td>
        <td>Status</td>
        <td>Action</td>
      </tr>
      <?php
      $selQry='select * from tbl_booking b inner join tbl_servicedetails sd on sd.service_id=b.service_id inner join tbl_vehicle v on v.vehicle_id=sd.vehicle_id inner join tbl_branch br on br.branch_id=b.branch_id where b.user_id='.$_SESSION['userid'];
      $res=mysql_query($selQry);
      $i=0;
      while ($row = mysql_fetch_array($res))
      {
        $i++;
        ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['vehicle_name'] ?></td>
        <td><?php echo $row['branch_name'] ?></td>
        <td><?php echo $row['branch_address'] ?></td>
        <td><?php echo $row['branch_contact'] ?></td>
        <td><?php echo $row['booking_fordate'] ?></td>
        <td><?php echo $row['booking_fortime'] ?></td>
        <td><?php echo $row['service_title'] ?></td>
        <td><?php echo $row['service_price'] ?></td>
        <td><?php
         if($row['booking_status']==0){
          echo "Waiting for Confirmation...";
         } 
         else if($row['booking_status']==1){
          echo "Booking Confirmed...";
         }
         else if($row['booking_status']==2){
          echo "Sorry, you are booking has been canceled by the showroom.";
         }
         else if($row['booking_status']==3){
          echo "You are booking has been canceled";
         }
         else if($row['booking_status']==4){
          echo "Car Recieved! We will contact when the car is ready";
         }
         else if($row['booking_status']==5){
          echo "Service Finished!<br> Your car is ready for pickup.";
         }
         else if($row['booking_status']>=6){
          echo "Thank You. Happy Motoring!";
         }
         ?></td>
        <td><?php 
        if($row['booking_status']<=1){
          ?>
          <a href='MyBooking.php?bid=<?php echo $row['booking_id'] ?>' >Cancel</a>
          <?php
        }
        else if($row['booking_status']==6){
          ?>
          <a href='Feedback.php?bid=<?php echo $row['booking_id'] ?>' >Feedback</a>
          <?php
        }
        if($row['booking_status']>=5){
          ?>
          <a href='Bill.php?bid=<?php echo $row['booking_id'] ?>' >Download Bill</a>
          <?php
        }
        ?></td>
      </tr>
      <?php
      }
      ?>
    </table>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>