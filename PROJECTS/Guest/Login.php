<?php
include("../Assets/Connection/Connection.php");

$message="";

session_start();
if(isset($_POST["btnLogin"]))
{
	       $email=$_POST["txtemail"];
		   $password=$_POST["txtpassword"];
		   
		   $selAdmin="SELECT * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
		                            $dataAdmin=mysql_query($selAdmin);
									
			
			$selUser="SELECT * from tbl_user where user_email='".$email."' and user_password='".$password."'";
		                            $dataUser=mysql_query($selUser);

			$selbranch="SELECT * from tbl_branch where branch_email='".$email."' and branch_password='".$password."'";
			$databranch=mysql_query($selbranch);
														
									
									if($rowAdmin=mysql_fetch_array($dataAdmin))
									{
										   $_SESSION["adminid"]=$rowAdmin["admin_id"];
										   $_SESSION["adminname"]=$rowAdmin["admin_name"];
										   header("location:../Admin/Homepage.php");
									}
									else if($rowUser=mysql_fetch_array($dataUser))
									{
										   $_SESSION["userid"]=$rowUser["user_id"];
										   $_SESSION["username"]=$rowUser["user_name"];
										   header("location:../User/Homepage.php");
									}
									else if($rowbranch=mysql_fetch_array($databranch))
									{
										   $_SESSION["branchid"]=$rowbranch["branch_id"];
										   $_SESSION["branchname"]=$rowbranch["branch_name"];
										   header("location:../branch/Homepage.php");
									}
									else
									{
										$message="Invalid login!!!";
										
									}
}
	?>								
           
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body background="../../volkswagen_scirocco_volkswagen_car_171320_1024x768.jpg">
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <th scope="row">Email</th>
      <td><label for="txtemail"></label>
      <input required="required" type="text" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <th scope="row">Password</th>
      <td><label for="txtpassword"></label>
      <input required="required" type="text" name="txtpassword" id="txtpassword"  title="Must contain at least one number  and at least 6 or more characters" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="btnLogin" id="btnLogin" value="login" />
      <input type="reset" name="btncamcel" id="btncamcel" value="cancel" /></th>
    </tr>
    <tr>
      <th colspan="2" scope="row"><?php echo $message?></th>
    </tr>
  </table>
</form>
</body>
</html>