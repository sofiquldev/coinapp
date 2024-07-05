<?php
use Illuminate\Support\Facades\Artisan;


require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

// Create a new HTTP Kernel instance
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Handle the request and boot the application
$request = Illuminate\Http\Request::capture();
$kernel->handle($request);

Artisan::call('route:clear');
Artisan::call('route:cache');

echo 'Route cache cleared and recached successfully.';

require __DIR__.'/bootstrap/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

Artisan::call('route:clear');
Artisan::call('route:cache');

echo 'Route cache cleared and recached successfully.';
