<?php

use Dcat\Admin\Satan\Admin\User\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::resource('satan/user', Controllers\DcatAdminUserController::class);
