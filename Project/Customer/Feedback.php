<?php
include('../Assets/Connection/Connection.php');
session_start();
if(isset($_POST["btnsave"]))
{

	 $insQry="insert into tbl_feedback(feedback_content,user_id,feedback_date)values('".$_POST["txtcontent"]."','".$_SESSION["uid"]."',curdate())";
	if($Conn->query($insQry))
	{
		?>
        <script>
		alert("Data Inserted");
		</script>
        <?php
	}
}
if(isset($_GET['rejid']))
{
	$delQry="delete from tbl_feedback where feedback_id=".$_GET['rejid'];
	if($Conn->query($delQry))
	{
		header('Location:Feedback.php');
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
  <table align="center" width="200" border="1">
    <tr>
      <td>Content</td>
      <td><label for="txtcontent"></label>
      <input type="text" name="txtcontent" id="txtcontent" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save" />
        <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
<?php
include("Foot.php"); 
?>
</html>
<?php
$i=0;
$selQuery="select * from tbl_feedback where user_id=".$_SESSION["uid"];
$result=$Conn->query($selQuery);
if($result->num_rows>0)
{
?>

<table border="1" align="center">
<tr>
	<td>SINo</td>
    <td>Content</td>
    <td>posted Date</td>
    <td>Action</td>
 </tr>
<?php

while($data=$result->fetch_assoc())
{
	$i++;
	?>
	<tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data['feedback_content']?></td>
     <td><?php echo $data['feedback_date']?></td>
 <td><a href="Feedback.php?rejid=<?php echo $data["feedback_id"]?>">Delete</a></td>
    </tr>
    <?php
	}
	?>
	</table>
    <?php
}
?>