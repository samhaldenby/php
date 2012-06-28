<html>
 <form action="action.php" method="post">
  <p>Your name: <input type="text" name="name" /></p>
  <p>Your age: <input type="text" name="age" /></p>
  <p><input type="submit" /></p>
 </form>
 
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
 echo '<p>Hello World</p>';
 if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE){
     echo 'You are using Internet Explorer. <br />'; 
 } else {
 	echo 'You are not using Internet Explorer. <br />';
 }
 ?>
 
 <form method="LINK" action="user_make_node.html">
 <input type="submit" value="Clickable Button">
 </form>
 </body>
</html>
