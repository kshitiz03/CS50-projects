<?php
    // configuration
    require("../includes/config.php");  
    
    // query cash for template
    $cash =	cs50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);	
    
	// create new array to store all info for history table
    $table = cs50::query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
    
    render("history_form.php", ["title" => "History", "cash" => $cash, "table" => $table]);
   
?>