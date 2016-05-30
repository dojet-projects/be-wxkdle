#!/usr/bin/php
<?php
include __DIR__.'/script_init.php';

if ($handle = opendir('./tagsgif/html')) {
    while (false !== ($file = readdir($handle))) {
        if ($file == "." || $file == "..") {
            continue;
        }
        $filename = realpath('./tagsgif/html/'.$file);
        dig($filename);
    }
    closedir($handle);
}

exit();
///////////////////////////////

function dig($filename) {
    $json = file_get_contents($filename);
    $arr = json_decode($json, true);
    if (!$arr) return;

    $html = $arr['html'];
    var_dump($arr);
    die();
}
