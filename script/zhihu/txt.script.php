#!/usr/bin/php
<?php
include __DIR__.'/../script_init.php';

if ($handle = opendir('./tags/question')) {
    while (false !== ($file = readdir($handle))) {
        if ($file == "." || $file == "..") {
            continue;
        }
        print "\r$file";
        dig($file);
    }
    closedir($handle);
}

println();
exit();
///////////////////////////////

function dig($id) {
    $filename = realpath('./tags/question/'.$id);
    $html = file_get_contents($filename);
    $page = '';
    if (preg_match('/<h2 class="zm-item-title zm-editable-content">([\s\S]*?)<\/h2>/', $html, $reg)) {  // title
        $txt = trim($reg[1]);
        $page.= "标题：".$txt."\n";
    }
    if (preg_match('/<div class="zm-editable-content">([\s\S]*?)<\/div>/', $html, $reg)) {  // content
        $txt = trim($reg[1]);
        $page.= "\n内容：".$txt."\n";
    }
    if (preg_match_all('/<div class="zm-editable-content clearfix">([\s\S]*?)<\/div>/', $html, $reg)) {
        $comments = $reg[1];
        $page.= "\n=============回复============\n";
        $page.= join("\n----------------\n", $comments);
    }

    $out = './tags/txt/'.$id;
    file_put_contents($out, $page);
}
