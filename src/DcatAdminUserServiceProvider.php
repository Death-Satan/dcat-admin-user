<?php

namespace Dcat\Admin\Satan\Admin\User;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;

class DcatAdminUserServiceProvider extends ServiceProvider
{
    protected $menu = [
        ['title'=>'用户管理','uri'=>'satan/user','icon'=>'fa fa-user']
    ];
	protected $js = [
        'js/index.js',
    ];
	protected $css = [
		'css/index.css',
	];

	public function register()
	{
		//
	}

	public function init()
	{
		parent::init();
        $this->publishes([
            __DIR__.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'user.php'
            =>
            config_path('user.php')
        ]);
		//

	}

	public function settingForm()
	{
		return new Setting($this);
	}
}
