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
        if (in_array(strtolower($text), array('xh', '笑话'))) {
            return $this->respondJoke();
        }
    }

    protected function respondJoke() {
        $joke = LibJoke::getNextJoke($this->fromUser);
        $link = 'http://mp.weixin.qq.com/s?__biz=MjM5OTgyMTQxMw==&mid=200675112&idx=1&sn=05b65b99b11d1e08501c27813057f22f&scene=1&srcid=0521p4kWdHhuFI2aFIFaNIqH#wechat_redirect';
        $text = sprintf("%s\n=================\n关注公众号“<a href='%s'>玩笑开大了</a>”\n回复“xh”看笑话", $joke['joke'], $link);
        // $this->respondTextNews(array(
        //     MWeixinNews::news('', $joke['joke'], '', ''),
        //     )
        // );
        $this->respondText($text);
    }

}
