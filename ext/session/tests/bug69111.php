<?php
$sh = new SessionHandler;
session_set_save_handler($sh);

$savePath = ini_get('session.save_path');
$sessionName = ini_get('session.name');

// session_start(); // Uncommenting this makes it not crash when reading the session (see below), but it will not return any data. 

$sh->open($savePath, $sessionName);
$sh->write("foo", "bar");
var_dump($sh->read(@$id));
?>
