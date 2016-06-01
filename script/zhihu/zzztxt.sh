#!/bin/bash

for i in `ls ./tags/question`
do 
    file="./tags/question/$i"
    echo "============$file==========="
    title=`sed '1,/<h2 class="zm-item-title zm-editable-content">/d;/<\/h2>/,$d' $file`
    content=`sed '1,/<div class="zm-editable-content">/d;/<\/div>/,$d' $file`
    echo $content
done

echo ""

