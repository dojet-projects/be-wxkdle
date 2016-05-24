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

    protected function receivedEvent($postObj, $event, $eventKey) {
        Trace::debug('received event: '.$event.' key:'.$eventKey);
        if ('subscribe' === $event) {
            // $this->respondText('hi，发送“xh”，我就能回复一条笑话给你。');
            $text = $this->riddleText();
            $text = "hi，看笑话发送“xh”\n=================\n先来个脑筋急转弯>>\n".$text;
            return $this->respondText($text);
        } elseif ('unsubscribe' === $event) {
            LibRiddle::removeUserRiddle($this->fromUser);
        }
    }

    protected function receivedUnknown($postObj) {
        Trace::debug('unknown received:');
        Trace::debug(var_export($postObj, true));
    }

    protected function receivedText($postObj, $text) {
        if (in_array(strtolower($text), array('xh', '笑话'))) {
            return $this->respondJoke();
        } elseif (in_array(strtolower($text), array('n'))) {
            return $this->respondRiddle();
        }

        $this->respondText("已收到！\n回复“xh”无数笑话等着你\n回复“n”脑筋急转弯");
    }

    protected function riddleText() {
        $status = LibRiddle::getUserRiddleStatus($this->fromUser);
        if ('riddle' === $status) {
            // get answer
            $text = LibRiddle::getAnswer($this->fromUser);
            $text.= "\n=================\n回复“n”继续";
        } else {
            // next
            $text = LibRiddle::getNextRiddle($this->fromUser);
            $text.= "\n=================\n回复“n”看答案";
        }
        return $text;
    }

    protected function respondRiddle() {
        $text = $this->riddleText();
        $this->respondText($text);
    }

    protected function respondJoke() {
        $joke = LibJoke::getNextJoke($this->fromUser);
        $link = 'http://dwz.cn/wxkdle';
        // $link = 'http://mp.weixin.qq.com/s?__biz=MjM5OTgyMTQxMw==&mid=200675112&idx=1&sn=05b65b99b11d1e08501c27813057f22f&scene=1&srcid=0521p4kWdHhuFI2aFIFaNIqH#wechat_redirect';
        $text = sprintf("%s\n=================\n关注公众号“<a href='%s'>玩笑开大了</a>”\n回复“xh”看笑话", $joke['joke'], $link);
        $this->respondText($text);
    }

}
