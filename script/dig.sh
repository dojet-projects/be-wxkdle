#!/bin/bash
for i in {1..40000}
do
    printf "$i\r"
    sed '1,/style="WORD-BREAK: break-all; WORD-WRAP: break-word">/d;/<\/DIV><!-- Baidu Button BEGIN -->/,$d' ./html/$i.html | iconv -f gbk -t utf-8 | sed "s/<BR>/\r\n/ig" | sed "s/<br \/>/\r\n/ig" | sed "s/[　| ]//g" | sed /^[[:space:]]*$/d > ./joke/$i
done

echo ""
