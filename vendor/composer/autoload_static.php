<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc97d727afcaf36a60839a98e7493bd4
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Profesor\\ProyecFin\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Profesor\\ProyecFin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfc97d727afcaf36a60839a98e7493bd4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfc97d727afcaf36a60839a98e7493bd4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfc97d727afcaf36a60839a98e7493bd4::$classMap;

        }, null, ClassLoader::class);
    }
}
