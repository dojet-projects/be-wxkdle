<?php
require dirname(__FILE__).'/../be-dojet/dojet.php';
require dirname(__FILE__).'/../be-global/init.php';

define('UI', PRJ.'ui/');
define('CONFIG', PRJ.'config/');
define('MODEL', PRJ.'model/');
define('DATA', PRJ.'data/');

Config::loadConfig(CONFIG.'constant');
Config::loadConfig(CONFIG.'runtime');
Config::loadConfig(CONFIG.'global');
Config::loadConfig(CONFIG.'route');
Config::loadConfig(CONFIG.'database');
Config::loadConfig(CONFIG.'redis');
Config::loadConfig(CONFIG.'weixin');
// Config::loadConfig(CONFIG.'fileupload');

DAutoloader::getInstance()->addAutoloadPathArray(
    array(
        dirname(__FILE__).'/dal/',
        dirname(__FILE__).'/lib/',
    )
);

$rc = Config::runtimeConfigForKeyPath('redis.server');
DRedis::init(array(
    'host' => $rc['hosts'][0],
    'port' => $rc['port'],
    'password' => $rc['password'],
    'timeout' => $rc['timeout'],
    'key_prefix' => Config::configForKeyPath('redis.keyprefix'),
    )
);

Dojet::addModule(__DIR__.'/../mod-weixin');
ModuleWeixin::init(array('token' => Config::runtimeConfigForKeyPath('weixin.token')));

// ModuleSimpleCMS::module()->setDatabase(DBDEMO);
// ModuleFileUpload::setUploadRoot(Config::runtimeConfigForKeyPath('fileupload.upload'));
// ModuleFileUpload::setPublishRoot(Config::runtimeConfigForKeyPath('fileupload.publish'));
// ModuleFileUpload::setUrlRoot('http://www.sina.com.cn');
