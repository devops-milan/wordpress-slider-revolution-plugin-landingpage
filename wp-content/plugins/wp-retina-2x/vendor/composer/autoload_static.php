<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb9bf34057faa00506d10ad6aac0e9f05
{
    public static $prefixesPsr0 = array (
        'K' => 
        array (
            'KubAT\\PhpSimple\\HtmlDomParser' => 
            array (
                0 => __DIR__ . '/..' . '/kub-at/php-simple-html-dom-parser/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitb9bf34057faa00506d10ad6aac0e9f05::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}