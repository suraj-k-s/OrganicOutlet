<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsave"]))
{
	$name=$_POST["txtname"];
	$details=$_POST["txtdetails"];
	$price=$_POST["txtprice"];
	$producttype_id=$_POST["sel_producttype"];
	
	$photo=$_FILES["filephoto"]["name"];
	$path=$_FILES["filephoto"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Files/Photo/".$photo);
	
		
	$insQry ="insert into tbl_supplierproduct(producttype_id,fproduct_name,fproduct_photo,fproduct_details,fproduct_rate,supplier_id) values('".$producttype_id."','".$name."','".$photo."','".$details."','".$price."','".$_SESSION["fid"]."')";
	if($Conn->query($insQry))
    {
    	?>
   		<script>
		alert('inserted');
		location.href='Product.php';
		</script>
		<?php
	}
    else
	{
		 ?>
		 <script>
		 alert('failed');
	   	 location.href='Product.php';
		 </script>
		 <?php
    }
} 
 if(isset($_GET["id"]))
{
    $id=$_GET["id"];	
    $delQry="delete from tbl_supplierproduct where fproduct_id='".$_GET["id"]."'";
    if($Conn->query($delQry))
	{
	   ?>
        <script>
		alert('deleted!!');
		location.href='Product.php';
		</script>
		<?php
	}
else
	{
		?>
        <script>
		alert('failed!!');
		location.href='Product.php';
		</script>
		<?php
	}
}
 $pid="";
$pname="";
$sname="";

if(isset($_GET["pid"]))
{
	$selQry="select * from tbl_supplierproduct where fproduct_id='".$_GET["pid"]."'";
	$rel=$Conn->query($selQry);
	if($row=$rel->fetch_assoc())
{
	$pid=$row["fproduct_id"];
	$pname=$row["fproduct_name"];
	$sname=$row["producttype_id"];
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chic&Co::Product</title>
</head>

<body>
  <br><br><br><br><br>
  <div id="tab" align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<h1 align="center">Product</h1>
  <table  border="1" align="center">
    <tr>
      <td > Product Name</td>
      <td ><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td> Product Photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" required /></td>
    </tr>
    <tr>
      <td> Product Details</td>
      <td><label for="txtdetails"></label>
      <textarea name="txtdetails" id="txtdetails"cols="45" rows="5" autocomplete="off" required></textarea></td>
    </tr>
    <tr>
      <td> Product Price</td>
      <td><label for="txtprice"></label>
      <input type="number" name="txtprice" id="txtprice"  autocomplete="off" required/></td>
    </tr>
        <tr>
      <td>Product Category</td>
     <td><label for="sel_producttype"></label>
      <label for="sel_producttype"></label>
        <select name="sel_producttype" id="sel_producttype" autocomplete="off" required>
        <option value="">---select---</option>
        <?php
	  $categoryQry="select * from tbl_producttype";
	  $res=$Conn->Query($categoryQry);
	  while($row=$res->fetch_assoc())
	  {
	?>
    <option value=<?php echo $row["producttype_id"]; ?> > <?php echo $row["producttype_name"]; ?>
    </option>
    <?php
	  }?>
      </select></td>
    </tr>
   
      <td align="center"colspan="2"><input type="submit" name="btnsave" id="btnsave" value="submit" /></td>
    </tr>
  </table>
  <?php
  $i=0;
  $selQry="select * from tbl_supplierproduct p inner join tbl_producttype s on p.producttype_id=s.producttype_id where supplier_id='".$_SESSION["fid"]."'";
 
  $rel=$Conn->query($selQry);
  if($rel->num_rows>0)
  {
?>
  <table align="center"  border="1">
    <tr>
      <td>Sl no</td>
      <td>Product name</td>
      <td>Price</td>
      <td>Type</td>
      <td colspan="2" align="center">Action</td>
    </tr>
       <?php
	$i=0;
	
	while($row=$rel->fetch_assoc())
	{
		$i++;
?>
   <tr>
	<td><?php echo $i?></td> 
    <td><?php echo $row["fproduct_name"]?></td>
    <td><?php echo $row["fproduct_rate"]?></td>
    <td><?php echo $row["producttype_name"]?></td> 
	<td><a href="Product.php?id=<?php echo $row["fproduct_id"];?>">Delete</a></td>
    <td><a href="Stock.php?pid=<?php echo $row["fproduct_id"];?>">stock</a></td>
</tr>
<br>
<?php
	}
   }
   else
   {
	   echo "<h1 align='center'>No Data Found<h1>";
   }

?>   
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
  </div>
</body>

  <?php
include("Foot.php");
ob_flush();
?>
</html>