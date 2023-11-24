<?php

	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btnsub"]))
{
	    $placeid=$_POST["ddlplace"];
		$nname=$_POST["txtname"];
		$ngender=$_POST["radio"];
		$ncontact=$_POST["txtcon"];
		$nemail=$_POST["txtemail"];
		$npassword=$_POST["txtpass"];
		
		$PhotoName=$_FILES["filephoto"]["name"];
		$PatchName=$_FILES["filephoto"]["tmp_name"];
		move_uploaded_file($PatchName,"../Assets/Files/UserDocs/".$PhotoName);		

		$ins="insert into tbl_user(place_id,user_name,user_gender,user_contact,user_email,user_password,user_photo)values('$placeid','$nname','$ngender','$ncontact','$nemail','$npassword','$PhotoName')";
	mysql_query($ins);

	header("location:Newuser.php");
}
      
   if(isset($_GET["did"]))
			{
				$did=$_GET["did"];
				$delQry="delete from tbl_user where user_id='$did'";
				mysql_query($del);
				header("location:Newuser.php");
			}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>newuser</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="200" border="1">
    <tr>
      <th scope="row">Name</th>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"//></td>
    </tr>
    <tr>
      <th scope="row">Gender</th>
      <td><p>
        <input name="radio" type="radio" id="radio" value="Male" />        
        <label for="rdbtnmale">Male 
        </label>
      </p>
        <p>
          <input type="radio" name="radio" id="radio" value="Female" />
          <label for="rdogender"></label>
        Female</p>
    </tr>
    <tr>
      <th scope="row">Contact</th>
      <td><label for="txtcon"></label>
      <input type="text" name="txtcon" id="txtcon"  pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number with  10 digit from 0-9"/>        <label for="txtcont"></label></td>
    </tr>
    <tr>
      <th scope="row">E-mail</th>
      <td><input required="required" type="text" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <th scope="row">Password</th>
      <td><label for="txtpass"></label>
      <input type="text" name="txtpass" id="txtpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /></td>
    </tr>
    <tr>
      <th scope="row">Confirm Password</th>
      <td><label for="txtconpass"></label>
      <input type="text" name="txtconpass" id="txtconpass"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  /></td>
    </tr>
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
      <th >Place</th>
      <td><label for="ddlplace"></label>
        <select name="ddlplace" id="ddlplace">
                 <option>-----Select-----</option>

      
      </select></td>
    </tr>
    <tr>
      <th scope="row">Photo</th>
      <td><label for="Photo"></label>
      <input type="file" name="filephoto" id="filephoto" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="btnsub" id="btnsub" value="Submit" />
      <input type="submit" name="btncan" id="btncan" value="Cancel" /></th>
    </tr>
    <br />
    	
  </table>
    <br />
  <table border="1" align="center">
    <tr>
    <td>SL NO</td>
    <td>Name</td>
    <td>Gender</td>
    <td>Contact</td>
    <td>Email</td>
    <td>Password</td>
    <td>place</td>
    <td>Action</td>
    <?php
 	$i=0;
	$selQry="select * from tbl_user n inner join tbl_place d on n.place_id=d.place_id";
	$data=mysql_query($selQry);
	while($row=mysql_fetch_array($data))
	{
		$i++;
		?>
        <tr>
        	<td><?php echo $i?></td>
            <td><?php echo $row["user_name"]?></td>
           <td><?php echo $row["user_gender"]?></td>
           <td><?php echo $row["user_contact"]?></td>
           <td><?php echo $row["user_email"]?></td>
           <td><?php echo $row["user_password"]?></td>
           <td><?php echo $row["place_name"]?></td>
            <td>
            <a href="Newuser.php?did=<?php echo $row["user_id"]?>">Delete</a>
           </td>
           </tr>
           <?php
	}
		     	
	
		   ?>
  </table>
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
