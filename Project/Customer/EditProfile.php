
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

if(isset($_POST["btn_update"]))
{
	$na=$_POST["txt_name"];
	$co=$_POST["txt_contact"];
	$em=$_POST["txt_email"];
	$add=$_POST["txt_address"];
	
	$up="update tbl_user set user_name='".$na."',user_contact='".$co."' , user_email='".$em."' , user_address='".$add."' where user_id=".$_SESSION["uid"];
	if($Conn->query($up))
	{
		?>
		<script>
        alert("Profile Updated..")
		window.location='HomePage.php'
        </script>
		<?php
	}
}

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
  <table align="center" width="345" border="1">
    <tr>
      <td width="131">Name</td>
      <td width="113"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $name; ?>" /></td>
    </tr>
    <tr>
      <td height="29">Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $contact; ?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $email; ?>" /></td>
    </tr>
    <tr>
      <td height="34">Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" > <?php echo $address; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_update" id="btn_update" value="Update" />
      </div></td>
    </tr>
  </table>
</form>
</body>
<?php
include("Foot.php"); 
?>
</html>