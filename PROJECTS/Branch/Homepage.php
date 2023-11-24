<?php

session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>user homepage</title>
</head>

<body>
  <table width="200" border="1">
    <tr>
       <th scope="row">Welcome :: <?php echo  $_SESSION["branchname"] ?> </th>
    </tr>
    <tr>
     <th scope="row"><a href="Editprofile.php">Editprofile</a></th>
    </tr>
    <tr>
      <th scope="row"><a href="Changepassword.php">Changepassword</a></th>
    </tr>
     <tr>
     <th scope="row"><a href="Myprofile.php">Myprofile</a></th>
    </tr>
  </table>
</form>
</body>
</html>