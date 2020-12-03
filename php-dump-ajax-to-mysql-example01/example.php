<?php

ob_start();
var_dump(scJson::jsonEncode($resultJson));
$dbg = mysql_real_escape_string(ob_get_clean());
$sql = "INSERT INTO Debug ( Id, Text ) VALUES ( NULL, '$dbg' )";
staticDBUtil::execSQL($sql);
