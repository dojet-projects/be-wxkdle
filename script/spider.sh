#!/bin/bash

for i in {20001..40000}
do 
    wget -o /dev/null -O ./html/$i.html  http://xiaohua.aiwenwen.com/Joke-$i.html
    printf "\r$i"
done

echo ""

