#!/bin/bash

for i in {0..100}
do 
    let offset="$i * 30";
    wget -o /dev/null -O ./tagsgif/html/$offset.html "http://tu.duowan.com/m/bxgif?offset=$offset&order=created&math=0.4570783958770334"
    printf "\r$offset"
done

echo ""

