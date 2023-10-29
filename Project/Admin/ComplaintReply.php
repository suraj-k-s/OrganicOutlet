<?php
include('../Assets/Connection/Connection.php');
session_start();
 if(isset($_POST["btnsave"])) {

            $reply=$_POST["txtreply"];
			
			$insQry="update tbl_complaint set complaint_reply='".$reply."',complaint_status='1' where complaint_id='".$_POST["cid"]."'";
            if($Conn->query($insQry));
			
           header('Location:SolvedComplaintList.php');
        }


    ?>
<form name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Reply</td>
      <td><label for="txtreply"></label>
      <input type="text" name="txtreply" id="txtreply"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save">
        <input type="Reset" name="btncancel" id="btncancel" value="Cancel">
      </div></td>
    </tr>
  </table>
</form>