<?php

use Illuminate\Support\Facades\Route;
use Nfgarching\Testing\Controllers\TestController;

Route::get('package-testing', TestController::class);