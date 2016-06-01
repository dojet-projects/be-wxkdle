#!/bin/bash

for i in {4000..4020}
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

