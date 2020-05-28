<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit36cb75b5eb0977e7d84773776631b1e6
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit36cb75b5eb0977e7d84773776631b1e6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit36cb75b5eb0977e7d84773776631b1e6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
