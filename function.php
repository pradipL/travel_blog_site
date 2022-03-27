<?php require_once ('include/db.php'); ?>
<?php require_once ('session.php'); ?>
<?php 
function redirect($new_location)
{
	header("location:".$new_location);
	exit; 
}

function login_attempt($username, $password)
{
	global $conn;
	$sql="SELECT * FROM admin where username=:uname AND password=:pass;";
	$result=$conn->prepare($sql);
	$result->bindValue(':uname', $username);
	$result->bindValue(':pass', $password);
	$result->execute();
	$res=$result->rowcount();
	if($res==1)
	{
		return $result->fetch();
	}
	else{
		return null;
	}
}
function confirm_login()
{
	if(isset($_SESSION['user_name']))
	{
		return true;
	}
	else
		$_SESSION['errormessage']="login required";
		redirect('index.php?pagename=login');
}
function total_post()
{
	global $conn;
	$sql="SELECT COUNT(*) from post";
	$result=$conn->query($sql);
	$res=$result->fetch();
	$total=array_shift($res);
	return $total;
}

function total_comment($id)
{
	global $conn;
	$sql="SELECT COUNT(*) FROM comment WHERE p_id=$id";
	$result=$conn->query($sql);
	$res=$result->fetch();
	$total=array_shift($res);
	return $total;
}
function username_check($name)
{
	global $conn;
	$sql="SELECT * FROM admin where username=:name";
	$result=$conn->prepare($sql);
	$result->bindValue(':name', $name);
	$result->execute();
	$count=$result->rowcount();
	if($count>=1)
	{
		return true;
	}
	else{
		return false;
	}
}


function search($name)
{
	global $conn;
	$sql="SELECT * FROM post where category like :search OR title like :search;";
      $result=$conn->prepare($sql);
      $result->bindValue(':search', '%'.$name.'%');
      $execute=$result->execute();
      return $result;
}
 ?>
