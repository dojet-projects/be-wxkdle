<?php
define('C_RUNTIME_LOCAL', 'local');
define('C_RUNTIME_228', '228');
define('C_RUNTIME_MAC2010', 'mac2010');
define('C_RUNTIME_214', '214');
define('C_RUNTIME_BWG', 'bwg');

$__c = &Config::configRefForKeyPath('runtime');

if (defined('RUNTIME')) {
    $__c = RUNTIME;
} elseif (file_exists('/var/.iamlocal')) {
    $__c = C_RUNTIME_LOCAL;
} elseif (file_exists('/var/.iam214')) {
    $__c = C_RUNTIME_214;
} elseif (file_exists('/var/.iam228')) {
    $__c = C_RUNTIME_228;
} elseif (file_exists('/var/.iambwg')) {
    $__c = C_RUNTIME_BWG;
} elseif (file_exists('/var/.iammac2010')) {
    $__c = C_RUNTIME_MAC2010;
}

unset($__c);