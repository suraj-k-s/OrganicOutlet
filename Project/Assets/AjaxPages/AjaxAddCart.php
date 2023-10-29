<?php
include("../Connection/Connection.php");
session_start();
$selqry="select * from tbl_sellerproductbooking where farmer_id='".$_SESSION["fid"]."' and spbooking_status='0'";

$result=$Conn->query($selqry);
if($result->num_rows>0)
{
	
	if($row=$result->fetch_assoc())
	{
		$bid = $row["spbooking_id"];
		
		
		
		$selqry="select * from tbl_sellercart where spbooking_id='".$bid."' and sproduct_id='".$_GET["id"]."'";
		//echo $selqry;
		$result=$Conn->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
		
		 $insQry1="insert into tbl_sellercart(sproduct_id,spbooking_id)values('".$_GET["id"]."','".$bid."')";
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
	

$insQry=" insert into tbl_sellerproductbooking(farmer_id,spbooking_date)values('".$_SESSION["fid"]."',curdate())";
			if($Conn->query($insQry))
			{
				$selqry1="select MAX(spbooking_id) as id from tbl_sellerproductbooking";
                $result=$Conn->query($selqry1);
				if($row=$result->fetch_assoc())
				{
					$bid=$row["id"];
					
					
					$selqry="select * from tbl_sellercart where spbooking_id='".$bid."'and sproduct_id='".$_GET["id"]."'";
		$result=$Conn->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to Cart";
			
		}
		else
		{
					
					
	                   $insQry1="insert into tbl_sellercart(sproduct_id,spbooking_id)values('".$_GET["id"]."','".$bid."')";
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