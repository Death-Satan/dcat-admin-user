<?php

namespace Dcat\Admin\Satan\Admin\User\Models;

use Dcat\Admin\Satan\Admin\User\Casts\Sex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid','pic','money','sex','birthday',
        'city','country','phone'
    ];
    protected $casts =[
        'uid'=>'integer','pic'=>'string','sex'=>Sex::class,
        'birthday'=>'date','phone'=>'integer'
    ];
    //资料的用户 反向关联
    public function user()
    {
        $config = config('user.parent');
        return $this->belongsTo($config['class'],$config['foreignKey'],$config['ownerKey']);
    }
    public static function boot()
    {
        $dynamic_correlation = config('user.dynamic_correlation');
        /** @var Model $parent */
        $parent = config('user.parent.class');
        dd($parent);
        $parent::resolveRelationUsing('profile',function ($model){
            dump($model);
            return $model;
//            $model->hasOne(self::class,$model->getKey)
        });
//        foreach ($dynamic_correlation as $key=>$value)
//        {
//            self::resolveRelationUsing($key,$value['call']);
//        }

        parent::boot();
    }
}
