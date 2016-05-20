<?php
$__c = &Config::configRefForKeyPath('redis');

//*
$__c['server'] = array(
    C_RUNTIME_228 => array(
        'hosts' => array(HOST228),
        'port' => 6379,
        'password' => '',
        'timeout' => 1, //sec
    ),
    C_RUNTIME_214 => array(
        'hosts' => array('127.0.0.1'),
        'port' => 6379,
        'password' => '',
        'timeout' => 1, //sec
    ),
    C_RUNTIME_BWG => array(
        'hosts' => array('127.0.0.1'),
        'port' => 6379,
        'password' => '',
        'timeout' => 1, //sec
    ),
);
//*/

$__c['keyprefix'] = 'wxkdle:';

unset($__c);
