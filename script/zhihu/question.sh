#!/bin/bash

for i in {1..7800}
do 
    printf "\r$i"
    
    file="./tags/page/$i"
    while read qid
    do
        url="http://www.zhihu.com/question/$qid"
        echo "fetching $url"
        wget -o /dev/null -O ./tags/question/$qid $url
    done < $file

done

echo ""

