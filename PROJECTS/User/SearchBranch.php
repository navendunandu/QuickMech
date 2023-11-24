<?php

	include("../Assets/Connection/Connection.php");
	
	 session_start();
	 if(isset($_GET["did"]))
	 {
		 $did=$GET["did"];
		 header("location:District.php");
	 }
?>		 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="Homepage.php">HOME</a>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <th scope="row">District</th>
      <td>
      <P>
      <label for="lstdis"></label>
        <select name="lstdis" id="lstdis" onchange="getPlace(this.value)">
                    <option>-----Select-----</option>
                    
                      <?php
		$selqry="select * from tbl_district";
		echo $selqry;
		$data=mysql_query($selqry);
		while($row=mysql_fetch_array($data))
		{
			?>
            <option value="<?php echo $row["district_id"]?>"><?php echo $row["district_name"]?></option>
			<?php
		}
		?>
      </select></P></td>
    </tr>
    <tr>
      <th scope="row">Place</th>
      <td><label for="ddlplace"></label>
        <select name="ddlplace" id="ddlplace" onchange="getSearch(this.value)" >
                  <option>-----Select-----</option>
                  
      </select></td>
    </tr>
    
  </table>
  </body>
  <body>
</form>
<div id="search" >



 
       
          <table>
          <tr>

    <?php
 	$i=0;
	$selQry="select * from tbl_branch";
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
                         </table>
                         </td>
                         
                         
                        
                 	
			<?php
			if($i==3)
			{
				echo "</tr><tr>";
				$i=0;
			}
	}
		   ?>
 </table>


</div>
</body>
<script src="../Assets/JQuery/jQuery.js"></script>
<script>
function getPlace(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(html){
		$("#ddlplace").html(html);
	  }
	});
}
function getSearch(pid)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxSearch.php?pid="+pid,
	  success: function(html){
		$("#search").html(html);
	  }
	});
}
</script>
</html>