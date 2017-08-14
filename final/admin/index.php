
<?php
	require_once('../includes/config.php');
	if(!$user->is_logged_in()){ header('Location: login.php'); }
//show message from add / edit page
	//process login form if submitted
	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 
			//logged in return to index page
			header('Location: moon.php');
			exit;
		
		} else {
			$message = '<p class="error">Wrong username or password</p>';
		}
	}//end if submit
	if(isset($message)){ echo $message; }
	
	header('Location: moon.php');
	exit;
	?>