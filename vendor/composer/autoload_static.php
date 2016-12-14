<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6475d0bfc2d511658fdbac172c87dc38
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WyriHaximus\\HtmlCompress\\' => 25,
        ),
        'B' => 
        array (
            'Bolt\\Extension\\Hellonico\\MinifyHtml\\' => 36,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WyriHaximus\\HtmlCompress\\' => 
        array (
            0 => __DIR__ . '/..' . '/wyrihaximus/html-compress/src',
        ),
        'Bolt\\Extension\\Hellonico\\MinifyHtml\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6475d0bfc2d511658fdbac172c87dc38::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6475d0bfc2d511658fdbac172c87dc38::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}