<?php
$servername="localhost";
$username="root";
$password="";
$DB="db_organicfarming";
$Conn=mysqli_connect($servername,$username,$password,$DB);
if(!$Conn)
{
	echo"Not Connected";
}
?>