<?php
namespace App\Config;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class Migration
{
    public static $schema;
    protected static $tables = [];
    public static function boot()
    {
        self::$schema = Capsule::schema();
        self::$tables = ['users', 'posts', 'tags', 'comments', 'attachments'];
    }

    public static function setup()
    {
        self::$schema->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    public static function clean()
    {
        foreach (self::$tables as $table) {
            self::$schema->dropIfExists($table);
        }
    }

    public static function forceSetup()
    {
        self::clean();
        self::setup();
    }
}
