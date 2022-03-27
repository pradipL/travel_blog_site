<?php require_once('session.php'); ?>
<?php require_once('function.php'); ?>
<?php
$_SESSION['user_name']=null;
$_SESSION['id']=null;
session_destroy();
redirect('index.php?pagename=login')
 ?>