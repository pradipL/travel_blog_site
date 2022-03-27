<?php require_once('include/db.php'); ?>
<?php require_once('session.php'); ?>
<?php include('function.php'); ?>

<html>
<head>
	<title></title>
</head>
<body>
<?php 
$id=$_GET['id'];
$sql="DELETE FROM post where id=$id;";
$result=$conn->query($sql);
$_SESSION['successmessage']="deletion completion";
redirect('userpage.php?pagename=post');







 ?>
</body>
</html>