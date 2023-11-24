<?php

	include("../Assets/Connection/Connection.php");
 if(isset($_GET["did"]))
			{
				$did=$_GET["did"];
				$delQry="delete from tbl_user1 where user_id='$did'";
				mysql_query($del);
				header("location:Shopregistration.php");
			}
?>			


<title>Shoplist</title>
</head>
<body>

 <table>
    
  <table border="1" align="center">
    <tr>
    <td>SL NO</td>
    <td>Name</td>
    <td>Contact</td>
    <td>Email</td>
    <td>Adress</td>
    <td>District</td>
    <td>place</td>
    <td>Logo</td>
    <td>Proff</td>
    <td>Password</td>
   
   
    <?php
 	$i=0;
	$selQry="select * from tbl_shop n inner join tbl_place d on n.place_id=d.place_id inner join tbl_district di on     di.district_id=d.district_id"; 	
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
		?>
        <tr>
        	<td><?php echo $i?></td>
            <td><img src="../Assets/File/UserDocs/<?php echo $row["logo_photo"]?>" width="75" height="75"/></td>
            <td><?php echo $row["shop_name"]?></td>
           <td><?php echo $row["shop_contact"]?></td>
           <td><?php echo $row["shop_email"]?></td>
           <td><?php echo $row["shop_address"]?></td>
           <td><?php echo $row["shop_password"]?></td>
           
           <td><img src="../Assets/Files/UserDocs/<?php echo $row["shop_logo"]?>" width="75" height="50" /></td>
           <td><img src="../Assets/Files/UserDocs/<?php echo $row["shop_proof"]?>" width="75" height="50" /></td>
           <td><?php echo $row["shop_password"]?></td>
           <td><a href="../Admin/Shopregistration.php?did=<?php echo $row["shop_id"]?>">Delete</a>
           </td>
           </tr>
           <?php
	}
		     	
	
		   ?>
  </table>

</body>
</html>


