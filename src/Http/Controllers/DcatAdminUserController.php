<?php

namespace Dcat\Admin\Satan\Admin\User\Http\Controllers;

use Dcat\Admin\Satan\Admin\User\Models\UserProfile;
use Dcat\Admin\Http\Controllers\AdminController;

class DcatAdminUserController extends AdminController
{
    public function grid()
    {
        UserProfile::query()->newQuery();
    }
}
