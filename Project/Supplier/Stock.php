<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsave"]))
{
	$date=$_POST["txtdate"];
	$quantity=$_POST["txtqty"];
	$pid=$_POST["txtpid"];
	
	
	$insQry ="insert into tbl_supplierstock(fstock_date,fstock_count,fproduct_id) values(curdate(),'".$quantity."','".$pid."')";
		    if($Conn->query($insQry))
	        {
		 		?>
        		<script>
				alert('inserted');
					location.href='Stock.php?pid=<?php echo $pid;?>';
				</script>
				<?php
				
			}
		    else
			{
				 ?>
				 <script>
				 alert('failed');
			   	 location.href='Stock.php';
				 </script>
				 <?php
	        }
			
      
   } 
 if(isset($_GET["did"]))
{
    $id=$_GET["did"];	
    $delQry="delete from tbl_supplierstock where fstock_id='".$id."'";
    if($Conn->query($delQry))
	{
	   ?>
        <script>
		alert('deleted!!');
		location.href='Stock.php?pid=<?php echo $_GET["pid"];?>';
		</script>
		<?php
	}
else
	{
		?>
        <script>
		alert('failed!!');
		location.href='Stock.php';
		</script>
		<?php
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chic&Co::Stock</title>
</head>

<body>
	<br><br><br><br><br>
	<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
<input type="hidden" name="txtpid" value="<?php echo $_GET["pid"]; ?>" />
<h1 align="center">Stock</h1>
  <table width="200" border="1" align="center">

    <tr>
      <td>Quantity</td>
      <td><label for="txtqty"></label>
      <input type="number" name="txtqty" id="txtqty" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btnsave" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <?php
      $i=0;
	  $selQry="select * from tbl_supplierstock where fproduct_id='".$_GET["pid"]."'";
	  $res=$Conn->Query($selQry);
	  if($res-> num_rows > 0)
	  {
	?>
  <table width="200" border="1" align="center">
    <tr>
    
      <td>Sl no</td>
      <td>Date</td>
      <td>Quantity</td>
      <td>Action</td>
    </tr>
    <?php
	while($row=$res->fetch_assoc())
	{
		$i++;
		
  ?>
   <tr>
	<td><?php echo $i;?></td> 
    <td><?php echo $row["fstock_date"];?></td>
    <td><?php echo $row["fstock_count"];?></td>
	<td><a href="Stock.php?did=<?php echo $row["fstock_id"];?>&pid=<?php echo $_GET["pid"]; ?>">Delete</a></td>
   
</tr>
<?php
	}
?>
  </table>
<?php


 }
 else
 {
  	?>
	<h1 align='center'>No Data Found<h1>
    <?php
 }

?>
</form>
	</div>
</body>

</html>
<?php
include("Foot.php");
ob_flush();
?>