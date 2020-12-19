<?php

namespace Dcat\Admin\Satan\Admin\User;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Dcat\Admin\Satan\Admin\User\Models\UserProfile;
use Illuminate\Database\Eloquent\Model;

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
        $parent = config('user.parent.class');
        $parent::resolveRelationUsing('profile',function (Model $model){
            return $model->hasOne(UserProfile::class,'uid','id');
        });
	}

	public function init()
	{
	    //配置资源
        $this->publishes([
            __DIR__.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'user.php'
            =>
                config_path('user.php')
        ],'config');
        //语言包资源
        $this->publishes([
            $this->getLangPath()
            =>
            resource_path('lang')
        ],'lang');
		parent::init();
		//
	}

	public function settingForm()
	{
		return new Setting($this);
	}
}
