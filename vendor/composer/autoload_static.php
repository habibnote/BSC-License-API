<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita85213ce691ef8f43a4bb1dd0bab111d
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Habib\\BSC_API\\App\\' => 18,
            'Habib\\BSC_API\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Habib\\BSC_API\\App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Habib\\BSC_API\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInita85213ce691ef8f43a4bb1dd0bab111d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita85213ce691ef8f43a4bb1dd0bab111d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita85213ce691ef8f43a4bb1dd0bab111d::$classMap;

        }, null, ClassLoader::class);
    }
}
