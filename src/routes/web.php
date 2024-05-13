<?php

use Illuminate\Support\Facades\Route;
use Nfgarching\Testing\Controllers\TestController;

dd('Nfgarching\Testing\routes\web.php');

Route::get('inspire', TestController::class);