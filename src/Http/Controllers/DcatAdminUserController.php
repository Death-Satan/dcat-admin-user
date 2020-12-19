<?php

namespace Dcat\Admin\Satan\Admin\User\Http\Controllers;

use App\Models\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Satan\Admin\User\Models\UserProfile;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

class DcatAdminUserController extends AdminController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = config('user.parent.class');
    }

    public function grid()
    {
        $model = $this->userModel;
        $defaultClosure = function (Grid $grid){
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('email');
            $grid->column('profile.phone');
            $grid->column('profile.pic')
                ->image('',50,50);
            $grid->column('profile.sex');
            $grid->column('profile.birthday');
            $grid->column('created_at');
            $grid->column('updated_at');
        };
        if (method_exists($model,'grid')){
        $modelClosure = $model::grid();
        }
        $closure = (!empty($modelClosure) and $modelClosure instanceof \Closure)?
            $modelClosure:
            $defaultClosure;
        return  Grid::make($model::with(['profile']),$closure);
    }
    public function form()
    {
        $model = $this->userModel;
        $defaultClosure = function (Form $form){
            $form->text('name');
            $form->email('email');
            $form->text('profile.phone');
            $form->date('profile.birthday');
            $form->select('profile.sex')
                ->options([0=>'未知',1=>'男',2=>'女']);
            $form->switch('email_verified_at');
        };
        if (method_exists($model,'form')){
            $modelClosure = $model::form();
        }
        $closure = (!empty($modelClosure) and $modelClosure instanceof \Closure)?
            $modelClosure:
            $defaultClosure;

        return Form::make($model::with(['profile']),$closure);
    }
    public function detail($id)
    {
        $model = $this->userModel;
        $defaultClosure = function (Show $show){
            $show->field('name');
            $show->field('email');
            $show->field('profile.phone');
            $show->field('profile.birthday');
            $show->field('profile.sex');
            $show->field('email_verified_at');
        };
        if (method_exists($model,'detail')){
            $modelClosure = $model::detail();
        }
        $closure = (!empty($modelClosure) and $modelClosure instanceof \Closure)?
            $modelClosure:
            $defaultClosure;
        return Show::make($id,$model::with(['profile']),$closure);
    }
}
