<?php
/**
 * description
 *
 * Filename: LibRiddle.class.php
 *
 * @author liyan
 * @since 2016 5 24
 */
class LibRiddle {

    protected static function userKey($openid) {
        return sprintf('h:riddle:user:openid:%s', $openid);
    }

    public static function getUserRiddleID($openid) {
        $key = self::userKey($openid);
        $id = DRedis::hget($key, 'id');
    }

    public static function getUserRiddleStatus($openid) {
        $key = self::userKey($openid);
        $status = DRedis::hget($key, 'status');
        if (in_array($status, array('riddle', 'answered'))) {
            return $status;
        }
        $status = 'first';
        return $status;
    }

    public static function getAnswer($openid) {
        $key = self::userKey($openid);
        $id = DRedis::hget($key, 'id');
        if ($id) {
            $riddle = DalRiddle::getRiddle($id);
        } else {
            $riddle = DalRiddle::getFirstRiddle();
            $id = $riddle['id'];
        }
        DRedis::hset($key, 'status', 'answered');
        return $riddle;
    }

    public static function getUserRiddle($openid) {
        $key = self::userKey($openid);
        $id = DRedis::hget($key, 'id');
        if ($id) {
            $riddle = DalRiddle::getRiddle($id);
        } else {
            $riddle = DalRiddle::getFirstRiddle();
            $id = $riddle['id'];
        }
        DRedis::hset($key, 'status', 'answered');
        return $riddle;
    }

    public static function getNextRiddle($openid) {
        $key = self::userKey($openid);
        $id = DRedis::hget($key, 'id');
        if (!$id) {
            $id = 0;
        }

        $riddle = DalRiddle::getNextRiddle($id);
        if (is_null($riddle)) {
            $nextid = 0;
        } else {
            $nextid = $riddle['id'];
        }
        DRedis::hset($key, 'id', $nextid);
        DRedis::hset($key, 'status', 'riddle');

        return $riddle;
    }

}
