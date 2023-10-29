<?php
session_start();
include("../Connection/Connection.php");
?>
<?php

    if ($_GET["action"]=="Delete") {
        $id = $_GET["id"];
        $delQry = "delete from tbl_suppliercart where fcart_id='" .$id. "'";
        $Conn->query($delQry);
    }
    if ($_GET["action"]=="Update") {
        $id = $_GET["id"];
        $qty = $_GET["qty"];
        $upQry = "update tbl_suppliercart set fcart_quantity = '" .$qty. "' where fcart_id='" .$id. "'";
        $Conn->query($upQry);
    }
?>