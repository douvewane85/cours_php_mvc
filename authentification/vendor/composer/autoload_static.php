<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit498558f9d41bfe124020820ce49be2fa
{
    public static $prefixLengthsPsr4 = array (
        'b' => 
        array (
            'bbw_mvc\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'bbw_mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit498558f9d41bfe124020820ce49be2fa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit498558f9d41bfe124020820ce49be2fa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit498558f9d41bfe124020820ce49be2fa::$classMap;

        }, null, ClassLoader::class);
    }
}