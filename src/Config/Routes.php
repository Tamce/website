<?php
use Tamce\Router;

Router::get('*', function () {
    abort(404);
});
