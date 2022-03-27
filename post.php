<?php require_once('include/db.php') ?>
<?php require_once('session.php') ?>

<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<body>
<?php 
$username=$_SESSION['user_name'];
$sql="SELECT * FROM post WHERE username='$username'";
$result=$conn->query($sql);
?>
<?php echo success(); ?>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date and Time</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Author</th>
      <th scope="col">Image</th>
      <th scope="col">Post</th>
      <th scope="col">Action</th>
      <th scope="col">live Preview</th>
    </tr>
  </thead>

<?php
foreach($result as $rec)
{
	$id=$rec['id'];
	$date=$rec['dateandtime'];
	$title=$rec['title'];
	$category=$rec['category'];
	$author=$rec['author'];
	$image=$rec['image'];
	$post=$rec['post'];

	if(strlen($post)>50)
	{
		$post=substr($post, 0,50).'..';
	}
?>

  <tbody>
    <tr>
      <th scope="row"><?php echo $id ?></th>
      <td><?php echo $date ?></td>
      <td scope="row"><?php echo $title ?></td>
      <td scope="row"><?php echo $category ?></td>
      <td scope="row"><?php echo $author ?></td>
      <td scope="row"><?php echo $image ?></td>
      <td scope="row"><?php echo $post ?></td>
      <td scope="row"><a href="editpost.php?id=<?php echo $id; ?>">edit</a> <a href="deletepost.php?id=<?php echo $id; ?>">delete</a></td>
      <td scope="row"><a href="userpage.php?pagename=fullpost&id=<?php echo $id ?>">Preview</a></td>
    </tr>
  </tbody>


<?php } ?>

</table>
</div>
</body>
</html>