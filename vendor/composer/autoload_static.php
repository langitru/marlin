<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1eeb8866ec0100e5627be4c2f4f00a0f
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyComponents\\' => 13,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
        'A' => 
        array (
            'Aura\\SqlQuery\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyComponents\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/components',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
        'Aura\\SqlQuery\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/sqlquery/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1eeb8866ec0100e5627be4c2f4f00a0f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1eeb8866ec0100e5627be4c2f4f00a0f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
