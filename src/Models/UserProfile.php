<?php

namespace Dcat\Admin\Satan\Admin\User\Models;

use Dcat\Admin\Satan\Admin\User\Casts\Sex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 用户资料model
 * Class UserProfile
 * @package Dcat\Admin\Satan\Admin\User\Models
 */
class UserProfile extends Model
{
    use HasFactory;
    protected $table = 'user_profile';
    protected $fillable = [
        'uid','pic','money','sex','birthday',
        'city','country','phone'
    ];
    protected $casts =[
        'uid'=>'integer','pic'=>'string','sex'=>Sex::class,
        'birthday'=>'date:Y-m-d','phone'=>'integer'
    ];
    //资料的用户 反向关联
    public function user()
    {
        $config = config('user.parent');
        return $this->belongsTo($config['class'],$config['foreignKey'],$config['ownerKey']);
    }
}
