<?php

	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btnsave"]))
{
		$dname=$_POST["txtsub"];
		$ins="insert into tbl_subcategory(subcategory_name)values('$dname')";
	mysql_query($ins);
}
?>
<?php        
   if(isset($_GET["did"]))
			{
				$did=$_GET["did"];
				$delQry="delete from tbl_subcategory where subcategory_id='$did'";
				mysql_query($delQry);
				header("location: Subcategory.php");
			}
	?>
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="235" height="105" border="1">
    <tr>
      <th width="134" scope="row">Category Name</th>
      <td width="85"><label for="selcat"></label>
        <select name="selcat" id="selcat">
      </select></td>
    </tr>
    <tr>
      <th scope="row">Subcategory Name</th>
      <td><label for="txtsub"></label>
      <input type="text" name="txtsub" id="txtsub" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="btnsave" id="btnsave" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></th>
    </tr>
  </table>
   <table border="1" align="left">
	<tr>
    	<td>Sl.No</td>
        <td>District</td>
         <td>Place</td>
        <td>Action</td>
        </tr>
 <?php
 	$i=0;
	$selQry="select * from tbl_subcategory";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
		?>
        <tr>
        	<td><?php echo $i?></td>
            <td><?php echo $row["subcategory_name"]?></td>
            <td>
            <a href="Subcategory.php?did=<?php echo $row["subcategory_id"]?>">Delete</a>
           </td>
           </tr>
           <?php
	}
		     	
	
		   ?>
           </table>
</form>
</body>
</html>