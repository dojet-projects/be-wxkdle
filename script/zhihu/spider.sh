#!/bin/bash

for i in {1..7800}
do 
    wget -o /dev/null -O ./tags/list/$i.html  "http://www.zhihu.com/topic/19562451/questions?page=$i"
    printf "\r$i"
done

echo ""

