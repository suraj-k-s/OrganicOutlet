<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "SELECT * from tbl_supplier p inner join tbl_supplierproduct k on k.supplier_id=p.supplier_id inner join tbl_producttype pt on pt.producttype_id=k.producttype_id where true ";
       
        if ($_GET["producttype"]!=null) {

            $producttype = $_GET["producttype"];

            $sqlQry = $sqlQry." AND pt.producttype_id IN(".$producttype.")";
        }
       
		
		if ($_GET["name"]!=null) {

            $name = $_GET["name"];

            $sqlQry = $sqlQry." AND fproduct_name LIKE '".$name."%'";
        }
        $resultS = $Conn->query($sqlQry);
        
       

        if ($resultS->num_rows > 0) {
            while ($rowS = $resultS->fetch_assoc()) {
?>

<div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/Files/Photo/<?php echo $rowS["fproduct_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $rowS["fproduct_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $rowS["fproduct_rate"]; ?>/-
                                        </h4>
                                        <p align="center">
                                            <?php echo $rowS["producttype_name"]; ?><br>
                                        </p>
                                            <?php
										
									
										
											
									
                                            $stock = "select sum(fstock_count) as stock from tbl_supplierstock where fproduct_id = '" . $rowS["fproduct_id"] . "'";
											$result2 = $Conn->query($stock);
                            				$row2=$result2->fetch_assoc();
											
											$stocka = "select sum(fcart_quantity) as stock from tbl_suppliercart where fproduct_id = '" . $rowS["fproduct_id"] . "'";
											$result2a = $Conn->query($stocka);
                            				$row2a=$result2a->fetch_assoc();
											
											$stock = $row2["stock"] - $row2a["stock"];
											?>
                                            <p align="center" style="color:#F96;font-size:20px">Qty <?php echo $stock; ?>-Left</p>
                                            <?php
											
                                                if ($stock > 0) {
                                        ?>
                                        <a href="javascript:void(0)" onclick="addCart('<?php echo $rowS["fproduct_id"]; ?>')" class="btn btn-success btn-block">Add to Cart</a>
                                        <?php
                                        } else if ($stock == 0) {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                        <?php
                                            }
                                         else {
                                        ?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
            }
        } else {
             echo "<h4 align='center'>Products Not Found!!!!</h4>";
        }
    }

?>