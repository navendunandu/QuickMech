

<?php

	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btnsubmit"]))
{
		$dname=$_POST["txttype"];
		$ins="insert into tbl_type(type_name)values('$dname')";
	mysql_query($ins);
}
      
   if(isset($_GET["did"]))
			{
				$did=$_GET["did"];
				$delQry="delete from tbl_type  where type_id='$did'";
				mysql_query($delQry);
				header("location:Type.php");
			}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Type</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <th scope="row">Typename</th>
      <td><label for="txttype"></label>
      <input type="text" name="txttype" id="txttype" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
    </tr>
    <tr>
      <th height="23" colspan="2" scope="row"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></th>
    </tr>
    </table>
    <table border="1" align="left">
	<tr>
    
    	<td>Sl.No</td>
        <td>Type</td>
       
     
        <td>Action</td>
        </tr>
    <?php
 	$i=0;
	$selQry="select * from tbl_type";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
		?>
        <tr>
        	<td><?php echo $i?></td>
            <td><?php echo $row["type_name"]?></td>
            <td>
            <a href="Type.php?did=<?php echo $row["type_id"]?>">Delete</a>
           </td>
           </tr>
           <?php
	}
		     	
	
		   ?>
  </table>
</form>
</body>
</html>