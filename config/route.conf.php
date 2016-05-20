<?php

Dispatcher::loadRoute(
    array(
        '/^$/' => UI.'HomeAction',
        '/^weixin/' => UI.'WeixinAction',
        '/^misc\/pi$/' => UI.'PHPInfoAction',
    )
);
