 <?php
 include("../Connection/Connection.php"); 
 $selQry='select * from tbl_servicedetails sd inner join tbl_type t on t.type_id=sd.type_id inner join tbl_vehicle v on v.vehicle_id=sd.vehicle_id inner join tbl_vechicletype vt on vt.vechicletype_id=v.vehicletype_id where TRUE';
$i=0;
if($_GET['vt']!="")
{
	$selQry.=" AND vt.vechicletype_id=".$_GET['vt'];
}
if($_GET['vid']!="")
{
	$selQry.=" AND v.vehicle_id=".$_GET['vid'];
}
if($_GET['sid']!="")
{
	$selQry.=" AND t.type_id=".$_GET['sid'];
}
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++	;
?>
<td>
<p>Service Name:<?php echo $row["service_title"]?></p>
<p>Service Details:<?php echo $row["service_details"]?></p>
<p>Service Price:<?php echo $row["service_price"]?></p>
<p align="center"><a href="Booking.php?sid=<?php echo $row['service_id'] ?>">Book</a></p>
</td>
<?php
if($i==4)

{
	echo "</tr><tr>";
	$i=0;
}
	}
 ?>