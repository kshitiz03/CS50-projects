{"filter":false,"title":"register.php","tooltip":"/pset7/public/register.php","undoManager":{"mark":5,"position":5,"stack":[[{"start":{"row":0,"column":0},"end":{"row":37,"column":2},"action":"insert","lines":["<?php","// configuration","require(\"../includes/config.php\");","// if form was submitted","if($_SERVER[\"REQUEST_METHOD\"] == \"POST\")","{","\t// Validate the user input for the register forn","\tif(empty($_POST[\"username\"])||empty($_POST[\"password\"])||$_POST[\"password\"] != $_POST[\"confirmation\"])","\t{","\t\tif(empty($_POST[\"username\"]))","\t\t{","\t\t\tapologize(\"Username is required\");","\t\t}","\t\telse if(empty($_POST[\"password\"]))","\t\t{","\t\t\tapologize(\"Password is required\");","\t\t}","\t\telse if($_POST[\"password\"] != $_POST[\"confirmation\"])","\t\t{","\t\t\tapologize(\"Password doesn't equal the confirmation\");","\t\t}","\t}","\telse","\t{","\t    if(CS50::query(\"INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)\", $_POST[\"username\"], password_hash($_POST[\"password\"], PASSWORD_DEFAULT)))","        {","\t\t\t$rows = CS50::query(\"SELECT LAST_INSERT_ID() AS id\");","\t\t    $id = $rows[0][\"id\"];","\t\t    $_SESSION[\"id\"] = $id; ","\t\t\tredirect(\"index.php\");","        }","\t}","}","else","{","  render(\"register_form.php\", [\"title\" => \"Register\"]);","}","?>"],"id":1}],[{"start":{"row":0,"column":0},"end":{"row":37,"column":2},"action":"remove","lines":["<?php","// configuration","require(\"../includes/config.php\");","// if form was submitted","if($_SERVER[\"REQUEST_METHOD\"] == \"POST\")","{","\t// Validate the user input for the register forn","\tif(empty($_POST[\"username\"])||empty($_POST[\"password\"])||$_POST[\"password\"] != $_POST[\"confirmation\"])","\t{","\t\tif(empty($_POST[\"username\"]))","\t\t{","\t\t\tapologize(\"Username is required\");","\t\t}","\t\telse if(empty($_POST[\"password\"]))","\t\t{","\t\t\tapologize(\"Password is required\");","\t\t}","\t\telse if($_POST[\"password\"] != $_POST[\"confirmation\"])","\t\t{","\t\t\tapologize(\"Password doesn't equal the confirmation\");","\t\t}","\t}","\telse","\t{","\t    if(CS50::query(\"INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)\", $_POST[\"username\"], password_hash($_POST[\"password\"], PASSWORD_DEFAULT)))","        {","\t\t\t$rows = CS50::query(\"SELECT LAST_INSERT_ID() AS id\");","\t\t    $id = $rows[0][\"id\"];","\t\t    $_SESSION[\"id\"] = $id; ","\t\t\tredirect(\"index.php\");","        }","\t}","}","else","{","  render(\"register_form.php\", [\"title\" => \"Register\"]);","}","?>"],"id":2},{"start":{"row":0,"column":0},"end":{"row":80,"column":26},"action":"insert","lines":["","register.php","","\u0001\u0001","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","<?php","// configuration","require(\"../includes/config.php\");","// if form was submitted","if($_SERVER[\"REQUEST_METHOD\"] == \"POST\")","{","    // Validate the user input for the register forn","    if(empty($_POST[\"username\"])||empty($_POST[\"password\"])||$_POST[\"password\"] != $_POST[\"confirmation\"])","    {","        if(empty($_POST[\"username\"]))","        {","            apologize(\"Username is required\");","        }","        else if(empty($_POST[\"password\"]))","        {","            apologize(\"Password is required\");","        }","        else if($_POST[\"password\"] != $_POST[\"confirmation\"])","        {","            apologize(\"Password doesn't equal the confirmation\");","        }","    }","    else","    {","        if(CS50::query(\"INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)\", $_POST[\"username\"], password_hash($_POST[\"password\"], PASSWORD_DEFAULT)))","        {","            $rows = CS50::query(\"SELECT LAST_INSERT_ID() AS id\");","            $id = $rows[0][\"id\"];","            $_SESSION[\"id\"] = $id; ","            redirect(\"index.php\");","        }","    }","}","else","{","  render(\"register_form.php\", [\"title\" => \"Register\"]);","}","?>","CollaborateOutlineDebugger"]}],[{"start":{"row":80,"column":0},"end":{"row":80,"column":26},"action":"remove","lines":["CollaborateOutlineDebugger"],"id":13}],[{"start":{"row":1,"column":0},"end":{"row":41,"column":2},"action":"remove","lines":["register.php","","\u0001\u0001","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38"],"id":14}],[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"remove","lines":["",""],"id":15}],[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"remove","lines":["",""],"id":16}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":0,"column":0},"end":{"row":0,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1467958139917,"hash":"326095e0c6ab3d7f828cff221283ab3d4da70b0b"}