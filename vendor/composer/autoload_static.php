<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcf60ed4d54925b592fd117d9b3d7f1b6
{
    public static $classMap = array (
        'XMLSchema' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_base' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_client' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_fault' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_parser' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_server' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_wsdlcache' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'nusoap_xmlschema' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'soap_fault' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'soap_parser' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'soap_server' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'soap_transport_http' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'soapclient' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'soapval' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'wsdl' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
        'wsdlcache' => __DIR__ . '/..' . '/econea/nusoap/src/nusoap.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitcf60ed4d54925b592fd117d9b3d7f1b6::$classMap;

        }, null, ClassLoader::class);
    }
}
