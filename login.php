<?php 
require_once('include/db.php');
require_once('function.php');
require_once('session.php');


if(isset($_POST['submit']))
{
	$uname=$_POST['uname'];
	$password=$_POST['pass'];
	if(empty($uname))
	{
		$_SESSION['errormessage']="Empty Username";
		redirect('index.php?pagename=login');
	}
	if(empty($password))
	{
		$_SESSION['errormessage']="Empty Password";
		redirect('index.php?pagename=login');
	}
	$found_account=login_attempt($uname, $password);
	if($found_account)
	{
		$_SESSION['user_name']=$found_account['username'];
		$_SESSION['id']=$found_account['id'];
		redirect('userpage.php');
	}
	else
	{
		$_SESSION['errormessage']="wrong username or password";
	}

}

 ?>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<body>

	<div class="container">
		<?php echo error() ?>
		<div class="row mt-3 bg-light">
			<h3 class="text-center pt-2">sign in</h3>
			<div class="col-sm-2">
			</div>
			<div class="col-sm-8 py-4">
				<form action="index.php?pagename=login" method="POST">
				<div class="form-group">
				    <label><b>Username:</b></label>
				    <input type="text" name='uname' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username"><br>
				    
				  </div>
				  <div class="form-group pb-5">
				    <label for="exampleInputPassword1"><b>Password:</b></label>
				    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <button type="submit" name="submit" class="btn btn-primary float-end"><b>Login</b></button>
				</form>
			</div>
			<div class="col-sm-2">
			</div>
		</div>
	
</div>
</body>
</html>