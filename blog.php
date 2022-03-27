<?php require_once('include/db.php') ?>
<?php require_once('session.php'); ?>


<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<body>

	<div class="container">
		<?php 
    
		if(isset($_SESSION['user_name']))
		{
			$_SESSION['successmessage']="welcome ". $_SESSION['user_name'];
      $username=$_SESSION['user_name'];
		}
    $i=total_post();
    if(!isset($_GET['page']))
    {
      $p=1;
    }
    else{
      $p=$_GET['page'];
    }
    $page=$i/4;
    $page=ceil($page);
    $in_page=($p*4)-4;

		$sql="SELECT * FROM post limit $in_page, 4";
		$result=$conn->query($sql);
		foreach($result as $res)
		{
			$id=$res['id'];
			$title=$res['title'];
			$post=$res['post'];
			$date=$res['dateandtime'];
			$photo=$res['image'];
      $name=$res['username'];

		?>
			<?php echo success(); ?>
			<div class="card">
        <div class="imgbox">
  					<img class="card-img-top card-image" src="image/<?php echo $photo ?>"   alt="Card image cap">
            </div>
  				<div class="card-body">
  					<h5 class="card-title"><?php echo $title ?></h5>
            <div class="row">
              <div class="col-sm-6">
                <p class="card-text"><small class="text-muted">written by <?php echo $name;?> on <?php echo $date; ?></small></p><br>
              </div>
              <?php
               if(isset($_SESSION['user_name'])) 
              {
                ?>
              <div class="col-sm-6">
                <div class="float-end">
                  <button onclick="like(<?php $username ?>)"  id="likes" class="btn btn-light mx-2">Like</button>
                  
                  <a href="userpage.php?pagename=fullpost&id=<?php echo $id ?>"><button type="button" class="btn btn-light">Comment: <?php echo total_comment($id); ?></button></a>
                </div>
              </div>
              <?php } ?>
              

  					</div>
    				<p class="card-text">
            <?php 
    				if(strlen($post)>300)
    				{
    					$post=substr($post, 0, 250);
    					
    				}
    				echo $post.'.....' ;

    				?></p>
    				<?php 
    				if(isset($_SESSION['id']))
    				{
    				?>
    				  <a href="userpage.php?pagename=fullpost&id=<?php echo $id ?>"><button type="button" class="btn btn-primary">Read More</button></a>
    				<?php 
    				}
    				else{
    					?>
    				<a href="index.php?pagename=fullpost&id=<?php echo $id ?>"><button type="button" class="btn btn-primary">Read More</button></a>
    				<?php } ?>
  				</div>

			</div>
	
	<br><hr><br>
	<?php } ?>

        
        <nav aria-label="...">
          <ul class="pagination pagination-lg">
            <?php 
            if($p>1)
            {
               ?>
            <a class="page-link" href="index.php?page=<?php echo $p-1; ?>">&laquo</a>
          <?php  } ?>
           
            
            <?php
      for($j=1; $j<=$page;$j++)
      {
        ?>
              <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $j ?>"><?php echo $j ?></a>
              </li>
              <?php } ?>
              <?php 
              if($p<$page)
              {
               ?>
              <a class="page-link" href="index.php?page=<?php echo $p+1; ?>">&raquo</a>
              <?php } ?>
          </ul>
        </nav>
      

</div>
<script type="text/javascript" src="js/function.js"></script>
</body>
</html>