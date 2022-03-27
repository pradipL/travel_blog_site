<?php require_once('include/db.php'); ?>
<?php require_once('session.php'); ?>
<?php require_once('function.php'); ?>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/all.css">

<!-- <script src="https://kit.fontawesome.com/f4c7e30b24.js" crossorigin="anonymous"></script> -->
<body>


<!-- navbar -->


  <nav class="navbar navbar-expand-lg position-relative navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?pagename=blog"><i class="fas fa-times"></i>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?pagename=login"><i class="fas fa-camera"></i>Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?pagename=addadmin">Signup</a>
          </li>
        </ul>
        <form class="d-flex ms-auto" action="index.php" method="POST">
          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" name='submits'>Search</button>
        </form>
      </div>
    </div>
  </nav>


<!-- Searching -->



  <div class="container">
  	<?php 
    if(isset($_POST['submits']))
    {
      $name=$_POST['search'];
      if(empty($_POST['search']))
      {
        $_SESSION['errormessage']="Empty field";
        redirect('index.php');
      }
      $result=search($name);
      foreach($result as $res)
      {
        $id=$res['id'];
        $title=$res['title'];
        $post=$res['post'];
        $date=$res['dateandtime'];
        $photo=$res['image'];
        $name=$res['username'];

    ?>


<!-- card fetch -->

  <?php echo error(); ?>
    <div class="card">
      <img class="card-img-top" src="image/<?php echo $photo ?>"  style="height:200px; width:100%" alt="Card image cap">
      <div class="card-body">
        <div class="row">
            <h5 class="card-title"><?php echo $title ?></h5>
            <p class="card-text"><small class="text-muted">written by <i><?php echo $name;?></i>  on <i><?php echo $date; ?></i></small></p><br>
        </div>
        <p class="card-text">
          <?php 
          if(strlen($post)>300)
          {
            $post=substr($post, 0, 250);
          }
          echo $post.'.....' ;
          ?></p>
          <a href="fullpost.php?id=<?php echo $id ?>"><button type="button" class="btn btn-primary">Read More</button></a>
      </div>
    </div>


<!-- dynamic page -->

      
    <?php 
    }
    }
    elseif(!empty($_GET['pagename']))
    {
		  $pagedirectory='../cms';
		  $pagefolder=scandir($pagedirectory,0);
		  $pagename=$_GET['pagename'];
		  if(in_array($pagename.'.php', $pagefolder))
		  {
        include($pagename.'.php');
		  }
    }
    else
    {
      include('blog.php');
    }
    ?>

  

     

</div>




<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/fontawesome.js"></script>

</body>
</html>