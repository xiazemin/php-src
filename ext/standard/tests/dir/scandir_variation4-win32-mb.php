<?php
/* Prototype  : array scandir(string $dir [, int $sorting_order [, resource $context]])
 * Description: List files & directories inside the specified path 
 * Source code: ext/standard/dir.c
 */

/*
 * Test scandir() with relative paths as $dir argument
 */

echo "*** Testing scandir() : usage variations ***\n";

// include for create_files/delete_files functions
include (dirname(__FILE__) . '/../file/file.inc');

$base_dir_path = dirname(__FILE__);

$level_one_dir_path = "$base_dir_path/私はガラスを食べられますlevel_one";
$level_two_dir_path = "$level_one_dir_path/私はガラスを食べられますlevel_two";

// create directories and files
mkdir($level_one_dir_path);
create_files($level_one_dir_path, 2, 'numeric', 0755, 1, 'w', '私はガラスを食べられますlevel_one', 1);
mkdir($level_two_dir_path);
create_files($level_two_dir_path, 2, 'numeric', 0755, 1, 'w', '私はガラスを食べられますlevel_two', 1);

echo "\n-- \$path = './私はガラスを食べられますlevel_one': --\n";
var_dump(chdir($base_dir_path));
var_dump(scandir('./私はガラスを食べられますlevel_one'));

echo "\n-- \$path = 'level_one/私はガラスを食べられますlevel_two': --\n";
var_dump(chdir($base_dir_path));
var_dump(scandir('私はガラスを食べられますlevel_one/私はガラスを食べられますlevel_two'));

echo "\n-- \$path = '..': --\n";
var_dump(chdir($level_two_dir_path));
var_dump(scandir('..'));

echo "\n-- \$path = '私はガラスを食べられますlevel_two', '.': --\n";
var_dump(chdir($level_two_dir_path));
var_dump(scandir('.'));

echo "\n-- \$path = '../': --\n";
var_dump(chdir($level_two_dir_path));
var_dump(scandir('../'));

echo "\n-- \$path = './': --\n";
var_dump(chdir($level_two_dir_path));
var_dump(scandir('./'));

echo "\n-- \$path = '../../'私はガラスを食べられますlevel_one': --\n";
var_dump(chdir($level_two_dir_path));
var_dump(scandir('../../私はガラスを食べられますlevel_one'));

@delete_files($level_one_dir_path, 2, '私はガラスを食べられますlevel_one');
@delete_files($level_two_dir_path, 2, '私はガラスを食べられますlevel_two');
?>
===DONE===
