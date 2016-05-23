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

    public static function getNextJoke($id) {
        DAssert::assertNumeric($id);
        $sql = "SELECT *
                FROM jokes
                WHERE id>$id
                ORDER BY id
                LIMIT 1";
        return self::rs2rowline($sql);
    }

}
