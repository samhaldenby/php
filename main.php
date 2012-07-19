<?php include ('mysql_helper_functions.php');
verify_session();

#grab user details
$dbh = get_db_handle();
$userInfo = retrieve_row($dbh, 'userInfo', $_SESSION['login'], 'userId');
$uFirstName = $userInfo['firstName'];
?>
<h1>You made it, <?php echo $uFirstName; ?>!</br></h1>
<?php
print "SessionId:".$_SESSION['login'];
?>


<!-- Create New Node Button -->
 <form method="LINK" action="create_node.php">
   <input type="submit" value="Create Node">
 </form>
 
<!-- Search For Node Button -->
<form method="LINK" action="search_for_node.php">
  <input type="submit" value="Search">
</form>



