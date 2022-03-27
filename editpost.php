<?php require_once('include/db.php'); ?>
<?php require_once('session.php'); ?>
<?php $queryparam=$_GET['id']; ?>



<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="js/bootstrap.min.js">
<body>
<?php 
$sql="SELECT * FROM post  WHERE id='$queryparam'";
$result=$conn->query($sql);
$r=$result->fetch();
	$posttitle=$r['title'];
	$category=$r['category'];
	$post=$r['post'];
 ?>


<?php 
if(isset($_POST['Submit']))
{
	$post=$_POST['PostTitle'];
	$date=date('Y-m-d H:i:s');
	$author="pradip";
	$image="pradip.jpg";

	$category=$_POST['Category'];
	$post=$_POST['PostDescription'];
	$sql="UPDATE post set dateandtime='$date', title='$post', category='$category', author='$author', image='$image', post='$post' where id='$queryparam';" ;
	$result=$conn->query($sql);
	if($result)
	{
		echo "successful";
	}
	else{
		echo "failed";
	}
}


 ?>



	<div class="container">

		<form class="" action="editpost.php?id=<?php echo $queryparam; ?>" method="post" enctype="multipart/form-data">
	        <div class="card bg-secondary text-light mb-3">
	          <div class="card-body bg-dark">
	            <div class="form-group">
	              <label for="title"> <span class="FieldInfo"> Post Title: </span></label>
	               <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value='<?php echo $posttitle ?>'>
	            </div>
	            <div class="form-group">
	              <label for="CategoryTitle"> <span class="FieldInfo"> Chose Categroy </span></label>
	               <select class="form-control" id="CategoryTitle"  name="Category" value=<?php echo $category ?>>
	               	<?php 
	               		$sq="SELECT title FROM categories";
	               		$res=$conn->query($sq);
	               		foreach($res as $re)
	               		{
	               			?>
	               			<option><?php echo $re['title']; ?></option>
	               		<?php } ?>

	               	 
	                	

	                	 
	               </select><br>
	               
	            </div>
	            <div class="form-group">
	              <div class="custom-file">
	              <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
	              
	              </div>
	            </div>
	            <div class="form-group">
	              <label for="Post"> <span class="FieldInfo"> Post: </span></label>
	              <textarea class="form-control" id="Post" name="PostDescription"  rows="8" cols="80" ><?php echo $post ?></textarea>
	            </div>
	            <div class="row">
	              <div class="col-lg-6 mb-2">
	                <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
	              </div>
	              <div class="col-lg-6 mb-2">
	                <button type="submit" name="Submit" class="btn btn-success btn-block">
	                  <i class="fas fa-check"></i> Publish
	                </button>
	              </div>
	            </div>
	          </div>
	        </div>
	      </form>
      </div>

</body>
</html>