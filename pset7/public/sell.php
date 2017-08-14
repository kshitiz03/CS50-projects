<?php
    // configuration
    require("../includes/config.php");
    // if the form was submitted
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
           
            $transaction = "SELL";
            
            $stock1 = lookup($_POST["symbol"]);
            
            $stock2 = CS50::query("SELECT * from portfolios WHERE id=? AND symbol=?",$_SESSION["id"],$_POST["symbol"]);
            
            $current_price = $stock1["price"] * $stock2[0]["shares"]; // Total Current Price of share
            
            // adding the value of share to cash
            
            CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $current_price, $_SESSION["id"]);
            
            // deleting stock from portifolios table
            
            CS50::query("DELETE FROM portfolios WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            
            // Updating the history
            CS50::query("INSERT INTO history (id, transaction, symbol, shares, price) VALUES (?, ?, ?, ?, ?)", $_SESSION["id"], $transaction, $_POST["symbol"], $stock2[0]["shares"], $stock1["price"]);
            
            // coming back to portifolio page
             redirect("./");
        
    }
    
    else
    {
        // query user's portfolio
        $rows =	CS50::query("SELECT * FROM portfolios WHERE id = ?", $_SESSION["id"]);	
        // create new array to store stock symbols
        $stocks = [];
        // for each of user's stocks
        foreach ($rows as $row)	
        {   
            // save stock symbol
            $stock = $row["symbol"];
            
            // add stock symbol to the new array
            $stocks[] = $stock;       
        }    
        // render sell form
        render("sell_form.php", ["title" => "Sell Form", "stocks" => $stocks]);
    }
?>