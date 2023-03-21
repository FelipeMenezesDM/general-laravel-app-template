<?php

namespace Src\Props;

use Symfony\Component\Yaml\Yaml;

class Props
{
    protected static array|null $properties = null;

    private static function init() : void
    {
        if(is_null(self::$properties)) {
            self::$properties = Yaml::parseFile('behat-config.yml');
        }
    }

    private static function getPropertyRecursive(string $name, array &$list) : mixed
    {
        $name = explode('.', $name);

        if(count($name) > 1 && $list[$name[0]]) {
            return self::getPropertyRecursive(implode('.', array_slice($name, 1)), $list[$name[0]]);
        }

        if(count($name) === 1 && $list[$name[0]]) {
            return $list[$name[0]];
        }

        return '';
    }

    public static function getProperty(string $name) : mixed
    {
        self::init();
        return self::getPropertyRecursive($name, self::$properties);
    }
}
