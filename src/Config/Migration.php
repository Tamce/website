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
        self::$tables = ['users', 'posts', 'tags', 'comments', 'attachments', 'posts_tags'];
    }

    public static function setup()
    {
        self::$schema->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->unsignedInteger('privilege');
            $table->timestamps();
        });

        self::$schema->create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content')->nullable();
            $table->unsignedInteger('author_id');
            $table->timestamps();
        });

        self::$schema->create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        self::$schema->create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('author_id');
            $table->text('content');
            $table->timestamps();
        });

        self::$schema->create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('path');
            $table->shortInteger('status');
            $table->timestamps();
        });

        self::$schema->create('posts_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('tag_id');
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
