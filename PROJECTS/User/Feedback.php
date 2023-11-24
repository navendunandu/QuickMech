<?php
	include("../Assets/Connection/Connection.php");
  session_start();
  if($_POST['btnsave']){
   $insQry="INSERT INTO tbl_feedback (feedback_qstn1, feedback_qstn2, feedback_qstn3, feedback_qstn4, feedback_qstn5,feedback_qstn6, feedback_qstn7, feedback_msg, booking_id) VALUES ('".$_POST['qstn1']."','".$_POST['qstn2']."','".$_POST['qstn3']."','".$_POST['qstn4']."','".$_POST['qstn5']."','".$_POST['qstn6']."','".$_POST['qstn7']."','".$_POST['txtmsg']."',".$_GET['bid'].")";
    if(mysql_query($insQry)){
      ?>
      <script>
        alert('Thank you for your valuable feedback!');
      </script>
      <?php
      $updQry='update tbl_booking set booking_status=7 where booking_id='.$_GET['bid'];
      if(mysql_query($updQry)){
        ?>
        <script>
        window.location='MyBooking.php';
        </script>
        <?php
      }
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="1" >
    <tr>
      <td><p>QUESTIONS</p></td>
      <td>ANSWER</td>
    </tr>
    <tr>
      <td>How helpful was Service Advisor?.</td>
      <td><p>
          <input type="radio" name="qstn1" id="qstn1" value='YES'/>
        YES</p>
        <p>
          <input type="radio" name="qstn1" id="qstn1" value="NO" />
          NO
        </p></td>
    </tr>
    <tr>
      <td>How easy was it to Schedule an appointment?.</td>
      <td><p>
          <input type="radio" name="qstn2" id="qstn2" value='YES' />
        YES</p>
        <p>
          <input type="radio" name="qstn2" id="qstn2" value="NO" />
          NO
        </p></td>
    </tr>
    <tr>
      <td>Were the service hours convinent for you?</td>
      <td><p>
          <input type="radio" name="qstn3" id="qstn3" value='YES' />
        YES</p>
        <p>
          <input type="radio" name="qstn3" id="qstn3" value="NO" />
          NO
        </p></td>
    </tr>
    <tr>
      <td>Staff were friendly and helpful?</td>
      <td><p>
          <input type="radio" name="qstn4" id="qstn4" value='YES' />
        YES</p>
        <p>
          <input type="radio" name="qstn4" id="qstn4" value="NO" />
          NO
        </p></td>
    </tr>
    <tr>
      <td>How satisfied were you with the quality of our service?</td>
      <td><p>
          <input type="radio" name="qstn5" id="qstn5" value='YES' />
        YES</p>
        <p>
          <input type="radio" name="qstn5" id="qstn5" value="NO" />
          NO
        </p></td>
    </tr>
    <tr>
      <td>How likely is it that you would reccomend our service center to friend or colleague?</td>
      <td><p>
          <input type="radio" name="qstn6" id="qstn6" value='Not at all likely' />
          Not at all likely</p>
        <p>
          <input type="radio" name="qstn6" id="qstn6" value='Extreamely likely' />
          Extreamely likely
        </p></td>
    </tr>
    <tr>
      <td>How did you hear about us?</td>
      <td><p>
          <input type="radio" name="qstn7" id="qstn7" value='Friend,Family or colleague' />
          Friend,Family or colleague</p>
        <p>
          <input type="radio" name="qstn7" id="qstn7" value='Advertisement' />Advertisement
          
        </p>
		<p>
          <input type="radio" name="qstn7" id="qstn7" value='other' />other</p></td>
    </tr>
    <tr>
      <td>Message</td>
      <td>
        <textarea name="txtmsg" id="txtmsg" cols="30" rows="10"></textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>