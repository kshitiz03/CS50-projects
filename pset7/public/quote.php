<?php
    //configuration
    require("../includes/config.php");
    
    // if the form was submitted.
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]))
        {
            apologize("Invalid Stock Symbol");
        }
        else if(lookup($_POST["symbol"])==false)
        {
            apologize("Symbol not found");
        }
        else
        {
            $stock = lookup($_POST["symbol"]);
            render("quote.php",["title" => "Stocks", "symbol" => $stock["symbol"], "name" => $stock["name"], "price" => $stock["price"]]);
        }
    }
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Stocks"]);
    }
?>