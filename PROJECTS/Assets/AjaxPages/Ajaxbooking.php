<option>-----Select-----</option>

 <?php
 include("../Connection/Connection.php"); 

		
	$selqry = "select * from tbl_vehicle where vechicletype_id =".$_GET['did'];
	
	$data = mysql_query($selqry);
	while($row = mysql_fetch_array($data))
	{
		    
			?>
             <option value="<?php echo $row["vehicle_id"]?>"><?php echo $row["vehicle_name"]?></option>
                     <?php
	}
	?>