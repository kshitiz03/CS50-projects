<?php
//include config
require_once('../includes/config.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
//show message from add / edit page
if(isset($_GET['delpost'])){ 
	$stmt = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID') ;
	$stmt->execute(array(':postID' => $_GET['delpost']));
	header('Location: index.php?action=deleted');
	exit;
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blogs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/baba.css">
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script language="JavaScript" type="text/javascript">
  function delpost(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'edit.php?delpost=' + id;
	  }
  }
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../style/hita.css">
  <script src="../style/hh.js"></script>
  <script src="../style/hl.js"></script>
    <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script language="JavaScript" type="text/javascript">
  function delpost(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'index.php?delpost=' + id;
	  }
  }
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../style/hita.css">
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 5000px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #FF4500;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #FF4500;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h1>Blogs</h1>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="read.php">About</a></li>
        <li><a href="list.php">Users List</a></li>
        <li><a href="add-post.php">Add-Post</a></li>
        <li><a href="edit.php">Edit</a></li>
        <li><a href="logout.php">Logout</a></li>
         <li><a href="passwd.php">Change Password</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
      <img src="img/blog-1.png">
      <h4><small>RECENT POST</small></h4>
      <hr>
      <?php
        $sql = $db->query('SELECT * FROM blog_posts');;

        while($row = $sql->fetch()) 
        {
            echo "<tr><td><h1 style='color:blue;'>".$row["postId"]."</td><td>".$row["postTitle"]."<hr></td><td> ".$row["postDesc"]."</td><td> ".$row["postCont"]."</td></tr><hr>";
        }
      ?>
      
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p><h2>Presented by <a href="www.facebook.com/mietkbros/">K Bros</a></h></p>
</footer>

</body>
</html>
