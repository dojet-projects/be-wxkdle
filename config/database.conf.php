<?php
define('DBWXKDLE',    'DBWXKDLE');

$__c = &Config::configRefForKeyPath('database');

$__c[C_RUNTIME_214] = array(
    DBWXKDLE => array(
        'r' => array(
            'hosts' => array(
                array('h' => '127.0.0.1', 'p' => 3306),
                ),
            'username' => 'root',
            'password' => 'root',
            'dbname' => 'wxkdle',
            'charset' => 'utf8',
            'timeout' => 1, //sec
        ),
        'w' => array(
            'hosts' => array(
                array('h' => '127.0.0.1', 'p' => 3306),
                ),
            'username' => 'root',
            'password' => 'root',
            'dbname' => 'wxkdle',
            'charset' => 'utf8',
            'timeout' => 1, //sec
        ),
    ),
);

unset($__c);
