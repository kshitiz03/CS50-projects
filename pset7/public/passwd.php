<?php
    // configuration
    require("../includes/config.php"); 
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["opassword"]))
        {
            apologize("You must provide your old password.");
        }
        else if (empty($_POST["npassword"]))
        {
            apologize("You must provide a password.");
        }
        else if($_POST["confirmation"] != $_POST["npassword"])
        {
            apologize("New Passwords donot match");
        }
        
        $rows = CS50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];
            // compare hash of user's input against hash that's in database
            if (crypt($_POST["opassword"], $row["hash"]) == $row["hash"])
            {
               // Now change the password
               $change = CS50::query("UPDATE users SET hash=?",crypt($_POST["npassword"]));
               render("passwd_print.php",["title" => "Sucess!!"]);
               
            }
            else
            {
                apologize("Wrong Old Password provided");
            }
        }
    }
    
    else
    {
        // else render form
        render("passwd_form.php", ["title" => "Change Password"]);
    }
    
?>