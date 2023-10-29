<?php
include("../Connection/Connection.php");
?>
 <option>-----Select-----</option>
      <?php
					$selQuery="select * from tbl_place where district_id = ".$_GET['did'];
					$result=$Conn->query($selQuery);
					while($data=$result->fetch_assoc())
						{
	
	?>
	<option value="<?php echo $data['place_id']?>"><?php echo $data['place_name']?></option>
	
	<?php
				      }
	?>