<?php
/**
 * dal
 *
 * DAL code
 * Filename: DalRiddle.class.php
 *
 * @author liyan
 * @since 2016 5 20
 */

class DalRiddle extends MysqlDal {

    protected static function defaultDB() {
        return DBWXKDLE;
    }

    public static function getFirstRiddle() {
        $sql = "SELECT *
                FROM riddles
                ORDER BY id
                LIMIT 1";
        return self::rs2rowline($sql);
    }

    public static function getRiddle($id) {
        DAssert::assertNumeric($id);
        $sql = "SELECT *
                FROM riddles
                WHERE id=$id
                LIMIT 1";
        return self::rs2rowline($sql);
    }

    public static function getNextRiddle($id) {
        DAssert::assertNumeric($id);
        $sql = "SELECT *
                FROM riddles
                WHERE id>$id
                ORDER BY id
                LIMIT 1";
        return self::rs2rowline($sql);
    }

}
