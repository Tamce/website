<?php
require "../vendor/autoload.php";
use Tamce\Router;
use Tamce\Renderer;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection(require '../src/Config/Database.php');
$capsule->setAsGlobal();
Renderer::path(realpath(__DIR__ . '/../src/Views/'));
Router::group(['namespace' => 'App\\Controllers'], function () {
    include "../src/Config/Routes.php";
});
