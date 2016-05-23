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

    protected function received_event($postObj, $event, $eventKey) {
        Trace::debug($event);
        Trace::debug($eventKey);
        if ($event == 'subscribe') {
            $this->respondText('hi，发送“xh”，我就能回复一条笑话给你。');
        }
    }

    protected function receivedUnknown($postObj) {
        Trace::debug('unknown received:');
        Trace::debug(var_export($postObj, true));
    }

    protected function receivedText($postObj, $text) {
        if (in_array(strtolower($text), array('xh', '笑话'))) {
            return $this->respondJoke();
        }

        $this->respondText("已收到！\n回复“xh”无数笑话等着你");
    }

    protected function respondJoke() {
        $joke = LibJoke::getNextJoke($this->fromUser);
        $link = 'http://dwz.cn/wxkdle';
        // $link = 'http://mp.weixin.qq.com/s?__biz=MjM5OTgyMTQxMw==&mid=200675112&idx=1&sn=05b65b99b11d1e08501c27813057f22f&scene=1&srcid=0521p4kWdHhuFI2aFIFaNIqH#wechat_redirect';
        $text = sprintf("%s\n=================\n关注公众号“<a href='%s'>玩笑开大了</a>”\n回复“xh”看笑话", $joke['joke'], $link);
        $this->respondText($text);
    }

}
