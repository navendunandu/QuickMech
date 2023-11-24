<?php

	include("../Assets/Connection/Connection.php");
  session_start();
	if(isset($_POST["btnsave"]))
{
		$ddate=$_POST["txtdate"];
		$dtime=$_POST["txttime"];
		$ddetails=$_POST["txtdetails"];
		$service=$_GET['sid'];
    $branch=$_SESSION['bid'];
		$user=$_SESSION['userid'];
		$vno=$_POST['txtvno'];
		$vid=$_POST['txtvin'];
		$ins="INSERT INTO tbl_booking(`booking_fordate`, `booking_fortime`,`booking_details`, booking_date, service_id, user_id, vehicle_no,vehicle_vinno,branch_id) VALUES ('$ddate','$dtime','$ddetails',curdate(),'$service', '$user', '$vno','$vid','$branch' )";
	  if(mysql_query($ins)){
      $_SESSION['bid']="";
	header("location:Booking.php");
    }
	
}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="Homepage.php">HOME</a>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>For Date</td>
      <td><label for="txtdate"></label>
      <input required="required" type="date" name="txtdate" id="txtdate" /></td>
    </tr>
    <tr>
      <td>For Time</td>
      <td><label for="txttime"></label>
      <input required="required" type="time" name="txttime" id="txttime" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txtdetails"></label>
      <textarea required="required" name="txtdetails" id="txtdetails" cols="45" rows="5" title=" Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"></textarea></td>
    </tr>
    <tr>
      <td>Vehicle no</td>
      <td><label for="txtvno"></label>
      <input required="required" type="text" name="txtvno" id="txtvno" /></td>
    </tr>
	   <tr>
      <td>VIN NO</td>
      <td><label for="txtvin"></label>
      <input required="required" type="text" name="txtvin" id="txtvin" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
	  
  </table>
   
</form>
</body>
</html> 
</html>