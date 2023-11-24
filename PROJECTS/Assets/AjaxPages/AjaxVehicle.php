         <option value="">-----Select-----</option>

 <?php
 include("../Connection/Connection.php"); 
 
	echo $selQry="select * from tbl_vehicle where vehicletype_id=".$_GET['did'];
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		?>
        
        <option value="<?php echo $row["vehicle_id"]?>"><?php echo $row["vehicle_name"]?></option>
        <?php
	}
	?>