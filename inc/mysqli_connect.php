<?php

$db = new mysqli('localhost', 'root', '', 'doodledip_db');

if ($db->connect_error) {
    $error = $db->connect_error;
    echo $error;
}

$db->set_charset('utf8');
