<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalJoke.class.php
 *
 * @author liyan
 * @since 2016 5 20
 */

class DalJoke extends MysqlDal {

    protected static function defaultDB() {
        return DBWXKDLE;
    }

    public static function getJoke() {
        $sql = "SELECT *
                FROM jokes
                ORDER BY RAND()
                LIMIT 1";
        return self::rs2rowline($sql);
    }

}
