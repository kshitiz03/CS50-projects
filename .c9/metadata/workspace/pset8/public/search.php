{"filter":false,"title":"search.php","tooltip":"/pset8/public/search.php","undoManager":{"mark":0,"position":0,"stack":[[{"start":{"row":0,"column":0},"end":{"row":13,"column":2},"action":"remove","lines":["<?php","","    require(__DIR__ . \"/../includes/config.php\");","","    // numerically indexed array of places","    $places = [];","","    // TODO: search database for places matching $_GET[\"geo\"], store in $places","","    // output places as JSON (pretty-printed for debugging convenience)","    header(\"Content-type: application/json\");","    print(json_encode($places, JSON_PRETTY_PRINT));","","?>"],"id":2},{"start":{"row":0,"column":0},"end":{"row":56,"column":2},"action":"insert","lines":["<?php","","    require(__DIR__ . \"/../includes/config.php\");","","    // numerically indexed array of places","    $places = [];","","    // TODO: search database for places matching $_GET[\"geo\"], store in $places","    $geo = $_GET[\"geo\"];","    $geo = str_replace(\",\", \" \", $geo);","    $geo = trim($geo);","    // Count how many words were entered into the search","    $geo = explode(\" \", $geo);","    $count = count($geo);","    // Error out if the user did not provide input","    if ($count < 1)","    {","    \tprint(\"Please enter a query string.\");","    }","    elseif ($count === 1)","    {","    \t$geo = $geo[0];","    \t// Check zipcode if the length of the string is 5 chars","    \tif(strlen($geo) === 5)","    \t{","    \t\t$places = cs50::query(\"SELECT * FROM places WHERE postal_code = ?\", $geo);\t","    \t}","    \telseif(strlen($geo) == 2)","    \t{","    \t\t// Check state abbreviation, called admin_code1","    \t\t$places = cs50::query(\"SELECT * FROM places WHERE admin_code1 = ?\", strtoupper($geo));","    \t}","    \telse","    \t{","    \t\t// Check city, called place_name in places table","    \t\t$places = cs50::query(\"SELECT * FROM places WHERE place_name LIKE ?\", $geo);","    \t}","    \t","    \tif(empty($places))","    \t{","    \t\t// Check state, called admin_name1","    \t\t$places = cs50::query(\"SELECT * FROM places WHERE admin_name1 LIKE ?\", $geo);","    \t}","    }","    elseif($count > 1)","    {","    \t// Reassemble places into one long string","    \t$geo = implode(\" \", $geo);","    \t// Search across multiple columns","    \t$places = cs50::query(\"SELECT * FROM places WHERE MATCH(postal_code, place_name, admin_name1, admin_code1) AGAINST (?)\", $geo);","    }","","    // output places as JSON (pretty-printed for debugging convenience)","    header(\"Content-type: application/json\");","    print(json_encode($places, JSON_PRETTY_PRINT));","","?>"]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":56,"column":2},"end":{"row":56,"column":2},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1467965491219,"hash":"8ec98e74e65a47f7f32e9b8d565b02d7427bb92e"}