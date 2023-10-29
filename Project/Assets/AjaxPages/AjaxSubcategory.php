<?php
include("../Connection/Connection.php");
?>
 <option>-----Select-----</option>
      <?php
					$selQuery="select * from tbl_subcategory where category_id = ".$_GET['did'];
					$result=$Conn->query($selQuery);
					while($data=$result->fetch_assoc())
						{
	
	?>
	<option value="<?php echo $data['subcategory_id']?>"><?php echo $data['subcategory_name']?></option>
	
	<?php
				      }
	?>