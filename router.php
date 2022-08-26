<?php
$path = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
        return false;    // serve the requested resource as-is.
    }
    if( $path === '/css/style.css' || $path=== '/css/admin_style.css') {
        header("Content-type: text/css");
        include __DIR__.$path;
        unset($path);
        return ;
    }
    if( $path === '/js/admin_script.js' || $path === '/js/script.js' ) {
        header("Content-type: text/javascript");
        include __DIR__.$path;
        unset($path);
        return ;
    }
    if( $path === '/js/style.css') {
        header("Content-type: text/css");
        include __DIR__.$path;
        unset($path);
        return ;
    }
if (!file_exists(__DIR__.'/'.$path)) {
    require __DIR__.'/404.php';
    exit();
} elseif($path == '/'){
require 'index.php';
}
 else {
    require basename($path);
}