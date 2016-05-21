for i in {1..40000}
do
    printf "\r$i"
    s=$(cat ./joke/$i)
    mysql -uroot -proot -Dwxkdle -e"insert into jokes(id, joke, hash) values($i, '$s', MD5('$s'));"
done

echo ""

