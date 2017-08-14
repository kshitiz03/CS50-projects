<?php
    // configuration
    require("../includes/config.php"); 
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
        $result = $db->query("SELECT password FROM blog_members WHERE username='$username'");
        if(!$result)
        {
            echo "The username you entered does not exist";
        }
        else if(password_verify($password, $result))
        {
            echo "You entered an incorrect password";
        }
        else if($newpassword==$confirmnewpassword)
        {
            $tt=password_hash($newpassword, PASSWORD_BCRYPT);
            $sql=$db->query("UPDATE blog_members SET password='$tt' where username='$username'");
        }
        if($sql)
        {
            echo "Congratulations You have successfully changed your password";
            header('Location: moon.php?action=changed');
        }
       else
        {
            echo "Passwords do not match";
        }
    }
    
?>
<html>
<body>
<form method="POST" action="passwd.php">
    <table>
    <tr>
   <td>Enter your UserName</td>
    <td><input type="username" name="username"></td>
    </tr>
    <tr>
    <td>Enter your existing password:</td>
    <td><input type="password" name="password"></td>
    </tr>
  <tr>
    <td>Enter your new password:</td>
    <td><input type="password" name="newpassword"></td>
    </tr>
    <tr>
   <td>Re-enter your new password:</td>
   <td><input type="password" name="confirmnewpassword"></td>
    </tr>
    </table>
    <p><input type="submit" value="Update Password">
    </form>
</body>
</html>