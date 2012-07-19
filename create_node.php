
 
<?php include ('mysql_helper_functions.php');
verify_session();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	print $_POST[title]."</br>";
	print $_POST[body]."</br>";
	print $_POST[tags]."</br>";
	
	#retrieve userId
	$userId = $_SESSION['login'];

	$dbh = get_db_handle();
	#Add user details to userInfo table NOT CURRENTLY WORKING!
	$stmt = $dbh->prepare("INSERT INTO nodesInfo (userId, title, body, datePosted) VALUES (:userId, :title, :body, NOW() )");
	$stmt->bindParam(':userId', $userId);
	$stmt->bindParam(':title', $_POST[title]);
	$stmt->bindParam(':body', $_POST[body]);
	#$stmt->bindParam(':datePosted', date(DATE_RFC822));
	$stmt->execute();
} else {
?>



<Title>Create Node</Title>
<h1>Create Node</h1>
When writing your thoughts try to follow the following guidelines <br/>
<ul>
 <li> Be as clear as possible. Passionate ramblings are allowed and welcoming in other subnodes (perhaps?), but best avoided here </li>
 <li> Please, no swearing </li>
 <li> Try to avoid being offensive. Clearly, some points will necessitate offense towards someone, but don't go out of your way to deliberately incite </li>
</ul>
<html>
<head>

<body>
<form method="post" action="create_node.php">
  <p>   Title: <input type="text" name="title" size="100" maxlength="100"/></p>
  <p>    Body: <textarea cols="100" rows="10" name="body">Democracy starts right here....</textarea></p>
  <p>    Tags (comma-separated): <input type="text" name="tags" size="100"/></p>
  <p><input type="submit" /></p>
</form>

<?PHP }; print $errorMessage;?>

</body>
</html>
