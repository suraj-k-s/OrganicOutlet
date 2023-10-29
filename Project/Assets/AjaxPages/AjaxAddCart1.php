<?php
include("../Connection/Connection.php");
session_start();
$selqry="select * from tbl_supplierproductbooking where customer_id='".$_SESSION["uid"]."' and fpbooking_status='0'";

$result=$Conn->query($selqry);
if($result->num_rows>0)
{
	
	if($row=$result->fetch_assoc())
	{
		$bid = $row["fpbooking_id"];
		
		
		
		$selqry="select * from tbl_suppliercart where fpbooking_id='".$bid."' and fproduct_id='".$_GET["id"]."'";
		//echo $selqry;
		$result=$Conn->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
		
		 $insQry1="insert into tbl_suppliercart(fproduct_id,fpbooking_id)values('".$_GET["id"]."','".$bid."')";
         if($Conn->query($insQry1))
          { 
             echo "Added to Cart";
                        }
                        else
                        {
	                       echo"Failed";
                        }
		}
		
	}
	
}
else
{
	

$insQry=" insert into tbl_supplierproductbooking(customer_id,fpbooking_date)values('".$_SESSION["uid"]."',curdate())";
			if($Conn->query($insQry))
			{
				$selqry1="select MAX(fpbooking_id) as id from tbl_supplierproductbooking";
                $result=$Conn->query($selqry1);
				if($row=$result->fetch_assoc())
				{
					$bid=$row["id"];
					
					
					$selqry="select * from tbl_suppliercart where fpbooking_id='".$bid."'and fproduct_id='".$_GET["id"]."'";
		$result=$Conn->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
					
					
	                   $insQry1="insert into tbl_suppliercart(fproduct_id,fpbooking_id)values('".$_GET["id"]."','".$bid."')";
                        if($Conn->query($insQry1))
                        { 
                          echo "Added to Cart";
                        }
                        else
                        {
	                       echo"Failed";
                        }
					  
		}

                }
			}
}
?>