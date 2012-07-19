<?php include ('mysql_helper_functions.php');
	#Connect to MySQL
	
	function user_exists($userName, $dbh){
		$stmt = $dbh->prepare("SELECT * FROM loginInfo WHERE userName=:userName");
		$stmt->bindParam('userName', $userName);
		$stmt->execute();
		if ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
			return True;
		} else {
			return False;
		}
	}
	

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
		try {
			#Open connection
			$dbh = new PDO('mysql:host=localhost;dbname=samsDb', "sam", "chromosome");
		
			#check user exists
			if (user_exists($_POST['userName'], $dbh)){
				$correctPass = retrieve_variable($dbh, 'loginInfo', $_POST['userName'], 'userName', 'password');
			
				if ($correctPass === $_POST['password']){
					#log in
					echo "Logging in!<br/>";
					session_start();
					#retrieve user id as session login tag
					echo "Got here!<br/>";
					$id = retrieve_variable($dbh, 'loginInfo', $_POST['userName'], 'userName', 'userId');
					$_SESSION['login']=$id;
					print "Session ID:".$_SESSION['login']."<br/>";
					header("Location:main.php",2);
					
				} else {
					echo "Incorrect Password!<br/>";
					session_start();
					$_SESSION['login']="";
					header("Location:login_user.php",2);
				}
			} else {
				echo "User does not exist!<br/>";
				session_start();
				$_SESSION['login']="";
				header("Location:login_user.php",2);
			}
		
			#Close connection
			$dbh = null;
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}

?>

<html>
<head>
  <title>Login</title>
  <h1>Login</h1>
 </head>
<body>
<form method="post" action="login_user.php">
  <p>   User Name: <input type="text" name="userName" size="15" maxlength="15"/></p>
  <p>    Password: <input type="password" name="password" size="15" maxlength="15"/></p>
  <p><input type="submit" /></p>
</form>

<?PHP print $errorMessage;?>

</body>
</html>
