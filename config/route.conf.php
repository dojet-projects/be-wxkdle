<?php

Dispatcher::loadRoute(
    array(
        '/^$/' => UI.'HomeAction',
        '/^weixin/' => UI.'WeixinAction',
    )
);
