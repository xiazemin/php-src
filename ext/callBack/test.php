<?php
function fun1() {
    for ($i = 0; $i < 5; $i++) {
        echo 'fun1:'.$i."\n";
    }
    return 'call end';
}

echo hello_callback('fun1');