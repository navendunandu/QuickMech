<?php

session_start();
ob_start();
include('Head.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>admin homepage</title>
</head>

<body>
<table width="200" border="1">
  <tr>
    <th scope="row">Welcome :: <?php echo  $_SESSION["adminname"] ?> </th>
  </tr>
  <tr>
    <th scope="row"><a href="Admin.php">Admin</a></th>
  </tr>
  <tr>
    <th scope="row"><a href="Branch.php">Branch</a></th>
  </tr>
  <tr>
     <th scope="row"><a href="VehicleType.php">VechilceType</a></th>
  </tr>
    <tr>
    <th scope="row"><a href="Type.php">ServiceType</a></th>
  </tr>
  <tr>
    <th scope="row"><a href="Changepassword.php">Changepassword</a></th>
  </tr>
 <tr>
    <th scope="row"><a href="District.php">District</a></th>
  </tr>
   <tr>
    <th scope="row"><a href="Place.php">Place</a></th>
  </tr>
     <tr>
    <th scope="row"><a href="ServiceDetails.php">ServiceDetails</a></th>
  </tr>
    
 
</table>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>