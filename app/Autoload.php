<?php

namespace App;

/**
 * Class Autoload
 *
 * @package App
 */
final class Autoload
{
    /**
     * Autoload constructor.
     */
    public function __construct()
    {
        spl_autoload_register(static function ($class_path) {
            $class_path = str_replace('\\', '/', $class_path);

            include __DIR__ . "/../{$class_path}.php";
        });
    }
}