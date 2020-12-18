<?php


namespace Dcat\Admin\Satan\Admin\User\Casts;


class Sex implements \Illuminate\Contracts\Database\Eloquent\CastsAttributes
{
    protected $sex = [
        0=>'未知',
        1=>'男',
        2=>'女'
    ];
    /**
     * @inheritDoc
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return (count($this->sex)<=$value)?$this->sex[$value]:'未知';
    }

    /**
     * @inheritDoc
     */
    public function set($model, string $key, $value, array $attributes)
    {
        $sex = array_reverse($this->sex);
        return array_key_exists($value,$sex)?$sex[$value]:0;
    }
}
