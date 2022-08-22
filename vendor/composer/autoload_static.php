<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc0926d207e3567588cdc77467e33c4c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Ash765\\FinestDocs\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ash765\\FinestDocs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfc0926d207e3567588cdc77467e33c4c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfc0926d207e3567588cdc77467e33c4c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfc0926d207e3567588cdc77467e33c4c::$classMap;

        }, null, ClassLoader::class);
    }
}
