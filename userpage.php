<?php 
require_once('include/db.php');
include('session.php');
include('function.php');
confirm_login();
 ?>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<body>

<!-- navbar -->


  <nav class="navbar navbar-expand-lg navbar-fixed navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="userpage.php?pagename=blog">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="userpage.php?pagename=post">Manage Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="userpage.php?pagename=categories">add category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="userpage.php?pagename=addpost">Add Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">logout</a>
          </li>
        </ul>
        <form class="d-flex ms-auto" action="userpage.php" method="POST">
          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" name='submits'>Search</button>
        </form>
      </div>
    </div>
  </nav>


  <!-- search -->
  <div class="container">
    <?php 
    if(isset($_POST['submits']))
    {
      $name=$_POST['search'];
      if(empty($_POST['search']))
      {
        $_SESSION['errormessage']="Empty field";
        redirect('userpage.php');
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
    



<!--   dynamic page -->


    <?php 
  }
}
    elseif(!empty($_GET['pagename']))
    {
      $p=$_GET['pagename'];
      $pagedirectory='../cms';
      $pagefolder=scandir($pagedirectory,0);
      if(in_array($p.'.php', $pagefolder))
      {
        include($p.'.php');
      }
    }
    else
    {
      include('blog.php');
    }

    ?>
  </div>


</body>
</html>