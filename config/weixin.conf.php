<?php
$__c = &Config::configRefForKeyPath('weixin');

$__c['token'] = array(
    C_RUNTIME_BWG => trim(file_get_contents('/var/data/weixin/test')),
    );

unset($__c);