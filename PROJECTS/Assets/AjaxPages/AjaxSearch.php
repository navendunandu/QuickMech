
<?php
		session_start(); 
	include("../Connection/Connection.php");
	?>

<table border="1" table height="100" width="100" >
	<tr>
    
    	
        
        
       
        </tr>
    <?php
 	$i=0;
	$selQry="select * from tbl_branch where place_id = ".$_GET['pid'];
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
		?>
        <td colspan="2"  align="center">
             <table border="2" width="350">
             <tr>
             <td colspan="2"  align="center">
             
            
             <img src="../Assets/Files/UserDocs/<?php echo $row["branch_photo"]?>"width="130" height="110" />
            </td>
            </tr>
        <tr>
               <td>
                   <b>NAME: </b>
                   </td>
                   <td>
                   <?php echo $row["branch_name"]?>
                   </td>
                   </tr>
                   <tr>
                   <td>
					<b>ADDRESS:</b> 

               </td>
               <td>
               <?php echo $row["branch_address"]?>
               </td>
               </tr>
               <tr>
               <td>
               <b>E-MAIL:</b> 
               </td>
               <td>
               <?php echo $row["branch_email"]?>
               </td>
               </tr>
               <tr>
               <td>
               <b>CONTACT: </b>
               </td> 
               <td>
               <?php echo $row["branch_contact"]?> 
               </td>                                      
                   </tr>
                   <tr>
                    <td colspan="2" align="center">
                          <a href="ServiceSelect.php?did=<?php echo $row["branch_id"]?>">Book a visit</a>
                         </td>
                         </tr>
           <?php
	}
		     	
	
		   ?>


</table>