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
		
			#check user does not already exist
			if (! user_exists($_POST['userName'], $dbh)){
		
		
				#Add user to loginInfo table
				$stmt = $dbh->prepare("INSERT INTO loginInfo (userName, password) VALUES (:userName, :password)");
				$stmt->bindParam(':userName', $name);
				$stmt->bindParam(':password', $pass);
				$name = $_POST['userName'];
				$pass = $_POST['password'];
				$stmt->execute();
		
				#retrieve userId
				$id = retrieve_variable($dbh, 'loginInfo', $_POST['userName'], 'userName', 'userId');


				#Add user details to userInfo table
				$stmt = $dbh->prepare("INSERT INTO userInfo (firstName, middleName, lastName, userId) VALUES (:firstName, :middleName, :lastName, :userId)");
				$stmt->bindParam(':firstName', $firstName);
				$stmt->bindParam(':middleName', $middleName);
				$stmt->bindParam(':lastName', $lastName);
				$stmt->bindParam(':userId', $id);
				$firstName = $_POST['firstName'];
				$middleName = $_POST['middleName'];
				$lastName = $_POST['lastName'];
				$stmt->execute();
			
				Print "Thank you for registering " . $firstName . ". We look forward to your input!<br/>";
			} else {
				#Return to registration page
				Print "That user already exists. Redirecting to registration page...<br/>";
				header('Refresh: 3; URL=register_user_FE.html');
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
<title>Register</title>
<h1>Register</h1>
<body>
<form method="post" action="register_user.php">
  <p>   User Name: <input type="text" name="userName" size="15" maxlength="15"/></p>
  <p>    Password: <input type="password" name="password" size="15" maxlength="15"/></p>
  <p>  First Name: <input type="text" name="firstName" size="30" maxlength="30"/></p>
  <p> Middle Name: <input type="text" name="middleName" size="30" maxlength="30"/></p>
  <p>   Last Name: <input type="text" name="lastName" size="40" maxlength="40"/></p>
  <p><input type="submit" /></p>
</form>

<?PHP print $errorMessage;?>

</body>
</html>
