<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Symfony\\Polyfill\\Php81\\' => array($vendorDir . '/symfony/polyfill-php81'),
    'Symfony\\Polyfill\\Mbstring\\' => array($vendorDir . '/symfony/polyfill-mbstring'),
    'Symfony\\Polyfill\\Ctype\\' => array($vendorDir . '/symfony/polyfill-ctype'),
    'Symfony\\Contracts\\Translation\\' => array($vendorDir . '/symfony/translation-contracts'),
    'Symfony\\Component\\Validator\\' => array($vendorDir . '/symfony/validator'),
    'App\\Model\\' => array($baseDir . '/models'),
    'App\\Exception\\' => array($baseDir . '/exceptions'),
    'App\\Core\\' => array($baseDir . '/core'),
    'App\\Controller\\' => array($baseDir . '/controllers'),
);