#!/bin/bash

for i in {1..4000}
do 
    printf "\r$i"
    cat ./tags/list/$i.html | grep question_link | awk -F 'question/' '{print $2}' | awk -F '">' '{print $1}' > ./tags/page/$i
done

echo ""

