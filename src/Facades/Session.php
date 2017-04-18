<?php
namespace App\Facades;
session_start();
class Session
{
    static $segment = '__tmc_session_control';
    protected static $initialized = false;
    static function get($key)
    {
        return empty($_SESSION[self::$segment][$key]) ? null : $_SESSION[self::$segment][$key];
    }

    static function set($key, $value = null)
    {
        if (!self::$initialized) $_SESSION[self::$segment] = [];
        if (is_null($value))
        {
            unset($_SESSION[self::$segment][$key]);
            return;
        }
        return $_SESSION[self::$segment][$key] = $value;
    }

    static function clear($key = null)
    {
        if (is_null($key))
        {
            unset($_SESSION[self::$segment]);
            self::$initialized = false;
            return;
        }
        self::set($key);
    }
}
