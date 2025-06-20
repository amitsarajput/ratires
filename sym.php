<?php
$target = '/opt/1panel/apps/openresty/openresty/www/sites/staging.radartires.com/index/laravel-core/storage/app/public';
$shortcut = 'storage';
symlink($target, $shortcut);
?>