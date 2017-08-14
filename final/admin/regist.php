<?php
// configuration
require("../includes/config.php");
	if(isset($_POST['submit'])){
		//collect form data
		extract($_POST);
		//very basic validation
		if($username ==''){
			$error[] = 'Please enter the username.';
		}
		if($password ==''){
			$error[] = 'Please enter the password.';
		}
		if($passwordConfirm ==''){
			$error[] = 'Please confirm the password.';
		}
		if($password != $passwordConfirm){
			$error[] = 'Passwords do not match.';
		}
		if($email ==''){
			$error[] = 'Please enter the email address.';
		}
		if(!isset($error)){
			$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);
			try {
				//insert into database
				$stmt = $db->prepare('INSERT INTO blog_members (username,password,email) VALUES (:username, :password, :email)') ;
				$stmt->execute(array(
					':username' => $username,
					':password' => $hashedpassword,
					':email' => $email
				));
				//redirect to index page
				header('Location: moon.php?action=added');
				exit;
			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		}
	}
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/baba.css">
  <script src="../style/jj.js"></script>
  <script src="../style/jk.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
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
      <h4>Register</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="login.php">Login</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
    	<img src="img/lj.png">
        <div class= "container">
		<div id="top">
		<div id="form">	
		<form action="regist.php" method="post">
    		<p><label>Username</label><br />
		<input type='text' name='username' value='<?php if(isset($error)){ echo $_POST['username'];}?>'></p>

		<p><label>Password</label><br />
		<input type='password' name='password' value='<?php if(isset($error)){ echo $_POST['password'];}?>'></p>

		<p><label>Confirm Password</label><br />
		<input type='password' name='passwordConfirm' value='<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>'></p>

		<p><label>Email</label><br />
		<input type='text' name='email' value='<?php if(isset($error)){ echo $_POST['email'];}?>'></p>
		
		<p><input type='submit' name='submit' value='Register'></p>
		</form>
		</div>
		</div>
    </div>
  </div>
</div>

<footer class="container-fluid">
   <p><h2>Presented by <a href="www.facebook.com/mietkbros/">K Bros</a></h></p>
</footer>

</body>
</html>
