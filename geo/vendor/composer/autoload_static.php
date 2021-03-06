<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb464b1f98717246b52306ac26749fbbb
{
    public static $prefixLengthsPsr4 = array (
        'g' => 
        array (
            'geertw\\IpAnonymizer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'geertw\\IpAnonymizer\\' => 
        array (
            0 => __DIR__ . '/..' . '/geertw/ip-anonymizer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb464b1f98717246b52306ac26749fbbb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb464b1f98717246b52306ac26749fbbb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
