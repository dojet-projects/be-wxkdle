#!/bin/bash
for i in {1..20000}
do
    printf "\r$i"
    sed '1,/style="WORD-BREAK: break-all; WORD-WRAP: break-word">/d' ./html/$i.html | sed '/<\/DIV><!-- Baidu Button BEGIN -->/,$d' | iconv -f gbk -t utf-8 | sed "s/<BR>/\\r\\n/ig" | sed "s/<br \/>/\\r\\n/ig" | sed "s/[　| ]//g" | sed "s/\\r\\n\\r\\n/\\r\\n/" > ./joke/$i
done

