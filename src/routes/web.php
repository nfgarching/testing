<?php

use Illuminate\Support\Facades\Route;
use Nfgarching\Testing\Controllers\TestController;

Route::get('testpackage', TestController::class);