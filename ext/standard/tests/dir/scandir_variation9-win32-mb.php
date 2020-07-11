<?php
/* Prototype  : array scandir(string $dir [, int $sorting_order [, resource $context]])
 * Description: List files & directories inside the specified path 
 * Source code: ext/standard/dir.c
 */

/*
 * Pass different integers as $sorting_order argument to test how scandir()
 * re-orders the array
 */

echo "*** Testing scandir() : usage variations ***\n";

// include for create_files/delete_files functions
include(dirname(__FILE__) . '/../file/file.inc');

// create directory and files
$dir = dirname(__FILE__) . '/私はガラスを食べられますscandir_variation9';
mkdir($dir);
@create_files($dir, 2, "numeric", 0755, 1, "w", "私はガラスを食べられますfile");

// different ints to pass as $sorting_order argument
$ints = array (PHP_INT_MAX, -PHP_INT_MAX, 0);

foreach($ints as $sorting_order) {
	var_dump( scandir($dir, $sorting_order) );
}

delete_files($dir, 2, "私はガラスを食べられますfile");
?>
===DONE===
