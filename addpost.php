<?php require_once('include/db.php') ?>
<?php require_once('session.php') ?>
<?php require_once('function.php'); ?>



<?php 
if(isset($_POST['Submit']))
{

		$posttitle=$_POST['PostTitle'];
		$category=$_POST['Category'];
		$image=$_FILES['Image']['name'];
		$target='image/'.basename($image);
		$post=$_POST['PostDescription'];
		$author=$_SESSION['user_name'];
		$uname=$_SESSION['user_name'];
		$f_admin=$_SESSION['id'];
		date_default_timezone_set('Asia/Kathmandu');
		$date=date("Y-m-d H:i:s");
		if(empty($_POST['PostTitle']))
		{
			$_SESSION['errormessage']="empty title";
			redirect('userpage.php?pagename=addpost');
		}
		if(!preg_match('/^[A-Za-z. ]*/',$posttitle))
		{
			$_SESSION['errormessage']="only letter and numbers are allowed";
			redirect('userpage.php?pagename=addpost');
		}

		if(empty($image))
		{
			$_SESSION['errormessage']="image must be inserted";
			redirect('userpage.php?pagename=addpost');
		}
		if(strlen($post)<150)
		{
			$_SESSION['errormessage']="Too short post";
			redirect('userpage.php?pagename=addpost');
		}

		$sql="INSERT INTO post(dateandtime, title, category, author, image, post, username, f_admin) VALUES(:dateandtime, :title, :category, :author, :image, :post, :uname, :f_admin)";
		$result=$conn->prepare($sql);
		$result->bindValue(':dateandtime', $date);
		$result->bindValue(':title', $posttitle);
		$result->bindvalue(':category', $category);
		$result->bindvalue(':author', $author);
		$result->bindvalue(':image', $image);
		$result->bindvalue(':post', $post);
		$result->bindvalue(':uname', $uname);
		$result->bindvalue(':f_admin', $f_admin);
		$execute=$result->execute();
		move_uploaded_file($_FILES['Image']['tmp_name'], $target);
		if($execute)
		{
			$_SESSION['successmessage']="successfully inserted";
			redirect('userpage.php?pagename=blog');
		}
		else{
			$_SESSION['errormessage']="failed to insert";
		}
	}


 ?>




<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="js/bootstrap.min.js">
<body>
	<div class="container">
		<?php 
		echo success();
		echo error();
		 ?>

		<form class="" action="addpost.php" method="post" enctype="multipart/form-data">
	        <div class="container">
	          <div class="row bg-light my-3">
	      		<div class="col-sm-1">
	      		</div>
	      		<div class="col-sm-10 py-3">
	      			<div class="form-group">
	              <label for="title"> <span class="FieldInfo"><b>Username:</b></span></label>
	               <input class="form-control" type="text" name="uname" id="title" value="<?php echo $_SESSION['user_name'] ?>" disabled>
	            </div><br>
	            <div class="form-group">
	              <label for="title"> <span class="FieldInfo"><b>Post Title:</b></span></label>
	               <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="">
	            </div><br>
	            <div class="form-group">
	              <label for="CategoryTitle"> <span class="FieldInfo"><b>Chose Categroy</b></span></label>
	               <select class="form-control" id="CategoryTitle"  name="Category">
	                	<?php 
	                		$sql="SELECT * FROM categories";
	                		$result=$conn->query($sql);
	                		foreach($result as $res)
	                		{
	                			?>
	                			<option><?php echo $res['title'];  ?></option>
	                		<?php } ?>

	                	 
	               </select><br>
	               
	            </div><br>
	            <div class="form-group">
	              <div class="custom-file">
	              <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
	              
	              </div>
	            </div><br>
	            <div class="form-group pb-5">
	              <label for="Post"> <span class="FieldInfo"><b>Post:</b></span></label>
	              <textarea class="form-control" id="Post" name="PostDescription" rows="8" cols="80"></textarea>
	            </div><br>
	            <div class="row text-center">
	              <div class="col-lg-6">
	                <a href="userpage.php?pagename=blog" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> <b>Back To Dashboard</b></a>
	              </div>
	              <div class="col-lg-6">
	                <button type="submit" name="Submit" class="btn btn-success btn-block">
	                  <i class="fas fa-check"></i><b>Publish</b> 
	                </button>
	              </div>
	            </div>
	          </div>
	        </div>
	      </form>
	      		</div>
	      		<div class="col-sm-1">
	      		</div>
	          	
      </div>

</body>
</html>