<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitac7d4b62514185bcdf86acf07b95c8e2
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Midtrans\\' => 9,
        ),
        'E' => 
        array (
            'Enigma\\TestMidtrans\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Midtrans\\' => 
        array (
            0 => __DIR__ . '/..' . '/midtrans/midtrans-php/Midtrans',
        ),
        'Enigma\\TestMidtrans\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitac7d4b62514185bcdf86acf07b95c8e2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitac7d4b62514185bcdf86acf07b95c8e2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitac7d4b62514185bcdf86acf07b95c8e2::$classMap;

        }, null, ClassLoader::class);
    }
}