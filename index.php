<?php include ("class_lib.php");

	$myIdea = new node(1);
	$myIdea->set_title("Ban something or other!");
	$myIdea->set_message("This has been going on for too long! Surely it's about time we changed it, blah blah");
?>

	<b><?php echo $myIdea->get_title(); ?></b><br />
	<?php echo $myIdea->get_message(); ?><br />
	
<?php	
	$myArray[1]="Sam";
	$myArray["Last"]="Haldenby";
	echo $myArray[1];
	echo $myArray["Last"];
	
?>

