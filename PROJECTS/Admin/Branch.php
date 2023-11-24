<?php

	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btnsave"]))
{
		
		$dname=$_POST["txtbname"];
		$daddress=$_POST["txtaddress"];
		
		$PhotoName=$_FILES["filph"]["name"];
		$PatchName=$_FILES["filph"]["tmp_name"];
		move_uploaded_file($PatchName,"../Assets/Files/UserDocs/".$PhotoName);				
		
		$dplaceid=$_POST["ddlplace"];
		$demail=$_POST["txtemail"];
		$dcontact=$_POST["txtcontact"];
		$dpassword=$_POST["txtpassword"];
		$ins="insert into tbl_branch(branch_name,branch_address,branch_photo,place_id,branch_email,branch_contact,branch_password)values('$dname','$daddress','$PhotoName','$dplaceid','$demail','$dcontact','$dpassword')";
	mysql_query($ins);
}
      
   if(isset($_GET["did"]))
			{
				$did=$_GET["did"];
				$delQry="delete from tbl_branch  where branch_id='$did'";
				mysql_query($delQry);
				header("location:Branch.php");
			}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Type</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
     
    <tr>
      <th scope="row">Branch Name</th>
      <td><label for="txtbname"></label>
      <input  required type="text" name="txtbname" id="txtbname"    title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/ /></td>
    </tr>
    <tr>
      <th scope="row">Branch Address</th>
      <td><label for="txtaddress"></label>
      <input required type="text" name="txtaddress" id="txtaddress" /></td>
    </tr>
    <tr>
      <th scope="row">Branch photo</th>
      <td><label for="filph"></label>
      <input required type="file" name="filph" id="filph" /></td>
    </tr>
     <tr>
      <th scope="row">District</th>
      <td>
      <P>
      <label for="lstdis"></label>
        <select required name="lstdis" id="lstdis" onchange="getPlace(this.value)">
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
      <th scope="row">Place id</th>
      <td><label for="ddlplace"></label>
        <select name="ddlplace" id="ddlplace">
                 <option>-----Select-----</option>
       
        </select>
     
      </tr>
    <tr>
      <th scope="row">Branch Email</th>
      <td><label for="txtemail"></label>
      <input  required type="text" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <th scope="row">Branch Contact</th>
      <td><label for="txtcontact"></label>
      <input  required type="text" name="txtcontact" id="txtcontact" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with  10 digit from 0-9" /></td>
    </tr>
    <tr>
      <th scope="row">Branch Password</th>
      <td><label for="txtpassword"></label>
      <input  required type="text" name="txtpassword" id="txtpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" "  /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="btnsave" id="btnsave" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></th>
    </tr>
  </table>
  
   <table border="1" align="left">
	<tr>
    
    	
        <td>Branch id</td>
        <td>Branch Name</td>
        <td>Branch Address</td>
        <td>Branch photo</td>
       <td>Branch Email</td>
         <td>Branch Contact</td>
         <td>Branch Password</td>
        <td>Action</td>
        </tr>
    <?php
 	$i=0;
	$selQry="select * from tbl_branch";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
		?>
        <tr>
        	<td><?php echo $i?></td>
            
            <td><?php echo $row["branch_name"]?></td>
            <td><?php echo $row["branch_address"]?></td>
            <td><img src="../Assets/Files/UserDocs/<?php echo $row["branch_photo"]?>"width="75" height="75" /></td>
            <td><?php echo $row["branch_email"]?></td>
            
             
            <td><?php echo $row["branch_contact"]?></td>
           
           
            <td><?php echo $row["branch_password"]?></td>
           
            <td>
            <a href="Branch.php?did=<?php echo $row["branch_id"]?>">Delete</a>
           </td>
           </tr>
           <?php
	}
		     	
	
		   ?>
</form>
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
</script>
</html>

         