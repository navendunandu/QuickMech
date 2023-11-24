<?php

	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btnsave"]))
{
		$dname=$_POST["txtadminname"];
		$dcontact=$_POST["txtcontact"];
		$demail=$_POST["txtemail"];
		$dpassword=$_POST["txtpassword"];
		
		$ins="insert into tbl_admin(admin_name,admin_contact,admin_email,admin_password)values('$dname','$dcontact','$demail','$dpassword')";
	mysql_query($ins);
}
       
   if(isset($_GET["did"]))
			{
				$did=$_GET["did"];
				$delQry="delete from tbl_admin where admin_id='$did'";
				mysql_query($delQry);
				header("location:Admin.php");
			}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="291" height="160" border="1">
    <tr>
      <th scope="row">Admin Name</th>
      <td><label for="txtadminname"></label>
      <input required type="text" name="txtadminname" id="txtadminname"  required  n title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <th scope="row">Contact</th>
      <td><label for="txtcontact"></label>
      <input required type="text" name="txtcontact" id="txtcontact"  pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with  10 digit from 0-9"/></td>
    </tr>
    <tr>
      <th scope="row">E-mail</th>
      <td><label for="txtemail"></label>
      <input required type="text" name="txtemail" id="txtemail"   /></td>
    </tr>
    <tr>
      <th scope="row">Password</th>
      <td><label for="txtpassword"></label>
      <input required type="text" name="txtpassword" id="txtpassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_pass" /></td>
      
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></th>
    </tr>
  </table>
   <table border="1" align="left">
	<tr>
    	<td>Sl.No</td>
        <td>Name</td>
         <td>Contact</td>
        <td>E-mail</td>
        <td>Password</td>
        <td>action</td>
        </tr>
 <?php
 	$i=0;
	$selQry="select * from tbl_admin";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
		?>
        <tr>
        	<td><?php echo $i?></td>
            <td><?php echo $row["admin_name"]?></td>
            <td><?php echo $row["admin_contact"]?></td>
            <td><?php echo $row["admin_email"]?></td>
            <td><?php echo $row["admin_password"]?></td>
            <td>
            <a href="Admin.php?did=<?php echo $row["admin_id"]?>">Delete</a>
           </td>
           </tr>
           <?php
	}
		     	
	
		   ?>
           </table>
</form>
</body>
</html>