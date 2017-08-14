<?php
//include config
require_once('../includes/config.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
//show message from add / edit page
if(isset($_GET['delpost'])){ 
	$stmt = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID') ;
	$stmt->execute(array(':postID' => $_GET['delpost']));
	header('Location: edit.php?action=deleted');
	exit;
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>EDIT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/gk.css">
  <script src="../style/jj.js"></script>
  <script src="../style/jk.js"></script>
  <title>Edit & Delete Posts</title>
  <script src="../style/hh.js"></script>
  <script src="../style/hl.js"></script>  
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <link rel="stylesheet" href="../style/hita.css">
  <script language="JavaScript" type="text/javascript">
  function delpost(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'edit.php?delpost=' + id;
	  }
  }
  </script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: auto}
    
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
        padding: 0px;
      }
      .row.content {height: auto;}
    }
  </style>
  <link rel="stylesheet" href="../style/hita.css">
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 805px}
    
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
        padding: 0px;
      }
      .row.content {height: auto;}
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Edit Post</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="moon.php">Blog</a></li>
        <li><a href="add-post.php">Add-Post</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
      <a href="/"><img alt="blog" src="img/kk.png"/></a><br><br>
      <?php 
		//show message from add / edit page
		if(isset($_GET['action'])){ 
			echo '<h3>'.$_GET['action'].'.</h3>'; 
		} 
		?>

		<table>
		<tr>
			<th>Title</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
		<?php
			try {
				$stmt = $db->query('SELECT postID, postTitle, postDate FROM blog_posts');
				while($row = $stmt->fetch()){
				
					echo '<tr>';
					echo '<td>'.$row['postTitle'].'</td>';
					echo '<td>'.date('jS M Y', strtotime($row['postDate'])).'</td>';
					?>

					<td>
						<a href="edit-post.php?id=<?php echo $row['postID'];?>">Edit</a> | 
						<a href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')">Delete</a>
					</td>
				
					<?php 
					echo '</tr>';
				}
			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>
		</table>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p><h2>Presented by <a href= "www.facebook.com/mietkbros/">K Bros</a></h2></p>
</footer>

</body>
</html>
