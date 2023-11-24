<?php

	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btnsave"]))
{
		$pname=$_POST["txtplace"];
		$districtid=$_POST["seldist"];
		$ins="insert into tbl_place(place_name,district_id)values('$pname','$districtid')";
	mysql_query($ins);
}
?>
<?php        
   if(isset($_GET["did"]))
			{
				$did=$_GET["did"];
				$delQry="delete from tbl_place where place_id='$did'";
				mysql_query($delQry);
				header("location: Place.php");
			}
	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>place</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="272" border="1">
    <tr>
      <th width="121" scope="row">District Name</th>
      <td width="135"><label for="seldist"></label>
      
      
      
        <select required name="seldist" id="seldist">
        
        
         <?php
 
	$selQry="select * from tbl_district";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		?>
        
        <option value="<?php echo $row["district_id"]?>"><?php echo $row["district_name"]?></option>
        <?php
	}
	?>
         
      </select>
      
      
      
      </td>
    </tr>
    <tr>
      <th scope="row">Place Name</th>
      <td><label for="txtplace"></label>
      <input required="required" type="text" name="txtplace" id="txtplace" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="btnsave" id="btnsave" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></th>
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
	$selQry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
		?>
        <tr>
        	<td><?php echo $i?></td>
            <td><?php echo $row["place_name"]?></td>
            <td><?php echo $row["district_name"]?></td>
            <td>
            <a href="Place.php?did=<?php echo $row["place_id"]?>">Delete</a>
           </td>
           </tr>
           <?php
	}
		     	
	
		   ?>
           </table>
</form>
</body>
</html>