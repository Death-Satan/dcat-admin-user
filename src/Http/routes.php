<?php

use Dcat\Admin\Satan\Admin\User\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('satan/user', Controllers\DcatAdminUserController::class.'@index');
