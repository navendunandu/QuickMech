<?php

	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btnsave"]))
{
		$dname=$_POST["txtdist"];
		$ins="insert into tbl_district(district_name)values('$dname')";
	mysql_query($ins);
}
      
   if(isset($_GET["did"]))
			{
				$did=$_GET["did"];
				$delQry="delete from tbl_district where district_id='$did'";
				mysql_query($delQry);
				header("location: District.php");
			}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="272" border="1">
    <tr>
      <th scope="row">District Name </th>
      <td><label for="txtdist"></label>
      <input required="required" type="text" name="txtdist" id="txtdist" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="btnsave" id="btnsave" value="save" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></th>
    </tr>
  </table>

<table border="1" align="left">
	<tr>
    	<td>Sl.No</td>
        <td>District</td>
       
     
        <td>Action</td>
        </tr>
 <?php
 	$i=0;
	$selQry="select * from tbl_district";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
		?>
        <tr>
        	<td><?php echo $i?></td>
            <td><?php echo $row["district_name"]?></td>
            <td>
            <a href="District.php?did=<?php echo $row["district_id"]?>">Delete</a>
           </td>
           </tr>
           <?php
	}
		     	
	
		   ?>
           </table>
           
        </form>
        </body>
        </html>
			
				
    