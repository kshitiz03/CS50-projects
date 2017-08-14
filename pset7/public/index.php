<?php
    // configuration
    require("../includes/config.php"); 
    $rows = cs50::query("SELECT * FROM portfolios WHERE id = ?", $_SESSION["id"]);
    
    $positions = [];
    $spent=0;
    foreach ($rows as $row)
    {   
    $stock = lookup($row["symbol"]);
    
    if ($stock !== false)
    {
        $positions[] = [
            "name" => $stock["name"],
            "price" => $stock["price"],
            "shares" => $row["shares"],
            "symbol" => $row["symbol"],
            "total"=> number_format($stock["price"]*$row["shares"],2, '.', '')
        ];
    }
    }
    $row = cs50::query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    $cash=$row[0]["cash"];
    
    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio","m"=>$cash]);
?>

