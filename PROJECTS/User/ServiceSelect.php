<?php
include("../Assets/Connection/Connection.php");
session_start();
$_SESSION['bid']=$_GET['did'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body onload="getService()">
<a href="Homepage.php">HOME</a>

<table border="1" cellspacing="10" cellpadding="10">
  <tr>
    <td>
      <label for="txtvtype">Vehicle Type</label>
      <select name="txtvtype" id="txtvtype"  onchange="getVehicle(this.value),getService()">
       <option value="">-----Select-----</option>
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
    <td><label for="txtvehicle">Vehicle</label>
      <select name="txtvehicle" id="txtvehicle" onchange="getService()">
      <option value="">-----Select-----</option>
        
    </select></td>
    <td><label for="txtstype">Service Type</label>
      <select name="txtstype" id="txtstype" onchange="getService()">
      <option value="">-----Select-----</option>
         <?php
 
	$selQry="select * from tbl_type";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		?>
        
        <option value="<?php echo $row["type_id"]?>"><?php echo $row["type_name"]?></option>
        <?php
	}
	?>
    </select></td>
  </tr>
</table>
<table border="1" cellpadding="10" cellspacing="20">
  <tr id='result'>
<?php

?>
</tr>
</table>
</body>
</html>
<script src="../Assets/JQuery/jQuery.js"></script>
<script>
function getVehicle(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxVehicle.php?did="+did,
	  success: function(html){
		$("#txtvehicle").html(html);
	  }
	});
}

function getService()
{
	var vt=document.getElementById('txtvtype').value;
	var vid=document.getElementById('txtvehicle').value;
	var sid  =document.getElementById('txtstype').value;
	$.ajax({
	  url:"../Assets/AjaxPages/AjaxServiceSearch.php?vid="+vid+"&vt="+vt+"&sid="+sid,
	  success: function(html){
		$("#result").html(html);
	  }
	});
}
</script>
</html>