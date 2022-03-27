<?php require_once("include/db.php") ?>
<?php require_once("function.php") ?>
<?php 

if(isset($_POST['Submit']))
{
	if(!empty($_POST['CategoryTitle']))
	{
		date_default_timezone_set('Asia/Kathmandu');
		$date=date("Y-m-d H:i:s");
		$admin="pradip";
		$title=$_POST['CategoryTitle'];
		$sql="INSERT INTO categories(title, author, date) VALUES(:title, :admin, :time)";
		$record=$conn->prepare($sql);
		$record->bindValue(':title', $title);
		$record->bindValue(':admin', $admin);
		$record->bindValue(':time', $date);
		$execute=$record->execute();
		if($execute)
		{
			$_SESSION['successmessage']="successfully executed";
		}
		else
		{
			$_SESSION['errormessage']="cannot be executed";
		}
	}
	else
	{
		$_SESSION['errormessage']="empty field";
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
		<?php 
		echo error();
		echo success();

		?>
		 <form class="" action="categories.php" method="post">
	        <div class="card bg-secondary text-light mb-3">
	          <div class="card-header">
	            <h1>Add New Category</h1>
	          </div>
	          <div class="card-body bg-dark">
	            <div class="form-group">
	              <label for="title"> <span class="FieldInfo"> Categroy Title: </span></label>
	               <input class="form-control" type="text" name="CategoryTitle" id="title" placeholder="Type title here" value=""> <br>
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


<script src="js/bootstrap.min.js"></script>

</body>
</html>