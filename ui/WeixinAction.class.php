<?php
/**
 * Homepage
 *
 * Filename: WeixinAction.class.php
 *
 * @author setimouse@gmail.com
 * @since 2016 5 20
 */
class WeixinAction extends WeixinBaseAction {

    protected function receivedText($postObj, $text) {
        if (in_array($text, array('xh', '笑话'))) {
            return $this->respondJoke();
        }
    }

    protected function respondJoke() {
        $joke = LibJoke::getNextJoke($this->fromUser);
        $this->respondText($joke['joke']);
    }

}
