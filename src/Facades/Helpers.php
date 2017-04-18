<?php
use Tamce\Renderer;
function abort($status = null, $data = [])
{
    try {
        Renderer::render("Errors/$status.php", $data, $status);
    } catch (Exception $e) {
        Renderer::render("Errors/Default.php", $data, 500);
    }
    exit();
}
