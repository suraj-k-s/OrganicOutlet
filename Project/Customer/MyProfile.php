<?php
include('../Assets/Connection/Connection.php');
session_start();


$sel="select * from tbl_user where user_id=".$_SESSION["uid"];
	
    $res=$Conn->query($sel);
	$row=$res->fetch_assoc();
$name=$row["user_name"];
$contact=$row["user_contact"];
$email=$row["user_email"];
$address=$row["user_address"];

?>
<?php
include("Head.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" width="386" border="1">
    <tr>
      <td width="166">Name</td>
      <td width="204"><?php echo $name; ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $contact ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $email ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $address ?></td>
    </tr>
    <tr>
      <td height="29" align="center" colspan="2"><a href="EditProfile.php">Edit Profile</a><br /><a href="ChangePassword.php">Change Password</a></td>
    </tr>
  </table>
</form>
</body>
<?php
include("Foot.php"); 
?>
</html>