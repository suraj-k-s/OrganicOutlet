<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
	{
		$selQry="select * from tbl_supplierproductbooking b inner join tbl_suppliercart c on c.fpbooking_id = b.fpbooking_id inner join  tbl_supplierproduct p on p.fproduct_id = c.fproduct_id inner join tbl_supplier k on k.supplier_id=p.supplier_id where customer_id='".$_SESSION["uid"]."' and fpbooking_status>0 and fcart_status>0"; 
	$res=$Conn->query($selQry);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<br><br><br><br><br>
	<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
<table border="1">
  <tr>
    <td>SlNo</td>
    <td>Name</td>
    <td>Photo</td>
    <td>Quantity</td>
    <td>Total amount</td>
    <td>supplier Name</td>
    <td>Status</td>
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
    <td><?php echo  "$totalamount";?></td>
    <td><?php echo $row["supplier_name"];?></td>
	<td>
    <?php 
	      if($row["fpbooking_status"]==1 && $row["fcart_status"]==1)
					{
						?>
                        payment Pending 
                        <?php 
					}
					else if($row["fpbooking_status"]==2 && $row["fcart_status"]==1)
					{
						?>
                      Payment Completed
                       
                        <?php 
					}
					else if($row["fpbooking_status"]==2 && $row["fcart_status"]==2)
					{
						?>
                       Product Packed
                      
                        <?php 
					}
					else if($row["fpbooking_status"]==2 && $row["fcart_status"]==3)
					{
						?>
                      Product Shipped
                        <?php 
					}
					else if($row["fpbooking_status"]==2 && $row["fcart_status"]==4)
					{
						?>
                           Order Completed /
                           <a href="bill.php?id=<?php echo $row["fcart_id"]; ?>">Bill</a>/
                           <a href="ProductRating.php?pid=<?php echo $row["fproduct_id"]; ?>">Review</a>
                        <?php 
					}
					?>
                    </td>
                    
					
       </tr>
<?php
	}
	}
	
	?>
    
</table>

</form>
	</div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>