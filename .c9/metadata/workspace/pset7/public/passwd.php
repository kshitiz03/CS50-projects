{"filter":false,"title":"passwd.php","tooltip":"/pset7/public/passwd.php","undoManager":{"mark":0,"position":0,"stack":[[{"start":{"row":0,"column":0},"end":{"row":45,"column":2},"action":"insert","lines":["<?php","    // configuration","    require(\"../includes/config.php\"); ","    // if form was submitted","    if ($_SERVER[\"REQUEST_METHOD\"] == \"POST\")","    {","        if (empty($_POST[\"opassword\"]))","        {","            apologize(\"You must provide your old password.\");","        }","        else if (empty($_POST[\"npassword\"]))","        {","            apologize(\"You must provide a password.\");","        }","        else if($_POST[\"confirmation\"] != $_POST[\"npassword\"])","        {","            apologize(\"New Passwords donot match\");","        }","        ","        $rows = CS50::query(\"SELECT * FROM users WHERE id = ?\", $_SESSION[\"id\"]);","        if (count($rows) == 1)","        {","            // first (and only) row","            $row = $rows[0];","            // compare hash of user's input against hash that's in database","            if (crypt($_POST[\"opassword\"], $row[\"hash\"]) == $row[\"hash\"])","            {","               // Now change the password","               $change = CS50::query(\"UPDATE users SET hash=?\",crypt($_POST[\"npassword\"]));","               render(\"passwd_print.php\",[\"title\" => \"Sucess!!\"]);","               ","            }","            else","            {","                apologize(\"Wrong Old Password provided\");","            }","        }","    }","    ","    else","    {","        // else render form","        render(\"passwd_form.php\", [\"title\" => \"Change Password\"]);","    }","    ","?>"],"id":1}]]},"ace":{"folds":[],"scrolltop":141,"scrollleft":0,"selection":{"start":{"row":45,"column":2},"end":{"row":45,"column":2},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":24,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1467955797769,"hash":"13fb0d592643bb8610ef8709ff1bf5777ca2f484"}