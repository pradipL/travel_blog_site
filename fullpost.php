<?php
require_once('include/db.php');
require_once('session.php');
 ?>

<?php $id=$_GET['id']; ?>

<?php 
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$comment=$_POST['comment'];
	date_default_timezone_set('Asia/Kathmandu');
	$date=date('Y-m-d H:i:s');
	$p_id=$id;
	$sql="INSERT INTO comment (date, name, comment, p_id) VALUES (:dateandtime, :name, :comment, :p_id)";
	$result=$conn->prepare($sql);
	$result->bindValue(':dateandtime', $date);
	$result->bindValue(':name', $name);
	$result->bindValue(':comment', $comment);
	$result->bindValue(':p_id', $p_id);
	$execute=$result->execute();
	if($execute)
	{
		$_SESSION['successmessage']="successfully commented";
	}
	else{
		$_SESSION['errormessage']="failed to comment";
	}


}

 ?>

<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<body>

	<!-- card -->


	<?php 
		echo error();
		echo success();
	 ?>
	<div class="container">
		<?php 
		$sql="SELECT * FROM post WHERE id='$id'";
		$result=$conn->query($sql);
		$res=$result->fetch();
		$id=$res['id'];
		$title=$res['title'];
		$post=$res['post'];
		$date=$res['dateandtime'];
		$photo=$res['image'];
		$name=$res['username'];
		?>

		<div class="card">
  			<img class="card-img-top" src="image/<?php echo $photo ?>"  alt="Card image cap">
  			<div class="card-body">
  				<div class="row">
  					<h5 class="card-title"><?php echo $title ?></h5>
  					<p class="card-text"><small class="text-muted">written by <i><?php echo $name;?></i> on <i><?php echo $date; ?></i></small></p><br>
  				</div>
  				<p class="card-text"><?php echo $post?></p>
    				
  			</div>
		</div>
			
	</div>
	<hr>

	<!-- commenting form -->
	<?php 
	if(isset($_SESSION['id']))
	{
		?>

	<div class="container">
		<h2>Comment</h2>
		<form action='fullpost.php?id=<?php echo $id ?>' method="POST"> 
		  <div class="form-group">
		    <label for="formGroupExampleInput">full Name</label>
		    <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Example input">
		  </div>
		  <div class="form-group">
		    <label for="formGroupExampleInput2">Comment</label>
		    <textarea class="form-control" id="Post" name="comment" rows="8" cols="80"></textarea>
		  </div><br>
		  <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
		</form>
	</div><hr>

	<!-- comment fetch -->

	<?php 
	$sql="SELECT * FROM comment where p_id='$id'";
	$result=$conn->query($sql);
	foreach($result as $res)
	{
		$name=$res['name'];
		$comment=$res['comment'];

	?>
	<div class="container">
		<div class="media">
			<img src="image/p.jpg" height=50 width=50>
		</div>
		<div class="media-body">
			<h1><?php echo $name; ?></h1>
			<p><?php echo $comment ?></p>
		</div>
	</div>
	<hr>
	<?php  }?>
	<?php } ?>






	<script src="js/bootstrap.min.js"></script>
</body>
</html>