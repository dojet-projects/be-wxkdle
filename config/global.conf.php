<?php
$__c = &Config::configRefForKeyPath('global');

$__c['traceLevel'] = array(
    C_RUNTIME_BWG => Trace::TRACE_ALL,
);

$__c['log_path'] = array(
    C_RUNTIME_BWG => '/var/log/wxkdle',
    );

unset($__c);