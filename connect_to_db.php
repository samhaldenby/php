<?php
echo ("Attempting connection");
$conn = mysql_connect("localhost","sam","chromosome") or die ("No connection to Server!");
echo ("Sucessfully Connected!");
echo ("<p>Connecting to Database...</p>");
mysql_select_db ("samsDb") or die ("No connection to Database!");
echo ("<p>Connected to Database!</p>");
?>
