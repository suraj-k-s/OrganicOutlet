
<?php
include('../Assets/Connection/Connection.php');
session_start();


if(isset($_POST["btn_update"]))
{
	$sel="select * from tbl_user where user_id=".$_SESSION["uid"];
	$res=$Conn->query($sel);
	$row=$res->fetch_assoc();
	$oldpass=$row["user_password"];
	$curr=$_POST["txt_currentpassword"];
	$new=$_POST["txt_newpassword"];
	$confirm=$_POST["txt_confirmpassword"];
	
	if($oldpass == $curr)
	{
		if($new == $confirm)
		{
			$up="update tbl_user set user_password='".$confirm."' where user_id=".$_SESSION["uid"];
			if($Conn->query($up))
			{
				?>
				<script>
                alert("Password Updated..")
                window.location='HomePage.php'
                </script>
                <?php
			}
		}
		else
		{
			?>
			<script>
            alert("Error Confirm Password ..")
            </script>
            <?php
		}
	}
	else
	{
		?>
		<script>
        alert("Error in Current Password..")
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
  <table align="center" width="486" height="198" border="1">
    <tr>
      <td>Current Password</td>
      <td><label for="txt_currentpassword"></label>
      <input type="text" name="txt_currentpassword" id="txt_currentpassword" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="text" name="txt_newpassword" id="txt_newpassword" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_confirmpassword"></label>
      <input type="text" name="txt_confirmpassword" id="txt_confirmpassword" /></td>
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