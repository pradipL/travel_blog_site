		<?php require_once('include/db.php'); ?>
<?php require_once('session.php'); ?>
<?php require_once('function.php'); ?>

<?php 
if(isset($_POST['submit']))
{
	
		date_default_timezone_set("Asia/Kathmandu");
		$date=date("Y-m-d H:i:s");
		$name=$_POST['name'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		
		$uname=$_POST['uname'];
		$password=$_POST['pass'];
		$name=$_POST['name'];
		if(empty($name))
		{
			$_SESSION['errormessage']="empty name";
			redirect('index.php?pagename=addadmin');
		}
		if(!preg_match('/^[A-Za-z. ]*/', $name))
		{
			$_SESSION['errormessage']="only letter and whitespace allowed";
			redirect('index.php?pagename=addadmin');
		}
		
		if(empty($uname))
		{
			$_SESSION['errormessage']="empty username";
			redirect('index.php?pagename=addadmin');
		}		
		if(empty($password))
		{
			$_SESSION['errormessage']="empty password";
			redirect('index.php?pagename=addadmin');
		}
		if(empty($_POST['conf-pass']))
		{
			$_SESSION['errormessage']="empty conform password";
			redirect('index.php?pagename=addadmin');
		}
		if(username_check($uname))
		{
			$_SESSION['errormessage']="username already exist";
			redirect('index.php?pagename=addadmin');
		}
		if(strlen($password)<=6)
		{
			$_SESSION['errormessage']="password must be more than 6 character";
			redirect('index.php?pagename=addadmin');
		}
		if($password!=$_POST['conf-pass'])
		{
			$_SESSION['errormessage']="correctly type your password";
			redirect('index.php?pagename=addadmin');

		}
		$sql="INSERT INTO admin(dateandtime, username, password, name, contact, email) VALUES(:dateandtime, :uname, :pass, :name, :contact, :email);";
		$result=$conn->prepare($sql);
		$result->bindValue(':dateandtime', $date);
		$result->bindValue(':uname', $uname);
		$result->bindValue(':pass', $password);
		$result->bindValue(':name', $name);
		$result->bindValue(':contact', $contact);
		$result->bindValue(':email', $email);
		$execute=$result->execute();
		if($execute)
		{
			$_SESSION['successmessage']="successfully inserted";
		}
		else{echo "failed";}
	
}


 ?>


<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<body>

	<?php echo success(); ?>
	<?php echo error(); ?>
	<div class="container">
		<div class="row bg-light mt-3">
			<h3 class="text-center pt-2">sign up</h3>
			<div class="col-sm-2">
			</div>
			<div class="col-sm-8 py-4">
				<form action="index.php?pagename=addadmin" method="POST"> 
					<div class="form-group">
				    <label><b>Name:</b></label>
				    <input type="text" name='name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
				  </div><br>
				  <div class="form-group">
				    <label><b>Email:</b></label>
				    <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
				  </div><br>
				  <div class="form-group">
				    <label><b>Contact:</b></label>
				    <input type="tel" name='contact' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
				  </div><br>
				  <div class="form-group">
				    <label><b>username:</b></label>
				    <input type="text" name='uname' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username">
				  </div><br>
				  <div class="form-group">
				    <label for="exampleInputPassword1"><b>Password:</b></label>
				    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div><br>
				  <div class="form-group pb-5">
				    <label for="exampleInputPassword1"><b>Confirm-Password:</b></label>
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Conform-Password" name="conf-pass">
				  </div>
				  <button type="submit" name="submit" class="btn btn-primary float-end"><b>Sign Up</b></button>
				</form>
			</div>
			<div class="col-sm-2">
			</div>
		</div>



</div>

</body>
</html>