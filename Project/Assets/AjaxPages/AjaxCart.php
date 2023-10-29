<?php
session_start();
include("../Connection/Connection.php");
?>
<?php

    if ($_GET["action"]=="Delete") {
        $id = $_GET["id"];
        $delQry = "delete from tbl_sellercart where scart_id='" .$id. "'";
        $Conn->query($delQry);
    }
    if ($_GET["action"]=="Update") {
        $id = $_GET["id"];
        $qty = $_GET["qty"];
        $upQry = "update tbl_sellercart set scart_quantity = '" .$qty. "' where scart_id='" .$id. "'";
        $Conn->query($upQry);
    }
?>