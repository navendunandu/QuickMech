
<?php
		session_start(); 
	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btnsubmit"]))
{
		$dname=$_POST["txtname"];
		$dtype=$_POST["txtvtype"];
		
		
		
	$ins="insert into tbl_vehicle(vehicle_name,vehicletype_id)values('$dname','$dtype')";
		
	mysql_query($ins);
}
      
   if(isset($_GET["did"]))
			{
				$did=$_GET["did"];
				$delQry="delete from tbl_vehicle  where vehicle_id='$did'";
				mysql_query($delQry);
				header("location:AddVechicleDetails.php");
			}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Type</title>
</head>

<body>
<a href="../User/Homepage.php">HOME</a>
<form name="form1" method="post" action="">
  <table width="313" height="192" border="1" align="center">
    <tr>
      <th scope="row">Vehicle Name</th>
      <td><label for="txtname"></label>
      <input required="required" type="text" name="txtname" id="txtname" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"></td>
    </tr>
    <tr>
      <th scope="row">Vehicle type</th>
      <td><label for="txttype"></label>
        <label for="txtvtype"></label>
        <select name="txtvtype" id="txtvtype">
           <?php
 
	$selQry="select * from tbl_vechicletype";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		?>
        
        <option value="<?php echo $row["vechicletype_id"]?>"><?php echo $row["vechicletype_name"]?></option>
        <?php
	}
	?>
         
      </select></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit">
      <input type="submit" name="btncancel" id="btncancel" value="Cancel"></th>
    </tr>
  </table>
   <table border="1" align="center">
	<tr>
    
    	<td>Sl.No</td>
        <td>Vehicle name</td>
          <td>Vehicle type</td>
       
       
     
        <td>Action</td>
        </tr>
    <?php
 	$i=0;
 $selQry="select * from tbl_vehicle v inner join tbl_vechicletype t on v.vehicletype_id=t.vechicletype_id";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
		?>
        <tr>
        	<td><?php echo $i?></td>
            <td><?php echo $row["vehicle_name"]?></td>
             <td><?php echo $row["vechicletype_name"]?></td>
           
           
            <td>
            <a href="../User/AddVechicleDetails.php?did=<?php echo $row["vehicle_id"]?>">Delete</a>
           </td>
           </tr>
           <?php
	}
		     	
	
		   ?>
</form>
</body>
</html>

