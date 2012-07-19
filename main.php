<?php include ('mysql_helper_functions.php');
session_start();

#Check that the user should actually be here!
if($_SESSION['login']==""){
	header("Location:login_user.php");
}

#grab user details
$dbh = get_db_handle();
$userInfo = retrieve_row($dbh, 'userInfo', $_SESSION['login'], 'userId');
$uFirstName = $userInfo['firstName'];
?>
<h1>You made it, <?php echo $uFirstName; ?>!</br></h1>
<?php
print "SessionId:".$_SESSION['login'];
?>
