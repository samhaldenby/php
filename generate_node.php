
<?php include ("class_lib.php");

$newNode = new node(1);
$newNode->set_title($_POST['title']);
$newNode->set_message($_POST['message']);
$newNode->set_author($_POST['name']);
?>

<b><?php echo $newNode->get_title(); ?></b><br />
	<?php echo $newNode->get_message(); ?><br />

<i><?php echo $newNode->get_author(); ?><br />	
	

