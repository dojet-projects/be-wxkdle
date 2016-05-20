<?php
/**
 * description
 *
 * Filename: LibJoke.class.php
 *
 * @author liyan
 * @since 2016 5 20
 */
class LibJoke {

    protected static function userKey($openid) {
        return sprintf('joke:user:openid:%s', $openid);
    }

    public static function getNextJoke($openid) {
        $key = self::userKey($openid);
        $id = DRedis::get($key);
        if (!$id) {
            $id = 0;
        }

        $joke = DalJoke::getNextJoke($id);
        if (is_null($joke)) {
            $nextid = 0;
        } else {
            $nextid = $joke['id'];
        }
        DRedis::set($key, $nextid);

        return $joke;
    }

}
