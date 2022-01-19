<?php

$srch = "%".$_POST["last-name"]."%";
$db = new SQLite3('./sandbox.db');
$results = $db->query("select * from namedb where surname like '$srch'");
while ($data = $results->fetchArray()) {
    echo $data['givenname']," ",$data['surname'];
}
