<?php
return [
    //父级模型类
    'parent'=>[
        'class'=>\App\Models\User::class,
        'foreignKey'=>'uid',
        'ownerKey'=>'id'
    ],
    //动态关联
    'dynamic_correlation'=>[
    ],
];
