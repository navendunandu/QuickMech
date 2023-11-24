<?php

	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btnsave"]))
{
		$did=$_POST["txtserid"];
		$dtitle=$_POST["txtsertitle"];
		$ddetailss=$_POST["txtserdeta"];
		$dprice=$_POST["txtserprice"];
		$ddtype=$_POST["ddtype"];
		$dtype=$_POST["btntype"];
		$dvehicleid=$_POST["ddvehicle"];
		
		
		$ins="insert into tbl_servicedetails(service_id,service_title,service_details,service_price,type_id,service_image,vehicle_id)values('$did','$dtitle','$ddetailss','$dprice','$ddtype','$dtype','$dvehicleid')";
	mysql_query($ins);
	header("location:ServiceDetails.php");
}
      
   if(isset($_GET["did"]))
			{
				$did=$_GET["did"];
				$delQry="delete from tbl_servicedetails  where service_id='$did'";
				mysql_query($delQry);
				header("location:ServiceDetails.php");
			}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <th scope="row">Service title</th>
      <td><label for="txtsertitle"></label>
      <input required type="text" name="txtsertitle" id="txtsertitle" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
    </tr>
    <tr>
      <th scope="row">Service details</th>
      <td><label for="txtserdeta"></label>
      <input type="text" name="txtserdeta" id="txtserdeta" title="Name Allows Only Alphabets,Spaces " pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <th scope="row">Service price</th>
      <td><label for="txtserprice"></label>
      <input type="text" name="txtserprice" id="txtserprice" title=" Allows Only Digits from0-9" /></td>
    </tr>
    <tr>
      <th scope="row">Service type </th>
      <td><label for="ddtype"></label>
        <select name="ddtype" id="ddtype">
        <option>-----Select-----</option>
          <?php
		$selqry="select * from tbl_type";
		echo $selqry;
		$data=mysql_query($selqry);
		while($row=mysql_fetch_array($data))
		{
			?>
            <option value="<?php echo $row["type_id"]?>"><?php echo $row["type_name"]?></option>
            
		<?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <th scope="row">Vehicle Type</th>
      <td><label for="ffimage"></label>
        <label for="btntype"></label>
        <select name="btntype" id="btntype"  onchange="getservice(this.value)">
        <option value="">-----Select-----</option>
          <?php
		$selqry="select * from tbl_vechicletype";
		echo $selqry;
		$data=mysql_query($selqry);
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
      <th scope="row">vehicle </th>
      <td><label for="ddvehicle"></label>
        <select name="ddvehicle" id="ddvehicle">
        <option>-----Select-----</option>
        <?php
		$selqry="select * from tbl_vehicle";
		echo $selqry;
		$data=mysql_query($selqry);
		while($row=mysql_fetch_array($data))        
		{
			?>
            <option value="<?php echo $row["vehicle_id"]?>"><?php echo $row["vehicle_name"]?></option>
            
		<?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <th height="28" colspan="2" scope="row"><input type="submit" name="btnsave" id="btnsave" value="submit" />
      <input type="submit" name="btncancel" id="btncancel" value="cancel" /></th>
    </tr>
  </table>
  
   <table border="1" align="left">
	<tr>
    
    	<td>SL NO.</td>
        <td>Service id</td>
        <td>Service title</td>
        <td>Service details</td>
        <td>Service price</td>
        <td>Service type</td>
        <td>Vehicle Type</td>
        <td>Vehicle </td>
       
     
        <td>Action</td>
        </tr>
    <?php
 	$i=0;
	$selQry="select * from tbl_servicedetails";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
		?>
        <tr>
        	<td><?php echo $i?></td>
            <td><?php echo $row["service_id"]?></td>
            <td><?php echo $row["service_title"]?></td>
            <td><?php echo $row["service_details"]?></td>
            <td><?php echo $row["service_price"]?></td>
            <td><?php echo $row["type_id"]?></td>
            <td><?php echo $row["vehicle_id"]?></td>
          
            
            
            
          
            
           
            <td>
            <a href="ServiceDetails.php?did=<?php echo $row["service_id"]?>">Delete</a>
           </td>
           </tr>
           <?php
	}
		     	
	
		   ?>
</form>
</body>
</html>
<script src="../Assets/JQuery/jQuery.js"></script>
<script>
function getservice(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxService.php?did="+did,
	  success: function(html){
		$("#ddvehicle").html(html);
	  }
	});
}
</script>
</html>