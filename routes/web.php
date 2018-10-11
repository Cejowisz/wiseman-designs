<?php

Route::get(
    '{uri}',
    '\\'.Pallares\LaravelNuxt\Controllers\NuxtController::class
)->where('uri', '.*');


