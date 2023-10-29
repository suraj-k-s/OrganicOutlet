<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
$selQry="select *from tbl_supplierproductbooking b inner join tbl_suppliercart c on c.fpbooking_id=b.fpbooking_id inner join tbl_supplierproduct p on p.fproduct_id=c.fproduct_id where p.supplier_id='".$_SESSION["fid"]."' and b.fpbooking_status!='0' and c.fcart_status!='0'";
$res=$Conn->query($selQry);
if(isset($_GET["cid"]))

	{
		$upQry="update tbl_suppliercart set fcart_status='".$_GET["sts"]."' where fcart_id='".$_GET["cid"]."' ";
		if($Conn->query($upQry))
		{
			?>
            <script>
				window.location="OrderDetails.php";
			</script>
            <?php
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
	<br><br><br><br><br>
<h1 align="center">Order Details</h1>
<div id="tab" align="center">
<div align="center">
  <table  border="1">
    <tr>
      <td>SlNo</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total Amount</td>
      <td>Action</td>
    </tr>
    <?php 
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$quantity=$row["fcart_quantity"];
		$price=$row["fproduct_rate"];
		$totalamount=$quantity*$price;
		$i++;
		?>
        <tr>
            <td><?php echo $i;?></td> 
            <td><?php echo $row["fproduct_name"];?></td> 
            <td><img src="../Assets/Files/Photo/<?php echo $row["fproduct_photo"];?>" width="47" /></td>
            <td><?php echo $row["fcart_quantity"];?></td>
            <td><?php echo $row["fproduct_rate"];?></td>
            <td><?php echo $totalamount;?></td>
	        <td>
                <?php  if($row["fpbooking_status"]==2 && $row["fcart_status"]==1)
					{
						
						?>
                        payment completed /
                        <a href="OrderDetails.php?cid=<?php echo $row ["fcart_id"];?>&sts=2">Pack product</a>
                        <?php 
					}
					else if($row["fpbooking_status"]==2 && $row["fcart_status"]==2)
					{
						?>
                        product packed /
                        <a href="OrderDetails.php?cid=<?php echo $row ["fcart_id"];?>&sts=3">Ship Product</a>
                        <?php 
					}
					else if($row["fpbooking_status"]==2 && $row["fcart_status"]==3)
					{
						?>
                        product shipped /
                        <a href="OrderDetails.php?cid=<?php echo $row ["fcart_id"];?>&sts=4">Product Delivered</a>
                        <?php 
					}
					else if($row["fpbooking_status"]==2 && $row["fcart_status"]==4)
					{
						?>
                       Order Completed
                        <?php 
					}
					?>
                    </td>
                    
				
       </tr>
<?php
	}
	?>
  </table>
</div>
</div>
</body>
<?php 
include("Foot.php");
ob_flush();
?>
</html>