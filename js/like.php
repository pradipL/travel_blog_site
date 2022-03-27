<?php 

require_once('../include/db.php'); 


$sql="INSERT INTO comment(date, name, comment, p_id) values('2021-12-19 13:52:04', 'alkdkd', 'dkkadkjaldjlfa', 19)";
$res=$conn->prepare($sql);
$exe=$res->execute();
