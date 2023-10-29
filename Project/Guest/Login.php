<?PHP
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btnlogin"]))
{
	
	$email=$_POST["txtemail"];
	$password=$_POST["txtpassword"];

	
	$user="select * from tbl_customer where customer_email='".$email."' and customer_password='".$password."'";
	$uresult=$Conn->query($user);
	
	$supplier="select * from tbl_supplier where supplier_email='".$email."' and supplier_password='".$password."'";
	$fresult=$Conn->query($supplier);

	$admin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$adminresult=$Conn->query($admin);
	
	if($row=$uresult->fetch_assoc())
	{
		
		$_SESSION["uid"]=$row["customer_id"];
		$_SESSION["uname"]=$row["customer_name"];
		header("location:../Customer/HomePage.php");
	}
	
	
	
	else if($row=$fresult->fetch_assoc())
	{
		$_SESSION["fid"]=$row["supplier_id"];
		$_SESSION["fname"]=$row["supplier_name"];
		header("location:../Supplier/HomePage.php");
	}
	
	
	 else if ($row=$adminresult->fetch_assoc())
	{
		$_SESSION["aid"]=$row["admin_id"];
		$_SESSION["aname"]=$row["admin_name"];
		header("location:../Admin/HomePage.php");
	}
	else
	{
		?>
		<script>
        alert("Error In Email Or Password...")
        </script>
     	<?php
	}
}

    ?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<?php
include("Head.php"); 
?>
</head>

<body>
<div align="center" id="tab">
<h2>Login</h2>
<form id="form1" name="form1" method="post" action="">
    <table width="329" height="147" border="1">
      <tr>
        <td>Emial</td>
        <td><label for="txtemail"></label>
        <input type="email" name="txtemail" id="txtemail" require=""/></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><label for="txtpassword"></label>
        <input type="password" name="txtpassword" id="txtpassword" require=""/></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
          <input type="submit" name="btnlogin" id="btnlogin" value="login" />
        </div></td>
      </tr>
      
    </table>
</form>
</div>
</body>
<?php
include("Foot.php"); 
?>
</html>